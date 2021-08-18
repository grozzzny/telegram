<?php


namespace grozzzny\telegram\models;



class User extends Base
{
    /** @var integer - Уникальный идентификатор пользователя или бота */
    public $id;

    /** @var string - Имя бота или пользователя */
    public $first_name;

    /** @var string|null - Фамилия бота или пользователя */
    public $last_name;

    /** @var string|null - Username пользователя или бота */
    public $username;

    public function rules()
    {
        return [
            [[
                'id',
                'first_name',
                'last_name',
                'username',
            ], 'safe']
        ];
    }
}