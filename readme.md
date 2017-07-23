## blacklist
 快递查询扩展
 
 可以自动检测快递类型进行快递查询，仅仅需要输入快递单号，就可以得到完整的快递信息。
 
 
 ## 要求
 
 无
 
 ## 安装
 
 ```
 composer require vbot/express:dev-master
 ```
 
 ## 扩展属性
 
 ```php
 name: express
 zhName: 快递查询
 author: 96qbhy
 ```
 
 ## 触发关键字
 
 无
 
 ## 配置项
 `limit` 代表找电影最大结果数，为 `null` 时取全部，默认为 5 。
```php
// ...
'extension' => [
    'find_movies' => [
        'limit'=>5
    ]
],
```
 
 
 ## 扩展负责人
 
 [96qbhy](https://github.com/96qbhy)
 
 96qbhy@gmail.com
