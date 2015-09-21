<?php
namespace Api\Model;

use Zend\Db\Sql\Insert;
use Zend\Db\TableGateway\TableGateway;

class ReleaseOrderTable{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function add($model)
    {
        $model['createTime'] = time();
        try{
            $ret = $this->tableGateway->insert($model);
            if($ret !== false){
                return 1;
            }else{
                return -1;
            }
        }catch(\Exception $e){
            return -1;
        }
    }

    public function save($model)
    {
        try{
            $insert = $this->tableGateway->getSql()->update()->set($model)->where(['id'=>$model['id']]);
            echo $insert->getSqlString();
            $ret = $this->tableGateway->updateWith($insert);
            if($ret !== false){
                return 1;
            }else{
                return -1;
            }
        }catch(\Exception $e){
            return -1;
        }
    }

    public function del($id)
    {
        try{
            $ret = $this->tableGateway->delete(['id'=>$id]);
            if($ret !== false){
                return 1;
            }else{
                return -1;
            }
        }catch(\Exception $e){
            return -1;
        }

    }


    public function select()
    {
        try{
            $ret = $this->tableGateway->select();
            return $ret;
        }catch(\Exception $e){
            return -1;
        }
    }

}