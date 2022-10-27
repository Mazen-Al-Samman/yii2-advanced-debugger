<h1 align="center">
    Yii2 Advanced Debugger
</h1>

<p align="center">
    <a href="https://www.yiiframework.com/" target="_blank">
        <img src="https://www.yiiframework.com/image/yii_logo_light.svg" width="400" alt="Yii Framework" />
    </a>
</p>

Package for advanced API debugging panels.


Features
------------
New Panels Added to the Yii2 debugger via this package:
<ul>
    <li>
        <h4>Response Panel</h4>
        <p>Panel for the JSON response returned by the sent request.</p>
        <img style="width: 600px;" src="https://user-images.githubusercontent.com/59656525/198234064-152310e8-da7f-4b18-8e2b-f84b38d9bd2a.png" />
    </li>
</ul>

<ul> 
    <li>
        <h4>CURL Panel</h4>
        Copy the request as a CURL with full params, headers, and body params.
        <img style="width: 600px;" src="https://user-images.githubusercontent.com/59656525/198233273-b7378f40-6a01-4232-98db-2e07f352552f.png" />
    </li>
</ul>

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require samman/yii2-advanced-debugger
```

or add

```
"samman/yii2-advanced-debugger": "*"
```

to the require section of your `composer.json` file.



In your `main-local.php` you should add the following
```
$config['modules']['debug'] = [
    'class' => 'yii\debug\Module',
    'panels' => [
        'respanel' => ['class' => 'samman\debug\ResponsePanel'],
        'curlpanel' => ['class' => 'samman\debug\CurlPanel']
    ],
];
