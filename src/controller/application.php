<?php
    class Application_CONTROLLER {
        /**
         * getting html head
         * @param bool $bootstrap
         * @param bool $jquery
         * @param array $css
         * @param array $js
         * @return array
         */
        public static function GetHead(bool $bootstrap = true, bool $jquery = true, array $css, array $js): array {
            return Application_MODEL::HTML_HEAD->Value()(boostrap: $bootstrap, jquery: $jquery, css: $css, js: $js);
        }
        /**
         * getting html head title
         * @param ?string $title
         * @return string
         */
        public static function GetTitle(?string $title): string {
            return $title === null
            ? Application_MODEL::TITLE->Value()
            : $title;
        }
        /**
         * getting name
         * @return string
         */
        public static function GetName(): string {
            return Personal_MODEL::NAME->Value();
        }
        /**
         * getting brief
         * @return array
         */
        public static function GetBrief(): array {
            return Personal_MODEL::BRIEF->Value();
        }
        /**
         * getting contact
         * @return array
         */
        public static function GetContact(): array {
            return Personal_MODEL::CONTACT->Value();
        }
        /**
         * getting woek
         * @return PersonalWork_MODEL
         */
        public static function GetWork(): PersonalWork_MODEL {
            return Personal_MODEL::WORK->Value();
        }
        /**
         * getting skill
         * @return array
         */
        public static function GetSkill(): array {
            return Personal_MODEL::SKILL->Value();
        }
        /**
         * getting experience
         * @return array
         */
        public static function GetExperience(): array {
            return Personal_MODEL::EXPERIENCE->Value();
        }
        /**
         * getting project
         * @return array
         */
        public static function GetProject(): array {
            return Personal_MODEL::PROJECT->Value();
        }
        /**
         * getting project brief
         * @return string
         */
        public static function GetProjectBrief(): string {
            return Personal_MODEL::PROJECT_BRIEF->Value();
        }
        /**
         * getting certification
         * @return array
         */
        public static function GetCertification(): array {
            return Personal_MODEL::CERTIFICATION->Value();
        }
    }
?>