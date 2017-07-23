<?php

namespace Vbot\FindMovies;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Illuminate\Support\Collection;
use Qbhy\FindMovies\Finder;

class FindMovies extends AbstractMessageHandler
{

    public $author = '96qbhy';

    public $name = 'find-movies';

    public $zhName = '找电影';

    public $version = '1.0';

    /**
     * 注册拓展时的操作.
     */
    public function register()
    {
        /**
         * 初始化 Finder
         */
        Finder::init();
    }

    /**
     * 开发者需要实现的方法.
     *
     * @param Collection $message
     * @return mixed
     */
    public function handler(Collection $message)
    {
        $content = $message['content'];
        if ($message['type'] === 'text' and strpos($content, '找电影 ') === 0 and strlen($content) > 4) {
            $keyword = str_replace("找电影 ", '', $content);

            $results = Finder::find($keyword, 5);

        }
        return null;
    }
}