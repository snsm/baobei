<?php
namespace frontend\controllers;

use common\models\Customer;
use common\models\Customer_status;
use common\models\Money;
use yii;
use yii\web\Controller;

class CustomerController extends Controller{
    public $layout='home';

    function actionCustomer(){
        $customer=new Customer();
        $post=Yii::$app->request->post('dosubmit');
        if(isset($post)){
            if(Yii::$app->request->post('tel')==Yii::$app->session->get('MEMBER_User')){
                return  $this->redirect(['/redirect/redirect','public_id'=>13]);
            }else{
                $res=$customer->Where(Yii::$app->request->post('tel'));
                if(Yii::$app->request->post('tel')==$res[0]['tel']){
                    return  $this->redirect(['/redirect/redirect','public_id'=>14]);
                }else{
                    $customer->username=Yii::$app->request->post('username');
                    $customer->money=Yii::$app->request->post('money');
                    $customer->tel=Yii::$app->request->post('tel');
                    $customer->beizhu=Yii::$app->request->post('beizhu');
                    $customer->gaozhi=Yii::$app->request->post('whether');
                    $customer->tuijianren=Yii::$app->session->get('MEMBER_User');
                    $customer->date=date('Y')."年".date('m')."月".date('d')."日";
                    $customer->baobeiren=Yii::$app->session->get('Baobeiren');
                    $customer->laiyuan=Yii::$app->request->post('laiyuan');
                    $customer->save();
                    $cid=$customer->attributes['cid'];

                    $money=new Money();
                    $money->baobeiren=Yii::$app->session->get('Baobeiren');
                    $money->tuijianren=Yii::$app->session->get('MEMBER_User');
                    $money->m_date=date('Y')."-".date('m')."-".date('d');
                    $money->cid=$cid;
                    $money->save();
                    $mid=$money->attributes['m_mid'];

                    $status=new Customer_status();
                    $status->cid=$cid;
                    $status->m_mid=$mid;
                    $status->st_content="报备客户";
                    $status->st_date=date('Y')."年".date('m')."月".date('d')."日";
                    $result=$status->save();
                    if($result){
                        return  $this->redirect(['/redirect/redirect','public_id'=>15]);
                    }else{
                        return  $this->redirect(['/redirect/redirect','public_id'=>16]);
                    }
                }
            }
        }else{
            return  $this->redirect(['/home/customer']);
        }
    }

    //
}

?>