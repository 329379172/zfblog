<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/11
 * Time: 下午6:31
 */

namespace Api\Model;

use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\TableGateway;

class CommunityTable
{

    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function getRandom($number)
    {
        $select = $this->tableGateway->getSql()->select();
        $where = $select->where;
        //$where->like('addr', '%楼')->equalTo('looked', 0);
        $where->equalTo('looked', 0);
        $count = $this->tableGateway->selectWith($select)->count();
        $offset = rand(0, $count - $number);
        $select->offset($offset)->limit(intval($number));
        return $this->tableGateway->selectWith($select);
    }

    public function setLooked($id)
    {
        return $this->tableGateway->update(['looked' => 1], ['id' => intval($id)]);
    }


}