<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'     => 'Mysql',
        'host'        => 'localhost',
        'username'    => 'increase',
        'password'    => 'increase',
        'dbname'      => 'increase',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'      => __DIR__ . '/../../app/models/',
        'viewsDir'       => __DIR__ . '/../../app/views/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'cacheDir'       => __DIR__ . '/../../app/cache/',
        'formsDir'       => __DIR__ . '/../../app/forms/',
        'libraryDir'     => __DIR__ . '/../../app/libraries/',
        'baseUri'        => '/increase/',
    )
));
