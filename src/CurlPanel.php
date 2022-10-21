<?php

namespace samman\debug;

use Yii;
use yii\debug\Panel;
use yii\web\Application;

/***
 * @author Samman <mazenalsmman@gmail.com>
 */
class CurlPanel extends Panel
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'Curl';
    }

    /**
     * {@inheritdoc}
     */
    public function getSummary(): string
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function getDetail(): string
    {
        return Yii::$app->view->renderFile(__DIR__ . '/views/curlDetails.php', ['panel' => $this]);
    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        if (!Yii::$app instanceof Application) return [];
        $request = Yii::$app->request;
        return [
            'method' => $request->method,
            'url' => $request->absoluteUrl,
            'headers' => $request->headers,
            'body' => $request->rawBody,
        ];
    }
}
