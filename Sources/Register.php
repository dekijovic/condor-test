<?php
namespace Sources;

class Register
{

    const SOURCES = [
        'db1' => \Sources\DB1\DbSource::class,
        'service1' => \Sources\Service1\ServiceSource::class

    ];

    /**
     * Load Register service object.
     *
     * @param $source
     * @return string
     * @throws \Exception
     */
    public static function load($source)
    {
        if (isset(self::SOURCES[$source])){
            return self::SOURCES[$source];
        }else{
            throw new \Exception('Source '.$source. ' is not registered');
        }
    }
}