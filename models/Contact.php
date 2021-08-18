<?php


namespace grozzzny\telegram\models;


class Contact extends Base
{

    /** @var string - Номер телефона */
    public $phone_number;

    /** @var string - Имя */
    public $first_name;

    /** @var string|null - Фамилия */
    public $last_name;

    /** @var integer|null - Идентификатор пользователя в Telegram */
    public $user_id;

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