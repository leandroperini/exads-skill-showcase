<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

function getEM(): EntityManager
{
    $isDevMode = true;
    $proxyDir  = null;
    $cache     = null;
    $config    = ORMSetup::createAnnotationMetadataConfiguration(
        [__DIR__ . "/src"],
        $isDevMode,
        $proxyDir,
        $cache,
    );
    $config->setAutoGenerateProxyClasses(true);

    $conn = [
        'driver'   => 'pdo_mysql',
        'user'     => 'root',
        'password' => 'root',
        'dbname'   => 'exads',
        'host'     => 'db',
    ];

    return EntityManager::create($conn, $config);
}
