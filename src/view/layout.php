<?php
    /**
     * layout view
     * @type class
     */
    class Layout_VIEW {
        /**
         * get head
         * @param bool $bootstrap = true
         * @param bool $jquery = true
         * @param array $css
         * @param array $js
         * @return void
         */
        public static function GetHead(bool $bootstrap = true, bool $jquery = true, array $css = array(), array $js = array()): void {
            echo join(
                separator: "",
                array: array_map(
                    callback: fn($getLib) => (
                        ($getLib->type ?? null) === "css"
                        ? (
                            ($getLib->id ?? null) === "bootstrap_css"
                            ? '<link rel="stylesheet" href="/lib/bootstrap/css/'.($getLib->name ?? '').'" '.(($getLib->integrity ?? null) !== null ? 'integrity="'.($getLib->integrity).'"' : '').' '.(($getLib->crossOrigin ?? null) !== null ? 'crossorigin="anonymous"' : '').'/>'
                            : '<link rel="stylesheet" href="/lib/css/'.($getLib->name ?? '').'" media="'.(($getLib->media ?? null) !== null ? $getLib->media : '').'">'
                        )
                        : (
                            ($getLib->type ?? null) === "js"
                            ? (
                                ($getLib->id ?? null) === "boostrap_js"
                                ? '<script src="/lib/bootstrap/js/'.($getLib->name ?? '').'" '.(($getLib->integrity ?? null) !== null ? 'integrity="'.($getLib->integrity).'"' : '').' '.(($getLib->crossOrigin ?? null) !== null ? 'crossorigin="anonymous"' : '').'></script>'
                                : (
                                    ($getLib->id ?? null) === "jquery"
                                    ? '<script src="/lib/jquery/'.($getLib->name ?? '').'"></script>'
                                    : '<script src="/lib/js/'.($getLib->name ?? '').'"></script>'
                                )
                            )
                            : ''
                        )
                    ),
                    array: Application_MODEL::HTML_HEAD->Value()(bootstrap: $bootstrap, jquery: $jquery, css: $css, js: $js)
                )
            );
        }
        /**
         * getting html head title
         * @param ?string $title
         * @return void
         */
        public static function GetHeadTitle(?string $title): void {
            echo "<title>".(Application_CONTROLLER::GetTitle(title: $title))."</title>";
        }
        /**
         * getting header->menu
         * @return void
         */
        public static function GetHeader(): void {
            echo (
                '<nav class="navbar navbar-expand-lg navbar-dark sticky-top">'.
                '<div class="container-fluid">'.
                '<a appProp="header-name" class="navbar-brand fs-2" href="/">'.
                Application_MODEL::HTML_MENU->Value()["name"].
                '</a>'.
                '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#appMenuDrop" aria-controls="appMenuDrop" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>'.
                '<div class="collapse navbar-collapse" id="appMenuDrop">'.
                '<ul class="navbar-nav ms-auto">'.
                join(
                    separator: "",
                    array: array_map(
                        callback: fn($getMenu) => (
                            '<li appProp="header-menu" class="nav-item"><a class="nav-link fs-4" href="'.($getMenu->link).'">'.($getMenu->name).'</a></li>'
                        ),
                        array: Application_MODEL::HTML_MENU->Value()["link"]
                    )
                ).
                '</ul>'.
                '</div>'.
                '</div>'.
                '</nav>'
            );
        }
    }
?>