<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Scheme extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%scheme}}';
    }

    function Database(){
        $total=Scheme::find()->count();
        $page=new \Page($total, 10, "&mid=1&id=2", false);
        $sql="SELECT * FROM ".Scheme::tableName()." $page->limit";
        $model=Scheme::findBySql($sql)->asArray()->all();
        $arr=[
            'total'=>$total,
            'page'=>$page->fpage(4,6),
            'model'=>$model,
        ];
        return $arr;
    }
}
