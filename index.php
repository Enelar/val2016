<?php

$append_autoload_directory = [get_include_path(), "./modules/autoload"];

set_include_path
  (
    implode(PATH_SEPARATOR, $append_autoload_directory)
  );

spl_autoload_register();

include('vendor/autoload.php');
$config = new yaml_config('conf.yaml');

var_dump(db::Query("SELECT 1+1"));