<?php


namespace grozzzny\telegram;


use yii\base\Module;

/**
 * Class TelegramModule
 * @package app\modules\telegram
 *
 * Set Webhook
 * https://api.telegram.org/bot<token>/setWebhook?url=https://site.ru/telegram/<token>
 *
 * Install
 * php composer.phar require aki/yii2-bot-telegram "*"
 *
 * Set log
 *  'log' => [
 *       'targets' => [
 *           [
 *                'class' => 'yii\log\FileTarget',
 *                'levels' => ['info'],
 *                'categories' => ['telegram'],
 *                'logFile' => '@app/runtime/logs/telegram.log'
 *           ],
 *       ],
 *  ],
 *
 * Add module
 * 'telegram' => [
 *      'class' => 'grozzzny\telegram\TelegramModule',
 *      'controllerMap' => [
 *          'default' => [
 *              'class'  => 'grozzzny\telegram\controllers\DefaultController',
 *              'classAction' => 'app\components\TelegramAction'
 *          ]
 *      ]
 * ],
 *
 * Add component
 *  'telegram' => [
 *      'class' => 'grozzzny\telegram\components\Telegram',
 *      'botToken' => '',
 *  ],
 *
 * Add route:
 * 'telegram/<token:[^\/]+>' => 'telegram/default/index',
 */
class TelegramModule extends Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'grozzzny\telegram\controllers';
}