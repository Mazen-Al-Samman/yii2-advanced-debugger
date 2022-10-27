<?php

use samman\debug\CurlPanel;
use yii\helpers\Html;

/**
 * @author Samman <mazenalsmman@gmail.com>
 * @var $panel CurlPanel
 */
$this->registerCssFile('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
$this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/vs.min.css');

$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/languages/json.min.js', ['position' => \yii\web\View::POS_END]);

$data = $panel->data;
$method = $data['method'];
$headers = $data['headers'];
$url = $data['url'];
$body = $data['body'];
$headers_str = '';
foreach ($headers as $header_key => $header_values) {
    foreach ($header_values as $header_value) {
        $keyValue = escapeshellarg("{$header_key}: {$header_value}");
        $headers_str .= "-H {$keyValue} \\\n";
    }
}
$curl = "curl -X $method '{$url}' \\\n{$headers_str}-d " . escapeshellarg($body);
?>

    <style>
        body {
            font-family: 'Poppins', 'serif';
        }
    </style>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-between">
            <h1>CURL Request</h1>

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
        <p class="text-secondary">This panel will help you to debug your API by import the request to your favorite API
            tool</p>
        <pre><code class="language-bash border rounded" id="curl"><?= Html::encode($curl) ?></code></pre>
    </div>
<?php $this->registerJs(<<<JS
$(document).on('click', '#copyme', function () {
        var range = document.createRange();
        range.selectNode(document.getElementById("curl"));
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);
        document.execCommand("copy");
        window.getSelection().removeAllRanges();
});
hljs.highlightAll();
JS
) ?>