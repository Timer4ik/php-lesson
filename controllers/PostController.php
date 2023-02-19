<?php

namespace app\controllers;

use app\models\Post;
use yii\filters\ContentNegotiator;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\rest\Serializer;

class PostController extends ActiveController{

    public $modelClass = Post::class;

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
                    'application/json' => Response::FORMAT_JSON,
                    // 'application/xml' => Response::FORMAT_XML,
                ],
            ],
        ];
    }
}

?>