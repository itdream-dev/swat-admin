<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Minting;
use App\Minted;
use App\Setting;
use Log;
use Carbon\Carbon;
class Airdropping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:airdropping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command airdropping';

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
        //Log::info('-----------start-------------');
      $codeList = Setting::all();
      $settings = [];
      for($i = 0; $i < count($codeList); $i++) {
        $settings[$codeList[$i]["name"]] = $codeList[$i]["value"];
      }

      $last = Carbon::createFromTimestamp(0);
      if ($settings['last_minted_time'] != ''){
        $last = Carbon::parse($settings['last_minted_time']);
      }

      $now = Carbon::now();
      $totalDuration = $now->diffInMinutes($last);

      Log::info($totalDuration);
      if ($totalDuration > $settings['mining_time_period']){

        $code = Setting::firstOrCreate(["name" => "last_minted_time"]);
        $code->value = Carbon::now()->toDateTimeString();
        $code->save();

        $mintings = Minting::where('mint_amount', '>=', $settings['minting_min_value'])->get();
        Log::info(array($mintings));
        if (count($mintings) > 0){
          $addresses = [];
          $amounts = [];
          $count = 0;
          foreach ($mintings as $item){
            $count = $count++;
            array_push($addresses, $item->address);
            array_push($amounts, $settings['minting_min_value']);
            if ($count >= 10) break;            
          }

          $data = [
            'api_key' => 'SWAT_API_KEY_1.0',
            'addresses'  => $addresses,
            'amounts' => $amounts
          ];
          $data_string = json_encode($data);
          //Log::info($data);
          $res = $this->CallAPI("POST", "http://localhost:3000/api/airdroping", $data_string);
          $res = json_decode($res);

          if ($res->status == 'success'){
            foreach ($mintings as $item){
              Minted::create([
                'device_id' => $item->device_id,
                'wallet_address' => $item->address,
                'minted_amount' => $settings['minting_min_value'],
                'transaction_id' => $res->res->hash
              ]);
              $item->mint_amount = $item->mint_amount - $settings['minting_min_value'];
              $item->save();
            }
          } else {
            if ($res->res->code == -1){
              Log::info('Transaction fee is not enough!');
            } else if ($res->res->code == -2){
              Log::info('Transaction failed');
            }
          }
        }
      }
    }
}
