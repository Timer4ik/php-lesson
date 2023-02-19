<?php

namespace app\controllers;

use app\models\Category;
use yii\rest\ActiveController;

use yii\filters\ContentNegotiator;
use yii\web\Response;

class CategoryController extends ActiveController { 

    public $modelClass = Category::class;

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