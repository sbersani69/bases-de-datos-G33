CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
contras (uid int, unombre varchar(100), ruti varchar(100), edad int, sexo varchar(100), contra varchar(100))


-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN
    -- seteamos la contraseña hecha aleatoriamente

    IF ruti IN (SELECT usuarios.rut FROM usuarios) THEN
        UPDATE usuarios SET contraseña = contra WHERE usuarios.rut = ruti;
        RETURN TRUE;
    ELSE
        -- y false si no se agregó
        RETURN FALSE;
    END IF;


-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql