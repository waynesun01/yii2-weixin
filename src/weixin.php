<?php 
namespace waynesun01\weixin;
use yii\base\Components;
use yii\httpClient\Client;
class Weixin extends Component
{
    private $httpClient;
    private $conf;

    public function init(){
        parent::init();
        $this->httpClient=new Client();
        $this->conf=[
            'appid'=>'111'
        ];
    }

    protected function get($url,$params=[],$header=[],$options=[]){
        return $this->httpClient->get($url,$params,$header,$options);
    }
    protected function post($url,$params=[],$header=[],$options=[]){
        return $this->httpClient->post($url,$params,$header,$options);
    }
}
