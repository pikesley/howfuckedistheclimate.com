<?php
function title_case($word)
{
    $i = strtoupper(substr($word, 0, 1));
    $r = strtolower(substr($word, 1));
    return $i . $r;
}

?>
