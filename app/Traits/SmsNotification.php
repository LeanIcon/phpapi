<?php 

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

trait SmsNotification {
    /**
     * @param mixed $array
     *
     * @return void
     */

     private static $API_KEY = 'V1XLCNcvVpnRqbWqb1v0CgpEt';

    public function performRequest($method, $to, $text, $formParams=[], $headers=[])
    {
        $requestUrl = "https://api.infobip.com/sms/1/text/query?username=garnerapp&password=mollar123&to='.$to&text=$text";

        $client = new Client();
        // $headers = ['Content-Type' => 'application/json;charset=UTF-8'];
        $headers = ['Content-Type' => 'application/json'];
        $response = $client->request($method, $requestUrl, ['form_param' => $formParams, 'headers' => $headers]);

        return $response->getBody()->getContents();

    }


    public function SendSMSNotification($method, $to, $msg, $sender_id)
    {
        $response = Http::withHeaders([
        ])->$method('https://apps.mnotify.net/smsapi?key='.$this::$API_KEY.'&to='.$to.'&msg='.$msg.'&sender_id='.$sender_id.'', [
        ]);

        return json_decode($response, true);
    }
}




?>