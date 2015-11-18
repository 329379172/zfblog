<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/11/18
 * Time: 下午8:22
 */

namespace Tool\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Mvc\MvcEvent;

class Controller extends AbstractActionController{


    public function onDispatch(MvcEvent $e){
        echo "onDispatch";
        parent::onDispatch($e);
    }

}