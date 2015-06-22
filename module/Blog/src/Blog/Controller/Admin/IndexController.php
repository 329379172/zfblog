<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/15
 * Time: 下午2:54
 */
namespace Blog\Controller\Admin;

use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController{

    public function indexAction(){

        echo 'hehe';

        exit;

    }

    public function loginAction(){
        $request = $this->getRequest();
        if(!$request->isPost()){
            $smarty  = $this->getServiceLocator()->get('Smarty');
            $smarty->assign('error',null);
            $smarty->display('admin/login.tpl');
        }else{
            $request->getQuery('name');
            $request->getQuery('password');
        }
        exit;
    }


}