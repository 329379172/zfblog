<?php
/**
 * Created by PhpStorm.
 * User: yourfather
 * Date: 2015/6/16
 * Time: 21:27
 */

namespace Blog\Model;

use Zend\Db\TableGateway\TableGateway;

class ArticleTable {

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway){
        $this->tableGateway = $tableGateway;
    }

    public function findById($id){
        return $this->tableGateway->select('id='.$id);
    }



}