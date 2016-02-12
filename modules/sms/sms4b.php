<?php

require_once('abstract.php');

class sms4b extends sms
{
  private function load_credentials()
  {
    return config()->sms->sms4b->credentials;
  }

  public function raw_send($to, $message, $from = null)
  {
    $credentials = $this->load_credentials();
    $request =
    [
      $credentials->login,
      $credentials->password,
      is_null($from) ? 'info' : $from,
      $to,
      $message
    ];

    $this->raw_curl($request);
  }

  public function raw_curl($post, $get = null)
  {
    return parent::raw_curl('https://sms4b.ru/ws/sms.asmx', $get, $post);
  }
}