# CVE Kesako
Common Vulnerabilities and Exposures ou CVE est un dictionnaire des informations publiques relatives aux vulnérabilités de sécurité. Le dictionnaire est maintenu par l'organisme MITRE, soutenu par le département de la Sécurité intérieure des États-Unis. 

* https://www.cvedetails.com/

# Identifiant CVE 
Les identifiants CVE sont attribués par des autorités déléguées, les CNA (CVE Numbering Authority). Il existe environ 100 CNA qui représentent les principaux fournisseurs informatiques, ainsi que des entreprises de sécurité et des organismes de recherche.Le MITRE peut également émettre des CVE directement.

Les CNA disposent de blocs d'identifiants CVE alloués par le MITRE, qui sont réservés et attribués aux failles au moment de leur découverte. Des milliers d'identifiants CVE sont émis chaque année. Un seul produit complexe, un système d'exploitation par exemple, peut cumuler des centaines de CVE.

Les rapports de CVE peuvent avoir diverses origines : un fournisseur, un chercheur ou même un utilisateur avisé peut découvrir une faille et la signaler. De nombreux fournisseurs proposent des programmes de bug bounty qui encouragent et récompensent le signalement responsable des failles de sécurité. Si vous découvrez une vulnérabilité dans un logiciel Open Source, vous devriez la soumettre à la communauté.

* Source : https://www.redhat.com/fr/topics/security/what-is-cve

# CVE 08/12/21

Une faille permettant le DLL hijacking a été trouvé sur les logiciels Foxit Reader et PhantomPDF avant la version 10.1.4.

* Source : https://www.cvedetails.com/cve/CVE-2021-38571/

# DLL Hijacking Kesako 
Le "détournement de DLL" est une méthode d'injection de code malveillant dans une application en exploitant la façon dont certaines applications Windows recherchent et chargent les bibliothèques de liens dynamiques (DLL).

Uniquement les OS microsft sont vulnérable à cette faille.

En replaçant un fichier de DLL requis par une version infecté et le placer dans les paramètres de recherche d'une application, le fichier infecté sera utiliser quand l'application sera lancer. Tout en activant le code malveillant

* Source : https://www.upguard.com/blog/dll-hijacking