<?php
/**
 * Created by PhpStorm.
 * User: xiaoqiu
 * Date: 15/11/18
 * Time: 下午8:06
 */
namespace Tool;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;

class Module implements ConfigProviderInterface, DependencyIndicatorInterface, AutoloaderProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . '/config/module.conf.php';
    }

    public function getModuleDependencies()
    {
        return [
            'Base',
            'Smarty'
        ];
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

}