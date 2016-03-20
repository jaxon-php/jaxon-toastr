## xajax-toastr

This package implements javascript notifications in an Xajax application, with the Toastr JQuery plugin. https://github.com/CodeSeven/toastr

#### Installation

Run `composer require lagdo/xajax-toastr`, or add `"lagdo/xajax-toastr": : "dev-master"` in your composer.json.

Add the code to load JQuery and the Xajax javascript and CSS code in the HTML header.
```
<script src="//code.jquery.com/jquery-1.10.1.min.js"></script>
<?php
	echo $xajax->getCssInclude();
	echo $xajax->getJsInclude();
	echo $xajax->getJavascript();
?>
```

#### Usage

The plugin can be called with the `toastr` attribute in the Xajax response object.
```
function myFunction()
{
	$xResponse = new \Xajax\Response\Response();
	// Process the request
	// ...
	// Print a notification with Toastr
	$xResponse->toastr->success("");
	return $xResponse;
}
```

#### API

The plugin implements the same functions as the JQuery Toastr plugin.
```
	public function info($content, $title = null);
	public function success($content, $title = null);
	public function warning($content, $title = null);
	public function error($content, $title = null);
	public function remove();
	public function clear();
```
