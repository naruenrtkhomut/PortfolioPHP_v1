<?php
    class Index_VIEW {
        /**
         * getting name
         * @return void
         */
        public static function GetName(): void {
            echo '<div class="w-100 ps-5 display-1" app="content-name">'.(Application_CONTROLLER::GetName()).'</div>';
        }
        /**
         * getting brief
         * @return void
         */
        public static function GetBrief(): void {
            echo join(
                separator: "",
                array: array_map(
                    callback: fn($getData) => '<div class="px-1 ps-md-5" app="content-brief">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.($getData).'</div>',
                    array: Application_CONTROLLER::GetBrief()
                ) 
            );
        }
        /**
         * getting contact
         * @return void
         */
        public static function GetBriefContact(): void {
            echo join(
                separator: "",
                array: array_map(
                    callback: fn($getData) => '<img src="/lib/image/contact/'.($getData->svg ?? "").'" height="100vh" title="'.($getData->title ?? "default").'" '.(($getData->link ?? null) !== null ? 'onClick="window.location.assign(\''.($getData->link).'\')"' : '').'/>',
                    array: array_filter(
                        callback: fn($getFilter) => in_array(needle: $getFilter->name ?? null, haystack: array("GMAIL", "GITHUB", "LINKEDIN")),
                        array: Application_CONTROLLER::GetContact()
                    )
                )
            );
        }
        /**
         * getting work name
         * @return void
         */
        public static function GetWorkName(): void {
            echo '<h1 app="content-workname" class="display-1 w-100 text-center mt-5">'.(Application_CONTROLLER::GetWork()->name).'</h1>';
        }
        /**
         * getting experience year
         * @return void
         */
        public static function GetExperienceYear(): void {
            echo '<h1 class="display-1 text-center">Experience: '.(Personal_MODEL::WORK->Value()->yearDiff ?? 0).' years+</h1>';
        }
        /**
         * getting brief skill
         * @param ?string $type
         * @return void
         */
        public static function GetBriefSkill(?string $type): void {
            echo '<div class="row d-md-flex justify-content-center mt-2">'.
                join(
                    separator: "",
                    array: array_map(
                        callback: fn($getMap) => '<img class="col-4" src="/lib/image/tech-skill/'.($getMap->svg ?? '').'" height="100vh" title="'.($getMap->name ?? '').'"/>',
                        array: array_filter(
                            callback: fn($getFilter) => ($type ?? ($getFilter->type ?? null)) === ($getFilter->type ?? null),
                            array: Personal_MODEL::SKILL->Value()
                        )
                    )
                ).
                '</div>';
        }
    }
?>