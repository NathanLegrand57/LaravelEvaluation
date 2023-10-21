[![forthebadge](data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNTIuODAwMDAzMDUxNzU3OCIgaGVpZ2h0PSIzNSIgdmlld0JveD0iMCAwIDE1Mi44MDAwMDMwNTE3NTc4IDM1Ij48cmVjdCB3aWR0aD0iOTYuNDAwMDAxNTI1ODc4OSIgaGVpZ2h0PSIzNSIgZmlsbD0iIzRhNGE0YSIvPjxyZWN0IHg9Ijk2LjQwMDAwMTUyNTg3ODkiIHdpZHRoPSI1Ni40MDAwMDE1MjU4Nzg5MDYiIGhlaWdodD0iMzUiIGZpbGw9IiMzODlBRDUiLz48dGV4dCB4PSI0OC4yMDAwMDA3NjI5Mzk0NSIgeT0iMTcuNSIgZm9udC1zaXplPSIxMiIgZm9udC1mYW1pbHk9IidSb2JvdG8nLCBzYW5zLXNlcmlmIiBmaWxsPSIjZmZmZmZmIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBhbGlnbm1lbnQtYmFzZWxpbmU9Im1pZGRsZSIgbGV0dGVyLXNwYWNpbmc9IjIiPkZBSVQgQVZFQzwvdGV4dD48dGV4dCB4PSIxMjQuNjAwMDAyMjg4ODE4MzYiIHk9IjE3LjUiIGZvbnQtc2l6ZT0iMTIiIGZvbnQtZmFtaWx5PSInTW9udHNlcnJhdCcsIHNhbnMtc2VyaWYiIGZpbGw9IiNGRkZGRkYiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGZvbnQtd2VpZ2h0PSI5MDAiIGFsaWdubWVudC1iYXNlbGluZT0ibWlkZGxlIiBsZXR0ZXItc3BhY2luZz0iMiI+UEhQPC90ZXh0Pjwvc3ZnPg==)](https://forthebadge.com)
## Mettre le dossier boutique dans le dossier Homestead/code 

* Modifier le fichier Homestead.yaml
* Ajouter dans sites : 
- map: boutique.test
  to: /home/vagrant/code/boutique/public

### Ajouter dans databases :
- boutique

### Modifier le fichier .env en changeant les lignes suivantes : 

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

  

 
    
