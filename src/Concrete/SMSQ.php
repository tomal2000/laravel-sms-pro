<?php


namespace Tomal2000\LaravelSmsPro\Concrete;

use Illuminate\Support\Facades\Http;


class SMSQ extends Sms
{
    private $baseUrl = 'https://api.smsq.global/api/v2/';

    /**
     * Class Constructor.
     * @param null $message
     */
    public function __construct($message = null)
    {
        $this->username = config('laravel-sms-pro.smsq.api_key');
        $this->password = config('laravel-sms-pro.smsq.clint_id');

        if ($message) {
            $this->text($message);
        }
    }

    /**
     * @param null $text
     * @return bool
     */
    public function send($text = null): bool
    {
        if ($text) {
            $this->setText($text);
        }
        try {
            $response = Http::post($this->baseUrl.'SendSMS', [
                'ApiKey' =>  $this->username,
                'ClientId' =>  $this->password,
                'SenderId' => $this->sender ?? config('laravel-sms-pro.sender'),
                'MobileNumbers' => implode(',', $this->recipients),
                'Message' => $this->text,
            ]);
            $response  = json_decode($response->body(), true);
            $this->response = $response;
            $status = array_key_exists('ErrorCode', $response) ? $response['ErrorCode'] : $response['ErrorCode'];
            return $status == 0 ? true : false;

        } catch (\Exception $e) {
                logger()->error('SMS Exception in '.__CLASS__.': '.__METHOD__.'=>'.$e->getMessage());
                $this->httpError = $e;
                return false;
        }
    }
}
