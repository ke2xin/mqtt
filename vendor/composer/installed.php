<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => NULL,
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => NULL,
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'workerman/mqtt' => array(
            'pretty_version' => 'v1.5',
            'version' => '1.5.0.0',
            'reference' => '7075c2dbc31449352ac83ad9e1ee2d480962779f',
            'type' => 'library',
            'install_path' => __DIR__ . '/../workerman/mqtt',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'workerman/workerman' => array(
            'pretty_version' => 'v4.1.10',
            'version' => '4.1.10.0',
            'reference' => 'e967b79f95b9251a72acb971be05623ec1a51e83',
            'type' => 'library',
            'install_path' => __DIR__ . '/../workerman/workerman',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
