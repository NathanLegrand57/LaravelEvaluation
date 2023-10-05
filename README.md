* Mettre le dossier boutique dans le dossier Homestead/code 

* Modifier le fichier Homestead.yaml
* Ajouter dans sites : 
- map: boutique.test
  to: /home/vagrant/code/boutique/public

* Ajouter dans databases : *
  - boutique

* Modifier le fichier .env en changeant les lignes suivantes : 

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=boutique
DB_USERNAME=root
DB_PASSWORD=secret

* Exécuter le cmd Windows, puis aller dans le dossier Homestead/ 
* Ecrire :

  vagrant ssh
  cd /code/boutique
  composer install

  * Lancer ces commandes pour alimenter la base de données : 
    
  php artisan db:seed --class=VenteSeeder
  php artisan db:seed --class=ProduitSeeder
  php artisan db:seed --class=MarqueSeeder

 
    
