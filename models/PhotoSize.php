<?php


namespace grozzzny\telegram\models;


class PhotoSize extends Base
{

    /** @var string - Уникальный идентификатор файла */
    public $file_id;

    /** @var integer - Photo width */
    public $width;

    /** @var integer - Photo height */
    public $height;

    /** @var integer|null - Размер файла */
    public $file_size;

    public function rules()
    {
        return [
            [[
                'file_id',
                'width',
                'height',
                'file_size',
            ], 'safe']
        ];
    }
}