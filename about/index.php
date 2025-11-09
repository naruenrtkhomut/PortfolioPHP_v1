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
        array("name" => "application-root.css"),
        array("name" => "about.css")
    ), js: array());
    ?>
    <title>About</title>
</head>

<body>
    <section app="about-project-view" id="about-project-view" class="visually-hidden">
        <div style="overflow: scroll; max-height: 100vh;">
            <h1 class="w-100 text-center display-2" id="about-project-view-name"></h1>
            <div class="w-100 row justify-content-center gap-2" id="about-project-view-svg"></div>
            <h2 class="display-4 text-center mt-3">Flow chart</h2>
            <div class="w-100 mt-3 border border-1 p-2" id="about-project-view-flowchart"></div>
            <div class="d-flex mt-2 border border-1 p-1">
                <button class="btn btn-lg btn-outline-light mt-1 me-3 ms-auto px-2" onclick="document.getElementById('about-project-view').classList.add('visually-hidden');">Close</button>
            </div>
        </div>
    </section>

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
            <h1 app="about-05-name" class="ms-3 ms-md-0">Educations</h1>
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


    <script>
        /**
         * show project view
         * @param {string} name
         * @param {string[]} images
         * @param {string} flowchart
         */
        const ShowProjectView = (name, images, flowchart) => {
            document.getElementById('about-project-view').classList.remove('visually-hidden');
            document.getElementById('about-project-view-name').innerText = name;
            document.getElementById('about-project-view-svg').innerHTML = "";
            document.getElementById('about-project-view-flowchart').innerHTML = '';
            images.forEach(getImage => {
                let image = document.createElement('img');
                image.classList.add("col-1");
                image.classList.add("border");
                image.classList.add("border-1");
                image.classList.add("w-auto");
                //image.classList.add("col-lg-1");
                image.src = `/lib/image/tech-skill/${getImage}`;
                if (window.screen.width >= 1024) {
                    image.setAttribute('height', '100vh');
                }
                else {
                    image.setAttribute('height', '50vh');
                }
                image.setAttribute('width', '100%');
                document.getElementById('about-project-view-svg').appendChild(image);
            });
            if (flowchart !== "") {
                let flowchartImg = document.createElement('img');
                flowchartImg.setAttribute('width', '100%');
                flowchartImg.src = `/lib/image/project-flowchart/${flowchart}`;
                document.getElementById('about-project-view-flowchart').appendChild(flowchartImg);
            }
        }
    </script>
</body>

</html>