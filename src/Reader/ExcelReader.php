<?php

namespace Kentreez\EasyFileReader\Reader;

use Generator;
use Kentreez\EasyFileReader\Exceptions\ReaderException;
use PhpOffice\PhpSpreadsheet\Exception as ExcelSpreadsheetException;
use PhpOffice\PhpSpreadsheet\Reader\Exception as ExcelReaderException;

abstract class ExcelReader extends AbstractReader
{
    abstract protected function getReaderClass(): string;

    /**
     * Default look up highest column on every rows
     *
     * @var int|null
     */
    private static ?int $lookupHighestColumnAtRow = null;

    /**
     * Specify row number that will look up for highest column
     * Set to null will look up highest column on every rows
     *
     * @param int|null $row
     * @return void
     */
    public static function SetLookupHighestColumnAtRow (?int $row)
    {
        self::$lookupHighestColumnAtRow = $row;
    }

    function rows (): Generator
    {
        try {
            $reader = new ($this->getReaderClass());
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($this->filepath);
            $sheet = $spreadsheet->getSheet(0);

            if (!is_null(self::$lookupHighestColumnAtRow)) {
                $maxColumn = $sheet->getHighestColumn(self::$lookupHighestColumnAtRow);
            }

            for ($row = 1, $num_rows = $sheet->getHighestDataRow(); $row <= $num_rows; $row++) {

                if (is_null(self::$lookupHighestColumnAtRow)) {
                    $maxColumn = $sheet->getHighestColumn($row);
                }

                $record = [];
                for ($col = 'A'; $col <= $maxColumn; $col++) {
                    $record[] = $sheet->getCell("{$col}{$row}")->getValue();
                }
                yield $record;
            }
        } catch (ExcelReaderException|ExcelSpreadsheetException $e) {
            throw new ReaderException($e->getMessage(), $e->getCode(), $e);
        }
    }
}