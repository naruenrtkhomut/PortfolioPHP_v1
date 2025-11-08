<?php
    class Skill_VIEW {
        /**
         * getting soft skill
         * @return void
         */
        public static function GetSoftSkill(): void {
            echo join(
                separator: "",
                array: array_map(
                    callback: fn($getData) => '<li>'.($getData).'</li>',
                    array: Application_CONTROLLER::GetSoftSkill()
                )
            );
        }
        /**
         * getting skill
         * @return void
         */
        public static function GetHardSkill(): void {
            echo join(
                separator: "",
                array: array_map(
                    callback: fn($getType) => (
                        '<div class="vstack gap-2">'.
                        '<h1 class="display-4">'.($getType).'</h1>'.
                        '<div class="row w-100">'.
                        join(
                            separator: "",
                            array: array_map(
                                callback: fn($getMap) => (
                                    '<div class="vstack col-3 border border-1 p-3 w-auto">'.
                                    '<img src="/lib/image/tech-skill/'.($getMap->svg).'" height="100vh" />'.
                                    '<p class="text-center fs-2">'.($getMap->name).'</p>'.
                                    '</div>'
                                ),
                                array: array_filter(
                                    callback: fn($getFilter) => $getFilter->type === $getType,
                                    array: Application_CONTROLLER::GetSkill()
                                )
                            )
                        ).
                        '</div>'.
                        '</div>'
                    ),
                    array: array_unique(
                        array: array_map(
                            callback: fn($getUn) => $getUn->type ?? "",
                            array: Application_CONTROLLER::GetSkill()
                        )
                    )
                )
            );
        }
    }
?>