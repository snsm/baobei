<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Customer_status extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%customer_status}}';
    }
}
