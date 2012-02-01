<?php

class hlink
{
    function hlink($target, $title, $content, $brace = False)
    {
        $this->target = $target;
        $this->title = $title;
        $this->content = $content;
        $this->brace = $brace;
    }

    function __toString()
    {
        $a = '<a href="';
        $a .= $this->target;
        $a .= '" title="';
        if($this->brace) { $a .= '[';}
        $a .= $this->title;
        if($this->brace) { $a .= ']';}
        $a .= '">';
        $a .= $this->content;
        $a .= '</a>';

        return $a; 
    }
}
?>
