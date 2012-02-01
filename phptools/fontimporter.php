<?php
class fontimporter
{
	function fontimporter()
	{
		$this->fonts = func_get_args();

		$this->base_url = 'http://fonts.googleapis.com/css?family=';
	}

	function __toString()
	{
		$s = '';
		foreach ($this->fonts as $font)
		{
			$s .= '<link href="';
			$s .= $this->base_url;
			$s .= str_replace(' ', '+', $font);
			$s .= '" rel="stylesheet" type="text/css" />';
			$s .= '';
		}

		return $s;
	}
}
?>
