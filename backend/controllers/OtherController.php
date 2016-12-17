<?php
namespace backend\controllers;

use common\models\Other;
use yii;
use yii\web\Controller;

class OtherController extends Controller{
    public $layout=false;
    function actionIndex(){
        (new PerController())->Permission();
        $other=new Other();
        return $this->render('index',['total'=>$other->Database()['total'],'page'=>$other->Database()['page'],'model'=>$other->Database()['model']]);
    }

    function actionIssue(){
        (new PerController())->Permission();
        $post=Yii::$app->request->post('dosubmit');
        if(isset($post)){
            //print_r(Yii::$app->request->post());
            $other=new Other();
            $other->other_title=Yii::$app->request->post('other_title');
            $other->other_content=Yii::$app->request->post('other_content');
            $res=$other->save();
            if($res){
                return  $this->redirect(['/redirect/redirect','user_id'=>12]);
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>11]);
            }
        }else{
            return $this->render('issue');
        }
    }

    function actionUpdate(){
        (new PerController())->Permission();
        $post=Yii::$app->request->post('dosubmit');
        if(isset($post)){
            $id=Yii::$app->request->post('other_id');
            $title=Yii::$app->request->post('other_title');
            $content=Yii::$app->request->post('other_content');
            $time=Yii::$app->request->post('other_time');
            $result = Other::updateAll(['other_title'=>$title,'other_content'=>$content,'other_time'=>$time],['other_id'=>$id]);
            if($result){
                return  $this->redirect(['/redirect/redirect','user_id'=>12]);
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>11]);
            }
        }else{
            $model=Other::find()->where(['other_id'=>Yii::$app->request->get('other_id')])->asArray()->all();
            return $this->render('update',['model'=>$model]);
        }
    }

    function actionDel(){
        (new PerController())->Permission();
        $id=Yii::$app->request->get('other_id');
        $res = Other::find()->where(['other_id'=>$id])->one();
        $result=$res->delete();
        if($result){
            return  $this->redirect(['/redirect/redirect','user_id'=>12]);
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>11]);
        }
    }

}
?>