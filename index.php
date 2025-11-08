<?php
    include_once "src/model/application-config.php";
    include_once "src/controller/application.php";
    include_once "src/view/layout.php";
    include_once "src/view/index.php";
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
            array("name"=>"index.css")
        ), js: array());
        /** html title */
        Layout_VIEW::GetHeadTitle(title: null);
    ?>
</head>
<body>
    <!-- application header menu -->
    <?php Layout_VIEW::GetHeader(); ?>
    
    <!-- content -->
    <div app="content">
        <?php 
            Index_VIEW::GetName();
            Index_VIEW::GetBrief();
        ?>
        <div class="d-flex flex-column flex-xxl-row justify-content-xxl-between px-md-5 mt-3">
            <div class="d-flex flex-column flex-xxl-row justify-content-start gap-2">
                <button class="btn btn-lg btn-danger my-auto" onclick="window.location.assign('/about')">Learn More About Me</button>
                <button class="btn btn-lg btn-outline-light my-auto">Resume</button>
                <button class="btn btn-lg btn-outline-secondary my-auto">Source code</button>
            </div>
            <div class="d-flex mt-2 mt-md-0 gap-2 justify-content-center justify-content-xxl-start">
                <?php Index_VIEW::GetBriefContact(); ?>
            </div>
        </div>
        <?php
            Index_VIEW::GetWorkName();
            Index_VIEW::GetExperienceYear();
            Index_VIEW::GetBriefSkill(type: "programming");
        ?>
    </div>

    <!-- background image -->
    <div app="bg-image"></div>
    <!-- copy right -->
    <div appProp="copy-right">© 2025 Naruenat Komoot</div>
</body>
</html>