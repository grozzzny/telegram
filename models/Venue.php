<?php


namespace grozzzny\telegram\models;


class Venue extends Base
{


    /** @var Location - Координаты объекта */
    public $location;

    /** @var string - Название объекта */
    public $title;

    /** @var string - Адрес объекта */
    public $address;

    /** @var string|null - Идентификатор объекта в Foursquare */
    public $foursquare_id;

    public function rules()
    {
        return [
            [[
                'location',
                'title',
                'address',
                'foursquare_id',
            ], 'safe']
        ];
    }

    public function setAttributes($values, $safeOnly = true)
    {
        parent::setAttributes($values, $safeOnly);

        $this->setParam($values, 'location', Location::className());
    }
}