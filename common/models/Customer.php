<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;


class Customer extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%customer}}';
    }

    function Select(){
        $data=Customer::find()->asArray()->all();
        return $data;
    }

    function Where($tel){
        $data=Customer::find()->where(['tel'=>$tel])->asArray()->all();
        return $data;
    }

    function Database(){
        $total=Customer::find()->count();
        $page=new \Page($total, 30, "&mid=1&id=2", false);
        if(Yii::$app->session->get('MM_Username')=='admin'){
            $sql="SELECT * FROM ".Customer::tableName()." $page->limit";
        }elseif(Yii::$app->session->get('Member_name')==Yii::$app->session->get('Member_name')){
            $sql="SELECT * FROM ".Customer::tableName()." WHERE fenpei=".Yii::$app->session->get('Member_name')." OR tuijianren=".Yii::$app->session->get('Member_name')." $page->limit";
        }else{
            $sql="SELECT * FROM ".Customer::tableName()." WHERE tuijianren=".Yii::$app->session->get('Member_name')." $page->limit";
        }
        $model=Customer::findBySql($sql)->asArray()->all();
        $arr=[
            'total'=>$total,
            'page'=>$page->fpage(4,5,6),
            'model'=>$model,
        ];
        return $arr;
    }

    function DataWhere(){
        $total=Customer::find()->count();
        $page=new \Page($total, 30, "&mid=1&id=2", false);
        $sql="SELECT * FROM ".Customer::tableName()." WHERE tuijianren=".Yii::$app->session->get('MEMBER_User')."  $page->limit";
        $model=Customer::findBySql($sql)->asArray()->all();
        $arr=[
            'total'=>$total,
            'page'=>$page->fpage(4,6),
            'model'=>$model,
        ];
        return $arr;
    }
}
