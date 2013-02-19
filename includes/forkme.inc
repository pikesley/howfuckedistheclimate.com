<?php require_once('phptools/config.php'); ?>
<?php require_once('phptools/is_christmas.php'); ?>
<?php $config = new config('config/config.yaml'); ?>
<?php $gh = $config->get('github', 'repo'); ?>
<?php
$ribbon_colour = "gray_6d6d6d";
if (is_christmas())
{
    $ribbon_colour = "green_007200";
}
?>
<a href="https://github.com/<?php print $gh ?>"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_<?php echo $ribbon_colour; ?>.png" alt="Fork me on GitHub"></a>
