# Exercice 1 - Module PrestaShop

j’ai créé un module PrestaShop appelé `stockalertmail`.

Ce module est branché sur le hook `actionProductUpdate`. Quand un produit est modifié (y compris dans le back-office), l'identifiant est récupéré, son nom et la quantité restante en stock aussi, puis ça envoie un e-mail avec les informations.

Pour le contenu du mail, j’ai créé deux templates dans `mails/fr` : un fichier HTML et un fichier texte.

J’ai fait les tests sur un PrestaShop en local avec XAMPP (pour héberger un serveur MySQL et Appache), et j’ai configuré l’envoi des e-mails en SMTP dans le back-office pour pouvoir vérifier que le module fonctionnait bien.

# Exercice 2 - Import XML vers MySQL


Le fichier `catalogue.XML`  contient les données produits. Chaque produit est dans une balise `<fLigne>`. J’ai utilisé `MagicParser.php` pour lire le fichier et récupérer chaque produit sous forme de tableau PHP.

J’ai créé la structure de la table dans le fichier `create_table.sql`, puis j’ai utilisé `import_xml.php` pour me connecter à la base avec PDO, préparer une requête d’insertion, et insérer automatiquement chaque ligne du XML dans la table `catalogue_produits`.

J’ai fait les tests en local avec XAMPP et phpMyAdmin.
