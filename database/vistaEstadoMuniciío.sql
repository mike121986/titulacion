CREATE VIEW estadoMunicipio AS
SELECT es.idEstado,es.estado,m.idMunicipio,m.municipio
FROM estados_municipios em
INNER JOIN estados es ON em.estados_id = es.idEstado
INNER JOIN municipios m ON em.municipios_id = m.idMunicipio;
SELECT *
FROM estadoMunicipio
WHERE estadoMunicipio.idEstado = 12