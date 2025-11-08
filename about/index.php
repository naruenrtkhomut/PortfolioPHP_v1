<?php
    include_once "../src/model/application-config.php";
    include_once "../src/controller/application.php";
    include_once "../src/view/layout.php";
    include_once "../src/view/about.php";
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
            array("name"=>"about.css")
        ), js: array());
    ?>
    <title>About</title>
</head>
<body>
    <!-- application header menu -->
    <?php Layout_VIEW::GetHeader(); ?>
    <section app="about-01">
        <div app="about-01-image"></div>
        <div>
            <?php
                About_VIEW::GetWorkName();
                About_VIEW::GetExperienceYearDiff();
                About_VIEW::GetWorkDescription();
                About_VIEW::GetSkillSVGs();
            ?>
        </div>
    </section>
    <section app="about-02">
        <div class="ps-lg-5">
            <h1 app="about-02-name">Work experiences</h1>
            <?php
                About_VIEW::GetExperience();
            ?>
        </div>
        <div app="about-02-image"></div>
    </section>
    <section app="about-05">
        <div app="about-05-image"></div>
        <div>
            <h1 app="about-05-name">Educations</h1>
            <?php About_VIEW::GetEducation(); ?>
        </div>
    </section>
    <section app="about-03">
        <h1 app="about-03-name" class="mb-3">Projects</h1>
        <div app="about-031">
            <?php About_VIEW::GetProject(); ?>
        </div>
    </section>
    <section app="about-04">
        <h1 app="about-04-name" class="my-3">Certifications</h1>
        <?php About_VIEW::GetCertifications(); ?>
        <div style="height: 40px;"></div>
    </section>
    <!-- copy right -->
    <div appProp="copy-right">© 2025 Naruenat Komoot</div>
</body>
</html>