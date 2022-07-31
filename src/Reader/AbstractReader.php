<?php

namespace Kentreez\EasyFileReader\Reader;

use Generator;
use Kentreez\EasyFileReader\Exceptions\ReaderException;

abstract class AbstractReader
{
    protected string $filepath;
    protected ?int $count_rows = null;

    public function __construct (string $filepath)
    {
        $this->filepath = $filepath;
    }

    /**
     * @throws ReaderException
     * @return Generator
     */
    abstract function rows (): Generator;

    /**
     * @throws ReaderException
     */
    public function count (): int
    {
        if (is_null($this->count_rows)) {
            $this->count_rows = iterator_count($this->rows());
        }

        return $this->count_rows;
    }

    /**
     * @throws ReaderException
     */
    public function firstColumns (): Generator
    {
        foreach ($this->rows() as $row) {
            yield $row[0];
        }
    }
}