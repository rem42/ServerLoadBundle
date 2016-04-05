<?php

namespace Rem42\Bundle\ServerLoadBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
	public function getConfigTreeBuilder()
	{
		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('rem42_server_load');

		$rootNode
			->children()
				->scalarNode('host')->defaultNull()
			->end()
		;

		return $treeBuilder;
	}

}