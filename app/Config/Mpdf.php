<?php

namespace Config;

class Mpdf extends \Mpdf\Mpdf
{
    public function __construct()
    {
        parent::__construct();

        // Add your Thai font file
        $this->fontDirs = [ROOTPATH . 'fonts/'];
        $this->fontdata = [
            'notosansthai' => [
                'R' => 'NotoSansThai-Regular.ttf',
            ],
            // Add other fonts as needed
        ];
    }
}