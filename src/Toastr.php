<?php

namespace Xajax\Toastr;

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

	public function setOptions(array $aOptions)
	{
		$this->aOptions = array_merge($this->aOptions, $aOptions);
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
		if(count($this->aOptions) == 0)
		{
			return '';
		}
		$sScript = "jQuery(document).ready(function($){\n";
		foreach($this->aOptions as $name => $value)
		{
			if(is_string($value))
			{
				$value = "'$value'";
			}
			else if(is_bool($value))
			{
				$value = ($value ? 'true' : 'false');
			}
			else if(!is_numeric($value))
			{
				$value = print_r($value, true);
			}
			$sScript .= "\ttoastr.options.$name = $value;\n";
		}
		return $sScript . "});";
	}

	public function info($content, $title = null)
	{
		if(($title))
			$script = 'toastr.info("' . $content . '","' . $title . '")';
		else
			$script = 'toastr.info("' . $content . '")';
		$this->xResponse->script($script);
	}

	public function success($content, $title = null)
	{
		if(($title))
			$script = 'toastr.success("' . $content . '","' . $title . '")';
		else
			$script = 'toastr.success("' . $content . '")';
		$this->xResponse->script($script);
	}

	public function warning($content, $title = null)
	{
		if(($title))
			$script = 'toastr.warning("' . $content . '","' . $title . '")';
		else
			$script = 'toastr.warning("' . $content . '")';
		$this->xResponse->script($script);
	}

	public function error($content, $title = null)
	{
		if(($title))
			$script = 'toastr.error("' . $content . '","' . $title . '")';
		else
			$script = 'toastr.error("' . $content . '")';
		$this->xResponse->script($script);
	}

	public function remove()
	{
		$this->xResponse->script('toastr.remove()');
	}

	public function clear()
	{
		$this->xResponse->script('toastr.clear()');
	}
}

?>