CREATE TRIGGER nom AFTER INSERT  
    ON produit 
    FOR EACH ROW 
    BEGIN
        DECLARE qte INT;
        SET qte = NEW.qteann;
        IF qte<0 
            THEN SIGNAL SQLSTATE '40000' SET MESSAGE_TEXT = 'ARGHHHH !!!';
        END IF;
    END; 
|

insert into produit (codart, stkphy, stkale, libart, qteann, unimes)
values ('xxx', 10, 3, 'bel article', 500, '???');