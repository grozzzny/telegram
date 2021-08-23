<?php


namespace grozzzny\telegram\components;


use Yii;

class Telegram extends \aki\telegram\Telegram
{
    # Write to log file
    public $trace = false;

    public function send($method, $params = null)
    {
        $body = parent::send($method, $params);
        $this->saveTrace([
            'response' => [
                'method' => $method,
                'params' => $params,
                'body' => $body,
            ]
        ]);
        return $body;
    }

    public function sendMessage(array $params)
    {
        try {
            return parent::sendMessage($params);
        } catch (\Exception $exception){
            $this->saveTrace($exception->getMessage());
        }
    }

    public function editMessageText(array $params = [])
    {
        try {
            return parent::editMessageText($params);
        } catch (\Exception $exception){
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendPhoto(array $params = [])
    {
        try {
            return parent::sendPhoto($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function forwardMessage(array $params = [])
    {
        try {
            return parent::forwardMessage($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendAudio(array $params = [])
    {
        try {
            return parent::sendAudio($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendDocument(array $params = [])
    {
        try {
            return parent::sendDocument($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendSticker(array $params = [])
    {
        try {
            return parent::sendSticker($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendVoice(array $params = [])
    {
        try {
            return parent::sendVoice($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendVideoNote(array $params = [])
    {
        try {
            return parent::sendVideoNote($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendVideo(array $params = [])
    {
        try {
            return parent::sendVideo($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendLocation(array $params = [])
    {
        try {
            return parent::sendLocation($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function editMessageLiveLocation(array $params = [])
    {
        try {
            return parent::editMessageLiveLocation($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function stopMessageLiveLocation(array $params = [])
    {
        try {
            return parent::stopMessageLiveLocation($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendChatAction(array $params = [])
    {
        try {
            return parent::sendChatAction($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function getUserProfilePhotos($params)
    {
        try {
            return parent::getUserProfilePhotos($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function getChat(array $params = [])
    {
        try {
            return parent::getChat($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function getChatAdministrators(array $params = [])
    {
        try {
            return parent::getChatAdministrators($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function getChatMembersCount(array $params = [])
    {
        try {
            return parent::getChatMembersCount($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function getChatMember(array $params = [])
    {
        try {
            return parent::getChatMember($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function answerCallbackQuery(array $params = [])
    {
        try {
            return parent::answerCallbackQuery($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function editMessageCaption(array $params = [])
    {
        try {
            return parent::editMessageCaption($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendGame(array $params = [])
    {
        try {
            return parent::sendGame($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function Game(array $params = [])
    {
        try {
            return parent::Game($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendAnimation(array $params = [])
    {
        try {
            return parent::sendAnimation($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function CallbackGame(array $params = [])
    {
        try {
            return parent::CallbackGame($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function getGameHighScores(array $params = [])
    {
        try {
            return parent::getGameHighScores($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function GameHighScore(array $params = [])
    {
        try {
            return parent::GameHighScore($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function answerInlineQuery(array $params = [])
    {
        try {
            return parent::answerInlineQuery($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function inlineQuery(array $params = [])
    {
        try {
            return parent::inlineQuery($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function kickChatMember(array $params = [])
    {
        try {
            return parent::kickChatMember($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function unbanChatMember(array $params = [])
    {
        try {
            return parent::unbanChatMember($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function restrictChatMember(array $params = [])
    {
        try {
            return parent::restrictChatMember($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function promoteChatMember(array $params = [])
    {
        try {
            return parent::promoteChatMember($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function exportChatInviteLink(array $params = [])
    {
        try {
            return parent::exportChatInviteLink($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function deleteMessage(array $params = [])
    {
        try {
            return parent::deleteMessage($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function deleteChatPhoto(array $params = [])
    {
        try {
            return parent::deleteChatPhoto($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function setChatTitle(array $params = [])
    {
        try {
            return parent::setChatTitle($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function setChatDescription(array $params = [])
    {
        try {
            return parent::setChatDescription($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function unpinChatMessage(array $params = [])
    {
        try {
            return parent::unpinChatMessage($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function pinChatMessage(array $params = [])
    {
        try {
            return parent::pinChatMessage($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function leaveChat(array $params = [])
    {
        try {
            return parent::leaveChat($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function setChatStickerSet(array $params = [])
    {
        try {
            return parent::setChatStickerSet($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function deleteChatStickerSet(array $params = [])
    {
        try {
            return parent::deleteChatStickerSet($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function sendMediaGroup($params)
    {
        try {
            return parent::sendMediaGroup($params);
        } catch (\Exception $exception) {
            $this->saveTrace($exception->getMessage());
        }
    }

    public function saveTrace($data)
    {
        if($this->trace) Yii::info($data, 'telegram');
    }
}