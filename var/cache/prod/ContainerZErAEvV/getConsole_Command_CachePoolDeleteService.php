<?php

namespace ContainerZErAEvV;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/*
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConsole_Command_CachePoolDeleteService extends App_KernelProdContainer
{
    /*
     * Gets the private 'console.command.cache_pool_delete' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Command\CachePoolDeleteCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['console.command.cache_pool_delete'] = $instance = new \Symfony\Bundle\FrameworkBundle\Command\CachePoolDeleteCommand(($container->services['cache.global_clearer'] ?? $container->load('getCache_GlobalClearerService')), ['cache.app', 'cache.system', 'cache.validator', 'cache.serializer', 'cache.annotations', 'cache.property_info', 'cache.property_access', 'cache.validator_expression_language', 'cache.security_expression_language', 'cache.security_is_granted_attribute_expression_language', 'cache.doctrine.orm.default.result', 'cache.doctrine.orm.default.query', 'api_platform.cache.route_name_resolver', 'api_platform.cache.metadata.resource', 'api_platform.cache.metadata.property', 'api_platform.cache.metadata.resource_collection']);

        $instance->setName('cache:pool:delete');
        $instance->setDescription('Delete an item from a cache pool');

        return $instance;
    }
}
