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
    <link rel="stylesheet" href="/public/lib/css/<?php echo $libVersion; ?>/project-min-1400px.css" media="screen and (min-width: 1400.00px)">
    <title>Project</title>
</head>
<body>
    <section appProp="header">
        <?php echo $pageMenu; ?>
    </section>
    <section appProp="content">
        <?php
            echo join(
                separator: "",
                array: array_map(
                    callback: fn($getData) => (
                        "<div appProp=\"content-block\">".
                        "<h1>".($getData["name"])."</h1>".
                        (
                            "<div>".
                            (
                                join(
                                    separator: "",
                                    array: array_map(
                                        callback: fn($getSVG) => "<img src=\"/public/image/tech-skills/".($getSVG)."\" height=\"50vh\"/>",
                                        array: $getData["svg"]
                                    )
                                )
                            ).
                            "</div>"
                        ).
                        "<ul>".
                        join(
                            separator: "",
                            array: array_map(
                                callback: fn($getDes) => "<li>".($getDes)."</li>",
                                array: $getData["description"]
                            )
                        ).
                        "</ul>".
                        "</div>"
                    ),
                    array: PageContent_VW::GetProject()
                )
            );
        ?>
    </section>
    <div appProp="copy-right">© 2025 Naruenat Komoot</div>
</body>
</html>