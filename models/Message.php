<?php


namespace grozzzny\telegram\models;


class Message extends Base
{

    /** @var integer Уникальный идентификатор сообщения */
    public $message_id;

    /** @var null|User - Отправитель. Может быть пустым в каналах. */
    public $from;

    /** @var integer - Дата отправки сообщения (Unix time) */
    public $date;

    /** @var Chat - Диалог, в котором было отправлено сообщение */
    public $chat;

    /** @var null|User - Для пересланных сообщений: отправитель оригинального сообщения */
    public $forward_from;

    /** @var null|integer - Для пересланных сообщений: дата отправки оригинального сообщения */
    public $forward_date;

    /** @var null|Message - Для ответов: оригинальное сообщение. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply. */
    public $reply_to_message;

    /** @var null|string - Для текстовых сообщений: текст сообщения, 0-4096 символов */
    public $text;

    /** @var MessageEntity[] - Для текстовых сообщений: особые сущности в тексте сообщения. */
    public $entities = [];

    /** @var null|Audio - Информация об аудиофайле */
    public $audio;

    /** @var null|Document - Информация о файле */
    public $document;

    /** @var PhotoSize[] - Доступные размеры фото */
    public $photo = [];

    /** @var null|Sticker - Информация о стикере */
    public $sticker;

    /** @var null|Video - Информация о видеозаписи */
    public $video;

    /** @var null|Voice - Информация о голосовом сообщении */
    public $voice;

    /** @var null|string - Подпись к файлу, фото или видео, 0-200 символов */
    public $caption;

    /** @var null|Contact - Информация об отправленном контакте */
    public $contact;

    /** @var null|Location - Информация о местоположении */
    public $location;

    /** @var null|Venue - Информация о месте на карте */
    public $venue;

    /** @var null|User - Информация о пользователе, добавленном в группу */
    public $new_chat_member;

    /** @var null|User - Информация о пользователе, удалённом из группы */
    public $left_chat_member;

    /** @var null|string - Название группы было изменено на это поле */
    public $new_chat_title;

    /** @var PhotoSize[] - Фото группы было изменено на это поле */
    public $new_chat_photo = [];

    /** @var null|boolean - Сервисное сообщение: фото группы было удалено */
    public $delete_chat_photo;

    /** @var null|boolean - Сервисное сообщение: группа создана */
    public $group_chat_created;

    /** @var null|boolean - Сервисное сообщение: супергруппа создана */
    public $supergroup_chat_created;

    /** @var null|boolean - Сервисное сообщение: канал создан */
    public $channel_chat_created;

    /** @var null|integer - Группа была преобразована в супергруппу с указанным идентификатором. Не превышает 1e13 */
    public $migrate_to_chat_id;

    /** @var null|integer - Cупергруппа была создана из группы с указанным идентификатором. Не превышает 1e13 */
    public $migrate_from_chat_id;

    /** @var null|Message - Указанное сообщение было прикреплено. Note that the Message object in this field will not contain further reply_to_message fields even if it is itself a reply. */
    public $pinned_message;

    public function rules()
    {
        return [
            [[
                'message_id',
                //'from',
                'date',
                //'chat',
                //'forward_from',
                'forward_date',
                //'reply_to_message',
                'text',
                //'entities ',
                //'audio',
                //'document',
                //'photo ',
                //'sticker',
                //'video',
                //'voice',
                'caption',
                //'contact',
                //'location',
                //'venue',
                //'new_chat_member',
                //'left_chat_member',
                'new_chat_title',
                //'new_chat_photo ',
                'delete_chat_photo',
                'group_chat_created',
                'supergroup_chat_created',
                'channel_chat_created',
                'migrate_to_chat_id',
                'migrate_from_chat_id',
                //'pinned_message',
            ], 'safe']
        ];
    }

    public function setAttributes($values, $safeOnly = true)
    {
        parent::setAttributes($values, $safeOnly);

        $this->setParam($values, 'from', User::className());
        $this->setParam($values, 'chat', Chat::className());
        $this->setParam($values, 'forward_from', User::className());
        $this->setParam($values, 'reply_to_message', Message::className());
        $this->setParam($values, 'entities', MessageEntity::className(), true);
        $this->setParam($values, 'audio', Audio::className());
        $this->setParam($values, 'document', Document::className());
        $this->setParam($values, 'photo', PhotoSize::className(), true);
        $this->setParam($values, 'sticker', Sticker::className());
        $this->setParam($values, 'video', Video::className());
        $this->setParam($values, 'voice', Voice::className());
        $this->setParam($values, 'contact', Contact::className());
        $this->setParam($values, 'location', Location::className());
        $this->setParam($values, 'venue', Venue::className());
        $this->setParam($values, 'new_chat_member', User::className());
        $this->setParam($values, 'left_chat_member', User::className());
        $this->setParam($values, 'new_chat_photo', PhotoSize::className(), true);
        $this->setParam($values, 'pinned_message', Message::className());
    }
}