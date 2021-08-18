<?php


namespace grozzzny\telegram\models;


use yii\helpers\ArrayHelper;

class CallbackQuery extends Base
{
    /** @var string - Уникальный идентификатор запроса */
    public $id;

    /** @var User - Отправитель */
    public $from;

    /** @var Message|null - Сообщение, к которому была привязана вызвавшая запрос кнопка. Обратите внимание: если сообщение слишком старое, содержание сообщения и дата отправки будут недоступны. */
    public $message;

    /** @var string|null - Идентификатор сообщения, отправленного через вашего бота во встроенном режиме */
    public $inline_message_id;

    /** @var string|null - Данные, связанные с кнопкой. Обратите внимание, что клиенты могут добавлять свои данные в это поле. */
    public $data;

    public function rules()
    {
        return [
            [[
                'id',
                //'from',
                //'message',
                'inline_message_id',
                'data',
            ], 'safe']
        ];
    }

    public function setAttributes($values, $safeOnly = true)
    {
        parent::setAttributes($values, $safeOnly);

        $this->setParam($values, 'message', Message::className());
        $this->setParam($values, 'from', User::className());
    }
}