<?php

namespace Rem42\Bundle\ServerLoadBundle\Tests\Command;

use Rem42\Bundle\ServerLoadBundle\Command\ServerLoadCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ServerLoadCommandTest extends \PHPUnit_Framework_testCase
{
	public function testExecute(){
		$application = new Application();
		$application->add(new ServerLoadCommand());

		$command = $application->find('server:load');
		$commandTester = new CommandTester($command);
		$commandTester->execute(['command' => $command->getName()]);

		$this->assertRegExp('/http:\/\/127.0.0.1:8000/', $commandTester->getDisplay());
	}

	public function testParentExecute(){
		$application = new Application();
		$application->add(new ServerLoadCommand());

		$command = $application->find('server:run');
		$commandTester = new CommandTester($command);
		$commandTester->execute(['command' => $command->getName()]);

		$this->assertRegExp('/http:\/\/127.0.0.1:8000/', $commandTester->getDisplay());
	}

	public function testServerIsOutput(){
		$application = new Application();
		$application->add(new ServerLoadCommand());

		$command = $application->find('server:load');
		$commandTester = new CommandTester($command);
		$commandTester->execute([
			'command' => $command->getName(),
			'address' => 'remy.ovh'
		]);

		$this->assertRegExp('/http:\/\/remy.ovh:8000/', $commandTester->getDisplay());
	}
}