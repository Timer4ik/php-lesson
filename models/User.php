<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{

    public static function tableName()
    {
        return "user";
    }

    public $email_address;

    public function fields()
    {
        $fields = parent::fields();

        return array_merge($fields, [
            "user_id",
            "fullName",
            "email",
            // Пример функции
            "getGender" => function ($model) {
                return $model->user_id % 2 == 0 ? "М" : "Ж";
            },
        ]);
    }

    public function getFullName()
    {
        return $this->last_name . ' ' . $this->first_name . ' ' . $this->middle_name;
    }

    public function extraFields()
    {
        return [
            "posts"
        ];
    }

    public function getPosts()
    {
        return $this->hasMany(Post::class, ['user_id' => 'user_id']);
    }
}
