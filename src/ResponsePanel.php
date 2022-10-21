<?php

namespace samman\debug;

use Yii;
use yii\debug\Panel;
use yii\web\Response;

/**
 * Debugger panel that collects and displays request data.
 * @author Mazen Samman <mazenalsmman@gmail.com>
 * @since 2.0
 */
class ResponsePanel extends Panel
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'Response';
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
        return Yii::$app->view->renderFile(__DIR__ . '/views/responseDetails.php', ['panel' => $this]);
    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        $responseModel = new Response();
        $responseModel->data = Yii::$app->getResponse()->data;
        return ['response' => $responseModel];
    }
}
