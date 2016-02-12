<?php

abstract class sms
{
  protected $default_from;
  abstract public function raw_send($to, $message, $from = null);

  protected function raw_curl($url, $get = [], $post = null, $headers = [])
  {
    if (count($get))
      $url .= '?'.http_build_query($get);

    $options =
    [
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 5,
      CURLOPT_VERBOSE => TRUE,
    ];

    $post_options =
    [
      CURLOPT_POST => 1,
      CURLOPT_POSTFIELDS => $post,
    ];

    $headers_option =
    [
      CURLOPT_HTTPHEADER => $headers,
    ];

    if (!is_null($post))
      $options += $post_options;
    if (count($headers))
      $options += $headers_option;

    var_dump($options);
    //die();

    $handle = curl_init();
    curl_setopt_array($handle, $options);
    $output = curl_exec($handle);
    curl_close($handle);

    return $output;
  }
}