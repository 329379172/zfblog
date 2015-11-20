<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/11/18
 * Time: 下午8:29
 */
namespace Tool\Controller;

use \Requests;

class LongDaiController extends Controller{

    public function grabRedBagAction(){
        //Requests::post();
        $longDaiService = $this->serviceLocator->get('LongDai');
        echo $longDaiService->grabRedBagByUrl('http://m.longdai.com/shareRedReward?shareRed=3F0AEB2E9661562B5592BB0B118BEC76','13733987253');
        exit;
    }

}