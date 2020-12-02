# Le fonctionnement d'un hacker

1. Collecter le maximun d'informations sur une personne (Dox)
    * Les donnnées qu'un hacker essaie de collecter
        * Adressage IP
        * Numéros de téléphone
        * Adresses Emails
        * Système d’exploitation
        * Logiciels installés sur la machine de la victime
        * Noms de domaine
        * Protocoles de réseau
        * Services activés 
        * Architecture des serveurs

    >Pour cela, un hacker utilise deux techniques:
    Interagir directement avec la cible pour recueillir des informations. Par exemple, utiliser l’outil Nmap pour scanner le réseau de la victime.
    Collecter les informations sur la cible depuis les réseaux sociaux et les moteurs de recherches.

2. Identifier le point faible de la cible
    * Le but est de trouver des vulnérabilités sur le système de la cible

    * Voici quelques outils de repérage des vulnérabilités:

        1. Scanner des vulnérabilités ( Messus; SAINT; N-Stealth )
        2. Sites web spécialisées ( SecurityFocus; Insecure.org)
        3. Analyseur de trames ou «Sniffer» (Winpcap; Windump;
        4. TCPDump; SSLDump; NeoTrace-Ettercap; Netstat).

3. Accès et exploitation du point faible

    >L’exploitation d’une vulnérabilité se fait soit par un programme malveillant ou un script shell,  souvent compilé sur la machine cible, pour extension de privilèges, erreur système, etc. Il vous faudra certaines qualités humaines pour réussir l’exploitation de failles : patience, persévérance et discrétion. 

4. Prendre le contrôle total
    >Le pirate informatique à obtenu un accès illimité sur tout le réseau cible. Vient ensuite le maintien pour pouvoir revenir quand il veut. Pour ce faire, les pirates peuvent installer secrètement des programmes malveillants  qui leur permettent de revenir aussi souvent qu’ils le souhaitent.

5. Nettoyage
    >Habituellement, lorsque l’attaquant a obtenu un niveau de maîtrise suffisant sur le réseau, il efface toute trace de son passage en supprimant tous les fichiers créés, et corriger les Logs.