# Gestion de boutique

## Installation

### Mise en place du projet

- Mettre le dossier ``boutique`` dans le dossier ``Homestead/code`` 
- Modifier le fichier ``Homestead.yaml``
- Ajouter dans ``sites`` :

    ```php
      - map: boutique.test
        to: /home/vagrant/code/boutique/public
    ```

- Ajouter dans ``databases`` :

    ```php
      - boutique
    ```

### Paramétrage de la base de données

- Modifier le fichier ``.env`` en changeant les lignes suivantes : 

    ```bash
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=boutique
        DB_USERNAME=root
        DB_PASSWORD=secret
    ```

- Exécuter le cmd Windows, puis aller dans le dossier ``Homestead/`` 
- Exécuter ces lignes de commande :

    ```bash
      vagrant ssh
      cd /code/boutique
      composer install
    ```

### Alimentation de la base de données

 - Exécuter ces commandes pour alimenter la base de données : 

    ```bash
      php artisan db:seed --class=VenteSeeder
      php artisan db:seed --class=ProduitSeeder
      php artisan db:seed --class=MarqueSeeder
    ```

  ## Création des utilisateurs

### Tinker : 

- Créer le premier utilisateur :

    ```bash
        artisan tinker
        $user = new App\Model\User;
        $user->name = 'Charles';   <-- _Exemple de nom_
        $user->email = "charles@gmail.com";
        $user->password=bcrypt('123456789');
        $user->save();
    ```

- Faire pareil pour le deuxième utilisateur mais changer le nom et l'adresse mail

## Gestion des rôles et habilitations

### Bouncer
- Se rendre à l'utilisateur Charles avec les commandes suivantes (ici l'id numéro 1) :

    ```bash
        $user = User::find(1);
        Bouncer::allow('vendeur')->to('vente-create');
        Bouncer::allow('vendeur')->to('vente-update');
        Bouncer::allow('vendeur')->to('vente-retrieve');
        Bouncer::assign('vendeur')->to($user);
    ```

- Faire de même avec l'utilisateur 2 :

    ```bash
        $user = User::find(2);
        Bouncer::allow('gerant')->to('vente-create');
        Bouncer::allow('gerant')->to('vente-update');
        Bouncer::allow('gerant')->to('vente-retrieve');
        Bouncer::allow('gerant')->to('produit-create');
        Bouncer::allow('gerant')->to('produit-update');
        Bouncer::allow('gerant')->to('produit-retrieve');
        Bouncer::allow('gerant')->to('marque-create');
        Bouncer::allow('gerant')->to('marque-update');
        Bouncer::allow('gerant')->to('marque-retrieve');
        Bouncer::assign('gerant')->to($user);
    ```

- Sauvegarder le tout :
    
    ```bash
        Bouncer::refresh()
    ```
- Aller sur le site ``boutique.test`` sur votre navigateur


 
    
