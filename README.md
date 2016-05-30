JQuery Toastr for Xajax
=======================

This package implements javascript notification in Xajax applications using the JQuery Toastr library.
https://github.com/CodeSeven/toastr.

Features
--------

- Enrich the Xajax response with notification functions.
- Automatically insert the Js and CSS files of the Toastr library into the HTML page.

Installation
------------

Add the following line in the `composer.json` file.
```json
"require": {
    "lagdo/xajax-toastr": "dev-master"
}
```

Or run the command
```bash
composer require lagdo/xajax-toastr
```

Configuration
------------

By default the plugin loads the Js and CSS files from CDN JS.

- cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js
- cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css

This can be disabled by setting the `assets.include.toastr` option to `false`.

The options of the Toastr library can be set under the `toastr.options.` section of the Xajax configuration.
See [here](http://codeseven.github.io/toastr/demo.html) for the full list of options.

Usage
-----

This example shows how to print a notification.
```
function myFunction()
{
    $response = new \Xajax\Response\Response();

    // Process the request
    // ...

    // Print a notification with Toastr
    $response->toastr->success("You did it!!!");

    return $response;
}
```

The `toastr` attribute of Xajax response provides the same functions as the Toastr library.
```
public function info($message, $title = null);      //
public function success($message, $title = null);   //
public function warning($message, $title = null);   //
public function error($message, $title = null);     //
public function remove();                           //
public function clear();                            //
```

Contribute
----------

- Issue Tracker: github.com/lagdo/xajax-toastr/issues
- Source Code: github.com/lagdo/xajax-toastr

License
-------

The project is licensed under the BSD license.
