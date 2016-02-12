<?php

abstract class sms
{
  protected $default_from;
  abstract public function send($to, $message, $from = null);

  protected function raw_curl($url, $get, $post = null)
  {
    $options =
    [
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 5,
      CURLOPT_HEADER => false,
    ];

    $post_options =
    [
      CURLOPT_POST => 1,
      CURLOPT_POSTFIELDS => $post,
    ];

    if (!is_null($post))
      $options += $post_options;

    $handle = curl_init();
    curl_setopt_array($handle, $options);
    $output = curl_exec($handle);
    curl_close($handle);

    return $output;
  }
}