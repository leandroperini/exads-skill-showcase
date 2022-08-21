.PHONY: start
start:
	docker-compose up -d

.PHONY: primes
primes:
	docker-compose exec php php /var/www/exads/public/index.php --route /primes

.PHONY: ascii
ascii:
	docker-compose exec php php /var/www/exads/public/index.php --route /ascii
