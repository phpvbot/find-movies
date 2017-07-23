<?php

namespace Vbot\FindMovies;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Illuminate\Support\Collection;

class FindMovies extends AbstractMessageHandler
{

    /**
     * 注册拓展时的操作.
     */
    public function register()
    {
        // TODO: Implement register() method.
    }

    /**
     * 开发者需要实现的方法.
     *
     * @param Collection $collection
     *
     * @return mixed
     */
    public function handler(Collection $message)
    {

    }
}