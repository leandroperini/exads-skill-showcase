.PHONY: start
start:
	docker-compose up -d

.PHONY: primes
primes:
	docker-compose exec php php /var/www/exads/public/index.php --route /primes

.PHONY: asciiRemove
asciiRemove:
	docker-compose exec php php /var/www/exads/public/index.php --route /ascii --params removeChar=$(char)

.PHONY: asciiRemoveRandom
asciiRemoveRandom:
	docker-compose exec php php /var/www/exads/public/index.php --route /ascii

.PHONY: setupDB
setupDB:
	docker-compose exec db sh -c 'exec mysql -uroot -proot < /var/www/exads/storage/sqlScripts/setupDb.sql'

.PHONY: insertInitialData
insertInitialData: setupDB
	docker-compose exec db sh -c 'exec mysql -uroot -proot < /var/www/exads/storage/sqlScripts/initialData.sql'
