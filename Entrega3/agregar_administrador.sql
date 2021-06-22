CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
agregar_administrador (rut_admin varchar(100))

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- definimos nuestra función
BEGIN
    -- verificar si existe el rut en la base de datos, para ver si agregar o no al usuario (evitar duplicados).
    IF rut_admin NOT IN (SELECT administradores.rut_adm FROM administradores) THEN
        INSERT INTO administradores VALUES(rut_admin);
        RETURN TRUE;
    ELSE
        -- y false si no se agregó
        RETURN FALSE;
    END IF;

-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql