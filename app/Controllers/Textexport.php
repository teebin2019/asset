<?php

namespace App\Controllers;

require_once APPPATH . 'Libraries\spout-3.3.0\src\Spout\Autoloader\autoload.php';

use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;

use App\Controllers\BaseController;


class Textexport extends BaseController
{
    public function index()
    {
        $writer = WriterEntityFactory::createXLSXWriter();
        $fileName = '1.xlsx';
        $writer->openToBrowser($fileName);

        /** Create a style with the StyleBuilder */
        $style = (new StyleBuilder())
            ->setFontBold()
            ->setFontSize(15)
            ->setFontColor(Color::BLUE)
            ->setShouldWrapText()
            ->setCellAlignment(CellAlignment::RIGHT)
            ->setBackgroundColor(Color::YELLOW)
            ->build();

        /** Create a row with cells and apply the style to all cells */
        $row = WriterEntityFactory::createRowFromArray(['Carl', 'is', 'great'], $style);

        /** Add the row to the writer */
        $writer->addRow($row);
        $writer->close();
    }
}
