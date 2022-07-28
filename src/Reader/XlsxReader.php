<?php

namespace Kentreez\EasyFileReader\Reader;

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class XlsxReader extends ExcelReader
{
    protected function getReaderClass (): string
    {
        return Xlsx::class;
    }
}