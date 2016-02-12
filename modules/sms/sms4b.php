<?php

require_once('abstract.php');

class sms4b extends sms
{
  private function load_credentials()
  {
    return conf()->sms->sms4b->credentials;
  }

  public function raw_send($to, $message, $from = null)
  {
    $credentials = $this->load_credentials();
    $request =
    [
      "Login" => $credentials->login,
      "Password" => $credentials->password,
      "Source" => is_null($from) ? 'info' : $from,
      "Phone" => $to,
      "Text" => $message
    ];

    //return $this->request('SMS4B/SendSMS', $request);
    return $this->raw_curl('SendSMS', $request);
  }

  private function request($method, $params)
  {
    $url = 'https://sms4b.ru/ws/sms.asmx';

    $soap = new SoapClient($url);
    return $soap->__soapCall("SMS4B/$method", [$params]);
  }

  public function raw_curl($method, $params)
  {
    $url = "https://sms4b.ru/ws/sms.asmx/{$method}";

    return parent::raw_curl($url, [], $params);
  }
}