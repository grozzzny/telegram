<?php


namespace grozzzny\telegram\controllers;


use grozzzny\telegram\components\TelegramAction;
use Yii;
use yii\filters\ContentNegotiator;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class DefaultController extends Controller
{
    public $enableCsrfValidation = false;
    public $classAction = 'grozzzny\telegram\components\TelegramAction';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'index' => ['POST'],
                ],
            ],
            'format' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
                'only' => [
                    'index',
                ]
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'index' => $this->classAction
        ];
    }
}