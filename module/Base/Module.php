<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/8/30
 * Time: 下午1:25
 */
namespace Base;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface, AutoloaderProviderInterface, ServiceProviderInterface, ControllerProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ]
            ]
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                'MailOptions' => 'Base\Service\Factory\MailOptions',
                'CommunityTable' => function(ServiceLocatorInterface $sm){
                    $tableGateway = $sm->get('CommunityTableGateway');
                    $table = new CommunityTable($tableGateway);
                    return $table;
                },
                'CommunityTableGateway' => function(ServiceLocatorInterface $sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Community());
                    return new TableGateway('tbl_community',$dbAdapter,null,$resultSetPrototype);
                },
                'ReleaseOrderTable' => function(ServiceLocatorInterface $sm){
                    $tableGateway = $sm->get('ReleaseOrderTableGateway');
                    $table = new ReleaseOrderTable($tableGateway);
                    return $table;
                },
                'ReleaseOrderTableGateway' => function(ServiceLocatorInterface $sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new ReleaseOrder());
                    return new TableGateway('tbl_release_order',$dbAdapter,null,$resultSetPrototype);
                },
                'YqClassTable' => function(ServiceLocatorInterface $sm){
                    $tableGateway = $sm->get('YqClassTableGateway');
                    $table = new YqClassTable($tableGateway);
                    return $table;
                },
                'YqClassTableGateway' => function(ServiceLocatorInterface $sm){
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new YqClass());
                    return new TableGateway('tbl_yq_class',$dbAdapter,null,$resultSetPrototype);
                }
            ],
            'invokables' => [
                'LongDai' => 'Base\Service\LongDaiService'
            ]
        ];
    }

    public function getControllerConfig(){
        return [
            'abstract_factories' => [
                'Base\Service\AbstractController'
            ]
        ];
    }

}