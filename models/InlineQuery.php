<?php


namespace grozzzny\telegram\models;


class InlineQuery extends Base
{

    /** @var string - Unique identifier for this query */
    public $id;

    /** @var User - Sender */
    public $from;

    /** @var Location|null - Sender location, only for bots that request user location */
    public $location;

    /** @var string - Text of the query */
    public $query;

    /** @var string - Offset of the results to be returned, can be controlled by the bot */
    public $offset;

    public function rules()
    {
        return [
            [[
                'id',
                //'from',
                //'location',
                'query',
                'offset',
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