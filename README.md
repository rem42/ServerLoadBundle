ServerLoadBundle
================

## Installation

Installation using composer is really easy: this command will add `"rem42/server-load-bundle": "dev-master"` to your composer.json
and will download the bundle:

	composer require rem42/server-load-bundle dev-master
	
Enable the bundle in your kernel:
```php
    <?php
    // app/AppKernel.php

    public function registerBundles()
    {
        // ...
        
        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            // ...
            $bundles[] = new Rem42\Bundle\ServerLoadBundle\ServerLoadBundle();
        }
    }
```

Add the following lines at `app/config/config_dev.yml`:

    rem42_server_load:
        host: "your_personalized_host.dev:port"


## Execute

    php bin/console server:load
