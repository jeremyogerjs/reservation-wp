# ecf-6 Optimum
Wordpress >= V5.8.1

Site optimum : http://jeremy.devweb.cfa.nc/optimum/  
Ce projet a été réalisé sur le CMS wordpress en développant un plugin from scratch et a partir d'un théme deja développé en raison du peu de temps a disposition.

## Guide d'installation local
Pour installer le plugin rien de plus simple :
- Cloner le repo `git clone https://github.com/cfa-devweb/ecf-6-oger.git` dans le dossier de votre choix
- Remplacer le dossier wp-content de votre wordpress par celui cloné juste avant
- Activez le plugin du nom de `panel sport courses`
- Activez le theme du nom de `Real-Fitness` qui est celui par défault ou celui que vous souhaitez
- Lancer votre serveur local(xampp,lampp,laragon) ou celui que vous utilisez
- Pour vous authentifier rendez vous a l'url suivante en ramplacant nomdudossier par celui de votre dossier `http://localhost/{nomdudossier}/wp-admin`
- Accès a l'admin : 
- username: admin123
- password: admin123 

## Cahier des charges

#### Demande client

Monsieur Ga directeur de la salle de sport Optimum souhaite refaire son site internet en permettant aux utilisateurs de pouvoir réserver un cours particuliers ou collectifs, une séance de yoga et pouvoir s'abonner a la salle de sport en remplissant un simple formulaire en ligne.
Ce nouveau site a également pour but de promouvoir sa salle de sport en présentant son entreprise au travers du moteur de recherche et des réseaux sociaux et également sur les divers supports numériques tels que (l'ordinateur,le téléphone,la tablette).

#### Besoin fonctionnel

Voici une liste des besoins fonctionnels qui en ressort de la demande client :
- Les utilisateurs pourront réserver les cours(particuliers et collectifs), les séances(yoga) et aussi s'abonner a la salle de sport (mensuel ou annuel).
- Les utilisateurs pourront découvrir la salle de sport aux travers de photos et descriptions de la salle de sport.
- Les utilisateurs pourront parcourir le site sur tout les supports numérique (ordinateur,téléphone et tablette).
- Les employers auront accès a la liste des participants pour chaque cours et séance organiser par Optimum pour verifier leur identité.

#### Maquettage

Le maquettage a été réalisé sur l'application mockflow donc voici le lien des maquettes : https://wireframepro.mockflow.com/view/Md697f9fc54ffa2cd99f605fb9f79dfc61622767784177


#### Sécurité

Au niveau de la sécurité j'ai suivi ce tuto : [ici](https://www.codeur.com/tuto/wordpress/proteger-wordpress-attaques/#2_utiliser_des_identifiants_de_connexion_complexes)

Accès a l'admin distant :  
username: jeremscript  
password: %ckPhOe9(QPP%Z$cj%jSMrUB

Voici la liste des actions effectué :
- protection du fichier .htaccess
- protection du fichier wp-config.php
- masquer la version wordpress
- changement de l'utilisateur admin par défault de wordpress
- changement de l'url de connexion a l'admin
- enlever les rapport d'erreur générer par php
- rendre le message d'erreur en console plus général
- limiter le nombre de tentative de connexion au panel administrateur(extension wps limit login)
- changer l'url de connexion(extension wps hide login)
