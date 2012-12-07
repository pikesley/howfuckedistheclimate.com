<?php require_once("phptools/fontimporter.php"); ?>
<?php require_once("phptools/hlink.php"); ?>
<?php require_once("phptools/config.php"); ?>
<?php require_once("phptools/validlinks.php"); ?>
<?php require_once("phptools/is_christmas.php"); ?>
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
    <?php
    $stylesheet = "styles.css";
    if (is_christmas)
    {
        $stylesheet = "christmas.css";
    }  
    ?>
    <link href="/css/<?php echo $stylesheet; ?>" rel="stylesheet" type="text/css" />
    <?php include('includes/google_analytics.inc'); ?>
  </head>
  <body>
    <?php include('includes/forkme.inc'); ?>
    <?php
    if (is_christmas)
    {
        include('includes/snow.inc');
    }
    ?>
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
      <h3>
      howfuckedistheclimate.com created by <?php
      $h = new hlink("http://www.cruft.co",
		     "Messrs. Obadiah CRUFT & Company, London, Purveyors of the fynest TECHNICAL DEBT to the Kingdom & COLONIES",
		     "cruft.co",
		     True);
      print $h;
      ?> / <?php
      $h = new hlink("http://org.orgraphone.org",
		     "Home of the Orgraphone",
		     "orgraphone.org",
		     True);
      print $h;
      ?>
      </h3>
      <?php
      $vl = new validlinks();
      print $vl;
      ?>
      </footer>
    </div>
  </body>
</html>
