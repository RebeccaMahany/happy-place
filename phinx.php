<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => 'sqlite',
            'name' => '%%PHINX_CONFIG_DIR%%/data/happy-place',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'sqlite',
            'name' => '%%PHINX_CONFIG_DIR%%/data/happy-place',
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'sqlite',
            'name' => '%%PHINX_CONFIG_DIR%%/data/happy-place',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
