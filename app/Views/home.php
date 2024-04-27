<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= assets("/css/remixicon.css"); ?>">
    <link rel="stylesheet" href="<?= assets("/css/normalize.css"); ?>">
    <link rel="stylesheet" href="<?= assets("/css/skeleton.css"); ?>">
    <link rel="stylesheet" href="<?= assets("/css/style.css"); ?>">
</head>

<body>
</body>
<div class="container">
    <section class="header">
        <h1 class="title">A simple MVC skeleton 💧</h1>
        <p class="subtitle">A quick and easy template to implement applications with MVC and PHP</p>
    </section>
    <div class="docs-section row">
        <div class="nine columns">
            <h5 class="docs-header"><i class="ri-archive-stack-line"></i> This MVC Skeleton for you?</h5>
            <p>You should use this Skeleton MVC if you are embarking on a smaller project or just don't feel like you need all the utility of larger frameworks like <b>Laravel</b>, <b>Code Ingniter</b>, <b>Cake</b>, etc.</p>
        </div>
        <div class="three columns" style="text-align: end;">
            <img src="<?= assets("/img/furina.png") ?>" width="120px">
            <span class="caption" style="display: block;">- Furina</span>
        </div>
    </div>
    <div class="docs-section">
        <ul style="list-style: none;">
            <li>📂 Folder controllers:<b> app/Controllers</b>
                <ul>
                    <li>Namespace: <b>App\Controllers</b></li>
                </ul>
            </li>
            <li>📂 Folder models:<b> app/Models</b>
                <ul>
                    <li>Namespace: <b>App\Models</b></li>
                </ul>
            </li>
            <li>📂 Folder services:<b> app/Services</b>
                <ul>
                    <li>Namespace: <b>App\Services</b></li>
                </ul>
            </li>
            <li>📂 Folder Views: <b>app/Views</b>
                <ul>
                    <li>Template Engine: <b>PHP</b></li>
                </ul>
            </li>
            <li>💪 And more functions:
                <ul>
                    <li><b>assets()</b></li>
                    <li><b>dump()</b></li>
                    <li><b>dd()</b></li>
                    <li><b>config()</b></li>
                    <li><b>env()</b></li>
                </ul>
            </li>
        </ul>
    </div>
</div>

</html>