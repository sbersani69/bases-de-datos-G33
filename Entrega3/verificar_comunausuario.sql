CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
verificar_comunausuario (id_direccion int, id_tienda int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN
    -- verificar si existe el producto en la base de datos
    IF id_direccion IN (SELECT direcciones.did FROM direcciones, tiendas, despachan_a WHERE tiendas.tid = despachan_a.tid AND despachan_a.comunaid = direcciones.comunaid AND tiendas.tid = id_tienda) THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;

-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql