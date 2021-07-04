CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
compra_a_realizar (rut_usuario int, id_tienda int, id_producto int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN
    -- verificar si existe el producto en la base de datos
    IF id_producto IN (SELECT productos.pid FROM productos, tienda_vende WHERE tienda_vende.pid = productos.pid AND tienda_vende.tid = id_tienda) THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;

-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql