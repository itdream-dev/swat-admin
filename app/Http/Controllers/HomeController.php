<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Setting;
use App\Minting;
use Carbon\Carbon;
use Log;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        date_default_timezone_set('UTC');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
        $online_count = 0;
        foreach ($devices as $device){
          $device->is_miniting = 0;
          if (!$device->status) continue;
          $mytime = Carbon::now();
          $mintings = Minting::whereBetween('updated_at', [$mytime->subMinutes(2), $mytime])->get();
          Log::info($mintings);
          if (count($mintings) > 0){
            $online_count++;
          }
        }

        $codeList = Setting::all();
        $settings = [];
          for($i = 0; $i < count($codeList); $i++) {
               $settings[$codeList[$i]["name"]] = $codeList[$i]["value"];
          }
        $minting_speed = $settings['minting_amount_per_min'];
        return view('home', [
          'online_count' => $online_count,
          'device_count' => count($devices),
          'minting_speed' => $minting_speed,
          'last_minted_time' => $settings['last_minted_time'],
          'mining_time_period' => $settings['mining_time_period'],
        ]);
    }
}
