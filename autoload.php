<?php

// autoload.php generated by Composer
if (!class_exists('Composer\\Autoload\\ClassLoader', false)) {
    require __DIR__ . '/vendor/composer/ClassLoader.php';
}

$loader = new \Composer\Autoload\ClassLoader();
$composerDir = __DIR__ . '/vendor/composer';

$map = require $composerDir . '/autoload_namespaces.php';
foreach ($map as $namespace => $path) {
    $loader->add($namespace, $path);
}

$classMap = require $composerDir . '/autoload_classmap.php';
if ($classMap) {
    $loader->addClassMap($classMap);
}

$loader->add('hhc', __DIR__.'/src');

$loader->register();

// Include the main Propel script
require_once __DIR__.'/vendor/propel/runtime/lib/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init(__DIR__ . "/config/hhc-conf.php");