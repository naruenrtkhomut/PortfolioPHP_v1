<?php
    
    /**
     * default interface
     * @name interface
     */
    interface EnumInterface {
        /**
         * getting name of default interface
         * @return string
         */
        public function Name(): string;
        /**
         * getting value of default interface
         * @return mixed
         */
        public function Value(): mixed;
    }


    /**
     * database enum config
     * @name enum
     */
    enum DatabaseEnum implements EnumInterface {
        /** database enum cases */
        case HOST;
        case NAME;
        case USER;
        case PASS;
        case PORT;
        
        /**
         * getting name of database
         * @return string
         */
        public function Name(): string
        {
            return $this->name;
        }

        /**
         * getting value of database
         * @return mixed
         */
        public function Value(): mixed
        {
            return match($this) {
                self::HOST => fn(string $dbType) => $this->GetDatabaseConfig(dbType: $dbType),
                self::NAME => fn(string $dbType) => $this->GetDatabaseConfig(dbType: $dbType),
                self::USER => fn(string $dbType) => $this->GetDatabaseConfig(dbType: $dbType),
                self::PASS => fn(string $dbType) => $this->GetDatabaseConfig(dbType: $dbType)
            };
        }

        /**
         * getting database config
         * @param string $dbType
         * @return mixed
         */
        private function GetDatabaseConfig(string $dbType): mixed {
            $getDatabase = array("HOST" => "localhost", "NAME" => "db_portfolio", "USER" => "admin", "PASS" => "TEST001", "PORT" => 1);
            switch ($dbType) {
                case "MYSQL":
                    {
                        $getDatabase["HOST"] = "localhost";
                        $getDatabase["NAME"] = "db_portfolio";
                        $getDatabase["USER"] = "root";
                        $getDatabase["PASS"] = "TEST001";
                        $getDatabase["PORT"] = 3306;
                    }
                    break;
                case "POSTGESQL":
                    {
                        $getDatabase["HOST"] = "localhost";
                        $getDatabase["NAME"] = "db_portfolio";
                        $getDatabase["USER"] = "admin";
                        $getDatabase["PASS"] = "TEST1234";
                        $getDatabase["PORT"] = 5432;
                    }
                    break;
                case "MSSQL":
                    {
                        $getDatabase["HOST"] = "localhost";
                        $getDatabase["NAME"] = "db_portfolio";
                        $getDatabase["USER"] = "sa";
                        $getDatabase["PASS"] = "TEST@001";
                        $getDatabase["PORT"] = 1433;
                    }
                    break;
                case "MONGO":
                    {
                        $getDatabase["HOST"] = "localhost";
                        $getDatabase["NAME"] = "db_portfolio";
                        $getDatabase["USER"] = "admin";
                        $getDatabase["PASS"] = "TEST1234";
                        $getDatabase["PORT"] = 27017;
                    }
                    break;
            }
            return match($this) {
                self::HOST => $getDatabase["HOST"],
                self::NAME => $getDatabase["NAME"],
                self::USER => $getDatabase["USER"],
                self::PASS => $getDatabase["PASS"],
                self::PORT => $getDatabase["PORT"]
            };
        }
    }

    /**
     * page head enum config
     * @name enum
     */
    enum PageHeadEnum implements EnumInterface {
        /** page library version */
        case VERSION;
        case BOOTSTRAP;
        case JQUERY;
        case TITLE;
        case HEADER;

        /**
         * getting name of page library
         * @return string
         */
        public function Name(): string
        {
            return match($this) {
                self::VERSION => $this->name,
                self::BOOTSTRAP => $this->name,
                self::JQUERY => $this->name,
                self::TITLE => $this->name,
                self::HEADER => $this->name
            };
        }

        /**
         * getting value of page library
         * @return mixed
         */
        public function Value(): mixed
        {
            return match($this) {
                self::VERSION => "v-01",
                self::BOOTSTRAP => array(
                    "CSS" => array(
                        "href" => "bootstrap-5.3.8-dist/css/bootstrap.min.css",
                        "integrity" => "sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
                    ),
                    "JS" => array(
                        "src" => "bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js",
                        "integrity" => "sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
                    )
                ),
                self::JQUERY => "jQuery/jquery-3.7.1.min.js",
                self::TITLE => array(
                    "1" => "Naruenat Komoot"
                ),
                self::HEADER => array(
                    "HOME" => array(
                        "name" => "Naruenat.K",
                        "link" => "/"
                    ),
                    "MENU" => array(
                        array(
                            "name" => "Home",
                            "link" => "/"
                        ),
                        array(
                            "name" => "About",
                            "link" => "/about"
                        ),
                        array(
                            "name" => "Project",
                            "link" => "/project"
                        ),
                        array(
                            "name" => "Contact",
                            "link" => "/contact"
                        )
                    )
                )
            };
        }
    }


    /**
     * person content enum
     * @name enum
     */
    enum PersonContentEnum implements EnumInterface {
        /** person content cases */
        case NAME;
        case ABOUT;
        case CONTACT;
        case PROJECT;
        case WORK;
        case EDUCATION;

        /**
         * getting name of person content
         * @return string
         */
        public function Name(): string
        {
            return $this->name;
        }

        /**
         * getting value of person content
         * @return mixed 
         */
        public function Value(): mixed
        {
            return match($this) {
                self::NAME => "Naruenat Komoot",
                self::ABOUT => array(
                    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to my personal website! I'm Naruenat Komoot, a passionate developer and tech enthusiast. Here, you'll find information about my projects, skills, and experiences. Feel free to explore and connect with me!",
                    "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I'm a developer with a passion for creating innovative solutions. My expertise lies in web development, and I'm always eager to learn new technologies."
                ),
                self::CONTACT => fn(string $contact) => (
                    $contact === "GMAIL"
                    ? array(
                        "name" => "Gmail",
                        "email" => "naruenartkhomut00@gmail.com",
                        "title" => "naruenartkhomut00@gmail.com"
                    )
                    : (
                        $contact === "GITHUB"
                        ? array(
                            "name" => "Git hub",
                            "link" => "https://github.com/naruenrtkhomut",
                            "title" => "https://github.com/naruenrtkhomut"
                        )
                        : (
                            $contact === "LINKEDIN"
                            ? array(
                                "name" => "Linkedin",
                                "link" => "https://www.linkedin.com/in/naruenat-komoot-8b672b1a6",
                                "title" => "https://www.linkedin.com/in/naruenat-komoot-8b672b1a6"
                            )
                            : array()
                        )
                    )
                ),
                self::PROJECT => array(
                    array(
                        "index" => "01",
                        "name" => "Camera tracking system",
                        "svg" => array(
                            "01-cs.svg",
                            "06-asp-net.svg",
                            "07-angular.svg",
                            "14-html.svg",
                            "12-bootstrap.svg",
                            "15-jquery.svg",
                            "19-mssql.svg",
                            "21-window-server.svg",
                            "28-nginx.svg"
                        ),
                        "description" => array(
                            "Track camera location.",
                            "Read image from camera."
                        )
                    ),
                    array(
                        "index" => "02",
                        "name" => "Car's license plate recorder",
                        "svg" => array(
                            "01-cs.svg",
                            "06-asp-net.svg",
                            "07-angular.svg",
                            "14-html.svg",
                            "12-bootstrap.svg",
                            "15-jquery.svg",
                            "19-mssql.svg",
                            "21-window-server.svg",
                            "28-nginx.svg"
                        ),
                        "description" => array(
                            "Summary vehicle data in dialy, weekly, and monthly.",
                            "Summary vehicle by camera."
                        )
                    ),
                    array(
                        "index" => "03",
                        "name" => "Employee work record",
                        "svg" => array(
                            "01-cs.svg",
                            "06-asp-net.svg",
                            "07-angular.svg",
                            "14-html.svg",
                            "12-bootstrap.svg",
                            "15-jquery.svg",
                            "18-mysql.svg",
                            "21-window-server.svg",
                            "28-nginx.svg"
                        ),
                        "description" => array(
                            "Employee's work record description.",
                            "Employee's work history."
                        )
                    ),
                    array(
                        "index" => "04",
                        "name" => "Failure analysis report finder",
                        "svg" => array(
                            "01-cs.svg"
                        ),
                        "description" => array(
                            "For looking test report easier.",
                            "For classify test report data by failure case."
                        )
                    ),
                    array(
                        "index" => "05",
                        "name" => "Electronic circuit analysis",
                        "svg" => array(
                            "04-python.svg",
                            "08-flask.svg",
                            "14-html.svg",
                            "15-jquery.svg",
                            "12-bootstrap.svg",
                            "20-postgresql.svg"
                        ),
                        "description" => array(
                            "Verify electronic's cirbuit.",
                            "For analyzing electronic's values."
                        )
                    ),
                    array(
                        "index" => "06",
                        "name" => "Auto Failure Analysis system (FA PAS)",
                        "svg" => array(
                            "01-cs.svg",
                            "03-php.svg",
                            "06-asp-net.svg",
                            "18-mysql.svg",
                            "11-react.svg",
                            "12-bootstrap.svg",
                            "15-jquery.svg",
                            "27-apache.svg"
                        ),
                        "description" => array(
                            "For classify failure analysis of test data.",
                            "For automation of analyze for production line.",
                            "For tracking failure's unit from production in real time.",
                            "For reducing task work of production engineer."
                        )
                    ),
                    array(
                        "index" => "07",
                        "name" => "Screw recording",
                        "svg" => array(
                            "03-php.svg",
                            "19-mssql.svg",
                            "01-cs.svg"
                        ),
                        "description" => array(
                            "For record screw's type when fill screw in production.",
                            "For tracking and classify screw's type."
                        )
                    ),
                    array(
                        "index" => "08",
                        "name" => "Fixture real time tracking",
                        "svg" => array(
                            "03-php.svg",
                            "19-mssql.svg",
                            "01-cs.svg"
                        ),
                        "description" => array(
                            "For tracking fixture using in production.",
                            "For tracking fixture loos in production."
                        )
                    ),
                    array(
                        "index" => "09",
                        "name" => "TE interface and pallet live status",
                        "svg" => array(
                            "02-node.svg",
                            "10-nextjs.svg",
                            "19-mssql.svg",
                            "21-window-server.svg",
                            "28-nginx.svg"
                        ),
                        "description" => array(
                            "For tracking test machine in production.",
                            "For tracking data of machine's failure.",
                            "For making test naching in live system."
                        )
                    ),
                    array(
                        "index" => "10",
                        "name" => "Machine monitoring to maintan status",
                        "svg" => array(
                            "06-asp-net.svg",
                            "19-mssql.svg",
                            "21-window-server.svg",
                            "12-bootstrap.svg",
                            "15-jquery.svg"
                        ),
                        "description" => array(
                            "For tracking test machine in production.",
                            "For tracking and mataining software in test machine.",
                            "For summarizing data of test machine."
                        )
                    )
                ),
                self::WORK => array(
                    "current" => "Full Stack Developer",
                    "description" => array(
                        "Develop and maintain backend applications using ASP.NET(C#), Python(Flask), JavaScript(ExpressJS, NextJS), and PHP(laravel).",
                        "Build responsive and scalable frontend applications using TypeScript(Angular, React, NextJS), HTML, BootStrap, and jQuery.",
                        "Build and maintain databases using Microsoft SQL Server, MySQL, SQLite, MongoDB, and PostgreSQL.",
                        "Develop and integrate REST APIs with authentication.",
                        "Troubleshoot, debug, and optimize performance in production environments.",
                        "Solve technical problems of high scope and complexity.",
                        "Write clean, scalable, and efficient code.",
                        "Updated new technologies and best practices."
                    ),
                    "data" => array(
                        array(
                            "name" => "Full Stack Developer",
                            "company" => "Delta Electronics Thailand",
                            "date" => array(
                                "start" => new DateTime("2021-08-02"),
                                "stop" => new DateTime('now')
                            ),
                            "description" => array(
                                "Innovated new system for improving production.",
                                "Developed auto analysis system for Failure on production report. (C#, MySQL, PHP, HTML, CSS and JavaScript).",
                                "Developed production fixture tracking in current using. (C#, SQL Server, PHP, HTML, CSS and JavaScript).",
                                "Developed auto analysis and pallet issue tracking.",
                                "Developed auto analysis on production report for looking any issue of product. (C#, Python).",
                                "Developed auto tracking report for failure analysis program. (C#, MySQL, HTML, CSS and JavaScript).",
                                "Developed auto search SN report data. (Power shell, C#).",
                                "Developed auto analysis electronic circuit and circuit value calculating. (Python, YOLO, OpenCV, HTML, CSS and JavaScript)."
                            )
                        ),
                        array(
                            "name" => "Programmer",
                            "company" => "PPA Innovation",
                            "date" => array(
                                "start" => new DateTime("2020-05-05"),
                                "stop" => new DateTime("2021-08-02")
                            ),
                            "description" => array(
                                "Developed software as requirement from customer.",
                                "Developed software for tracking cameras on google map. (AngularJS, C#, CSS and JavaScript, MySQL).",
                                "Developed web application for tracking employee’s work. (C#, OpenCV).",
                                "Developed web application for tracking car’s license plate on dashboard and locate. (NodeJS, HTML, CSS and JavaScript).",
                                "Developed web application for recording employee work sheet. (AngularJS, C#, CSS and JavaScript).",
                                "Developed window application for depressing camera’s image data. (C++, OpenCV)."
                            )
                        ),
                        array(
                            "name" => "Failure Analysis Engineer",
                            "company" => "Delta Electronics Thailand",
                            "date" => array(
                                "start" => new DateTime("2017-06-21"),
                                "stop" => new DateTime("2020-03-31")
                            ),
                            "description" => array(
                                "Analyzed and solved production problems.",
                                "Improved productivity of production.",
                                "Reduced cost of failure units."
                            )
                        )
                    )
                ),
                self::EDUCATION => array(
                    array(
                        "name" => "Master of Information Technology",
                        "gpa" => 3.39,
                        "research" => "An Analysis of Electronic Circuits Diagram Using Computer Vision Techniques",
                        "description" => array(
                            "Learned about computer networking as admin config.",
                            "Learned about develop and create AI.",
                            "Learned about object detection.",
                            "Learned about image processing.",
                            "Learned about data analysis and data structure.",
                            "Learned about user interactive (UX/UI)."
                        )
                    ),
                    array(
                        "name" => "Bachelor of Electronic and Telecommunication Engineering",
                        "research" => "TV digital antenna",
                        "gpa" => 2.79,
                        "description" => array(
                            "Learned about basic engineering.",
                            "Learned about network and telecommunication.",
                            "Learned about electronic analysis.",
                            "Learned about programming C#.",
                            "Learned about programming in micro controller.",
                            "Learned about embedded system."
                        )
                    )
                )
            };
        }
    }
?>