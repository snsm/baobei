<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Money extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%money}}';
    }
}
