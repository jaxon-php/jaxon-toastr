<?php

namespace Xajax\Toastr;

class Toastr extends \Xajax\Plugin\Response
{
    use \Xajax\Utils\ContainerTrait;

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

    public function info($content, $title = null)
    {
        if(($title))
            $script = 'toastr.info("' . $content . '","' . $title . '")';
        else
            $script = 'toastr.info("' . $content . '")';
        $this->response()->script($script);
    }

    public function success($content, $title = null)
    {
        if(($title))
            $script = 'toastr.success("' . $content . '","' . $title . '")';
        else
            $script = 'toastr.success("' . $content . '")';
        $this->response()->script($script);
    }

    public function warning($content, $title = null)
    {
        if(($title))
            $script = 'toastr.warning("' . $content . '","' . $title . '")';
        else
            $script = 'toastr.warning("' . $content . '")';
        $this->response()->script($script);
    }

    public function error($content, $title = null)
    {
        if(($title))
            $script = 'toastr.error("' . $content . '","' . $title . '")';
        else
            $script = 'toastr.error("' . $content . '")';
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