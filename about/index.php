<?php
    /** include libs */
    include_once "../src/model/enum-config.php";
    include_once "../src/view/page-libraries.php";
    include_once "../src/view/page-content.php";

    $libVersion = PageLibrary_VW::GetVersion();
    $libBootstrapCSS = PageLibrary_VW::GetBootstrapCSS();
    $libBootstrapJS = PageLibrary_VW::GetBootstrapJS();
    $libJQuery = PageLibrary_VW::GetJQuery();
    $pageMenu = PageLibrary_VW::GetHeader();

    $work = PageContent_VW::GetWork();
    $skill = PageContent_VW::GetTechSkills(path: "../public/image/tech-skills");
    $project = PageContent_VW::GetProject_PageAbout();

    $stopDate = new DateTime('now');
    $startDate = new DateTime('2020-05-05');
    $dateDiff = $startDate->diff($stopDate);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" href="/public/lib/<?php echo $libBootstrapCSS["href"]; ?>" crossorigin="anonymous" integrity="<?php echo $libBootstrapCSS["integrity"]; ?>">
    <script src="/public/lib/<?php echo $libBootstrapJS["src"]; ?>" crossorigin="anonymous" integrity="<?php echo $libBootstrapJS["integrity"]; ?>"></script>
    <script src="/public/lib/<?php echo $libJQuery; ?>"></script>
    <link rel="stylesheet" href="/public/lib/css/<?php echo $libVersion; ?>/about-min-1400px.css" media="screen and (min-width: 1400.00px)">
    <title>About</title>
</head>
<body>
    <section appProp="header">
        <?php echo $pageMenu; ?>
    </section>
    <section appProp="content">
        <section appProp="content-image"></section>
        <section appProp="content-detail" id="app-detail">
            <h1 appProp="content-detail-position"><?php echo $work["current"]; ?></h1>
            <h1 appProp="content-detailt-experience"><?php echo "Experience of my work: ".($dateDiff->y)." years+"; ?></h1>
            <ul appProp="content-detail-description">
                <?php
                    echo join(
                        separator: "",
                        array: array_map(
                            callback: fn($getData) => "<li>".($getData)."</li>",
                            array: $work["description"]
                        )
                    );
                ?>
            </ul>
            <div appProp="content-detail-skill">
                <?php echo $skill; ?>
            </div>
        </section>
    </section>
    <section appProp="experience">
        <div appProp="experience-detail">
            <h1 appProp="experience-detail-headername">Work experiences</h1>
            <?php
                echo join(
                    separator: "",
                    array: array_map(
                        callback: fn($getData) => (
                            "<h1>".($getData["name"])."</h1>".
                            "<h6>".(
                                $getData["date"]["start"]->format("Y-m-d").
                                " - ".
                                $getData["date"]["stop"]->format("Y-m-d")
                            ).
                            "</h6>".
                            "<h2>".($getData["company"])."</h2>".
                            "<ul>".
                            join(
                                separator: "",
                                array: array_map(
                                    callback: fn($getDes) => "<li>".($getDes)."</li>",
                                    array: $getData["description"]
                                )
                            ).
                            "</ul>"
                        ),
                        array: PageContent_VW::GetWork()["data"]
                    )
                );
            ?>
        </div>
        <div appProp="experience-image"></div>
    </section>
    <section appProp="education">
        <div appProp="education-image"></div>
        <div appProp="education-detail">
            <h1>Education</h1>
            <?php
                echo join(
                    separator: "",
                    array: array_map(
                        callback: fn($getData) => (
                            ("<h2>".($getData["name"])."</h2>").
                            ("<div appProp=\"education-detail-gpa\">GPA: ".($getData["gpa"])."</div>").
                            ("<div appProp=\"education-detail-research\">Research: ".($getData["research"])."</div>").
                            (
                                "<ul>".
                                join(
                                    separator: "",
                                    array: array_map(
                                        callback: fn($getDes) => "<li>".($getDes)."</li>",
                                        array: $getData["description"]
                                    )
                                ).
                                "</ul>"
                            )
                        ),
                        array: PersonContentEnum::EDUCATION->Value()
                    )
                )
            ?>
        </div>
    </section>
    <section appProp="project" id="app-project">
        <?php echo $project; ?>
    </section>
    <div appProp="copy-right">© 2025 Naruenat Komoot</div>
</body>
</html>