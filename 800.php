<?php
$handle = @fopen("https://raw.github.com/AMEE/8XX-rfc/master/README.md", "r");
if ($handle) {
	while (($buffer = fgets($handle, 4096)) !== false) {
		$b = trim($buffer);
		if (substr($b, 0, 1) == '-')
		{
		echo $b;
		echo "<br />";
		}
	}
	if (!feof($handle)) {
		echo "Error: unexpected fgets() fail\n";
	}
	fclose($handle);
}
?>
