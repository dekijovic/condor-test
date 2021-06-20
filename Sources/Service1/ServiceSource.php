<?php
namespace Sources\Service1;

use Sources\Source;

class ServiceSource implements Source
{
    /** @var array */
    public $data;

    /**
     * ServiceSource constructor.
     */
    public function __construct()
    {
        $this->data = json_decode(file_get_contents('data.json'), true);
    }

    /**
     * @return array
     */
    public function data(): array
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return 'Google Analytic';
    }

    /**
     * @param int $month
     * @return int
     */
    public function countByMonth(int $month): int
    {
        $count = 0;

        foreach ($this->data as $row){
            if($month == (int) date("m", strtotime($row['date']))){
                $count += $row['people'];
            }
        }
        return $count;
    }

}