<?php
include('spyc/spyc.php');

class config
{
    function config($filename = 'config/config.yaml')
    {
        $this->filename = $filename;

        $this->yaml = Spyc::YAMLLoad($this->filename);
    }

    function get($section, $key)
    {
        return $this->yaml[$section][$key];
    }

    function has_key($section, $key)
    {
        return array_key_exists($section, $this->yaml) && array_key_exists($key, $this->yaml[$section]);
    }
}
?>
