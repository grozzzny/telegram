<?php


namespace grozzzny\telegram\models;


class MessageEntity extends Base
{
    const TYPE_MENTION = 'mention';
    const TYPE_HASHTAG = 'hashtag';
    const TYPE_BOT_COMMAND = 'bot_command';
    const TYPE_URL = 'url';
    const TYPE_EMAIL = 'email';
    const TYPE_BOLD = 'bold';
    const TYPE_ITALIC = 'italic';
    const TYPE_CODE = 'code';
    const TYPE_PRE = 'pre';
    const TYPE_TEXT_LINK = 'text_link';

    /** @var string - One of mention (@username), hashtag, bot_command, url, email, bold (bold text), italic (italic text), code (monowidth string), pre (monowidth block), text_link (for clickable text URLs)*/
    public $type;

    /** @var integer - Offset in UTF-16 code units to the start of the entity */
    public $offset;

    /** @var integer - Length of the entity in UTF-16 code units */
    public $length;

    /** @var string|null - For “text_link” only, url that will be opened after user taps on the text */
    public $url;

    public function rules()
    {
        return [
            [[
                'type',
                'offset',
                'length',
                'url',
            ], 'safe']
        ];
    }
}