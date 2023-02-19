<?php

namespace app\models;

use yii\db\ActiveRecord;
use app\models\User;
use app\models\Category;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        return "post";
    }

    public function extraFields()
    {
        return [
            'user',
            'category'
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['user_id' => 'user_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['category_id' => 'category_id']);
    }

    public $id;
    public $title;

    public function rules()
    {
        return [
            ['id', 'integer'],
            ['title', 'string', 'min' => 2, 'max' => 200],
        ];
    }
}
