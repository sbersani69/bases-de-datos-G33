CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
agregar_personal (nombre varchar(100), rut varchar(10), edad int, sexo varchar(100))

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
idmax int;

-- definimos nuestra función
BEGIN

    SELECT INTO idmax
    MAX(usuarios.uid)
    FROM usuarios;

    -- verificar si existe el rut en la base de datos, para ver si agregar o no al usuario (evitar duplicados).
    IF rut NOT IN (SELECT usuarios.rut FROM usuarios) THEN
        INSERT INTO usuarios VALUES(idmax, nombre, rut, edad, sexo);
        RETURN TRUE;
    ELSE
        -- y false si no se agregó
        RETURN FALSE;
    END IF;

-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql