
-- SELECT * FROM detallesPedido WHERE id = 6;
ALTER VIEW detallesPedido as
SELECT pe.*,us.id AS idUsuario,concat(us.nombre,' ',us.apellidos) AS nombreCliente,mun.municipio,es.estado AS NombrEstado  
FROM  pedidos pe
INNER JOIN usuarios us
ON pe.usuario_id = us.id 
INNER JOIN  estados_municipios em
ON pe.municpio = em.id
INNER JOIN municipios mun
ON em.municipios_id = mun.idMunicipio
INNER JOIN estados es
ON em.estados_id = es.idEstado
-- WHERE pe.id = 5


