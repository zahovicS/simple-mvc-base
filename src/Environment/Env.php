<?php

namespace System\Environment;

use Dotenv\Repository\Adapter\PutenvAdapter;

use Dotenv\Repository\RepositoryBuilder;

class Env
{
    protected static $repository;
    public static function getEnvRepository()
    {
        if (static::$repository === null) {
            $builder = RepositoryBuilder::createWithDefaultAdapters();

            $builder = $builder->addAdapter(PutenvAdapter::class);

            static::$repository = $builder->immutable()->make();
        }

        return static::$repository;
    }
    public static function get($key, $default = null)
    {
        return static::$repository->get($key) ?? $default;
    }
}