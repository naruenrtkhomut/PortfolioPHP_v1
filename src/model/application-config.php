<?php
    /**
     * application interface
     * @type interface
     */
    interface Application_INTERFACE {
        /**
         * name
         * @return string
         */
        public function Name(): string;
        /**
         * value
         * @return mixed
         */
        public function Value(): mixed;
    } 
    /**
     * application model
     * @type enum
     */
    enum Application_MODEL implements Application_INTERFACE {
        /** database cases */
        case DATABASE;
        case VERSION;
        case TITLE;
        case HTML_HEAD;
        case HTML_MENU;
        /**
         * getting name of database model
         * @return string
         */
        public function Name(): string
        {
            return $this->name;
        }
        /**
         * getting value of database model
         * @return mixed
         */
        public function Value(): mixed
        {
            return match($this) {
                self::DATABASE => array(
                    "MYSQL" => new Database_MODEL(host: "127.0.0.1", name: "db_portfolio", user: "root", pass: "TEST001", port: 3306),
                    "MSSQL" => new Database_MODEL(host: "127.0.0.1", name: "db_portfolio", user: "sa", pass: "TEST@001", port: 1433),
                    "POSTGRESQL" => new Database_MODEL(host: "127.0.0.1", name: "db_portfolio", user: "admin", pass: "TEST1234", port: 5432),
                    "MONGODB" => new Database_MODEL(host: "127.0.0.1", name: "db_portfolio", user: "admin", pass: "TEST1234", port: 27017),
                ),
                self::VERSION => "251102",
                self::TITLE => "Naruenat Komoot",
                self::HTML_HEAD => fn(bool $bootstrap = true, bool $jquery = true, array $css = array(), array $js = array()) => array_merge(
                    $bootstrap === true ? array(
                        new HtmlLibrary_MODEL(
                            id: "bootstrap_css",
                            name: "bootstrap.min.css",
                            integrity: "sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB",
                            type: "css",
                            crossOrigin: "anonymous",
                            media: null
                        ),
                        new HtmlLibrary_MODEL(
                            id: "boostrap_js",
                            name: "bootstrap.bundle.min.js",
                            integrity: "sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI",
                            type: "js",
                            crossOrigin: "anonymous",
                            media: null
                        )
                    ) : array(),
                    $jquery === true ? array(
                        new HtmlLibrary_MODEL(
                            id: "jquery",
                            name: "jquery-3.7.1.min.js",
                            integrity: null,
                            type: "js",
                            crossOrigin: null,
                            media: null
                        )
                    ) : array(),
                    array_map(
                        callback: fn($getCSS) => new HtmlLibrary_MODEL(
                            id: "link",
                            name: $getCSS["name"] ?? null,
                            integrity: null,
                            type: "css",
                            crossOrigin: null,
                            media: $getCSS["media"] ?? null
                        ),
                        array: $css
                    ),
                    array_map(
                        callback: fn($getJS) => new HtmlLibrary_MODEL(
                            id: "script",
                            name: $getJS["name"] ?? null,
                            integrity: null,
                            type: "js",
                            crossOrigin: null,
                            media: null
                        ),
                        array: $js
                    )
                ),
                self::HTML_MENU => array(
                    "name" => "Naruenat.K",
                    "link" => array(
                        new HtmlHeader_MODEL(name: "Home", link: "/"),
                        new HtmlHeader_MODEL(name: "About", link: "/about"),
                        new HtmlHeader_MODEL(name: "Skill", link: "/skill")
                    )
                )
            };
        }
    }
    /**
     * personal model
     * @type enum
     */
    enum Personal_MODEL implements Application_INTERFACE {
        /** personal cases */
        case NAME;
        case BRIEF; 
        case WORK;
        case EXPERIENCE;
        case PROJECT;  
        case EDUCATION;
        case CONTACT; 
        case SKILL;   
        case PROJECT_BRIEF; 
        case CERTIFICATION;
        case SOFT_SKILL;
        /**
         * getting name of personal model
         * @return string
         */
        public function Name(): string
        {
            return $this->name;
        }
        /**
         * getting value of personal model
         * @return mixed
         */
        public function Value(): mixed
        {
            return match($this) {
                self::NAME => "Naruenat Komoot",
                self::BRIEF => array(
                    "Welcome to my personal website! I'm Naruenat Komoot, a passionate developer and tech enthusiast. Here, you'll find information about my projects, skills, and experiences. Feel free to explore and connect with me!",
                    "I'm a developer with a passion for creating innovative solutions. My expertise lies in Web application, window application, and I'm always eager to learn new technologies."
                ),
                self::WORK => new PersonalWork_MODEL(
                    name: "Full Stack Developer",
                    startDate: new DateTime(datetime: "2020-05-05"),
                    stopDate: new DateTime(datetime: "now"),
                    descriptions: array(
                        "Develop and maintain backend applications using ASP.NET(C#), Python(Flask), JavaScript(ExpressJS, NextJS), and PHP(laravel).",
                        "Build responsive and scalable frontend applications using TypeScript(Angular, React, NextJS), HTML, BootStrap, and jQuery.",
                        "Build and maintain databases using Microsoft SQL Server, MySQL, SQLite, MongoDB, and PostgreSQL.",
                        "Develop and integrate REST APIs with authentication.",
                        "Troubleshoot, debug, and optimize performance in production environments.",
                        "Solve technical problems of high scope and complexity.",
                        "Write clean, scalable, and efficient code.",
                        "Updated new technologies and best practices."
                    ),
                    images: array(
                        "01-cs.svg",
                        "02-node.svg",
                        "03-php.svg",
                        "04-python.svg",
                        "05-java.svg",
                        "06-asp-net.svg",
                        "07-angular.svg",
                        "08-flask.svg",
                        "09-django.svg",
                        "10-nextjs.svg",
                        "11-react.svg",
                        "12-bootstrap.svg",
                        "13-laravel.svg",
                        "14-html.svg",
                        "15-jquery.svg",
                        "16-css.svg",
                        "17-opencv.svg",
                        "18-mysql.svg",
                        "19-mssql.svg",
                        "20-postgresql.svg",
                        "21-window-server.svg",
                        "22-kali-linux.svg",
                        "23-ubuntu.svg",
                        "24-debian.svg",
                        "25-linux-mint.svg",
                        "26-sqlite.svg",
                        "27-apache.svg",
                        "28-nginx.svg",
                        "29-tomcat.svg",
                        "30-visual-studio.svg",
                        "31-vs-code.svg",
                        "32-net-bean.svg",
                        "33-eclipse.svg",
                        "34-postman.svg",
                        "35-docker.svg",
                        "36-git.svg",
                        "37-kubernetes.svg"
                    ),
                    dateSelect: new DateTime('2020-05-05')
                ),
                self::EXPERIENCE => array(
                    new PersonalExperience_MODEL(
                        name: "Full Stack Developer",
                        company: "Delta Electronics Thailand",
                        startDate: new DateTime(datetime: "2021-08-02"),
                        stopDate: new DateTime(datetime: "now"),
                        descriptions: array(
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
                    new PersonalExperience_MODEL(
                        name: "Programmer",
                        company: "PPA Innovation",
                        startDate: new DateTime(datetime: "2020-05-05"),
                        stopDate: new DateTime(datetime: "2021-08-02"),
                        descriptions: array(
                            "Developed software as requirement from customer.",
                            "Developed software for tracking cameras on google map. (AngularJS, C#, CSS and JavaScript, MySQL).",
                            "Developed web application for tracking employee’s work. (C#, OpenCV).",
                            "Developed web application for tracking car’s license plate on dashboard and locate. (NodeJS, HTML, CSS and JavaScript).",
                            "Developed web application for recording employee work sheet. (AngularJS, C#, CSS and JavaScript).",
                            "Developed window application for depressing camera’s image data. (C++, OpenCV)."
                        )
                    ),
                    new PersonalExperience_MODEL(
                        name: "Failure Analysis Engineer",
                        company: "Delta Electronics Thailand",
                        startDate: new DateTime(datetime: "2017-06-21"),
                        stopDate: new DateTime(datetime: "2020-03-31"),
                        descriptions: array(
                            "Analyzed and solved production problems.",
                            "Improved productivity of production.",
                            "Reduced cost of failure units."
                        )
                    )
                ),
                self::PROJECT => array(
                    new PersonalProject_MODEL(
                        id: "A",
                        name: "Camera tracking system",
                        descriptions: array(
                            "Track camera location.",
                            "Read image from camera."
                        ),
                        images: array(
                            "01-cs.svg",
                            "02-node.svg",
                            "07-angular.svg",
                            "14-html.svg",
                            "12-bootstrap.svg",
                            "15-jquery.svg",
                            "19-mssql.svg",
                            "21-window-server.svg",
                            "28-nginx.svg"
                        ),
                        type: array("Web application", "Window application"),
                        on: array("work"),
                        flowchart: "camera-tracking.drawio.svg"
                    ),
                    new PersonalProject_MODEL(
                        id: "B",
                        name: "Car's license plate recorder",
                        descriptions: array(
                            "Summary vehicle data in dialy, weekly, and monthly.",
                            "Summary vehicle by camera."
                        ),
                        images: array(
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
                        type: array("Web application", "Window application"),
                        on: array("work"),
                        flowchart: "Car record.drawio.svg"
                    ),
                    new PersonalProject_MODEL(
                        id: "C",
                        name: "Employee work record",
                        descriptions: array(
                            "Employee's work record description.",
                            "Employee's work history."
                        ),
                        images: array(
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
                        type: array("Web application"),
                        on: array("work"),
                        flowchart: "Employee record.drawio.svg"
                    ),
                    new PersonalProject_MODEL(
                        id: "D",
                        name: "Failure analysis report finder",
                        descriptions: array(
                            "For looking test report easier.",
                            "For classify test report data by failure case."
                        ),
                        images: array(
                            "01-cs.svg"
                        ),
                        type: array("Window application"),
                        on: array("work"),
                        flowchart: null
                    ),
                    new PersonalProject_MODEL(
                        id: "K",
                        name: "Calorie Daily Recorder",
                        descriptions: array(
                            "For recording food's calorie in daily.",
                            "For monitoring food's calorie."
                        ),
                        images: array(
                            "03-php.svg",
                            "07-angular.svg",
                            "18-mysql.svg"
                        ),
                        type: array("Web application"),
                        on: array("hobby"),
                        flowchart: null
                    ),
                    new PersonalProject_MODEL(
                        id: "E",
                        name: "Electronic circuit analysis",
                        descriptions: array(
                            "Verify electronic's cirbuit.",
                            "For analyzing electronic's values."
                        ),
                        images: array(
                            "04-python.svg",
                            "08-flask.svg",
                            "14-html.svg",
                            "15-jquery.svg",
                            "12-bootstrap.svg",
                            "20-postgresql.svg"
                        ),
                        type: array("Web application"),
                        on: array("work", "research"),
                        flowchart: null
                    ),
                    new PersonalProject_MODEL(
                        id: "F",
                        name: "Auto Failure Analysis system (FA PAS)",
                        descriptions: array(
                            "For classify failure analysis of test data.",
                            "For automation of analyze for production line.",
                            "For tracking failure's unit from production in real time.",
                            "For reducing task work of production engineer."
                        ),
                        images: array(
                            "01-cs.svg",
                            "03-php.svg",
                            "06-asp-net.svg",
                            "18-mysql.svg",
                            "11-react.svg",
                            "12-bootstrap.svg",
                            "15-jquery.svg",
                            "27-apache.svg"
                        ),
                        type: array("Web application", "Widow development"),
                        on: array("work"),
                        flowchart: null
                    ),
                    new PersonalProject_MODEL(
                        id: "G",
                        name: "Screw recording",
                        descriptions: array(
                            "For record screw's type when fill screw in production.",
                            "For tracking and classify screw's type."
                        ),
                        images: array(
                            "03-php.svg",
                            "19-mssql.svg",
                            "01-cs.svg"
                        ),
                        type: array("Web application", "Widow development"),
                        on: array("work"),
                        flowchart: null
                    ),
                    new PersonalProject_MODEL(
                        id: "H",
                        name: "Fixture real time tracking",
                        descriptions: array(
                            "For tracking fixture using in production.",
                            "For tracking fixture loos in production."
                        ),
                        images: array(
                            "03-php.svg",
                            "19-mssql.svg",
                            "01-cs.svg"
                        ),
                        type: array("Web application", "Widow development"),
                        on: array("work"),
                        flowchart: null
                    ),
                    new PersonalProject_MODEL(
                        id: "I",
                        name: "TE interface and pallet live status",
                        descriptions: array(
                            "For tracking test machine in production.",
                            "For tracking data of machine's failure.",
                            "For making test naching in live system."
                        ),
                        images: array(
                            "02-node.svg",
                            "10-nextjs.svg",
                            "19-mssql.svg",
                            "21-window-server.svg",
                            "28-nginx.svg"
                        ),
                        type: array("Web application", "Widow development"),
                        on: array("work"),
                        flowchart: null
                    ),
                    new PersonalProject_MODEL(
                        id: "J",
                        name: "Machine monitoring to maintan status",
                        descriptions: array(
                            "For tracking test machine in production.",
                            "For tracking and mataining software in test machine.",
                            "For summarizing data of test machine."
                        ),
                        images: array(
                            "06-asp-net.svg",
                            "19-mssql.svg",
                            "21-window-server.svg",
                            "12-bootstrap.svg",
                            "15-jquery.svg"
                        ),
                        type: array("Web application", "Widow development"),
                        on: array("work"),
                        flowchart: null
                    )
                ),
                self::EDUCATION => array(
                    new PersonalEducation_MODEL(
                        id: "A",
                        degree: "Master",
                        major: "Information Technology",
                        university: "Thai-Nichi Institute of Technology",
                        gpa: 3.38,
                        research: "An Analysis of Electronic Circuits Diagram Using Computer Vision Techniques.",
                        descriptions: array(
                            "Learned about computer networking as admin config.",
                            "Learned about IOTs.",
                            "Learned about system analysis and design.",
                            "Learned about develop and create AI.",
                            "Learned about object detection.",
                            "Learned about image processing.",
                            "Learned about data analysis and data structure.",
                            "Learned about user interactive (UX/UI)."
                        ),
                        courses: array(
                            new PersonalEducationCourse_MODEL(
                                name: "Research Methodology in Information Technology",
                                unit: 3,
                                grade: "A" 
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Information System Analysis and Design",
                                unit: 3,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Data Science and Analytics",
                                unit: 3,
                                grade: "B"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Business Information Technology and Data Management",
                                unit: 3,
                                grade: "B"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Information Technology Infrastructure",
                                unit: 3,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Information Technology Seminar",
                                unit: 1,
                                grade: "B+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Human-Computer Interaction",
                                unit: 3,
                                grade: "B+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Image Processing and Computer Vision",
                                unit: 3,
                                grade: "B"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Advanced Internet of Things",
                                unit: 3,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Thesis 1",
                                unit: 6,
                                grade: "S"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Advanced Artificial Intelligence",
                                unit: 3,
                                grade: "B+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Thesis 2",
                                unit: 6,
                                grade: "VG"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Thesis Examination",
                                unit: 0,
                                grade: "VG"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Advanced Level English",
                                unit: 0,
                                grade: "S"
                            )
                        )
                    ),
                    new PersonalEducation_MODEL(
                        id: "B",
                        degree: "Bachelor",
                        major: "Electronic and Telecommunication Engineering",
                        university: "Rajamangala University of Technology Isan Khon Kaen Campus",
                        gpa: 2.79,
                        research: "TV digital antenna (Microstrip).",
                        descriptions: array(
                            "Learned about basic engineering.",
                            "Learned about network and telecommunication.",
                            "Learned about electronic analysis.",
                            "Learned about programming C#.",
                            "Learned about programming in micro controller.",
                            "Learned about embedded system."
                        ),
                        courses: array(
                            new PersonalEducationCourse_MODEL(
                                name: "Social Dynamics and Happy Living",
                                unit: 3,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Life and Social Quality Development",
                                unit: 3,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "English for Study Skills Development",
                                unit: 3,
                                grade: "B"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Thai for Commnication",
                                unit: 3,
                                grade: "C"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Calculus 1 for Engineers",
                                unit: 3,
                                grade: "B+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Physics 1",
                                unit: 3,
                                grade: "D+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Physics Laboratory 1",
                                unit: 1,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Fundametals of Electrical Engineering",
                                unit: 3,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "English for Communication",
                                unit: 3,
                                grade: "B+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Calculus 2 for Engineers",
                                unit: 3,
                                grade: "D+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Fundametal of Chemistry",
                                unit: 3,
                                grade: "B"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Fundametal of Chemistry Laboratory",
                                unit: 1,
                                grade: "B+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Physics 2",
                                unit: 3,
                                grade: "D+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Physics 2 Laboratory",
                                unit: 1,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Basic Engineering Training",
                                unit: 3,
                                grade: "B+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Mathematics and Statistics for Dialy Life",
                                unit: 3,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "English Conversion for Dialy Life",
                                unit: 3,
                                grade: "B+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Calculus 3 for Engineers",
                                unit: 3,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Engineering Machanics",
                                unit: 3,
                                grade: "D"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Engineering Drawing",
                                unit: 3,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Engineering Electronics",
                                unit: 3,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Engineering Electronics Laboratory",
                                unit: 1,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "English Writeing for Dialy Life",
                                unit: 3,
                                grade: "B+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Physics 2 (R)#",
                                unit: 3,
                                grade: "B"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Electronic Circuits",
                                unit: 3,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Electronic Circuits Laboratory",
                                unit: 1,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Digital Circuits and Logic Design",
                                unit: 3,
                                grade: "C"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Digital Circuis and Logic Design Laboratory",
                                unit: 1,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Principle of Communication Systems",
                                unit: 3,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Communiction Systems Laboratory",
                                unit: 1,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Engineering Materials",
                                unit: 3,
                                grade: "D"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Life and Environment",
                                unit: 3,
                                grade: "D+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Applied Engineering Mathematics",
                                unit: 3,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Knowledge Management",
                                unit: 3,
                                grade: "C"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Electronic Circuits Analysis",
                                unit: 3,
                                grade: "B"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Electromagnetic Fields",
                                unit: 3,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Digital Communication",
                                unit: 3,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Economics for Engineers",
                                unit: 3,
                                grade: "D+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Electrical Measurements and Instrumentation",
                                unit: 3,
                                grade: "C"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Communication Networks and Transmission Lines",
                                unit: 3,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Computer Programming",
                                unit: 3,
                                grade: "B"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Network Analysis",
                                unit: 3,
                                grade: "B"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Electromagnetic Waves",
                                unit: 3,
                                grade: "C"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Electronic Communication",
                                unit: 3,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Microprocessor",
                                unit: 3,
                                grade: "C"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Microprocessor Laboratory",
                                unit: 1,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Feedback Control System",
                                unit: 3,
                                grade: "C"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Electronics and Telecommunication Engineering Pre-Project",
                                unit: 1,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Optical Communication",
                                unit: 3,
                                grade: "D+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Optical Communiction Laboratory",
                                unit: 1,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Microwave Engineering",
                                unit: 3,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Microwave Engineering Laboratory",
                                unit: 1,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Electronic Communiction Laboratory",
                                unit: 1,
                                grade: "A"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Antenna Engineering",
                                unit: 3,
                                grade: "C+"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Data Communications and Network",
                                unit: 3,
                                grade: "B"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Cooperative Education for Electronics and Telecommunication Engineering",
                                unit: 6,
                                grade: "S"
                            ),
                            new PersonalEducationCourse_MODEL(
                                name: "Electronics and Telecommunication Engineering Project",
                                unit: 3,
                                grade: "A"
                            )
                        )
                    )
                ),
                self::CONTACT => array(
                    new PersonalContact_MODEL(
                        name: "GMAIL",
                        title: "naruenartkhomut00@gmail.com",
                        link: null,
                        email: "naruenartkhomut00@gmail.com",
                        svg: "gmail.svg"
                    ),
                    new PersonalContact_MODEL(
                        name: "GITHUB",
                        title: "https://github.com/naruenrtkhomut",
                        link: "https://github.com/naruenrtkhomut",
                        email: null,
                        svg: "github.svg"
                    ),
                    new PersonalContact_MODEL(
                        name: "LINKEDIN",
                        title: "https://www.linkedin.com/in/naruenat-komoot-8b672b1a6",
                        link: "https://www.linkedin.com/in/naruenat-komoot-8b672b1a6",
                        email: null,
                        svg: "linkedin.svg"
                    )
                ),
                self::SKILL => array(
                    new PersonalSkill_MODEL(
                        index: 1,
                        name: "C#",
                        svg: "01-cs.svg",
                        type: "programming"
                    ),
                    new PersonalSkill_MODEL(
                        index: 2,
                        name: "JavaScript",
                        svg: "02-node.svg",
                        type: "programming"
                    ),
                    new PersonalSkill_MODEL(
                        index: 3,
                        name: "PHP",
                        svg: "03-php.svg",
                        type: "programming"
                    ),
                    new PersonalSkill_MODEL(
                        index: 4,
                        name: "Python",
                        svg: "04-python.svg",
                        type: "programming"
                    ),
                    new PersonalSkill_MODEL(
                        index: 5,
                        name: "Java",
                        svg: "05-java.svg",
                        type: "programming"
                    ),
                    new PersonalSkill_MODEL(
                        index: 6,
                        name: "ASP.NET",
                        svg: "06-asp-net.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 7,
                        name: "Angular",
                        svg: "07-angular.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 8,
                        name: "Flask",
                        svg: "08-flask.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 9,
                        name: "DJango",
                        svg: "09-django.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 10,
                        name: "NextJS",
                        svg: "10-nextjs.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 11,
                        name: "React",
                        svg: "11-react.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 12,
                        name: "Bootstrap",
                        svg: "12-bootstrap.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 13,
                        name: "Laravel",
                        svg: "13-laravel.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 14,
                        name: "HTML",
                        svg: "14-html.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 15,
                        name: "jQuery",
                        svg: "15-jquery.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 16,
                        name: "css",
                        svg: "16-css.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 17,
                        name: "OpenCV",
                        svg: "17-opencv.svg",
                        type: "framework"
                    ),
                    new PersonalSkill_MODEL(
                        index: 18,
                        name: "MySQL",
                        svg: "18-mysql.svg",
                        type: "database"
                    ),
                    new PersonalSkill_MODEL(
                        index: 19,
                        name: "SQL Server",
                        svg: "19-mssql.svg",
                        type: "database"
                    ),
                    new PersonalSkill_MODEL(
                        index: 20,
                        name: "PostgreSQL",
                        svg: "20-postgresql.svg",
                        type: "database"
                    ),
                    new PersonalSkill_MODEL(
                        index: 21,
                        name: "Window Server",
                        svg: "21-window-server.svg",
                        type: "os"
                    ),
                    new PersonalSkill_MODEL(
                        index: 22,
                        name: "Kali Linux",
                        svg: "22-kali-linux.svg",
                        type: "os"
                    ),
                    new PersonalSkill_MODEL(
                        index: 23,
                        name: "Ubuntu",
                        svg: "23-ubuntu.svg",
                        type: "os"
                    ),
                    new PersonalSkill_MODEL(
                        index: 24,
                        name: "Debian",
                        svg: "24-debian.svg",
                        type: "os"
                    ),
                    new PersonalSkill_MODEL(
                        index: 25,
                        name: "Linux Mint",
                        svg: "25-linux-mint.svg",
                        type: "os"
                    ),
                    new PersonalSkill_MODEL(
                        index: 26,
                        name: "SQLite",
                        svg: "26-sqlite.svg",
                        type: "database"
                    ),
                    new PersonalSkill_MODEL(
                        index: 27,
                        name: "Apache",
                        svg: "27-apache.svg",
                        type: "web service"
                    ),
                    new PersonalSkill_MODEL(
                        index: 28,
                        name: "NGinx",
                        svg: "28-nginx.svg",
                        type: "web service"
                    ),
                    new PersonalSkill_MODEL(
                        index: 29,
                        name: "Tomcat",
                        svg: "29-tomcat.svg",
                        type: "web service"
                    ),
                    new PersonalSkill_MODEL(
                        index: 30,
                        name: "Visual Studio",
                        svg: "30-visual-studio.svg",
                        type: "tool"
                    ),
                    new PersonalSkill_MODEL(
                        index: 31,
                        name: "Visual Studio Code",
                        svg: "31-vs-code.svg",
                        type: "tool"
                    ),
                    new PersonalSkill_MODEL(
                        index: 32,
                        name: "Netbean",
                        svg: "32-net-bean.svg",
                        type: "tool"
                    ),
                    new PersonalSkill_MODEL(
                        index: 33,
                        name: "Eclipse",
                        svg: "33-eclipse.svg",
                        type: "tool"
                    ),
                    new PersonalSkill_MODEL(
                        index: 34,
                        name: "Postman",
                        svg: "34-postman.svg",
                        type: "tool"
                    ),
                    new PersonalSkill_MODEL(
                        index: 35,
                        name: "Docker",
                        svg: "35-docker.svg",
                        type: "tool"
                    ),
                    new PersonalSkill_MODEL(
                        index: 36,
                        name: "Git",
                        svg: "36-git.svg",
                        type: "tool"
                    ),
                    new PersonalSkill_MODEL(
                        index: 37,
                        name: "Kubernetes",
                        svg: "37-kubernetes.svg",
                        type: "tool"
                    )
                ),
                self::PROJECT_BRIEF => "Most of my projects are in the nature of Web development, Window application development and Database design.",
                self::CERTIFICATION => array(
                    new PersonalCertification_MODEL(
                        name: "Getting Started with Git and GitHub",
                        link: "https://www.coursera.org/account/accomplishments/certificate/Z462E4DF5KF2",
                        image: "01.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Introduction to Web Development with HTML, CSS, JavaScrip",
                        link: "https://www.coursera.org/account/accomplishments/certificate/B4KPW8S6B593",
                        image: "02.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Introduction to Cloud Computing",
                        link: "https://coursera.org/share/7efa34a876eb2a6500ce0e3c53981df6",
                        image: "03.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Introduction to Artificial Intelligence (AI)",
                        link: "https://www.coursera.org/account/accomplishments/records/7ZQGP5VU2JSM",
                        image: "04.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Foundations of Cybersecurity",
                        link: "https://www.coursera.org/account/accomplishments/verify/M36QDAMQK26D",
                        image: "05.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Insider Pro Orientation",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-7175f724-de22-461a-9ccc-5b877101a992/view",
                        image: "06.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Career Crash Course: Network Engineering",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-bfaf2e32-d5ef-404b-b05a-41884b521e4c/view",
                        image: "07.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "CompTIA Network+ (N10-007)",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-bf196772-7960-429c-a01f-224dbff3ad64/view",
                        image: "08.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Introduction to IT & Cybersecurity",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-5f1ba680-6fab-4543-9ea8-2735a0ac6c8f/view",
                        image: "09.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Welcome to the Cyber Security Engineer Career Path",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-d926e5d4-9672-4b2b-86ae-f09de382a295/view",
                        image: "10.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Welcome to the Network Engineer Career Path",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-995b984c-92ff-412a-b869-7bcd7a4dae59/view",
                        image: "11.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Malware Fundamentals",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-04575654-87ce-4fa3-b7e2-a0c28fef752b/view",
                        image: "12.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Malware Threats",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-92a919c6-dac3-40ec-bac5-c8fac3cf8257/view",
                        image: "13.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "How to Use Automater (BSWJ)",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-6ce643c7-ca3a-494b-8cc9-e6ebbdd70438/view",
                        image: "14.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Kali Linux Fundamentals",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-49b45693-17ad-4f33-8e35-d04a259b0213/view",
                        image: "15.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "NMAP",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-7c49d69a-fdd2-4130-a258-6e3b1e39e7cf/view",
                        image: "16.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Phishing",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-54600ab4-7523-4254-bc13-012f65a2caed/view",
                        image: "17.png"
                    ),
                    new PersonalCertification_MODEL(
                        name: "Social Engineering",
                        link: "https://app.cybrary.it/courses/api/certificate/CC-b9ce7506-2433-40a2-abc9-b469a6597005/view",
                        image: "18.png"
                    )
                ),
                self::SOFT_SKILL => array(
                    "Analytical thinking and innovation.",
                    "Complex problem-solving.",
                    "Critical thinking and analysis.",
                    "Creativity, originality and initiative.",
                    "Active learning and learning strategies.",
                    "Resilience, stress tolerance and flexibility."
                ),
            };
        }
    }


    /////////////////////////////////////////////////////////// MODEL ON CLASS ///////////////////////////////////////////////////
    /**
     * database model
     * @type class
     */
    class Database_MODEL {
        /**
         * host
         * @return ?string $host
         */
        public ?string $host;
        /**
         * name
         * @return ?string $name
         */
        public ?string $name;
        /**
         * user
         * @return ?string $user
         */
        public ?string $user;
        /**
         * pass
         * @return ?string $pass
         */
        public ?string $pass;
        /**
         * port
         * @return ?int $port
         */
        public ?int $port;
        /**
         * database model construct
         * @param ?string $host
         * @param ?string $name
         * @param ?string $user
         * @param ?string $pass
         * @param ?int $port
         */
        public function __construct(?string $host, ?string $name, ?string $user, ?string $pass, ?int $port)
        {
            $this->host = $host;
            $this->name = $name;
            $this->user = $user;
            $this->pass = $pass;
            $this->port = $port;
        }
    }
    /**
     * html library model
     * @type class
     */
    class HtmlLibrary_MODEL {
        /**
         * id
         * @return ?string $id
         */
        public ?string $id;
        /**
         * name
         * @return ?string $name
         */
        public ?string $name;
        /**
         * integrity
         * @return ?string $integrity
         */
        public ?string $integrity;
        /**
         * type
         * @return ?string $type
         */
        public ?string $type;
        /**
         * cross origin
         * @return ?string $crossOrigin
         */
        public ?string $crossOrigin;
        /**
         * media
         * @return ?string $media
         */
        public ?string $media;
        /**
         * html library construct
         * @param ?string $id
         * @param ?string $name
         * @param ?string $integrity
         * @param ?string $type
         * @param ?string $crossOrigin
         * @param ?string $media
         */
        public function __construct(?string $id, ?string $name, ?string $integrity, ?string $type, ?string $crossOrigin, ?string $media)
        {
            $this->id = $id;
            $this->name = $name;
            $this->integrity = $integrity;
            $this->type = $type;
            $this->crossOrigin = $crossOrigin;
            $this->media = $media;
        }
    }
    /**
     * html header model
     * @type class
     */
    class HtmlHeader_MODEL {
        /**
         * name
         * @return ?string $name
         */
        public ?string $name;
        /**
         * link
         * @return ?string $link
         */
        public ?string $link;
        /**
         * html header construct
         * @param ?string $name
         * @param ?string $link
         */
        public function __construct(?string $name, ?string $link)
        {
            $this->name = $name;
            $this->link = $link;
        }
    }
    /**
     * personal work model
     * @type class
     */
    class PersonalWork_MODEL {
        /**
         * name
         * @return ?string $name
         */
        public ?string $name;
        /**
         * start datetime
         * @return ?DateTime $startDate
         */
        public ?DateTime $startDate;
        /**
         * stop datetime
         * @return ?DateTime $stopDate
         */
        public ?DateTime $stopDate;
        /**
         * descriptions
         * @return ?array $descriptions
         */
        public ?array $descriptions;
        /**
         * image
         * @return ?array $images
         */
        public ?array $images;
        /**
         * year diff
         * @return ?int $yearDiff
         */
        public ?int $yearDiff;
        /**
         * personal work construct
         * @param ?string $name
         * @param ?DateTime $startDate
         * @param ?DateTime $stopDate
         * @param ?array $descriptions
         * @param ?array $images
         * @param ?DateTime $dateSelect
         */
        public function __construct(?string $name, ?DateTime $startDate, ?DateTime $stopDate, ?array $descriptions, ?array $images, ?DateTime $dateSelect)
        {
            $this->name = $name;
            $this->startDate = $startDate;
            $this->stopDate = $stopDate;
            $this->descriptions = $descriptions;
            $this->images = $images;
            $this->yearDiff = date_diff(
                baseObject: $dateSelect,
                targetObject: new DateTime(datetime: 'now')
            )->y;
        }
    }
    /**
     * personal experience model
     * @type class
     */
    class PersonalExperience_MODEL {
        /**
         * name
         * @return ?string $name
         */
        public ?string $name;
        /**
         * company
         * @return ?string $company
         */
        public ?string $company;
        /**
         * start date
         * @return ?Datetime $startDate
         */
        public ?DateTime $startDate;
        /**
         * stop date
         * @return ?Datetime $stopDate
         */
        public ?DateTime $stopDate;
        /**
         * description
         * @return ?array $descriptions
         */
        public ?array $descriptions;
        /**
         * personal experience construct
         */
        public function __construct(?string $name, ?string $company, ?DateTime $startDate, ?DateTime $stopDate, ?array $descriptions)
        {
            $this->name = $name;
            $this->company = $company;
            $this->startDate = $startDate;
            $this->stopDate = $stopDate;
            $this->descriptions = $descriptions;
        }
    }
    /**
     * personal project model
     * @type class
     */
    class PersonalProject_MODEL {
        /**
         * id
         * @return ?string $id
         */
        public ?string $id;
        /**
         * name
         * @return ?string $name
         */
        public ?string $name;
        /**
         * description
         * @return ?array $description
         */
        public ?array $descriptions;
        /**
         * images
         * @return ?array $images
         */
        public ?array $images;
        /**
         * type
         * @return ?array $type
         */
        public ?array $type;
        /**
         * on
         * @return ?array $on
         */
        public ?array $on;
        /**
         * flowchart
         * @return ?string $flowchart
         */
        public ?string $flowchart;
        /**
         * personal project construct
         * @param ?string $id
         * @param ?string $name
         * @param ?array $descriptions
         * @param ?array $images 
         * @param ?array $type
         * @param ?array $on
         */
        public function __construct(?string $id, ?string $name, ?array $descriptions, ?array $images, ?array $type, ?array $on, ?string $flowchart)
        {
            $this->id = $id;
            $this->name = $name;
            $this->descriptions = $descriptions;
            $this->images = $images;
            $this->type = $type;
            $this->on = $on;
            $this->flowchart = $flowchart;
        }
    }
    /**
     * personal education model
     * @type class
     */
    class PersonalEducation_MODEL {
        /** 
         * id
         * @return ?string $id
         */
        public ?string $id;
        /**
         * degree
         * @return ?string $degree
         */
        public ?string $degree;
        /**
         * major
         * @return ?string $major
         */
        public ?string $major;
        /**
         * university
         * @return ?string $university
         */
        public ?string $university;
        /**
         * gpa
         * @return ?float $gpa
         */
        public ?float $gpa;
        /**
         * research
         * @return ?string $research
         */
        public ?string $research;
        /**
         * descriptions
         * @return ?array $descriptions
         */
        public ?array $descriptions;
        /**
         * courses
         * @return ?array $courses
         */
        public ?array $courses;
        /**
         * personal education construct
         * @param ?string $degree
         * @param ?string $major
         * @param ?string $university
         * @param ?float $gpa
         * @param ?array $descriptions
         * @param ?array $courses
         */
        public function __construct(?string $id, ?string $degree,  ?string $major, ?string $university, ?float $gpa, ?string $research, ?array $descriptions, ?array $courses)
        {
            $this->id = $id;
            $this->degree = $degree;
            $this->major = $major;
            $this->university = $university;
            $this->gpa = $gpa;
            $this->descriptions = $descriptions;
            $this->courses = $courses;
            $this->research = $research;
        }
    }
    /**
     * personal education course model
     * @type class
     */
    class PersonalEducationCourse_MODEL {
        /**
         * name
         * @return ?string $name
         */
        public ?string $name;
        /**
         * unit
         * @return ?float $unit
         */
        public ?float $unit;
        /**
         * grade
         * @return ?string $grade
         */
        public ?string $grade;
        /**
         * personal education course construct
         * @param ?string $name
         * @param ?float $unit
         * @param ?string $grade
         */
        public function __construct(?string $name, ?float $unit, ?string $grade)
        {
            $this->name = $name;
            $this->unit = $unit;
            $this->grade = $grade;
        }
    }
    /**
     * personal contact model
     * @type class
     */
    class PersonalContact_MODEL {
        /**
         * name
         * @return ?string $name
         */
        public ?string $name;
        /**
         * title
         * @return ?string $title
         */
        public ?string $title;
        /**
         * link
         * @return ?string $link
         */
        public ?string $link;
        /**
         * email
         * @return ?string $email
         */
        public ?string $email;
        /**
         * image svg
         * @return ?string $svg
         */
        public ?string $svg;
        /**
         * personal contact construct
         * @param ?string $name
         * @param ?string $title
         * @param ?string $link
         * @param ?string $email
         * @param ?string $svg
         */
        public function __construct(?string $name, ?string $title, ?string $link, ?string $email, ?string $svg)
        {
            $this->name = $name;
            $this->title = $title;
            $this->link = $link;
            $this->email = $email;
            $this->svg = $svg;
        }
    }
    /**
     * personal skill model
     * @type class
     */
    class PersonalSkill_MODEL {
        /**
         * index
         * @return ?int $index
         */
        public ?int $index;
        /**
         * name
         * @return ?string $name
         */
        public ?string $name;
        /**
         * svg
         * @return ?string $svg
         */
        public ?string $svg;
        /**
         * type
         * @return ?string $type
         */
        public ?string $type;
        /**
         * peronal skill construct
         * @param ?int $index
         * @param ?string $name
         * @param ?string $svg
         * @param ?string $type
         */
        public function __construct(?int $index, ?string $name, ?string $svg, ?string $type)
        {
            $this->index = $index;
            $this->name = $name;
            $this->svg = $svg;
            $this->type = $type;
        }
    }
    /**
     * personal certification
     * @type class
     */
    class PersonalCertification_MODEL {
        /**
         * name
         * @return ?string
         */
        public ?string $name;
        /**
         * link
         * @return ?string
         */
        public ?string $link;
        /**
         * image
         * @return ?string
         */
        public ?string $image;
        /**
         * personal certification construct
         * @param ?string $name
         * @param ?string $link
         * @param ?string $image
         */
        public function __construct(?string $name, ?string $link, ?string $image)
        {
            $this->name = $name;
            $this->link = $link;
            $this->image = $image;
        }
    }
?>