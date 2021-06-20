<?php
namespace Request;

class SourceRequest
{
    /**
     * @return array
     * @throws \Exception
     */
    public function validate($arr)
    {
        $parameters = $_GET;
        $errors = [];
        if(is_array($arr)){
            foreach ($arr as $item) {
                if(!isset($parameters[$item])) {
                    $errors[] = 'argument \'' . $item . '\' required';
                }
            }
        }

        if(is_string($arr)){
            if(!isset($parameters[$arr])) {
                $errors[] = 'argument \'' . $arr . '\' required';
            }
        }

        if(!empty($errors)){
            throw new \Exception(implode(', ', $errors));
        }
        return $parameters;
    }

}