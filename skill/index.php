<?php
    include_once "../src/model/application-config.php";
    include_once "../src/controller/application.php";
    include_once "../src/view/layout.php";
    include_once "../src/view/skill.php";
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
            array("name"=>"skill.css")
        ), js: array());
    ?>
    <title>Skill</title>
</head>
<body>
    <!-- application header menu -->
    <?php Layout_VIEW::GetHeader(); ?>

    <section app="skill-01">
        <div app="skill-011" class="d-grid">
            <img class="m-auto" src="/lib/image/page/skill-01.svg" width="90%">
        </div>
        <div app="skill-012">
            <h1 app="skill-012-name">Soft skill</h1>
            <ul>
                <?php
                    Skill_VIEW::GetSoftSkill();
                ?>
            </ul>
        </div>
    </section>


    <section app="skill-02">
        <h1 app="skill-02-name">Hard skill</h1>
        <?php
            Skill_VIEW::GetHardSkill();
        ?>
    </section>
</body>
</html>