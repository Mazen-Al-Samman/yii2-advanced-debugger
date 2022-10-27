<?php

use samman\debug\ResponsePanel;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * @author Samman <mazenalsmman@gmail.com>
 * @var $panel ResponsePanel
 */
$this->registerCssFile('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/vs.min.css');

$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/languages/json.min.js', ['position' => \yii\web\View::POS_END]);
?>

    <style>
        body {
            font-family: 'Poppins', 'serif';
        }
    </style>

    <div class="container-fluid mt-3">
        <div class="w-100 d-flex justify-content-between">
            <h1>Response</h1>
            <button class="btn btn-info text-light font-weight-bold" id="copyme">
                Copy
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                     class="bi bi-clipboard"
                     viewBox="0 0 16 16">
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>
            </button>
        </div>
        <p class="text-secondary">JSON Response for the request.</p>
        <pre><code id='response'
                   class="language-json border rounded"><?= Html::encode(Json::encode($panel->data['response']->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)) ?></code></pre>
    </div>
<?php $this->registerJs(<<<JS
$(document).on('click', '#copyme', function () {
        var range = document.createRange();
        range.selectNode(document.getElementById("response"));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
});
hljs.highlightAll();
JS
) ?>