<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/30
 * Time: 下午2:17
 */
namespace Base\Controller;

use Base\Options\MailOptions;
use Zend\Mvc\Controller\AbstractActionController;

class TestController extends AbstractActionController
{

    public function testAction()
    {
        $mailOptions = $this->getServiceLocator()->get('MailOptions');
        echo $mailOptions->getMailFrom();
        echo '<br/>';
        echo $mailOptions->getMailTo();
        exit;
    }


}