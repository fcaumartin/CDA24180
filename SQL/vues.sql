-- Active: 1715847444276@@127.0.0.1@3306@papyrus


create view produits_commandes
as
select ligcom.codart, qtecde, qteann
from ligcom 
join produit on produit.codart=ligcom.codart
order by ligcom.codart;



select codart 
from produits_commandes
where qteann>300;


