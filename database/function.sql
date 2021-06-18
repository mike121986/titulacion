DROP FUNCTION verifDelete;
DELIMITER //
CREATE FUNCTION verifDelete(idProducto INT) RETURNS INT 
BEGIN 
	
	DECLARE confirma INT;
	DECLARE aceptar INT;
	
	SELECT COUNT(categoria_id) INTO confirma FROM catProd
	WHERE categoria_id = idProducto;
	
	if confirma>0 THEN
		SET aceptar = 1; 
	else
		SET aceptar = 0;
			UPDATE categorias 
			SET statusCategoria = 0
			WHERE id = idProducto;
	END if;

	RETURN aceptar;
END;
	//
	
	
	
	