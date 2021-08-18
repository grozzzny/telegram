<?php


namespace grozzzny\telegram\models;



class Audio extends Base
{
    /** @var string - Уникальный идентификатор файла */
    public $file_id;

    /** @var integer - Duration of the audio in seconds as defined by sender */
    public $duration;

    /** @var string|null - Performer of the audio as defined by sender or by audio tags */
    public $performer;

    /** @var string|null - Title of the audio as defined by sender or by audio tags */
    public $title;

    /** @var string|null - MIME файла, заданный отправителем */
    public $mime_type;

    /** @var integer|null - Размер файла */
    public $file_size;

    public function rules()
    {
        return [
            [[
                'file_id',
                'duration',
                'performer',
                'title',
                'mime_type',
                'file_size',
            ], 'safe']
        ];
    }
}