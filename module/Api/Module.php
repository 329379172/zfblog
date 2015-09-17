<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/7/1
 * Time: 下午2:48
 */

namespace Api;

use Api\Model\Community;
use Api\Model\CommunityTable;
use Api\Model\ReleaseOrder;
use Api\Model\ReleaseOrderTable;
use Api\Model\YqClass;
use Api\Model\YqClassTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;

class Module implements AutoloaderProviderInterface, ConfigProviderInterface,DependencyIndicatorInterface
{

    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable
     */
    public function getConfig(){
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig(){
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                ]
            ]
        ];
    }

    public function getModuleDependencies(){
        return [
            'Redis',
            'Base'
        ];
    }


    public function getServiceConfig(){
        return [
            'factories'=>[
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
            ]
        ];
    }

}