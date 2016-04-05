<?php

namespace Rem42\Bundle\ServerLoadBundle;

use Rem42\Bundle\ServerLoadBundle\DependencyInjection\ServerLoadExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ServerLoadBundle extends Bundle
{
	public function getContainerExtension()
	{
		return new ServerLoadExtension();
	}
}
