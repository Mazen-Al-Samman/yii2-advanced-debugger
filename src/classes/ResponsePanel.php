<?php

namespace samman\debug;

use Yii;
use yii\debug\Panel;
use yii\web\Response;

/**
 * Debugger panel that collects and displays request data.
 *
 * @author Mazen Samman <mazenalsmman@gmail.com>
 * @since 2.0
 */
class ResponsePanel extends Panel
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'Response';
    }

    /**
     * {@inheritdoc}
     */
    public function getSummary()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function getDetail()
    {
        return Yii::$app->view->render('../views/detail', ['panel' => $this]);
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
