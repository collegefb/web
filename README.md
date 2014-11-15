CollegeFB/Web
===
Application using [Slim framework](https://github.com/slim/slim) and [Slimcontroller](https://github.com/slimcontroller/slimcontroller) package to build the website that uses the [CollegeFB](https://github.com/collegefb/collegefb) logic.

To get it working you need to create a public file and set inside the following code

```
require 'vendor/autoload.php';

$options = array(
    'database'  => 'my_database',
    'twitter'   => array(
        'key'      => 'twitter_key',
        'secret'   => 'twitter_secret',
        'auth_users'    => array(),
    ),
    'xauth_token'   => 'xauth_token',
    'admin_templates_path'  => 'templates/admin',
    'web_templates_path'    => 'templates/web',
);

$bootstrap = new \CollegeFBWeb\BootstrapApp();
$container = $bootstrap->getContainer($options);
$bootstrap->getApp('web', $container)->run();
```
