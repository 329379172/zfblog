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
/*
        header('Content-type:text/html;charset=utf-8');

        $articleTable = $this->getServiceLocator()->get('ArticleTable');
        Debug::dump(iterator_to_array($articleTable->findById(2)));*/
/*
        $tmp  = $articleTable->all();

        forEach($tmp as $key=>$val){
            echo $key;
            var_dump($val);
        }
        $article = new Article();
        $article->setTitle('test object');
        $article->setContent('test object');
        var_dump($articleTable->insert($article));*/

        $smarty = $this->getServiceLocator()->get('Smarty');
        $smarty->assign("Name", "Fred Irving Johnathan Bradley Peppergill", true);
        $smarty->assign("FirstName", array("John", "Mary", "James", "Henry"));
        $smarty->assign("LastName", array("Doe", "Smith", "Johnson", "Case"));
        $smarty->assign("Class", array(array("A", "B", "C", "D"), array("E", "F", "G", "H"),
            array("I", "J", "K", "L"), array("M", "N", "O", "P")));

        $smarty->assign("contacts", array(array("phone" => "1", "fax" => "2", "cell" => "3"),
            array("phone" => "555-4444", "fax" => "555-3333", "cell" => "760-1234")));

        $smarty->assign("option_values", array("NY", "NE", "KS", "IA", "OK", "TX"));
        $smarty->assign("option_output", array("New York", "Nebraska", "Kansas", "Iowa", "Oklahoma", "Texas"));
        $smarty->assign("option_selected", "NE");

        $smarty->display('index.tpl');

        exit;

    }


}