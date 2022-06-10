Pour des informations détaillées, nous vous invitons à vous diriger vers notre rapport de projet. Pour une version résumée, vous êtes au bon endroit.

Pour faire fonctionner le site en local, mettez les fichiers dans votre répertoire Uwamp ou Wampserver. 
Téléchargez et installez la dernière version de nodejs et tapez la commande "node server.js" depuis votre terminal.

Ce site est codé sans aucun framework et utilise du code en PHP, Javascript, HTML et CSS. 
La base de donnée est en MySQL comme abordé lors du cours de base de données de 3ème année.
Pour la transmission des données en temps réel depuis le tableau de bord, nous utilisons un serveur sous nodejs qui utilise la technologie du websocket.
Pour l'hébergement, nous utilisons une VM fournie par le service informatique de Polytech Nancy, contactez M. Pairis pour plus d'informations (via le Helpdesk).
Le site devrait être accessible à l'adresse : emt.polytech-nancy.univ-lorraine.fr . S'il ne l'est pas, contactez M. Pairis pour plus d'informations.

Les pages d'affichages sont dans le fichier /public_html, les pages qui servent à executer du code sans affichage sont dans /public_html/functions.
Les images utilisées pour l'affichage sont dans /public_html/styles/images, les tracés des circuits sont dans /public_html/Cartes.
L'affichage de la map utilise leaflet, une API open-source, en Javascript.

Le fichier fakecar.html permet de simuler l'envoie de données depuis le tableau de bord.

Le fichier node_modules contient les modules Javascript utilisés pour le serveur websocket.
Le fichier vendor contient les extensions PHP utilisés pour générer des fichiers .xlsx et pour envoyer des mails (fonctionalité finalement abandonnée).
