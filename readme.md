## find-movies
 `vbot` 找电影扩展
 
 支持自定义消息模板。
 
 
 ## 要求
 
 无
 
 ## 安装
 
 ```
 $ composer require vbot/find-movies
 ```
 
 ## 扩展属性
 
 ```
 name: find_movies
 zhName: 找电影
 author: 96qbhy
 ```
 
 ## 触发关键字
 
 无
 
 ## 配置项
 1. `limit` 代表找电影最大结果数，为 `null` 时取全部，默认为 5 。
 2. `msg` 代表没有找到电影时的提示, `{keyword}` 会被替换为关键词。
 3. `render` 代表自定义渲染信息，必须返回字符串!!!
 > 可以不自定义配置，但一旦自定义配置，则除 `render` 可以设置成 `null` 之外，其余两个必须时准确的值。
 
```php
// ...
'extension' => [
    'find_movies' => [
        'limit' => 5,
        'msg' => '抱歉,没有找到和 "{keyword}" 相关的电影。',
        'render' => function ($movies){return '自定义消息';}
    ]
],
```

 
 
 ## 扩展负责人
 
 [96qbhy](https://github.com/96qbhy)
 
 96qbhy@gmail.com
