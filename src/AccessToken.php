<?php
namespace waynesun01\weixin;
use Yii;

class AccessToken extends Weixin{
    const API_TOKEN='https://api.weixin.qq.com/cgi-bin/token';


    public function accessToken($refresh=false){
        $key="wx-accesstoken-{$this->conf['app_id']}";
        if($refresh){
            Yii::$app->cache->delete($key);
        }
        $accessToken=Yii::$app->cache->get($key);
        if(!$accessToken){
            $getData=$this->getAccessToken();
            $accessToken=$getData['access_token'];
            Yii::$app->cache->set($key,$accessToken,($getData['express_in']-60));
        }
        return $accessToken;

    }

    private function getAccessToken(){
        $params=[
            'grant_type'=>'client_credential',
            'appid'=>'',
            'secret'=>''
        ];
        $respoense=$this->get(self::API_TOKEN,$params)->send();
        if($respoense->isOk){
            
        }else{
            
        }
    }
}