<?php

namespace Kentreez\EasyFileReader\Reader;

use Generator;

class CsvReader extends AbstractReader
{
    function rows (): Generator
    {
        $fp = fopen($this->filepath, 'r');
        while ($row = fgetcsv($fp)) {
            yield $row;
        }
        fclose($fp);
    }
}