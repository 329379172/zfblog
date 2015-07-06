<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/24
 * Time: 上午9:58
 */
namespace Blog\Plugin;
class MySmarty extends \Smarty{

    public function display($tpl){
        parent::display($tpl);
        exit;
    }


}
