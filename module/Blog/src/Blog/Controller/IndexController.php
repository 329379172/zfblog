<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/15
 * Time: 下午2:54
 */
namespace Blog\Controller;

use Zend\Db\ResultSet\ResultSet;
use Zend\Debug\Debug;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController{

    public function indexAction(){;
        $articleTable = $this->getServiceLocator()->get('ArticleTable');
        Debug::dump(iterator_to_array($articleTable->findById(1)));
        var_dump($articleTable->findById(1)->getArrayObjectPrototype());
        exit;
    }
}