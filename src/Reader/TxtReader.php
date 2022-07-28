<?php

namespace Kentreez\EasyFileReader\Reader;

use Generator;

class TxtReader extends AbstractReader
{
    function rows (): Generator
    {
        $fp = fopen($this->filepath, 'r');
        while ($line = fgets($fp)) {
            yield [$line];
        }
        fclose($fp);
    }
}