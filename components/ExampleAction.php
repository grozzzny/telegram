<?php


namespace grozzzny\telegram\components;


use app\components\telegram\traits\PreferencesTrait;
use app\models\User;
//use app\modules\league\models\PlayerGroupRelations;
//use app\modules\league\models\PreferencePlayers;
//use app\modules\league\models\Schedule;
use Yii;

class ExampleAction extends \grozzzny\telegram\components\TelegramAction
{
    # Write to log file
    public $trace = true;

    public function bind()
    {
        parent::bind();

        # text interception
        if($this->update->message->text == 'message'){
            Yii::$app->telegram->sendMessage([
                'chat_id' => $this->update->message->chat->id,
                'text' => 'You wrote the word "message"'
            ]);
        };
    }

    # /test
    public function commandTest($param = null)
    {
        $chat_id = $this->update->message->chat->id;

        Yii::$app->telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => 'Test success!'
        ]);
    }

    # /run
    public function commandRun($param)
    {
        $chat_id = $this->update->message->chat->id;

        Yii::$app->telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => 'Hi! How can I help you?',
            'reply_markup' => self::inlineKeyBoard([[
                [
                    'text' => 'I\'m a button, click on me',
                    'callback_data' => self::encodeCallbackData('answerClick', ['123'])
                ],
            ]])
        ]);
    }

    protected function answerClick($numbers)
    {
        Yii::$app->telegram->answerCallbackQuery(['callback_query_id' => $this->update->callback_query->id]);

        $chat_id = $this->update->callback_query->message->chat->id;

        Yii::$app->telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => 'The button passed the parameters "'.$numbers.'". Subscribe to the event "your response"',
            'reply_markup' => self::forceReply(),
        ]);

        $this->callbackEvent($chat_id, 'response', [$numbers, '456']);
    }

    protected function response($numbers_1, $numbers_2)
    {
        $chat_id = $this->update->message->chat->id;

        $text = $this->update->message->text;

        Yii::$app->telegram->sendMessage([
            'chat_id' => $chat_id,
            'text' => implode(' ', ['Response:', $numbers_1, $numbers_2, $text])
        ]);
    }
}