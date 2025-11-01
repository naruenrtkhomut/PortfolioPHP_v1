<?php
    class PageContent_VW {
        /**
         * getting name of content
         * @return string
         */
        public static function GetName(): string {
            return PersonContentEnum::NAME->Value();
        }

        /**
         * getting about
         * @return array
         */
        public static function GetAbout(): array {
            return PersonContentEnum::ABOUT->Value();
        }

        /**
         * getting about contact
         * @param string $contact
         * @return array
         */
        public static function GetContact(string $contact): array {
            return PersonContentEnum::CONTACT->Value()(contact: $contact);
        }

        /**
         * getting tech skill from path
         * @param string $path
         * @return string
         */
        public static function GetTechSkills(string $path): string {
            return (
                is_dir(filename: $path)
                ? join(
                    separator: "",
                    array: array_map(
                        callback: fn($getSVG) => '<img src="/public/image/tech-skills/'.($getSVG).'" height="100vh"/>',
                        array: array_filter(
                            array: scandir(directory: $path),
                            callback: fn($getFilter) => pathinfo(path: $getFilter, flags: PATHINFO_EXTENSION) === "svg"
                        )
                    )
                )
                : ""
            );
        }

        /**
         * getting project
         * @return string
         */
        public static function GetProject_PageIndex(): string {
            return join(
                separator: "",
                array: array_map(
                    callback: fn($getData) => (
                        "<div appProp=\"project-block\">".
                        "<a href=\"/project/".($getData["index"])."\">".
                        (
                            "<h1>".($getData["name"])."</h1>"
                        ).
                        (
                            "<div appProp=\"project-svg\">".
                            (
                                join(
                                    separator: "",
                                    array: array_map(
                                        callback: fn($getSVG) => "<img src=\"/public/image/tech-skills/".($getSVG)."\" height=\"100vh\"/>",
                                        array: $getData["svg"]
                                    )
                                )
                            ).
                            "</div>"
                        ).
                        "</a>".
                        "</div>"
                    ),
                    array: PersonContentEnum::PROJECT->Value()
                )
            );
        }

        /**
         * getting current position
         * @return array
         */
        public static function GetWork(): array {
            return PersonContentEnum::WORK->Value();
        }

        /**
         * getting project in about page
         * @return string
         */
        public static function GetProject_PageAbout(): string {
            return join(
                separator: "",
                array: array_map(
                    callback: fn($getData) => (
                        "<div appProp=\"project-block\">".
                        ("<h1>".$getData["name"]."</h1>").
                        "<div class=\"d-flex justify-content-center gap-3\">".
                        join(
                            separator: "",
                            array: array_map(
                                callback: fn($getSVG) => "<img src=\"/public/image/tech-skills/".($getSVG)."\" height=\"50vh\"/>",
                                array: $getData["svg"]
                            )
                        ).
                        "</div>".
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
                    array: PersonContentEnum::PROJECT->Value()
                )
            );
        }


        /**
         * getting project
         * @return array
         */
        public static function GetProject(): array {
            return PersonContentEnum::PROJECT->Value();
        }
    }
?>