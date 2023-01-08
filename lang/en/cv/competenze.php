<?php
$tmpfoot = <<<FOOT
Levels: A1/2: Basic user - B1/2: Independent user - C1/2 Proficient user
<br />
Common European Framework of Reference for Languages
FOOT;
return [
    "title" => "Personal skills",
    "lingue" => [
        "madre" => [
            "title" => "Mother tongue",
            "content" => "Italian"
        ],
        "altre" => [
            "title" => "Other languages",
            "cols" => [
                "comprensione" => "Understanding",
                "parlato" => "Speaking",
                "scritto" => "Writing"
            ],
            "list" => [
                "inglese" => [
                    "name" => "English",
                    "comprensione" => "B2",
                    "parlato" => "B2",
                    "scritto" => "B2"
                ],
                "francese" => [
                    "name" => "French",
                    "comprensione" => "A1",
                    "parlato" => "A1",
                    "scritto" => "A1"
                ],
            ],
            "footer" => $tmpfoot
        ]
    ],
    "informatiche" => [
        "title" => "IT skills",
        "list" => [
            [
                "title" => "Database",
                "content" => [
                    "CouchDB",
                    "SQL - MySQL, OracleDb, PostgreSQL"
                ]
            ],
            [
                "title" => "Tools",
                "content" => [
                    "Git",
                    "Jenkins",
                    "TravisCI",
                    "Docker - Mirantis",
                    "Instana",
                    "Splunk"
                ]
            ],
            [
                "title" => "Java 8+",
                "content" => [
                    "Intermediate/advanced user",
                    "Spring: Springboot, PrimeFaces",
                    "SonarLing",
                    [
                        "title" => "Testing",
                        "content" => [
                            "JUnit 5",
                            "Assertj",
                            "Contract test with Pact",
                            "Performance test with Gatling"
                        ]
                    ]
                ]
            ],
            [
                "title" => "JavaScript programming",
                "content" => [
                    "Socket.io, ajax, rest API",
                    "PouchDB for distributed database with CouchDB",
                    "Basic http server with Koa.js",
                    "Cron script with Rxjs for data processing",
                    "DBMS connection and CouchDB for distributed NoSQL Database",
                    [
                        "title" => "Frameworks",
                        "content" => [
                            "Electron",
                            "Vuejs",
                            "Quasarjs",
                            "Vuetify",
                            "Nuxt",
                            "Angular"
                        ]
                    ],
                ]
            ],
            [
                "title" => "PHP Programming",
                "content" => [
                    "Advanced user including OOP",
                    "Composer",
                    [
                        "title" => "Frameworks",
                        "content" => [
                            "Laravel",
                            "Zend Framework (only Mail and DB modules)"
                        ]
                    ],
                ]
            ],
            [
                "title" => "HTML/CSS",
                "content" => [
                    "html5",
                    "SASS/SCSS",
                    "Stylus",
                    "Bootstrap",
                ]
            ],
            "Markdown",
            "Python",
            "Microsoft Office",
        ]
    ],
    "patente" => [
        "title" => "Driving licence",
        "content" => "B"
    ]
];
