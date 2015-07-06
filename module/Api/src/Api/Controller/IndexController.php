<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/6/15
 * Time: 下午2:54
 */
namespace Api\Controller;
include __DIR__ . '/../Plugin/simple_html_dom.php';
use Zend\Cache\Storage\Adapter\Redis;
use Zend\Cache\Storage\Adapter\RedisOptions;
use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController{

    function getTaobaoUserInfoAction(){
        $nick = urlencode($this->params('name'));
        $redis = $this->getServiceLocator()->get('Redis');
        //$redis = new Redis();
        if($redis->getItem(md5($nick))){
            echo $redis->getItem(md5($nick));
            exit;
        }
        $headers = [
            'Origin' => 'http://www.131458.com',
            'Referer' => 'http://www.131458.com/',
            'Content-Type' => 'application/json; charset=UTF-8'
        ];
        $data = "{'nick':'"  . $nick . "'}";
        $response = \Requests::post('http://www.131458.com/handler/load.aspx/Load',$headers,$data);
        $d = json_decode($response->body,true);
        $session = $response->cookies['ASP.NET_SessionId']->value;
        if(is_array($d) && !empty($d['d'])){
            $tokenResponse = \Requests::get('http://localhost:3000/token?d='.$d['d'].'&c=vvl');
            $headers = [
                'Cookie' => 'ASP.NET_SessionId='.$session
            ];
            $url = 'http://www.131458.com/handler/TaobaoInfo.ashx?tbNickInfoJson='  . $nick .  '&token=' . $tokenResponse->body . '&_=' . (time() * 1000);
            $taobaoInfoResponse = \Requests::get($url,$headers);
            $url = 'http://www.131458.com/handler/TaobaoInfo.ashx?nickCode='  . $nick .  '&token=' . $tokenResponse->body . '&_=' . (time() * 1000);
            $taobaoInfoResponse2 = \Requests::get($url,$headers);

            $document = str_get_html($taobaoInfoResponse2->body);
            $info = [];
            $info['nickName'] = $document->find('.inq_02_L_001')[0]->find('a')[0]->text();
            $info['registerTime'] =  $document->find('.inq_02_L_002')[0]->find('span')[0]->text();
            $info['realName'] =  $document->find('.inq_02_L_003')[0]->find('span')[0]->text();
            $info['address'] =  $document->find('.inq_02_L_004')[1]->find('span')[0]->text();
            $info['zhongping'] = $document->find('#zhongpingNumber')[0]->text();
            $info['chapingNumber'] = $document->find('#chapingNumber')[0]->text();
            $info['bili'] = $document->find('#zcbl')[0]->text();
            $info['buyerLevel'] = $document->find('.inq_04_001')[0]->find('img')[0]->attr['src'];
            $dom = $document->find('.inq_04_001')[0]->find('a');
            if(count($dom) > 0){
                $info['buyerVipLevel'] = $document->find('.inq_04_001')[0]->find('a')[0]->find('img')[0]->attr['title'];
            }
            $info['buyerCredit'] = $document->find('.inq_04_001')[0]->find('b[name=p]')[0]->text();
            $info['buyerWeek'] = $document->find('.inq_04_001')[1]->find('.qq')[0]->text();
            $info['buyerMonth'] = $document->find('.inq_04_001')[2]->find('.qq')[0]->text();
            $info['buyerHalfYear'] = $document->find('.inq_04_001')[3]->find('.qq')[0]->text();
            $info['buyerHalfYearAgo'] = $document->find('.inq_04_001')[4]->find('.qq')[0]->text();
            $info['buyerEveryWeek'] = $document->find('.inq_04_001')[5]->find('#bc')[0]->text();

            $info['sellerLevel'] = $document->find('.inq_04_001')[6]->find('img')[0]->attr['src'];
            $info['sellerCredit'] = $document->find('.inq_04_001')[6]->find('b')[0]->text();
            $info['sellerWeek'] = $document->find('.inq_04_001')[7]->find('b')[0]->text();
            $info['sellerMonth'] = $document->find('.inq_04_001')[8]->find('b')[0]->text();
            $info['sellerHalfYear'] = $document->find('.inq_04_001')[9]->find('b')[0]->text();
            $info['sellerHalfYearAgo'] = $document->find('.inq_04_001')[10]->find('b')[0]->text();
            $infojson = json_decode($taobaoInfoResponse->body,true);
            $info['SecurityLevel'] = str_get_html(urldecode($infojson[0]['SecurityLevel']))->find('img')[0]->attr['src'];
            $ret  = json_encode($info);
            echo $ret;
            $redis->setItem(md5($nick),$ret);
        }else{
            echo '';
        }
        exit;
    }

    public function getPostCodeAction(){
        $query = urlencode($this->params('name'));
        $response = \Requests::get('http://opendata.baidu.com/post/s?wd=' . $query . '&rn=20');
        $document = str_get_html($response->body);
        $listData = $document->find('.list-data ul li a');
        if(count($listData) > 0){
            $arr = explode(iconv('utf-8','gbk',' '),$listData[0]->text());
            $ret = $arr[count($arr) - 1];
            echo $ret;
            exit;
        }

        $tableData = $document->find('.table-data .table-list tbody tr');
        if(count($tableData) > 1){
            echo $tableData[1]->find('td')[0]->text();
            exit;
        }
        exit;
    }
}