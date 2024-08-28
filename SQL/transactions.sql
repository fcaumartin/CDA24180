select * from vente;

START TRANSACTION;

delete from vente;

ROLLBACK;
COMMIT;
