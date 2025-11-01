<?php
    /** include libs */
    include_once "src/model/enum-config.php";
    include_once "src/view/page-libraries.php";
    include_once "src/view/page-content.php";

    $libVersion = PageLibrary_VW::GetVersion();
    $libBootstrapCSS = PageLibrary_VW::GetBootstrapCSS();
    $libBootstrapJS = PageLibrary_VW::GetBootstrapJS();
    $libJQuery = PageLibrary_VW::GetJQuery();
    $title = PageLibrary_VW::GetTitle()["1"];
    $pageMenu = PageLibrary_VW::GetHeader();

    $aboutName = PageContent_VW::GetName();
    $about = PageContent_VW::GetAbout();
    $contactGmail = PageContent_VW::GetContact(contact: "GMAIL");
    $contactGithub = PageContent_VW::GetContact(contact: "GITHUB");
    $contactLinkedin = PageContent_VW::GetContact(contact: "LINKEDIN");
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
    <link rel="stylesheet" href="/public/lib/css/<?php echo $libVersion; ?>/index-min-1400px.css" media="screen and (min-width: 1400.00px)">
    <title><?php echo $title; ?></title>
</head>
<body>
    <section appProp="header">
        <?php echo $pageMenu; ?>
    </section>
    <section appProp="content">
        <section appProp="content-detail">
            <section appProp="content-detail-about">
                <h1 appProp="content-detail-about-name"><?php echo $aboutName; ?></h1>
                <?php
                    echo join(
                        separator: "",
                        array: array_map(
                            callback: fn($getAbout) => '<div appProp="content-detail-about-text">'.($getAbout).'</div>',
                            array: $about
                        )
                    );
                ?>
                <div appProp="content-detail-about-link">
                    <div appProp="content-detail-about-link-button">
                        <button class="btn btn-danger">Learn More About Me</button>
                        <button class="btn btn-outline-light">Resume</button>
                    </div>
                    <div appProp="content-detail-about-link-svg">
                        <?php
                            if (($contactGmail["name"] ?? null) !== null) {
                                echo "<a title=\"".($contactGmail["title"])."\"><img src=\"/public/image/gmail.svg\" height=\"100%\"/></a>";
                            }
                            if (($contactLinkedin["name"] ?? null) !== null) {
                                echo "<a href=\"".($contactLinkedin["link"])."\" title=\"".($contactLinkedin["title"])."\"><img src=\"/public/image/linkedin.svg\" height=\"100%\"/></a>";
                            }
                            if (($contactGithub["name"] ?? null) !== null) {
                                echo "<a href=\"".($contactGithub["link"])."\" title=\"".($contactGithub["title"])."\"><img src=\"/public/image/github.svg\" height=\"100%\"/></a>";
                            }
                        ?>
                    </div>
                </div>
            </section>
            <section appProp="project">
                <?php echo PageContent_VW::GetProject_PageIndex(); ?>
            </section>
            <section appProp="skill">
                <h2 appProp="skill-name">Tech skill(scroll down)</h2>
                <div appProp="skill-svg">
                    <?php
                        echo PageContent_VW::GetTechSkills(path: "public/image/tech-skills/");
                    ?>
                </div>
            </section>
        </section>
        <section appProp="content-image"></section>
    </section>
    <div appProp="copy-right">© 2025 Naruenat Komoot</div>
</body>
</html>