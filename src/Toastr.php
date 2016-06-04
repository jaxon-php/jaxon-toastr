<?php

namespace Jaxon\Toastr;

class Toastr extends \Jaxon\Plugin\Response
{
    use \Jaxon\Utils\ContainerTrait;

    public function __construct()
    {}

    public function getName()
    {
        return 'toastr';
    }

    public function generateHash()
    {
        // Use the version number as hash
        return '0.1.0';
    }

    public function getJs()
    {
        if(!$this->includeAssets())
        {
            return '';
        }
        return '<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>';
    }

    public function getCss()
    {
        if(!$this->includeAssets())
        {
            return '';
        }
        return '<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">';
    }

    public function getScript()
    {
        $aOptions = $this->getOptionNames('toastr.options.');
        $sScript = '';
        foreach($aOptions as $name)
        {
            $value = $this->getOption($name);
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
            $sScript .= "$name = $value;\n";
        }
        return $sScript;
    }

    public function info($message, $title = null)
    {
        if(($title))
            $script = 'toastr.info("' . $message . '","' . $title . '")';
        else
            $script = 'toastr.info("' . $message . '")';
        $this->response()->script($script);
    }

    public function success($message, $title = null)
    {
        if(($title))
            $script = 'toastr.success("' . $message . '","' . $title . '")';
        else
            $script = 'toastr.success("' . $message . '")';
        $this->response()->script($script);
    }

    public function warning($message, $title = null)
    {
        if(($title))
            $script = 'toastr.warning("' . $message . '","' . $title . '")';
        else
            $script = 'toastr.warning("' . $message . '")';
        $this->response()->script($script);
    }

    public function error($message, $title = null)
    {
        if(($title))
            $script = 'toastr.error("' . $message . '","' . $title . '")';
        else
            $script = 'toastr.error("' . $message . '")';
        $this->response()->script($script);
    }

    public function remove()
    {
        $this->response()->script('toastr.remove()');
    }

    public function clear()
    {
        $this->response()->script('toastr.clear()');
    }
}

?>