<?php

$append_autoload_directory = [get_include_path(), "./modules/autoload"];

set_include_path
  (
    implode(PATH_SEPARATOR, $append_autoload_directory)
  );

spl_autoload_register();

include('vendor/autoload.php');
$config = new yaml_config('conf.yaml');

// test
include('modules/sms/sms4b.php');

$sms = new sms4b();

$ret = $sms->raw_send("+79213243303", "hello world", "");
var_dump($ret);