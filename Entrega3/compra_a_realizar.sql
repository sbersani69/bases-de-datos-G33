CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
compra_a_realizar (id_usuario int, id_tienda int, id_direccion int, id_producto int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
idmax int;

-- definimos nuestra función
BEGIN

    SELECT INTO idmax
    MAX(compras.cid)
    FROM compras;

    IF rut_usuario IN (SELECT usuarios.rut FROM usuarios) THEN
        INSERT INTO compras VALUES(idmax+1, id_usuario, id_direccion, id_tienda);
        INSERT INTO productos_compra VALUES(idmax+1, id_producto, 1);
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;

-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql