<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Status_notes extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%status_notes}}';
    }
}
