-- 1. Quelles sont les commandes du fournisseur 09120 ?
select * 
from entcom
where numfou=9120;

-- 2. Afficher le code des fournisseurs pour lesquels des commandes ont été
-- passées.
select distinct numfou
from entcom;


-- 3. Afficher le nombre de commandes fournisseurs passées, et le nombre
-- de fournisseur concernés.
select count(*) 'commandes', count(distinct entcom.numfou) 'fournisseurs'
from entcom
join fournis on entcom.numfou=fournis.numfou;




-- 4. Afficher les produits ayant un stock inférieur ou égal au stock d'alerte et
-- dont la quantité annuelle est inférieur à 1000
-- (informations à fournir : n° produit, libellé produit, stock, stock actuel
-- d'alerte, quantité annuelle)
select codart, libart, stkphy, stkale, qteann
from produit
where stkphy<=stkale AND qteann<1000;










-- 5. Quels sont les fournisseurs situés dans les départements 75 78 92 77 ?
-- L’affichage (département, nom fournisseur) sera effectué par
-- département décroissant, puis par ordre alphabétique
select *
from fournis
where posfou like '92%' OR posfou like '75%' OR posfou like '77%' OR posfou like '78%';

select *
from fournis
where SUBSTRING(posfou, 1, 2) IN (92, 75, 77, 78);






-- 6. Quelles sont les commandes passées au mois de mars et avril ?
select *
from entcom
where MONTH(datcom) BETWEEN 3 AND 4;







-- 7. Quelles sont les commandes du jour qui ont des observations
-- particulières ?
-- (Affichage numéro de commande, date de commande)
select *
from entcom
where obscom is not null AND obscom!='';









-- 8. Lister le total de chaque commande par total décroissant
-- (Affichage numéro de commande et total)
select numcom, sum(qtecde * priuni) as 'total'
from ligcom
group by numcom
order by total DESC;








-- 9. Lister les commandes dont le total est supérieur à 1000€ ; on exclura
-- dans le calcul du total les articles commandés en quantité supérieure
-- ou égale à 1000.
-- (Affichage numéro de commande et total)
select numcom, sum(qtecde * priuni) as 'total'
from ligcom
where qtecde<1000
group by numcom
HAVING total>1000
order by total DESC;











-- 10. Lister les commandes par nom fournisseur
-- (Afficher le nom du fournisseur, le numéro de commande et la date)
select f.nomfou, e.numcom, e.datcom
from entcom e
join fournis f on e.numfou=f.numfou;







-- 11. Sortir les produits des commandes ayant le mot "urgent' en
-- observation?
-- (Afficher le numéro de commande, le nom du fournisseur, le libellé du
-- produit et le sous total = quantité commandée * Prix unitaire)
select e.numcom, e.obscom, f.nomfou, p.libart, l.qtecde * l.priuni
from entcom e
join fournis f on f.numfou=e.numfou
join ligcom l on l.numcom=e.numcom
join produit p on l.codart=p.codart
where obscom like '%urgent%';



-- 12. Coder de 2 manières différentes la requête suivante :
-- Lister le nom des fournisseurs susceptibles de livrer au moins un article
select distinct f.nomfou
from fournis f
join entcom e on e.numfou=f.numfou
join ligcom l on l.numcom=e.numcom
where l.qtecde>l.qteliv;

select nomfou from fournis where numfou in (
    select numfou from entcom where numcom in 
        (
            select numcom from ligcom where qteliv<qtecde
        )
);
    
  










13. Coder de 2 manières différentes la requête suivante
Lister les commandes (Numéro et date) dont le fournisseur est celui de
la commande 70210 :
14. Dans les articles susceptibles d’être vendus, lister les articles moins
chers (basés sur Prix1) que le moins cher des rubans (article dont le
premier caractère commence par R). On affichera le libellé de l’article
et prix1
15. Editer la liste des fournisseurs susceptibles de livrer les produits
dont le stock est inférieur ou égal à 150 % du stock d'alerte. La liste est
triée par produit puis fournisseur
16. Éditer la liste des fournisseurs susceptibles de livrer les produit dont
le stock est inférieur ou égal à 150 % du stock d'alerte et un délai de
livraison d'au plus 30 jours. La liste est triée par fournisseur puis
produit
17. Avec le même type de sélection que ci-dessus, sortir un total des
stocks par fournisseur trié par total décroissant
18. En fin d'année, sortir la liste des produits dont la quantité réellement
commandée dépasse 90% de la quantité annuelle prévue.
19. Calculer le chiffre d'affaire par fournisseur pour l'année 93 sachant
que les prix indiqués sont hors taxes et que le taux de TVA est 20%.