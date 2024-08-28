

drop PROCEDURE `listeClient`;


CREATE PROCEDURE listeClient()
BEGIN
    SELECT * FROM vente;
END;



CALL listeClient();

