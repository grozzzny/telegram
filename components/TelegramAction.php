<?php


namespace grozzzny\telegram\components;


use grozzzny\telegram\models\MessageEntity;
use grozzzny\telegram\models\Update;
use Yii;
use yii\base\Action;
use yii\caching\Cache;
use yii\web\NotFoundHttpException;

/**
 * Class TelegramAction
 * @package grozzzny\telegram\components
 *
 * @property-read Cache $cache
 */
class TelegramAction extends Action
{
    public $data;

    public $duration_answer = 86400;
    public $name_cache_component = 'cache';
    public $trace = false;

    /** @var Update */
    public $update;

    private $_detect = true;

    public function commandStart($param = null)
    {
        try {
            $response = Yii::$app->telegram->sendMessage([
                'chat_id' => $this->update->message->chat->id,
                'text' => strtr('Hello! {name}!', ['{name}' => $this->update->message->from->first_name]),
            ]);

            $this->saveTrace($response->getResult());
        } catch (\Exception $exception){
            $this->saveTrace($exception->getMessage());
        }
    }

    public function run($token)
    {
        if($token != Yii::$app->telegram->botToken) throw new NotFoundHttpException();

        $this->bind();
    }

    public function beforeRun()
    {
        $this->traceWebhook();

        $this->inicialData();

        return parent::beforeRun(); // TODO: Change the autogenerated stub
    }

    public function detectBotCommand()
    {
        if (empty($this->update->message)) return false;

        if(empty($this->update->message->entities)) return false;

        foreach ($this->update->message->entities as $entity){

            if($entity->type == MessageEntity::TYPE_BOT_COMMAND) {
                $command = explode(' ', $this->update->message->text);
                $action = ucfirst(substr(array_shift($command), 1));
                $action = preg_replace('/@/i', '_', $action);

                $method = 'command' . $action;

                if(method_exists($this, $method)) {
                    $this->saveTrace('Detect command ' .  $action);
                    call_user_func_array ([$this, $method], $command);
                } else {
                   $this->commandNotFound();
                }

                break;
            }
        }
    }

    public function commandNotFound()
    {
        Yii::$app->telegram->sendMessage([
            'chat_id' => $this->update->message->chat->id,
            'text' => 'Command not found',
        ]);
    }

    public function answerNotFound()
    {
        Yii::$app->telegram->sendMessage([
            'chat_id' => $this->update->callback_query->message->chat->id,
            'text' => 'Answer not found',
        ]);
    }

    public function eventNotFound()
    {
        Yii::$app->telegram->sendMessage([
            'chat_id' => $this->update->message->chat->id,
            'text' => 'Event not found',
        ]);
    }

    public function bind()
    {
        $this->detectBotCommand();
        $this->detectAnswer();
        $this->detectEvent();
    }

    public function callbackEvent($chat_id, $handler, array $data = [])
    {
        $this->saveTrace('Save event ' .  $handler);
        $this->saveSession($chat_id, $handler, $data);
        $this->_detect = false;
    }

    public function detectAnswer()
    {
        if($this->_detect == false) return;

        if(empty($this->update->callback_query)) return;

        $chat_id = $this->update->callback_query->message->chat->id;

        if(empty($chat_id)) return;

        $data = self::decodeCallbackData($this->update->callback_query->data);

        $method = array_shift($data);
        $params = array_shift($data);
        $params = empty($params) ? [] : $params;

        if(method_exists($this, $method)) {
            $this->saveTrace('Detect answer ' . $method);
            call_user_func_array ([$this, $method], $params);
        } else {
            $this->answerNotFound();
        }

        //call_user_func([$this, $values[0]], $values[1]);
    }

    public function detectEvent()
    {
        if($this->_detect == false) return;

        if(empty($this->update->message)) return;

        $chat_id = $this->update->message->chat->id;

        if(empty($chat_id)) return;

        if($this->existsSession($chat_id)){
            $values = $this->loadSession($chat_id);
            $this->deleteSession($chat_id);

            if(method_exists($this, $values[0])) {
                $this->saveTrace('Detect event ' .  $values[0]);
                call_user_func_array ([$this, $values[0]], $values[1]);
            } else {
                $this->eventNotFound();
            }
        }
    }

    public function inicialData()
    {
        $this->data = json_decode(Yii::$app->request->rawBody, true);

        $model = new Update();
        $model->setAttributes($this->data);
        $this->update = $model;
    }

    public function traceWebhook()
    {
        $this->saveTrace(Yii::$app->request->rawBody);
    }

    public function saveTrace($data)
    {
        if($this->trace) Yii::info($data, 'telegram');
    }

    protected function existsSession($chat_id)
    {
        return $this->cache->exists($chat_id);
    }

    protected function saveSession($chat_id, $handler, array $data = [])
    {
        $this->cache->set($chat_id, [$handler, $data], $this->duration_answer);
    }

    protected function loadSession($chat_id)
    {
        return $this->cache->get($chat_id);
    }

    protected function deleteSession($chat_id)
    {
        return $this->cache->delete($chat_id);
    }

    public function getCache()
    {
        return Yii::$app->get($this->name_cache_component);
    }

    public static function encodeCallbackData($handler, array $data = [])
    {
        return json_encode([$handler, $data], JSON_UNESCAPED_UNICODE);
    }

    public static function decodeCallbackData($value)
    {
        $result = json_decode($value, true);
        return empty($result) ? [] : $result;
    }

    public static function inlineKeyBoard($data)
    {
        return json_encode([
            "inline_keyboard" => $data,
        ]);
    }

    public static function forceReply()
    {
        return json_encode([
            "force_reply" => true,
        ]);
    }

    public static function replyKeyboardHide()
    {
        return json_encode([
            "hide_keyboard" => false,
        ]);
    }

    public static function keyBoard($data)
    {
        return json_encode([
            "keyboard" => $data,
            "one_time_keyboard" => false,
            "resize_keyboard" => true
        ]);
    }
}