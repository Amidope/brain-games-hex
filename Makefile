install:
	composer install

brain-calc:
	./src/Games/brain-calc
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 src bin
brain-even:
	./src/Games/brain-even
dump:
	composer dump-autoload