<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/27/12
 * Time: 9:51 PM
 * To change this template use File | Settings | File Templates.
 */
class Fork extends ForkBase
{

    /**
     * @static
     * @param string $className
     * @return ForkBase
     */

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getForks()
    {
        return self::model()->with('maker')->findAll(
            array(
                'condition' => 'valid =:valid',
                'params' => array(
                    ':valid' => 1
                ),
            )
        );
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save fork:' . var_export($this->getErrors(), 1));
        }
    }

    public function getMakerAndProduct()
    {
        if ($this->maker instanceof Maker)
        {
            return $this->maker->name . ' ' . $this->name;
        }

        return $this->name;
    }

    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public function getName()
    {
        return $this->name;
    }

    public static function getByName($name)
    {
        return self::model()->find(array(
            'condition' => 'name =:name',
            'params' => array(
                ':name' => $name,
            ),
        ));
    }

    public static function saveIfNotExists($name)
    {
        $fork = self::getByName($name);
        if (!$fork instanceof Fork)
        {
            $fork = new Fork();
            $fork->name = $name;
            $fork->valid = 1;
            $fork->saveThrowEx();
        }

        return $fork;
    }

    public static function getIdByName($name)
    {
        $fork = self::saveIfNotExists($name);
        return $fork->id;
    }

}
