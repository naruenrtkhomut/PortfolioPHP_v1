<?php
    include_once "../src/model/application-config.php";
    include_once "../src/controller/application.php";
    include_once "../src/view/layout.php";
    include_once "../src/view/project.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="icon" type="image/x-icon" href="/lib/image/web-icon.svg" />
    <?php
        /** html->head->lib */
        Layout_VIEW::GetHead(css: array(
            array("name"=>"application-root.css"),
            array("name"=>"project.css")
        ), js: array());
    ?>
    <title>Project</title>
</head>
<body>
    <?php 
        Layout_VIEW::GetHeader();
        Project_VIEW::LoadProject($_GET["id"] ?? null);
    ?>
    <!-- copy right -->
    <div appProp="copy-right">© 2025 Naruenat Komoot</div>
</body>
</html>