[general]
db.adapter = PDO_MYSQL
db.params.host = localhost
db.params.username = Teno
db.params.password = Moradin
db.params.dbname = places
date_default_timezone = "Europe/London"

[live : general]

[dev : general]

[test : general]
db.params.dbname = places_test