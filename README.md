
# yii2-advanced-debugger



```php
$config['modules']['debug'] = [
    'class' => 'yii\debug\Module',
    'panels' => [
        'respanel' => ['class' => 'samman\debug\ResponsePanel'],
        'curlpanel' => ['class' => 'samman\debug\CurlPanel']
    ],
];
```