# Fedi Climat — Station météo

Application PHP/MySQL de saisie et de consultation de mesures météorologiques saisonnières pour les stations Carthage, Enfidha-Aéroport et El Borma.

## Fonctionnalités
- Ajout de mesures de température et de précipitations
- Contrôle des plages de valeurs et prévention des doublons par station/année/saison
- Historique filtrable par station, année et saison
- Moyennes annuelles par station
- Requêtes préparées, validation serveur, échappement HTML et protection CSRF

## Installation locale
1. Démarrer Apache et MySQL (XAMPP/WAMP).
2. Créer une base MySQL nommée `bac2021`.
3. Importer `bac2021.sql` dans cette base via phpMyAdmin.
4. Vérifier les paramètres dans `config.php`.
5. Ouvrir `index.php` depuis le serveur local.

## Stack
PHP 8+, MySQL/MariaDB, HTML, CSS.

## Limites
Projet pédagogique et données de démonstration. Les relevés doivent être vérifiés avant tout usage scientifique. Pour un déploiement public, configurer un utilisateur MySQL dédié, HTTPS, authentification et sauvegardes.

Brand: Fedi.
