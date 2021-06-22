CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
comprobar_rut (rut2 varchar(100))

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN

    -- verificar si existe el rut en la base de datos, para ver si agregar o no al usuario (evitar duplicados).
    IF rut2 IN (SELECT usuarios.rut FROM usuarios) THEN
        RETURN TRUE;
    ELSE
        -- y false si no se agregó
        RETURN FALSE;
    END IF;

-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql