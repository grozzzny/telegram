<?php


namespace grozzzny\telegram\models;


class Chat extends Base
{

    const TYPE_PRIVATE = 'private';
    const TYPE_GROUP = 'group';
    const TYPE_SUPERGROUP = 'supergroup';
    const TYPE_CHANNEL = 'channel';

    /** @var integer - Уникальный идентификатор чата. Абсолютное значение не превышает 1e13 */
    public $id;

    /** @var string - Тип чата: “private”, “group”, “supergroup” или “channel” */
    public $type;

    /** @var string|null - Название, для каналов или групп */
    public $title;

    /** @var string|null - Username, для чатов и некоторых каналов */
    public $username;

    /** @var string|null - Имя собеседника в чате */
    public $first_name;

    /** @var string|null - Фамилия собеседника в чате */
    public $last_name;

    /** @var boolean|null - True, если все участники чата являются администраторами */
    public $all_members_are_administrators;

    public function rules()
    {
        return [
            [[
                'id',
                'type',
                'title',
                'username',
                'first_name',
                'last_name',
                'all_members_are_administrators',
            ], 'safe']
        ];
    }
}