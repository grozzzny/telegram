<?php


namespace grozzzny\telegram\models;


class ChosenInlineResult extends Base
{

    /** @var string - The unique identifier for the result that was chosen */
    public $result_id;

    /** @var User - The user that chose the result */
    public $from;

    /** @var Location - Sender location, only for bots that require user location */
    public $location;

    /** @var string - Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be also received in callback queries and can be used to edit the message. */
    public $inline_message_id;

    /** @var string - The query that was used to obtain the result */
    public $query;

    public function rules()
    {
        return [
            [[
                'result_id',
                //'from',
                //'location',
                'inline_message_id',
                'query',
            ], 'safe']
        ];
    }

    public function setAttributes($values, $safeOnly = true)
    {
        parent::setAttributes($values, $safeOnly);

        $this->setParam($values, 'from', User::className());
        $this->setParam($values, 'location', Location::className());
    }
}