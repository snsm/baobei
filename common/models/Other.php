<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Other extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%other}}';
    }

    function Database(){
        $total=Other::find()->count();
        $page=new \Page($total, 10, "&mid=1&id=2", false);
        $sql="SELECT * FROM ".Other::tableName()." $page->limit";
        $model=Other::findBySql($sql)->asArray()->all();
        $arr=[
            'total'=>$total,
            'page'=>$page->fpage(4,6),
            'model'=>$model,
        ];
        return $arr;
    }
}
