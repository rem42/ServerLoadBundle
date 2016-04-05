<?php

namespace Rem42\Bundle\ServerLoadBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServerLoadCommand extends ContainerAwareCommand
{
	public $serverRunCommand;
	protected function configure()
	{
		$this
			->setDefinition(array())
			->setName('server:load')
			->setDescription('Runs PHP built-in web server with defined host');
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		if($this->getContainer()->hasParameter('rem42_server_load.host')){
			$host = $this->getContainer()->getParameter('rem42_server_load.host');
			$host .= ":8000";
		}else{
			$host = '127.0.0.1:8000';
		}

		$command = $this->getApplication()->find('server:run');

		$arguments = array(
			'command' => 'server:run',
			'address' => $host
		);

		$greetInput = new ArrayInput($arguments);
		$command->run($greetInput, $output);
	}
}
