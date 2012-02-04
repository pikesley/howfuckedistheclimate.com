<?php require_once("phptools/fontimporter.php"); ?>
<?php require_once("phptools/hlink.php"); ?>
<?php require_once("phptools/config.php"); ?>
<?php $config = new config('config/config.yaml'); ?>
<?php
class eighthundredcode
{
  function eighthundredcode($s)
  {
    $s = substr($s, 2, strlen($s));
    $a = explode(" ", $s);
    $this->number = array_shift($a);
    $this->text = implode(" ", $a);
  }

  function __toString()
  {
    $s = 'ERROR ';
    $s .= '<span class="number">';
    $s .= $this->number;
    $s .= ':</span> ';
    $s .= $this->text;

    $h = new hlink("https://github.com/AMEE/8XX-rfc",
                   "Civilisational HTTP Error Codes",
                   $s,
                   True);
    return $h->__toString();
  }
}
$codes = Array();
$handle = @fopen("https://raw.github.com/AMEE/8XX-rfc/master/README.md", "r");
if ($handle)
{
  while (($buffer = fgets($handle, 4096)) !== false)
  {
    $b = trim($buffer);
    if (substr($b, 0, 1) == '-')
    {
      if (! strpos($b, "http"))
      {
        array_push($codes, new eighthundredcode($b));
      }
    }
  }
  fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8" /> 
    <title>How fucked is <?php echo $config->get('include', 'whats_fucked'); ?>?</title>
    <?php $fi = new fontimporter('Lilita+One', 'Glegoo'); print $fi; ?>
    <link href="/css/styles.css" rel="stylesheet" type="text/css" />
    <?php include('includes/google_analytics.inc'); ?>
  </head>
  <body>
    <div id="main">
      <header>
        <hgroup>
          <h1>Pretty fucked.</h1>
          <h2><?php echo $codes[rand(0, count($codes) - 1)]; ?></h2>
        </hgroup>
      </header>
      <div id="tweet">
      <?php include('includes/tweet_button.inc'); ?>
      </div>
      <footer>
      <h2>
      Maybe this can help: 
      <?php
      $h = new hlink("http://ask.amee.com",
                   "Ask AMEE",
                   "[ask.amee.com]",
		   True);
      print $h;
      ?>
      </h2>
      </footer>
    </div>
  </body>
</html>
