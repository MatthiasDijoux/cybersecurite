# SUID ou SETUID
Dans le cadre des permissions Unix, Setuid, parfois suid, abréviation de « Set User ID », est un moyen de transférer des droits aux utilisateurs. 
Quand un fichier exécutable est la propriété de l'utilisateur root, et est rendu setuid, tout processus exécutant ce fichier peut effectuer ses tâches avec les permissions associées à root, ce qui constitue un risque de sécurité pour la machine, s'il existe une faille dans ce programme. En effet, un hacker pourrait utiliser cette faille pour effectuer des opérations réservées à root, par exemple en se créant un compte d'accès illimité en temps et en pouvoirs.

# Droit SUID
Ce droit s'applique aux fichiers exécutables, il permet d'allouer temporairement à un utilisateur les droits du propriétaire du fichier, durant son exécution. En effet, lorsqu'un programme est exécuté par un utilisateur, les tâches qu'il accomplira seront restreintes par ses propres droits, qui s'appliquent donc au programme. Lorsque le droit SUID est appliqué à un exécutable et qu'un utilisateur quelconque l'exécute, le programme détiendra alors les droits du propriétaire du fichier durant son exécution. Bien sûr, un utilisateur ne peut jouir du droit SUID que s'il détient par ailleurs les droits d'exécution du programme. Ce droit est utilisé lorsqu'une tâche, bien que légitime pour un utilisateur classique, nécessite des droits supplémentaires (généralement ceux de root). Il est donc à utiliser avec précaution. Pour des partitions supplémentaires, il faut activer le bit suid pour pouvoir l'utiliser en le spécifiant dans les options des partitions concernés dans le fichier fstab. 

# Valeur 
Le droit SUID possède la valeur octale 4000.
Exemple : - r w s r - x r - x correspond à 4755. 

# Exemple de commande suid

 * ls -l /bin/su

 * ls -l /bin/ping

 * ls -l /bin/mount

 * ls -l /bin/umount

 * ls -l /usr/bin/passwd


# Protection contre attaque
Sur Linux, des restrictions de droit ont été faites sur le drapeau SUID :

    pour un fichier de script, l'exécution se fera sans tenir compte du drapeau SUID
    Il semble de plus que si un utilisateur autre que le propriétaire modifie le fichier, alors le bit SUID est remis à 0.

Il n'est pas sûr que les versions d'Unix actuelles aient implémenté cette sécurité ; dans ce cas, cela ouvre la porte à une attaque qui est appelée sushi (su shell) : l'utilisateur root crée un fichier de shell avec le bit SUID en laissant les droits en écriture à d'autres utilisateurs ; l'un d'eux pourra modifier le fichier et exécuter tout ce qu'il voudra avec les droits de root. 