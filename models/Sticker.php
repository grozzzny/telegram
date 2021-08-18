<?php


namespace grozzzny\telegram\models;


class Sticker extends Base
{
    /** @var string - Уникальный идентификатор файла */
    public $file_id;

    /** @var integer - Ширина стикера */
    public $width;

    /** @var integer - Высота стикера */
    public $height;

    /** @var PhotoSize|null - Превью стикера в формате .webp или .jpg */
    public $thumb;

    /** @var integer|null - Размер файла */
    public $file_size;

    public function rules()
    {
        return [
            [[
                'file_id',
                'width',
                'height',
                //'thumb',
                'file_size',
            ], 'safe']
        ];
    }

    public function setAttributes($values, $safeOnly = true)
    {
        parent::setAttributes($values, $safeOnly);

        $this->setParam($values, 'thumb', PhotoSize::className());
    }
}