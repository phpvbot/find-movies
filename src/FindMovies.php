<?php

namespace Vbot\FindMovies;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Hanson\Vbot\Message\Text;
use Illuminate\Support\Collection;
use Qbhy\FindMovies\Finder;

class FindMovies extends AbstractMessageHandler
{

    public $author = '96qbhy';

    public $name = 'find_movies';

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
        $this->config = $this->config ?: [
            'limit' => 3,
            'msg' => '抱歉,没有找到和 "{keyword}" 相关的电影。',
            'render' => [self::class, 'render']
        ];
    }

    /**
     * 开发者需要实现的方法.
     *
     * @param Collection $message
     * @return mixed
     * @throws \Exception
     */
    public function handler(Collection $message)
    {
        $content = $message['content'];
        if ($message['type'] === 'text' and strpos($content, '找电影 ') === 0 and strlen($content) > 4) {
            $keyword = str_replace('找电影 ', '', $content);
            $movies = Finder::find($keyword, $this->config['limit']);
            $username = $message['from']['UserName'];
            if (count($movies) === 0) {
                return Text::send($username, str_replace("{keyword}", $keyword, $this->config['msg']));
            }
            if (isset($this->config['render']) && is_callable($render = $this->config['render'])) {
                $str = call_user_func_array($render, [$movies]);
            } else {
                $str = self::render($movies);
            }
            return Text::send($username, $str);
        }
        return null;
    }

    public static function render($movies)
    {
        $count = count($movies);
        $str = '为您找到以下 ' . $count . ' 部电影' . PHP_EOL;
        foreach ($movies as $key => $movie) {
            $str .= ($key + 1) . ' ' . $movie['title'] . PHP_EOL;
            $str .= '  下载列表: ' . PHP_EOL;
            foreach ($movie['downloads'] as $download) {
                $str .= '  《' . $download['title'] . '》 ' . $download['url'] . PHP_EOL;
            }
            if ($key < $count) {
                $str .= PHP_EOL;
            }
        }
        return $str;
    }
}
