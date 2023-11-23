======== Definition IDOR (Insecure Direct Object Reference) ==============

L’attaque par Référence directe non sécurisée à un objet (IDOR pour
Insecure Dircet Object Reference) : est une menace sérieuse qui cible souvent
les applications web. Elle survient lorsque les contrôles d’accès inadéquats
permettent à un attaquant d’accéder, de manière non autorisée, à des ressources
ou à des données en manipulant les références aux objets. Cette vulnérabilité
peut compromettre la confidentialité des informations et entraîner des
conséquences graves si elle n’est pas correctement mitigée.

Ainsi, dans notre TP nous avions créés une mini-applications web
(d’architecture client-serveur) conçu en MVC (Model Vue Contrôleur) de bon
de commande des produits informatiques. Les clients ont la possibilité de créer
un compte en fournissant leurs nom prénom Gmail et en créant un mot de passe.

========= Explication de test de simulation de l'attaque avec burpesuite ========

Concernant notre attaque, nous avons exploité une vulnérabilité liée à la suppression
et à la modification de produits au niveau des comptes clients. Pour ce faire, nous
avons utilisé deux navigateurs, l'un pour la victime et l'autre pour l'attaquant. Le
navigateur de l'attaquant était intégré à l'outil que nous avons utilisé, nommé
BurpSuite. En utilisant BurpSuite, l'attaquant a tenté de supprimer un produit à
partir de son propre compte. La requête envoyée au serveur de base de données a
été interceptée par BurpSuite, offrant ainsi à l'attaquant l'opportunité de modifier
l'identifiant obtenu lors de cette interception. L'attaquant a substitué cet identifiant
par celui d'un produit appartenant à un autre compte qui n'aurait normalement pas
les privilèges requis. L'objectif visé était de supprimer les produits d'un autre client
sans que celui-ci n'ait effectué intentionnellement l'action de suppression sur ses
propres produits. Cette manipulation permet à l'attaquant de contourner les contrôles d'accès et
d'effectuer des actions malveillantes au nom d'un autre utilisateur, mettant en
évidence la gravité de la vulnérabilité exploitée.

========= Conclusion =====================

En conclusion, l'utilisation de BurpSuite dans le cadre de notre simulation d'attaque
a permis de mettre en lumière une vulnérabilité significative au niveau de la gestion
des produits des comptes clients. En exploitant cette faille, l'attaquant a réussi à
contourner les contrôles d'accès en modifiant les identifiants des produits lors de la
requête vers le serveur de base de données. Ceci a entraîné la suppression non
autorisée des produits d'un autre client. Il est impératif de remédier à cette
vulnérabilité en renforçant les mécanismes de contrôle d'accès et en mettant en place
des validations appropriées au niveau du serveur pour prévenir de telles attaques.
La sécurisation des opérations de suppression et de modification de produits doit
être une priorité, et des tests de sécurité approfondis devraient être effectués
régulièrement pour identifier et corriger les éventuelles vulnérabilités. Une gestion
rigoureuse des sessions utilisateur et une surveillance constante des activités
suspectes sont également recommandées pour renforcer la sécurité de l'application.