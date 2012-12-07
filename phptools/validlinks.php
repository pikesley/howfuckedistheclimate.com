<?php
require_once('hlink.php');
require_once('config.php');

class validlinks
{
    function validlinks()
    {
        $this->config = new config('config/config.yaml');
        $this->url = $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
        
        $this->html_vldtr = "http://validator.w3.org/check?verbose=1&amp;uri=";
        $this->css_vldtr = "http://jigsaw.w3.org/css-validator/validator?profile=css3&amp;warning=2&amp;uri=";

        $this->extra_items = Array();
    }

    function add_item($blob)
    {
        array_push($this->extra_items, $blob);
    }

    function __toString()
    {
        $s = '<div id="validlinks">';
        $s .= '|';

        if(count($this->extra_items) > 0)
        {
            foreach($this->extra_items as $i)
            {
                $s .= $i;
                $s .= '|';
            }
        }

        $t = "Valid HTML5";
        if($this->config->has_key('messages', 'html5'))
        {
            $t = $this->config->get('messages', 'html5');
        }
        $a = new hlink($this->html_vldtr . $this->url, $t, "HTML5");

        $s .= $a;
        $s .= '|';

        $t = "Valid CSS3";
        if($this->config->has_key('messages', 'css3'))
        {
            $t = $this->config->get('messages', 'css3');
        }
        $a = new hlink($this->css_vldtr . $this->url, $t, "CSS3");

        $s .= $a;
        $s .= '|';
        $s .= '</div>';

        return $s;
    }
}
?>
