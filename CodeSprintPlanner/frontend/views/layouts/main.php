<?php
use app\assets\AppAsset;
use frontend\assets\AppAsset as AssetsAppAsset;

AssetsAppAsset::register($this);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Sprint Planner</title>
    <link rel="stylesheet" href="css/layout-style.css">
</head>
<body>
    <header>
        <div class="logo"><img src="images/Logo.png" alt="Descripción de la imagen" width="100" height="100"/></div>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/projects">Projects</a></li>
                <li><a href="/about">About</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

    <div class="content">
        <?= $content ?>
    </div>

    <footer>
        <p>© <?= date('Y') ?> Your Application Name. All rights reserved.</p>
    </footer>
</body>
</html>
