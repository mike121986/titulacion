DROP PROCEDURE if exists alraCategoria ;
delimiter //
CREATE PROCEDURE altaCategoria
(IN _nombreCategoria VARCHAR(100))

 begin
 	 DECLARE exite INT;
 	 DECLARE idCategoria INT;
 	 SELECT COUNT(categorias.id) INTO exite FROM categorias WHERE categorias.nombre =  _nombreCategoria;
 	 
 	 if exite = 1 then
 	 	SELECT categorias.id INTO idCategoria FROM categorias WHERE categorias.nombre =  _nombreCategoria;
 	 	
 	 	UPDATE categorias
 	 	SET statusCategoria = 1
 	 		WHERE id = idCategoria;
 	else
 	 		INSERT INTO categorias (nombre,statusCategoria) VALUES (_nombreCategoria,1);
	END if;
 	 
 END;
 
 //
 
 
 CALL altaCategoria('hola amigo');