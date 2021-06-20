<?php
namespace Sources;

class SourceFactory
{

    /**
     * @param $args
     * @return Source
     * @throws \Exception
     */
    public function make($args):Source
    {
        $source = Register::load($args['source']);
        return new $source();
    }

    /**
     * @return array|Source[];
     * @throws \Exception
     */
    public function all(): array
    {
        $arr = [];
        foreach (Register::SOURCES as $source){
            $arr[] = new $source();
        }
        return $arr;
    }

}