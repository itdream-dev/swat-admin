<?php

namespace App\Http\Controllers;

/******************************************************
 * IM - Vocabulary Builder
 * Version : 1.0.2
 * Copyright© 2016 Imprevo Ltd. All Rights Reversed.
 * This file may not be redistributed.
 * Author URL:http://imprevo.net
 ******************************************************/


use App\Setting;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use Input;
use Reminder;
use Mail;
use Session;
use Log;
use File;

class SettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function settings()
    {

		      $codeList = Setting::all();
		      $settings = [];
		        for($i = 0; $i < count($codeList); $i++) {
			           $settings[$codeList[$i]["name"]] = $codeList[$i]["value"];
		        }

    	    return view('settings', ['settings'=>$settings]);
    }



    public function postSetting(Request $request)
    {
        $code = Setting::firstOrCreate(["name" => "is_test_net"]);
        $code->value = $request->get('is_test_net');
        $code->save();

        $code = Setting::firstOrCreate(["name" => "minting_amount_per_min"]);
        $code->value = $request->get('minting_amount_per_min');
        $code->save();

        // $code = Setting::firstOrCreate(["name" => "minting_private_key"]);
        // $code->value = $request->get('minting_private_key');
        // $code->save();
        $code = Setting::firstOrCreate(["name" => "minting_min_value"]);
        $code->value = $request->get('minting_min_value');
        $code->save();

        $code = Setting::firstOrCreate(["name" => "mining_time_period"]);
        $code->value = $request->get('mining_time_period');
        $code->save();

        $code = Setting::firstOrCreate(["name" => "reward_amount_per_once"]);
        $code->value = $request->get('reward_amount_per_once');
        $code->save();

        $code = Setting::firstOrCreate(["name" => "server_mode"]);
        $code->value = $request->get('server_mode');
        $code->save();
        
        return back()->with('success',"Settings have been successfully saved.");
    }
}
