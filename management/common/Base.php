<?php
namespace manage\common;

use \manage\index\model\Manager;

class Base extends \think\controller{
    public $data;

    public function formateData(){
        $this->data = json_decode(file_get_contents("php://input"),false);
        if($this->data == NULL){
            $this->data = [];
        }
    }

    public function check_token(){
        if($this->data && $this->data->token && $this->data->userid){
            $token = $this->data->token;
            $userid = $this->data->userid;

            $admin = Manager::get($userid);
            if($admin->token != $token){
                return 2;           //token不对
            }
            if(time() - (int)(strtotime($admin->update_time)) >= 1200){
                $admin->token = "";
                $admin->save();
                return 3;           //已超时，请重新登录
            }else{
                $admin->update_time = time();
                $admin->save();
                return 0;
            }
        }else{
            return 1;           //缺少参数
        }
    }
}