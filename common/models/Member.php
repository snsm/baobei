<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Member extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%member}}';
    }

    function Database(){
        $total=Member::find()->count();
        $page=new \Page($total, 30, "&mid=1&id=2", false);
        $sql="SELECT * FROM ".Member::tableName()." $page->limit";
        $model=Member::findBySql($sql)->asArray()->all();
        $arr=[
            'total'=>$total,
            'page'=>$page->fpage(4,5,6),
            'model'=>$model,
        ];
        return $arr;
    }
}
