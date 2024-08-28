-- Active: 1715847444276@@127.0.0.1@3306@cp
CREATE TRIGGER maj_total AFTER INSERT ON lignedecommande
    FOR EACH ROW
    BEGIN
    DECLARE id_c INT;
    DECLARE tot DOUBLE;
    SET id_c = NEW.id_commande; -- nous captons le numéro de commande concerné
    SET tot = (SELECT sum(prix*quantite) FROM lignedecommande WHERE id_commande=id_c); -- on recalcule le total
        -- SET tot = ??? (prévoir le calcul de la remise) 
    UPDATE commande SET total=tot WHERE id=id_c; -- on stocke le total dans la table commande
    END;

insert into lignedecommande
(id_commande, id_produit, quantite, prix)
VALUES
(3, 5, 3, 1000);

select * from commande where id=3;