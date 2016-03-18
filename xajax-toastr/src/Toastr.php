<?php

class Toastr extends \Xajax\Plugin\Response
{
	protected $aOptions;

	public function __construct()
	{
		$this->aOptions = array();
	}

	public function getName()
	{
		return 'toastr';
	}

	public function generateHash()
	{
		// Use the version number as hash
		return '0.1.0';
	}

	public function setOption($name, $value)
	{
		$this->aOptions[$name] = $value;
	}

 	public function getJsInclude()
 	{
 		return '<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>';
 	}

 	public function getCssInclude()
 	{
 		return '<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">';
 	}

	public function getClientScript()
	{
		$sScript = "";
		foreach($this->aOptions as $name => $value)
		{
			if(is_string($value))
			{
				$value = "'$value'";
			}
			else if(!is_bool($value) && !is_numeric($value))
			{
				$value = print_r($value, true);
			}
			$sScript .= "toastr.options.$name = $value\n";
		}
		return $sScript;
	}

	public function info($title, $content)
	{
		$this->xResponse->script('toastr.info("' . $content . '","' . $title . '")');
	}

	public function warning($title, $content)
	{
		$this->xResponse->script('toastr.warning("' . $content . '","' . $title . '")');
	}

	public function error($title, $content)
	{
		$this->xResponse->script('toastr.error("' . $content . '","' . $title . '")');
	}
}

?>