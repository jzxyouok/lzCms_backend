<?php
namespace manage\index\controller;

use \manage\common\Base;
use \manage\index\model\Manager;

class Index extends Base{

    public function _initialize(){
        $this->formateData();
    }

    public function index(){
        $token = $this->check_token();
        if($token == 0){
            return "111";
        }else{
            //1-缺少参数，2-token错误，3-已超时，需重新登录
            return $token;
        }
    }

    public function login(){
        $data = $this->data;

        if(!($data && $data->name && $data->password)){
            return [
                "status" => 6,
                "data" => [],
                "msg" => "参数不足"
            ];
        }

        $admin = Manager::get(['name' => $data->name]);

        if(!$admin){
            //用户名错误
            return [
                "status" => 9,
                "data" => [],
                "msg" => "用户名错误"
            ];
        }
        if($admin->password == $data->password){
            $admin->token = md5($admin->id . time());
            $admin->update_time = time();
            $admin->save();
            //登录成功
            return [
                "status" => 0,
                "data" => [
                    "id" => $admin->id,
                    "token" => $admin->token
                ],
                "msg" => ""
            ];
        }else{
            //密码错误
            return [
                "status" => 9,
                "data" => [],
                "msg" => "密码错误"
            ];
        }
    }

    public function addAdmin(){
        $data = $this->data;

        if(!($data && $data->name && $data->password)){
            return [
                "status" => 6,
                "data" => [],
                "msg" => "参数不足"
            ];
        }

        $admin = new Manager;
        $admin->create_time = time();
        $admin->name = $data->name;
        $admin->password = $data->password;
        $admin->save();
        if($admin->id){
            return [
                "status" => 0,
                "data" => []
            ];
        }else{
            return [
                "status" => 9,
                "data" => [],
                "msg" => "数据库保存失败"
            ];
        }
    }
}
