<?php


namespace grozzzny\telegram\models;

use yii\helpers\ArrayHelper;

class Update extends Base
{
    /** @var integer */
    public $update_id;

    /** @var Message */
    public $message;

    /** @var InlineQuery */
    public $inline_query;

    /** @var ChosenInlineResult */
    public $chosen_inline_result;

    /** @var CallbackQuery */
    public $callback_query;

    public function rules()
    {
        return [
            [[
                'update_id',
//                'message',
//                'inline_query',
//                'chosen_inline_result',
//                'callback_query',
            ], 'safe']
        ];
    }

    public function setAttributes($values, $safeOnly = true)
    {
        parent::setAttributes($values, $safeOnly);

        $this->setParam($values, 'message', Message::className());
        $this->setParam($values, 'inline_query', InlineQuery::className());
        $this->setParam($values, 'chosen_inline_result', ChosenInlineResult::className());
        $this->setParam($values, 'callback_query', CallbackQuery::className());
    }
}