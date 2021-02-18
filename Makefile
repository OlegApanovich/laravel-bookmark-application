# set project files
up:
	php artisan serve --host=127.0.0.1 --port=8001 &
down:
	sudo kill $(shell lsof -t -i:8001)
