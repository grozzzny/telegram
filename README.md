# Telegram module
Telegram module for yii2

### Set Webhook
```
https://api.telegram.org/bot<token>/setWebhook?url=https://site.ru/telegram/<token>
```

### Install
Use module with aki/yii2-bot-telegram
```bash
$ php composer.phar require grozzzny/telegram "dev-main"
```

### Set log
```php
'log' => [
  'targets' => [
      [
           'class' => 'yii\log\FileTarget',
           'levels' => ['info'],
           'categories' => ['telegram'],
           'logFile' => '@app/runtime/logs/telegram.log'
      ],
  ],
],
```

### Add module
```php
'telegram' => [
     'class' => 'grozzzny\telegram\TelegramModule',
     'controllerMap' => [
         'default' => [
             'class'  => 'grozzzny\telegram\controllers\DefaultController',
             'classAction' => 'grozzzny\telegram\components\ExampleAction'
         ]
     ]
],
```
### Add component
```php
 'telegram' => [
     'class' => 'grozzzny\telegram\components\Telegram',
     'botToken' => '',
 ],
```
### Add route:
```php
'telegram/<token:[^\/]+>' => 'telegram/default/index',
```
### Use action:
```php
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
```