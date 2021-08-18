<?php


namespace grozzzny\telegram\models;


class Voice extends Base
{
    /** @var string - Уникальный идентификатор файла */
    public $file_id;

    /** @var integer - Продолжительность аудиофайла, заданная отправителем */
    public $duration;

    /** @var string|null - MIME-тип файла, заданный отправителем */
    public $mime_type;

    /** @var integer|null - Размер файла */
    public $file_size;

    public function rules()
    {
        return [
            [[
                'file_id',
                'duration',
                'mime_type',
                'file_size',
            ], 'safe']
        ];
    }
}