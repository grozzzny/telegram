<?php


namespace grozzzny\telegram\models;


class Document extends Base
{

    /** @var string - Unique file identifier */
    public $file_id;

    /** @var PhotoSize|null - Document thumbnail as defined by sender */
    public $thumb;

    /** @var String|null - Original filename as defined by sender */
    public $file_name;

    /** @var String|null - MIME файла, заданный отправителем */
    public $mime_type;

    /** @var String|null - Размер файла */
    public $file_size;

    public function rules()
    {
        return [
            [[
                'file_id',
                //'thumb',
                'file_name',
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