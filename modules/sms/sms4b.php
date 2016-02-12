<?php

require_once('abstract.php');
require_once('sms4b/CSms4bBase.php');


class sms4b extends sms
{
  private $SMS4B;

  public function __construct()
  {
    $credentials = $this->load_credentials();
    $this->SMS4B = new Csms4bBase($credentials->login, $credentials->password);
  }

  private function load_credentials()
  {
    return conf()->sms->sms4b->credentials;
  }

  public function raw_send($to, $message, $from = null)
  {
    $credentials = $this->load_credentials();

    return $this->SMS4B->SendSMS($message, $to, $from);
  }
}