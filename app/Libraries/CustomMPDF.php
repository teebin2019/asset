<?php

// app/Libraries/CustomMPDF.php
namespace App\Libraries;

use Mpdf\Mpdf;

class CustomMPDF extends Mpdf
{
    public function __construct($config = [])
    {
        $defaultConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $config = array_merge($defaultConfig, $config);

        parent::__construct($config);

        $this->fontdata = $config['fontdata'] ?? [];
        $this->fontpath = $config['fontDir'] ?? [];
    }
}
