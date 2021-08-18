<?php


namespace grozzzny\telegram\models;

class Location extends Base
{
    /** @var float - Долгота, заданная отправителем */
    public $longitude;

    /** @var float - Широта, заданная отправителем*/
    public $latitude;

    public function rules()
    {
        return [
            [[
                'longitude',
                'latitude',
            ], 'safe']
        ];
    }
}