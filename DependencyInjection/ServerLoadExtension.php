<?php

namespace Rem42\Bundle\ServerLoadBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class ServerLoadExtension extends Extension
{
	public function load(array $configs, ContainerBuilder $container)
	{
		$configuration = new Configuration();
		$config = $this->processConfiguration($configuration, $configs);

		$container->setParameter('rem42_server_load.host', $config['host']);

		$loader = new XmlFileLoader(
			$container,
			new FileLocator(__DIR__.'/../Ressources/config')
		);
		$loader->load('services.xml');
	}

	public function getAlias(){
		return 'rem42_server_load';
	}

}