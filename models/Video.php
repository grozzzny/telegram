<?php


namespace grozzzny\telegram\models;

class Video extends Base
{

    /** @var string - Уникальный идентификатор файла */
    public $file_id;

    /** @var integer - Ширина видео, заданная отправителем */
    public $width;

    /** @var integer - Высота видео, заданная отправителем */
    public $height;

    /** @var integer - Продолжительность видео, заданная отправителем */
    public $duration;

    /** @var PhotoSize|null - Превью видео */
    public $thumb;

    /** @var string|null - MIME файла, заданный отправителем */
    public $mime_type;

    /** @var integer|null - Размер файла */
    public $file_size;

    public function rules()
    {
        return [
            [[
                'file_id',
                'width',
                'height',
                'duration',
                //'thumb',
                'mime_type',
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