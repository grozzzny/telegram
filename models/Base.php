<?php


namespace grozzzny\telegram\models;


use yii\base\Model;
use yii\helpers\ArrayHelper;

class Base extends Model
{

    public function setParam($values, $attribute, $class_name, $isArray = false)
    {
        $params = ArrayHelper::getValue($values, $attribute);

        if(empty($params)) return $this->$attribute = null;

        if($isArray) {
            $array = [];

            foreach ($params as $param){
                /** @var Model $model */
                $model = new $class_name;
                $model->setAttributes($param);
                $array[] = $model;
            }

            $this->$attribute = $array;
        } else {
            /** @var Model $model */
            $model = new $class_name;
            $model->setAttributes($params);
            $this->$attribute = $model;
        }
    }

}