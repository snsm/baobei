<?php
namespace backend\controllers;

use common\models\Scheme;
use yii;
use yii\web\Controller;

class SchemeController extends Controller{
    public $layout=false;
    function actionIndex(){
        (new PerController())->Permission();
        $data=new Scheme();
        return $this->render('index',['total'=>$data->Database()['total'],'page'=>$data->Database()['page'],'model'=>$data->Database()['model']]);
    }

    function actionUpload(){
        (new PerController())->Permission();
        $post=Yii::$app->request->post('dosubmit');
        if(isset($post)){
            $scheme=new Scheme();
            $scheme->sc_title=Yii::$app->request->post('sc_title');
            $scheme->sc_renqun=Yii::$app->request->post('sc_renqun');
            $scheme->sc_tedian=Yii::$app->request->post('sc_tedian');
            $scheme->sc_content=Yii::$app->request->post('sc_content');
            $result=$scheme->save();
            if($result){
                return  $this->redirect(['/redirect/redirect','user_id'=>12]);
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>11]);
            }
        }else{
            return $this->render('upload');
        }
    }

    function actionUpdate(){
        (new PerController())->Permission();
        $post=Yii::$app->request->post('dosubmit');
        if(isset($post)){
            //print_r(Yii::$app->request->post());exit();
            $id=Yii::$app->request->post('sc_id');
            $title=Yii::$app->request->post('sc_title');
            $renqun=Yii::$app->request->post('sc_renqun');
            $tedian=Yii::$app->request->post('sc_tedian');
            $content=Yii::$app->request->post('sc_content');
            $time=Yii::$app->request->post('sc_time');
            $result = Scheme::updateAll(['sc_title'=>$title,'sc_renqun'=>$renqun,'sc_tedian'=>$tedian,'sc_content'=>$content,'sc_time'=>$time],['sc_id'=>$id]);
            if($result){
                return  $this->redirect(['/redirect/redirect','user_id'=>12]);
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>11]);
            }
        }else{
            $model=Scheme::find()->where(['sc_id'=>Yii::$app->request->get('sc_id')])->asArray()->all();
            return $this->render('update',['model'=>$model]);
        }
    }

    function actionDel(){
        (new PerController())->Permission();
        $id=Yii::$app->request->get('sc_id');
        $res = Scheme::find()->where(['sc_id'=>$id])->one();
        $result=$res->delete();
        if($result){
            return  $this->redirect(['/redirect/redirect','user_id'=>12]);
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>11]);
        }
    }

}
?>