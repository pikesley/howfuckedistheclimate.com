<?php require_once('phptools/config.php'); ?>
<?php $config = new config('config/config.yaml'); ?>
<?php $ac = $config->get('accounts', 'addthis'); ?>
<?php $am = $config->get('messages', 'addthis'); ?>
<?php
$addthis = '<!-- AddThis Button BEGIN -->';
$addthis .= '<a href="http://www.addthis.com/bookmark.php?v=250&amp;username=' . $c . '" class="addthis_button" title="' . $am . '">Share</a>';
$addthis .= '<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>';
$addthis .= '<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=' . $ac . '"></script>';
$addthis .= '<!-- AddThis Button END -->';


