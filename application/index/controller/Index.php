<?php
namespace app\index\controller;

class Index{

    public function index(){
        // $user = new \app\index\model\User;
        // $user->title = "蓝色天堂";
        // $user->author = "毕淑敏";
        // $user->save();

        return $this->hello('lcl');
    }

    public function hello($name){
        return "Hello" . $name;
    }
}
