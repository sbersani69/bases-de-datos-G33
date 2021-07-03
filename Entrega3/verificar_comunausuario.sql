CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
verificar_comunausuario (rut_usuario varchar, id_tienda int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN
    -- verificar si existe el producto en la base de datos
    IF rut_usuario IN (SELECT usuarios.rut FROM usuarios, direcciones_asociadas, direcciones, comunas, tiendas, despachan_a WHERE usuarios.uid = direcciones_asociadas.uid AND
    direcciones_asociadas.did = direcciones.did AND direcciones.comunaid = comunas.comunaid AND tiendas.tid = id_tienda AND despachan_a.tid = tiendas.tid AND despachan_a.comunaid = comunas.comunaid) THEN
        RETURN TRUE;
    ELSE
        RETURN FALSE;
    END IF;

-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql

