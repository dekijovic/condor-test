<?php
namespace Controllers;

use Request\SourceRequest;
use Sources\DB1\DbSource;
use Sources\SourceFactory;
use function Couchbase\defaultDecoder;

class SourceController
{
    /**
     * @return array
     * @throws \Exception
     */
    public function index()
    {
        $arr = [];
        $parameters = (new SourceRequest())->validate(['month']);
        $collection = (new SourceFactory)->all();
        foreach ($collection as $source){
            $arr[] = [$source->name() => $source->countByMonth($parameters['month'])];
        }
        return $arr;
    }

    /**
     * @param $arg
     * @return array
     * @throws \Exception
     */
    public function getBySource($arg)
    {
        $parameters = (new SourceRequest())->validate(['month']);
        $source = (new SourceFactory)->make($parameters);
        return  [$source->name() => $source->countByMonth($parameters['month'])];
    }

}