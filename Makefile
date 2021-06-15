install:
	composer install

brain-games:
	./src/Games/brain-games
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-even:
	./src/Games/brain-even
