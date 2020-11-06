### Tasks
* Composer - PHP paketų (bibliotekų) valdymo įrankis.

* Composerio reiks norint instaliuoti ORM įrankius.

* ORM - “Object Relational Mapping” ir suteikia patogius įrankius sujungti mūsų DB ir mūsų objektinę PHP aplikacijos dalį

Composer: https://getcomposer.org/download/ 

 1) install Composer per CLI (geriausia i ta folderi kur wwww failai pvz, Ampps/www)
 2) php composer.phar pasileidžiam
 3) projekto folderis -> jo viduje php ..\composer.phar init 
 4) install Doctrine php ..\composer.phar require doctrine/orm (jei leidžiame iš to folderio kur .phar failas)
 5) sukuriame bootstrap.php jame DB prisijungimai
 6) sukuriame cli-config.php
 7) src folderis -> Product.php su Product class
 8) CLI leidziam dump-sql (jei naudojate windows CMD) 
 ```
 vendor\bin\doctrine orm:schema-tool:update --force --dump-sql
 ```
 Database schema updated succesfully!


 Loading:

 1) Sukonfigūruojame autoloaderį composer.json:
 ```json
    "autoload": {
        "files": ["src/Product.php"]
    }
```
arba kt mechanizmais, jei pvz su namespaces
```json
    "autoload": {
        "psr-4": { 
			"Zoo\\": "models/"
		}
    }
```
2) CLI
```
php ../composer.phar dump-autoload
```
3) pasirasom scripta create-prod.php
4) CLI
```
php create-prod.php Batai
```

