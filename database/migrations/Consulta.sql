
-- SELECT area ,nombre_funcionario FROM personas GROUP BY area, nombre_funcionario ORDER BY area ASC ;
-- SELECT nombre_funcionario, nombre_equipo,fecha_mant_est,fecha_retiro,fecha_entrega,observaciones,firma FROM formatos f JOIN usuarios u ON u.id=f.usuario_id ;
-- SELECT * FROM personas WHERE nombre_funcionario LIKE '%LEON%';

-- SELECT c.id, u.name , AREA, fecha_solicitud, tipo_solicitud, detalle_solicitud, estado , estado_gestion  FROM compras c  JOIN users u ON c.id= u.id;

-- SELECT c.* , u.name FROM compras c JOIN users u ON c.autorizado_por = u.id WHERE c.autorizado_por;  

-- SELECT ch.id, ch.descripcion FROM compras c JOIN  c_histories ch ON c.id = ch.compra_id WHERE c.id=1;

-- SELECT * FROM mysql.time_zone_name ;


-- SELECT p.nombre_funcionario, e.fecha_entrega,a.descripcion,de.cantidad_entregada,  e.firma , e.firma_sgsst FROM personas p join entrega_ssts e ON p.id=e.persona_id join detalle_entrega_ssts de 
-- ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id WHERE e.persona_id = 7; 

-- SELECT p.nombre_funcionario, e.fecha_entrega,a.descripcion,de.cantidad_entregada,  e.firma , e.firma_sgsst FROM personas p join entrega_ssts e ON p.id=e.persona_id join detalle_entrega_ssts de 
-- ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id; 

-- SET GLOBAL local_infile=1;
-- SHOW GLOBAL VARIABLES LIKE 'local_infile';


-- Consulta que me trae el total de articulos entregados en un rango de fecha o una fecha especifica
-- SELECT  a.nombre,SUM(de.cantidad_entregada) AS cantidad FROM entrega_ssts e join detalle_entrega_ssts de ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id WHERE e.fecha_entrega BETWEEN '2023-05-18' AND '2023-05-24' GROUP BY a.nombre ;

-- Consulta que me trae el total de articulos x entregados en un rango de fecha o una fecha especifica
-- SELECT  a.nombre,SUM(de.cantidad_entregada) AS cantidad FROM entrega_ssts e join detalle_entrega_ssts de ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id WHERE a.nombre='arnes' and e.fecha_entrega BETWEEN '2023-05-18' AND '2023-05-24';

-- Consulta cantidad de articulos total entregados a X persona
-- SELECT p.nombre_funcionario,a.nombre,SUM(de.cantidad_entregada) FROM personas p join entrega_ssts e ON p.id=e.persona_id join detalle_entrega_ssts de ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id WHERE e.persona_id = 1 GROUP BY a.nombre;


-- Consulta cantidad de articulos total entregados a todas las personas

-- SELECT p.nombre_funcionario, a.nombre, SUM(de.cantidad_entregada) AS cantidad FROM personas p join entrega_ssts e ON p.id=e.persona_id join detalle_entrega_ssts de ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id GROUP BY p.nombre_funcionario, a.nombre;

-- Consulta cantidad de articulos total entregados a X persona en una rango de fecha estipulada
-- SELECT p.nombre_funcionario,a.nombre,SUM(de.cantidad_entregada) FROM personas p join entrega_ssts e ON p.id=e.persona_id join detalle_entrega_ssts de ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id WHERE e.persona_id = 10 AND e.fecha_entrega BETWEEN '2023-05-18' AND '2023-05-23' GROUP BY a.nombre;


-- Consulta cantidad de articulos total entregados a todas las personas de dicha sede

-- SELECT p.nombre_funcionario, a.nombre, SUM(de.cantidad_entregada) AS cantidad FROM personas p join entrega_ssts e ON p.id=e.persona_id join detalle_entrega_ssts de ON e.id=de.entregas_id JOIN articulos_ssts a ON de.articulos_id=a.id WHERE p.empresa LIKE '%BPACK S.A.S%' GROUP BY p.nombre_funcionario, a.nombre ;







