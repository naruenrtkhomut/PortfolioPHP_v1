<?php
    class About_VIEW {
        /**
         * getting work name
         * @return void
         */
        public static function GetWorkName(): void {
            echo '<h1 app="about-01-workname">'.(Application_CONTROLLER::GetWork()->name ?? '').'</h1>';
        }
        /**
         * getting work year experience
         * @return void
         */
        public static function GetExperienceYearDiff(): void {
            echo '<p app="about-01-eyear">Experience of my work: '.(Application_CONTROLLER::GetWork()->yearDiff ?? 0).' years+</p>';
        }
        /**
         * getting work description
         * @return void
         */
        public static function GetWorkDescription(): void {
            echo '<ul app="about-01-description">'.
                join(
                    separator: "",
                    array: array_map(
                        callback: fn($getData) => '<li>'.($getData).'</li>',
                        array: Application_CONTROLLER::GetWork()->descriptions ?? array()
                    )
                ).
                '</ul>';
        }
        /**
         * getting skill svg
         * @return void
         */
        public static function GetSkillSVGs(): void {
            echo '<div class="container-fluid mt-3"><div class="row">'.
                join(
                    separator: "",
                    array: array_map(
                        callback: fn($getData) => '<img class="col-4 col-md-2 col-xxl-1" src="/lib/image/tech-skill/'.($getData->svg ?? '').'" title="'.($getData->name ?? '').'" height="100vh"/>',
                        array: Application_CONTROLLER::GetSkill()
                    )
                ).
                '</div></div>';
        }
        /**
         * getting experience
         * @return void
         */
        public static function GetExperience(): void {
            echo '<div>'.
                join(
                    separator: "",
                    array: array_map(
                        callback: fn($getData) => (
                            '<div app="about-02-workname">'.($getData->name).'</div>'.
                            '<div app="about-02-date">'.(
                                ($getData->startDate->format("Y-m-d") === new DateTime(datetime: 'now')->format('Y-m-d') ? 'Present' : $getData->startDate->format("Y-m-d")).
                                ' - '.
                                ($getData->stopDate->format("Y-m-d") === new DateTime(datetime: 'now')->format('Y-m-d') ? 'Present' : $getData->stopDate->format("Y-m-d"))
                            ).'</div>'.
                            '<div app="about-02-company">'.($getData->company).'</div>'.
                            (
                                '<ul>'.
                                join(
                                    separator: "",
                                    array: array_map(
                                        callback: fn($getDes) => '<li>'.($getDes).'</li>',
                                        array: $getData->descriptions 
                                    )
                                ).
                                '</ul>'
                            )
                        ),
                        array: Application_CONTROLLER::GetExperience()
                    )
                ).
                '</div>';
        }
        /**
         * getting project
         * @return void
         */
        public static function GetProject(): void {
            echo join(
                    separator: "",
                    array: array_map(
                        callback: fn($getData) => (
                            '<div app="about-0311" class="border border-1">'.
                            ('<p class="fs-2 mt-4">'.($getData->name ?? '').'</p>').
                            (
                                '<div class="w-100 row justify-content-center gap-2 my-3">'.
                                join(
                                    separator: "",
                                    array: array_map(
                                        callback: fn($getSVG) => (
                                            '<img class="col-2" src="/lib/image/tech-skill/'.($getSVG).'" height="40vh"/>'
                                        ),
                                        array: $getData->images
                                    )
                                ).
                                '</div>'
                            ).
                            (
                                '<ul>'.
                                join(
                                    separator: "",
                                    array: array_map(
                                        callback: fn($getDes) => '<li>'.($getDes).'</li>',
                                        array: $getData->descriptions
                                    )
                                ).
                                '</ul>'
                            ).
                            (
                                '<div class="d-flex justify-content-center mb-4">'.
                                '<button onclick="window.location.assign(\'/project?id='.($getData->id).'\')" class="btn btn-lg btn-outline-light w-75">View</button>'.
                                '</div>'
                            ).
                            '</div>'
                        ),
                        array: Application_CONTROLLER::GetProject()
                    )
                );
        }
        /**
         * getting certifications
         * @return void
         */
        public static function GetCertifications(): void {
            echo '<div app="about-041">'.
                join(
                    separator: "",
                    array: array_map(
                        callback: fn($getData) => (
                            '<div class="border border-1 d-grid pb-5" onclick="window.open(\''.($getData->link).'\', \'_blank\');">'.
                            '<p>'.($getData->name ?? "").'</p>'.
                            '<img class="m-auto" src="/lib/image/certificattion/'.($getData->image ?? "").'" width="90%"/>'.
                            '</div>'
                        ),
                        array: Personal_MODEL::CERTIFICATION->Value()
                    )
                ).
                '</div>';
        }
    }
?>