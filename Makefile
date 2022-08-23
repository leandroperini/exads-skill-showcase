.PHONY: setupDocker
setupDocker:
	docker-compose up -d

.PHONY: composerInstall
composerInstall:
	docker-compose exec php composer install

.PHONY: sleep
sleep:
	#Waiting to allow starting next command safely
	sleep 10

.PHONY: setupEnv
setupEnv: setupDocker sleep insertInitialData composerInstall

.PHONY: 1
1:
	docker-compose exec php php /var/www/exads/public/index.php --route /primes

.PHONY: 2
2:
	docker-compose exec php php /var/www/exads/public/index.php --route /ascii --params removeChar=$(char)

.PHONY: 2-random
2-random:
	docker-compose exec php php /var/www/exads/public/index.php --route /ascii

.PHONY: 3
3:
	python3 -m webbrowser "http://exads.local:8080/tv-series?weekDay=$(week-day)&time=$(time)"

.PHONY: 3-now
3-now:
	python3 -m webbrowser http://exads.local:8080/tv-series/now

.PHONY: 4
4:
	python3 -m webbrowser "http://exads.local:8080/promotions?id={any promotion id}"

.PHONY: setupDB
setupDB:
	docker-compose exec db sh -c 'exec mysql -uroot -proot < /var/www/exads/storage/sqlScripts/setupDb.sql'

.PHONY: insertInitialData
insertInitialData: setupDB
	docker-compose exec db sh -c 'exec mysql -uroot -proot < /var/www/exads/storage/sqlScripts/initialData.sql'
