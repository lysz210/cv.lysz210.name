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
            ],
            "footer" => $tmpfoot
        ]
    ],
    "informatiche" => [
        "title" => "IT skills",
        "list" => [
            [
                "title" => "Java 8+",
                "content" => [
                    "Intermediate/advanced user",
                    "Springboot, JPA - Hibernate, Spring batch, PrimeFaces",
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
                    "Intermediate programmer",
                    "Good user of Rxjs",
                    "Basic knowledge of main Front-End framework"
                ]
            ],
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
