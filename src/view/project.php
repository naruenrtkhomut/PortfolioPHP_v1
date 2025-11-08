<?php
    class Project_VIEW {
        /**
         * loading project
         * @param ?string $id
         * @return void
         */
        public static function LoadProject(?string $id): void {
            $getProject = array_find(
                callback: fn($getData) => $getData->id === $id,
                array: Application_CONTROLLER::GetProject()
            );
            if ($getProject !== null) {
                echo '<h1 class="w-100 text-center display-1">'.($getProject->name ?? "").'</h1>';
                echo '<div class="row justify-content-center my-3 w-100">'.
                    join(
                        separator: "",
                        array: array_map(
                            callback: fn($getSVG) => '<img class="col-3 col-lg-1" src="/lib/image/tech-skill/'.($getSVG).'" height="100vh"/>',
                            array: $getProject->images ?? array()
                        )
                    ).
                    '</div>';
                echo '<div class="w-100 p-1">'.
                    (
                        ($getProject->flowchart ?? null) !== null
                        ? '<img class="p-3" src="/lib/image/project-flowchart/'.($getProject->flowchart).'" width="100%"/>'
                        : ''
                    ).
                    '</div>';
                echo '<h2 class="display-3 w-100 text-center">Description</h2>';
                echo '<ul style="width: 97%; margin-left: 2.5%;">'.
                    join(
                        separator: "",
                        array: array_map(
                            callback: fn($getDescription) => '<li class="fs-1">'.($getDescription).'</li>',
                            array: $getProject->descriptions ?? array()
                        )
                    ).
                    '</ul>';
                return;
            }

            echo '<h1 class="w-100 text-center display-1 mt-5">Project not found</h1>'.
                '<div class="d-grid w-100">'.
                '<img class="m-auto" src="/lib/image/project-notfound.svg" width="30%"/>'.
                '</div>';
        }
    }
?>