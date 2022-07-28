<?php

namespace Kentreez\EasyFileReader;

use Kentreez\EasyFileReader\Reader\AbstractReader;
use Kentreez\EasyFileReader\Reader\CsvReader;
use Kentreez\EasyFileReader\Reader\TxtReader;
use Kentreez\EasyFileReader\Reader\XlsReader;
use Kentreez\EasyFileReader\Reader\XlsxReader;

class EasyFileReader
{
    public static function Read (string $filepath): AbstractReader
    {
        $extension = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));

        switch ($extension) {
            case 'txt':
                return new TxtReader($filepath);
            case 'csv':
                return new CsvReader($filepath);
            case 'xls':
                return new XlsReader($filepath);
            case 'xlsx':
                return new XlsxReader($filepath);
        }
    }
}