## EasyFileReader
Reading each lines data from file (.txt, .csv, .xls, .xlsx). The library using [PHP Generator](https://www.php.net/manual/en/language.generators.overview.php) then input file will be read line by line to avoid store total file data in memory.

### *** Caution ***
Because of using Generator for iterate over input file's rows. **DO NOT BREAK** the loop while iterate over file's rows it will cause unexpected behavior.

### Usage:
    <?php

        use Kentreez\EasyFileReader\EasyFileReader;
        
        require_once 'vendor/autoload.php';
        
        $easy = EasyFileReader::Read('example.xlsx');
        
        // count all rows
        $easy->count();
        
        // iterate over rows in input file
        foreach ($easy->rows() as $rows) {
            print_r($rows);
        }

    ?>