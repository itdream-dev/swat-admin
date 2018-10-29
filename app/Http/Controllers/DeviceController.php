<?php

namespace App\Http\Controllers;

/******************************************************
* IM - Vocabulary Builder
* Version : 1.0.2
* Copyright© 2016 Imprevo Ltd. All Rights Reversed.
* This file may not be redistributed.
* Author URL:http://imprevo.net
******************************************************/

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use Illuminate\Support\Facades\DB;
use Log;
use App\Device;
use App\Minting;
use Carbon\Carbon;
class DeviceController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function CallAPI($method, $url, $data = false)
  {
  $curl = curl_init();

  switch ($method)
  {
      case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          curl_setopt($curl, CURLOPT_HTTPHEADER, array(
              'Content-Type: application/json'
            )
          );
          if ($data)
              curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
      case "PUT":
          curl_setopt($curl, CURLOPT_PUT, 1);
          break;
      default:
          if ($data)
              $url = sprintf("%s?%s", $url, http_build_query($data));
  }

  // Optional Authentication:
  //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  //curl_setopt($curl, CURLOPT_USERPWD, "username:password");

  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  $result = curl_exec($curl);

  curl_close($curl);

  return $result;
  }

  public function devices(Request $request)
  {
    $query = $request->input('query');
    if($query == null)
    $query = '';

    $devices = Device::where('phone_imei', 'like', '%'.$query.'%')->paginate(50);


    foreach ($devices as $device){
      $device->is_miniting = 0;
      if (!$device->status) continue;
      $mytime = Carbon::now();
      $mintings = Minting::where('updated_at', '>', $mytime->subMinutes(2)->toDateTimeString())->get();
      Log::info($mintings);
      if (count($mintings) > 0){
        $device->is_miniting = 1;
      }
    }

    return view('devices', [
      'devices' => $devices,
      'search' => $query,
    ]);
  }

  public function newDevice()
  {
    return view('deviceEdit', [
      'device' => array('id'=>null, 'phone_imei'=>'', 'status'=>''),
    ]);
  }

  public function editDevice(Request $request, $id)
  {
    return view('deviceEdit', [
      'device' => Device::findOrNew($id),
    ]);
  }

  public function postEdit(Request $request)
  {
      $device_id = $request->input('id');
      if ($device_id != ''){
        $device = Device::where('id', $device_id)->first();
        $device->phone_imei = $request->input('phone_imei');
        $device->status = $request->input('status');
        $device->save();
      } else {
        $device = Device::create([
          'phone_imei' => $request->input('phone_imei'),
          'status' => $request->input('status'),
        ]);
      }
      return redirect()->to('devices');
  }

  public function destroy($id)
  {
    $u = Device::findOrNew($id);
    if (isset($u->wallet->id)){
      $u->wallet->delete();
    }
    $u->delete();
    $ret = array("result"=>"ok");
    return json_encode($ret);
  }
}
