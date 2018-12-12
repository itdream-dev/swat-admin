<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Log;
use App\Device;
use App\Setting;

class Syncing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command syncing';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $codeList = Setting::all();
        $settings = [];
        for($i = 0; $i < count($codeList); $i++) {
             $settings[$codeList[$i]["name"]] = $codeList[$i]["value"];
        }
        $sync_height = $settings['sync_height'];
        $data = [
          'sync_height' => $sync_height
        ];
        $data_string = json_encode($data);
        $res = $this->CallAPI('POST', 'http://localhost:8000/api/sync', $data_string);
        $devices = json_decode($res);
        if (count($devices) > 0){
          Device::where('id', '>', $sync_height)->delete();
          foreach ($devices as $device){
            $dev = Device::create([
              'id' => $device->id,
              'phone_imei' => $device->phone_imei,
              'current_address' => $device->current_address,
              'status' => $device->status,
              'created_at' => $device->created_at,
              'updated_at' => $device->updated_at
            ]);
          }
          $code = Setting::firstOrCreate(["name" => "sync_height"]);
          $code->value = $dev->id;
          $code->save();
        }
    }
}
