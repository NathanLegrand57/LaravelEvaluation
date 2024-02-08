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
        User::create(["name"=> "nameExample","email"=>"mailExample@gmail.com","password"=>bcrypt("123456")]);
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
- Aller sur le site ``boutique.test`` sur votre navigateur et se connecter avec les identifiants créés précédemment

## Tests unitaires

### Configuration des fichiers

- Modifier le fichier ``Homestead.yaml``

- Ajouter dans ``databases`` :

    ```php
      - boutique_test
    ```

- Dupliquer le fichier ``.env`` puis renommer le nouveau en ``.env.testing``

- Modifier la configuration de la base de données dans le fichier ``.env.testing`` en changeant le nom de la base ciblée par ``boutique_test`` :

    ```bash
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=boutique_test
        DB_USERNAME=root
        DB_PASSWORD=secret
    ```
    
- Exécuter le cmd Windows, puis aller dans le dossier ``Homestead/`` 
- Exécuter cette ligne de commande afin de redémarrer la machine virtuelle :

     ```bash
        vagrant --reload provision
     ```

- Une fois la machine redémarrée, il faut exécuter les migrations afin de structurer la base de données comme au début du projet

  ### Exécution des tests unitaires

- Exécuter le cmd Windows, puis aller dans le dossier ``Homestead/`` 
- Exécuter ces lignes de commande :

    ```bash
        vagrant ssh
        cd /code/boutique
        art test
    ```
    
- Pour afficher le dashboard illustrant le taux de couverture des tests, il suffit d'exécuter ces commandes :
 
    ```bash
        xon
        XDEBUG_MODE=coverage php vendor/bin/phpunit --coverage-html coverage
    ```

- Enfin, pour visualiser les pages HTML générées, il faut trouver le fichier ``index.html`` se trouvant dans l'arboress (``coverage\index.html``) puis utiliser une extension permettant de visualiser la page html (``Live server`` par exemple)

## Mails

### Configuration des fichiers

- Se rendre sur le site [MailTrap](https://mailtrap.io/email-sandbox/) puis s'inscrire si ce n'est pas déjà fait
- Créer une nouvelle "inbox" puis dans "integrations", ouvrir la liste déroulante et cliquer sur Laravel 9+
- Copier toutes les lignes qui apparaissent en-dessous
- Exemple :

    ```php
        MAIL_MAILER=smtp
        MAIL_HOST=sandbox.smtp.mailtrap.io
        MAIL_PORT=2525
        MAIL_USERNAME=4060eeff71f1d3
        MAIL_PASSWORD=********36b6
    ```
    
- Coller ces lignes dans le fichier .env en remplaçant la partie similaire

### Utilisation

- Utiliser l'application web comme prévu et créer par exemple une nouvelle vente
- Aller sur MailTrap et vérifier que le mail a bien été reçu

