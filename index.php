<?php require_once("phptools/fontimporter.php"); ?>
<?php require_once("phptools/hlink.php"); ?>
<?php require_once("phptools/config.php"); ?>
<?php $config = new config('config/config.yaml'); ?>
<?php
class eighthundredcode
{
  function eighthundredcode($code, $text, $config)
  {
     $this->code = $code;
     $this->text = $text;
     $this->config = $config;
  }

  function __toString()
  {
    $s = 'ERROR ';
    $s .= '<span class="number">';
    $s .= $this->code;
    $s .= ':</span> ';
    $s .= $this->text;

    $h = new hlink($this->config->get('eighthundreds', 'url'),
                   $this->config->get('eighthundreds', 'name'),
                   $s,
                   True);
    return $h->__toString();
  }
}

$db_link = mysql_connect($config->get('mysql', 'host'),
                         $config->get('mysql', 'user'),
                         $config->get('mysql', 'pass'))
                         or die("Could not connect: " . mysql_error());

mysql_select_db($config->get('mysql', 'db'), $db_link)
                or die ('Can\'t use ' . $config->get('mysql', 'db') . ': ' . mysql_error());

$query = "select code, text from " . $config->get('mysql', 'table') . ' order by rand() limit 1';
$result = mysql_fetch_row(mysql_query($query));
$code = new eighthundredcode($result[0], $result[1], $config);
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
          <h2><?php echo $code; ?></h2>
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
                   "ask.amee.com",
                   "Ask AMEE",
		   True);
      print $h;
      ?>
      </h2>
      </footer>
    </div>
  </body>
</html>
