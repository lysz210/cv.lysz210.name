<?php
$tmpfoot = <<<FOOT
Livelli: A1/2 Livello base - B1/2 Livello intermedio - C1/2 Livello avanzato
<br />
Quadro Comune Europeo di Riferimento delle Lingue
FOOT;
return [
    "title" => "Competenze personali",
    "lingue" => [
        "madre" => [
            "title" => "Lingua madre",
            "content" => "Italiano"
        ],
        "altre" => [
            "title" => "Altre lingue",
            "cols" => [
                "comprensione" => "Comprensione",
                "parlato" => "Parlato",
                "scritto" => "Scritto"
            ],
            "list" => [
                "inglese" => [
                    "name" => "Inglese",
                    "comprensione" => "B2",
                    "parlato" => "B2",
                    "scritto" => "B2"
                ],
                "francese" => [
                    "name" => "francese",
                    "comprensione" => "A1",
                    "parlato" => "A1",
                    "scritto" => "A1"
                ],
            ],
            "footer" => $tmpfoot
        ]
    ],
    "informatiche" => [
        "title" => "Competenze informatiche",
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
                    "Intermediate/advanced programmer",
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
                "title" => "Programmazione in javascript",
                "content" => [
                    "Uso di librerie base. Jquery",
                    "Comunicazione con Socket.io, ajax, rest API",
                    "Pouchdb per l'uso di database in locate e in remote",
                    "Creazione base di server http con Koa.js",
                    "Script cron per processare dati con Rxjs",
                    "Connessione a DBMS e Database distribuito NoSQL CouchDB",
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
                "title" => "Programmazione in PHP",
                "content" => [
                    "Livello avanzato anche OOP",
                    "Uso di composer",
                    [
                        "title" => "Frameworks",
                        "content" => [
                            "Laravel",
                            "Zend Framework (solo moduli, principalmente Mail e DB)"
                        ]
                    ],
                ]
            ],
            [
                "title" => "Creazione di siti in HTML/CSS",
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
        "title" => "Patende di guida",
        "content" => "B"
    ]
];
