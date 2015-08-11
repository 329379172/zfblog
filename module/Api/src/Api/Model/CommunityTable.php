<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/11
 * Time: 下午6:31
 */

namespace Api\Model;

use Zend\Db\Sql\Select;
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
        $count = $this->tableGateway->select()->count();
        $offset = rand(0, $count - $number);

        return $this->tableGateway->select(function (Select $select) use($offset,$number) {
            $select->offset($offset)->limit(intval($number));
        });

    }


}