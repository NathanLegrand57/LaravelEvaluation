[![forthebadge](data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNTIuODAwMDAzMDUxNzU3OCIgaGVpZ2h0PSIzNSIgdmlld0JveD0iMCAwIDE1Mi44MDAwMDMwNTE3NTc4IDM1Ij48cmVjdCB3aWR0aD0iOTYuNDAwMDAxNTI1ODc4OSIgaGVpZ2h0PSIzNSIgZmlsbD0iIzRhNGE0YSIgc3R5bGU9Ii0tZGFya3JlYWRlci1pbmxpbmUtZmlsbDogIzBhODVhYzsiIGRhdGEtZGFya3JlYWRlci1pbmxpbmUtZmlsbD0iIi8+PHJlY3QgeD0iOTYuNDAwMDAxNTI1ODc4OSIgd2lkdGg9IjU2LjQwMDAwMTUyNTg3ODkwNiIgaGVpZ2h0PSIzNSIgZmlsbD0iIzM4OUFENSIgc3R5bGU9Ii0tZGFya3JlYWRlci1pbmxpbmUtZmlsbDogIzIyNzJhMjsiIGRhdGEtZGFya3JlYWRlci1pbmxpbmUtZmlsbD0iIi8+PHRleHQgeD0iNDguMjAwMDAwNzYyOTM5NDUiIHk9IjE3LjUiIGZvbnQtc2l6ZT0iMTIiIGZvbnQtZmFtaWx5PSInUm9ib3RvJywgc2Fucy1zZXJpZiIgZmlsbD0iI2ZmZmZmZiIgdGV4dC1hbmNob3I9Im1pZGRsZSIgYWxpZ25tZW50LWJhc2VsaW5lPSJtaWRkbGUiIGxldHRlci1zcGFjaW5nPSIyIiBzdHlsZT0iLS1kYXJrcmVhZGVyLWlubGluZS1maWxsOiAjZThlNmUzOyIgZGF0YS1kYXJrcmVhZGVyLWlubGluZS1maWxsPSIiPkZBSVQgQVZFQzwvdGV4dD48dGV4dCB4PSIxMjQuNjAwMDAyMjg4ODE4MzYiIHk9IjE3LjUiIGZvbnQtc2l6ZT0iMTIiIGZvbnQtZmFtaWx5PSInTW9udHNlcnJhdCcsIHNhbnMtc2VyaWYiIGZpbGw9IiNGRkZGRkYiIHRleHQtYW5jaG9yPSJtaWRkbGUiIGZvbnQtd2VpZ2h0PSI5MDAiIGFsaWdubWVudC1iYXNlbGluZT0ibWlkZGxlIiBsZXR0ZXItc3BhY2luZz0iMiIgc3R5bGU9Ii0tZGFya3JlYWRlci1pbmxpbmUtZmlsbDogI2U4ZTZlMzsiIGRhdGEtZGFya3JlYWRlci1pbmxpbmUtZmlsbD0iIj5QSFA8L3RleHQ+PC9zdmc+)](https://forthebadge.com)]
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

  

 
    
