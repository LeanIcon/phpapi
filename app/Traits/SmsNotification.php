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
     private static $N_USERNAME = 'leanicontech';
     private static $N_PASS = 'Litt@2019';
     private static $SENDER_ID = 'NNURO';

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


    public function SendSMSNotify($to, $msg)
    {
        $response = Http::post("http://api.nalosolutions.com/bulksms/?username=leanicontech&password=Litt@2019&type=0&dlr=1&destination=233555223103&source=NNURO&message=$msg");
        // $response = Http::withHeaders([
        // ])->post('http://api.nalosolutions.com/bulksms/?username=leanicontech&password=Litt@2019&type=0&dlr=1&destination='.$to.'&source=NNURO&message='.$msg.'', [
        // ]);

        return json_decode($response, true);
    }
}

?>