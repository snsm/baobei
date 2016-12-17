<?php
namespace backend\controllers;
use yii;
use common\models\Member;
use yii\web\Controller;

class MemberController extends Controller{
    public $layout=false;

    function Select(){
        (new PerController())->Permission();
        $data=Member::find()->asArray()->all();
        return $data;
    }

    function Where($mid){
        (new PerController())->Permission();
        $data=Member::find()->where(['mid'=>$mid])->asArray()->all();
        return $data;
    }

    function actionMember_list(){
        (new PerController())->Permission();
        $result=new Member();
        return $this->render('member_list',['model'=>$result->Database()['model'],'total'=>$result->Database()['total'],'page'=>$result->Database()['page']]);
    }

    function actionMember_update(){
        (new PerController())->Permission();
        $resquest= Yii::$app->request;
        $dosubmit=$resquest->post('dosubmit');
        if(isset($dosubmit)){
            $res=$this->Where($resquest->post('mid'));
            if(md5($resquest->post('ypassword'))==$res[0]['password']){
                $data=Member::findOne($resquest->post('mid'));
                $data->password=md5($resquest->post('xpassword'));
                $res=$data->save();
                if($res){
                    return  $this->redirect(['/redirect/redirect','user_id'=>8]);
                }else{
                    return  $this->redirect(['/redirect/redirect','user_id'=>4]);
                }
            }else{
                return  $this->redirect(['/redirect/redirect','user_id'=>6]);
            }
        }else{
            return $this->render('member_update',['model'=>$this->Where(Yii::$app->request->get('mid'))]);
        }
    }

    function actionMember_upfeipen(){
        (new PerController())->Permission();
        $id= Yii::$app->request->post('feipen_id');
        $article= Member::findOne($id);
        $article->feipen_id=Yii::$app->request->post('feipen_id');
        $res=$article->save();
        if($res){
            return  $this->redirect(['/redirect/redirect','user_id'=>12]);
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>11]);
        }
    }

    function actionMember_ycfeipen(){
        (new PerController())->Permission();
        $id= Yii::$app->request->post('feipen_id');
        $article= Member::findOne($id);
        $article->feipen_id='0';
        $res=$article->save();
        if($res){
            return  $this->redirect(['/redirect/redirect','user_id'=>12]);
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>11]);
        }
    }

    function actionMember_del(){
        (new PerController())->Permission();
        $model=Member::findOne(Yii::$app->request->get('mid'));
        $res=$model->delete();
        if($res){
            return  $this->redirect(['/redirect/redirect','user_id'=>9]);
        }else{
            return  $this->redirect(['/redirect/redirect','user_id'=>10]);
        }
    }
}
?>