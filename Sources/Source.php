<?php
 namespace Sources;

interface Source
{

    /**
     * @return array
     */
    public function data(): array;

    /**
     * @return string
     */
    public function name(): string;

    /**
     * @param $month
     * @return int
     */
    public function countByMonth( int $month): int;
}