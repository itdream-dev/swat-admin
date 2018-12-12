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
use App\Setting;


class SyncController extends Controller
{
  public function __construct()
  {
    //$this->middleware('auth');
  }

  public function Sync(Request $request)
  {
      $sync_height = $request->input('sync_height');
      Log::info('sync_height');
      Log::info($sync_height);
      $devices = Device::where('id', '>', $sync_height)->get();
      return response()->json($devices);
  }

  public function server_mode(){
    $codeList = Setting::all();
    $settings = [];
    for($i = 0; $i < count($codeList); $i++) {
         $settings[$codeList[$i]["name"]] = $codeList[$i]["value"];
    }

    $response = [
      'server_mode' => $settings['server_mode']
    ];

    return response()->json($response);
  }
}
