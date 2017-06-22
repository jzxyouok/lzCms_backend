<?php
namespace manage\index\model;

use think\Model;

class Manager extends Model{
    protected $table = 'lz_admin';
    protected $pk = "id";

    protected $autoWriteTimestamp = false;
}