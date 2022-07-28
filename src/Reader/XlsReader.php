<?php

namespace Kentreez\EasyFileReader\Reader;

use Generator;
use Kentreez\EasyFileReader\Exceptions\ReaderException;
use PhpOffice\PhpSpreadsheet\Exception as ExcelSpreadsheetException;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ExcelReaderException;
use PhpOffice\PhpSpreadsheet\Reader\Xls;

class XlsReader extends ExcelReader
{
    protected function getReaderClass (): string
    {
        return Xls::class;
    }
}