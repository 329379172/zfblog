<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/15
 * Time: 下午2:54
 */
namespace Blog\Controller;

use Blog\Model\Article;
use Zend\Debug\Debug;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController{

    public function indexAction(){

        echo 'hehe';

        exit;

    }


}