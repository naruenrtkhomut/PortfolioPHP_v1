<?php
    class PageLibrary_VW {
        /**
         * getting lib version
         * @return string
         */
        public static function GetVersion(): string {
            return PageHeadEnum::VERSION->Value();
        }

        /**
         * getting bootstrap css
         * @return array
         */
        public static function GetBootstrapCSS(): array {
            return PageHeadEnum::BOOTSTRAP->Value()["CSS"];
        }

        /**
         * getting bootstrap js
         * @return array
         */
        public static function GetBootstrapJS(): array {
            return PageHeadEnum::BOOTSTRAP->Value()["JS"];
        }

        /**
         * getting jquery
         * @return string
         */
        public static function GetJQuery(): string {
            return PageHeadEnum::JQUERY->Value();
        }

        /**
         * getting page title
         * @return array
         */
        public static function GetTitle(): array {
            return PageHeadEnum::TITLE->Value();
        }

        /**
         * getting page header
         * @return string
         */
        public static function GetHeader(): string {
            $data = (
                '<nav class="navbar navbar-expand-lg">'.
                '<div class="container-fluid">'.
                (
                    '<a appProp="header-name" class="navbar-brand fs-2" href="/">'.
                    PageHeadEnum::HEADER->Value()["HOME"]["name"].
                    '</a>'
                ).
                '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#appMenuDrop" aria-controls="appMenuDrop" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>'.
                '<div class="collapse navbar-collapse" id="appMenuDrop">'.
                '<ul class="navbar-nav ms-auto">'.
                join(
                    separator: "", 
                    array: array_map(
                        callback: fn($getData) => '<li appProp="header-menu" class="nav-item"><a class="nav-link fs-4" href="'.($getData["link"]).'">'.($getData["name"]).'</a></li>', 
                        array: PageHeadEnum::HEADER->Value()["MENU"]
                    )
                ).
                '</ul>'.
                '</div>'.
                '</div>'.
                '</nav>'
            );


            return $data;
        }
    }
?>