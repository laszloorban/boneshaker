<?php
/**
 * Created by PhpStorm.
 * User: delegatu
 * Date: 3/2/14
 * Time: 3:57 PM
 */

class Cart extends CartBase{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowException()
    {
        if (!$this->save())
        {
            throw new Exception('Imposibil de salvat: ' . var_export($this->getErrors(), 1));
        }
    }

} 