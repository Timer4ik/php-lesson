<?php
namespace app\controllers;

use app\models\User;
use yii\rest\ActiveController;

use yii\filters\ContentNegotiator;
use yii\rest\Serializer;
use yii\web\Response;

class UserController extends ActiveController{

    public $modelClass = User::class;

    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope'=>'items'
    ];

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    // 'application/xml' => Response::FORMAT_XML,
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }
    
}

?>