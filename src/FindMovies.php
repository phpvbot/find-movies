<?php

namespace Vbot\FindMovies;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Illuminate\Support\Collection;
use Qbhy\FindMovies\Finder;

class FindMovies extends AbstractMessageHandler
{

    public $author = '96qbhy';

    public $name = 'find_movies';

    public $zhName = '找电影';

    public $version = '1.0';

    public $configs = [];

    /**
     * 注册拓展时的操作.
     */
    public function register()
    {
        /**
         * 初始化 Finder
         */
        Finder::init();
        $this->configs = vbot('config')->get('extension.' . $this->name);
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
            $limit = isset($this->configs['limit']) ? $this->configs['limit'] : 5;
            $results = Finder::find($keyword, $limit);

        }
        return null;
    }
}