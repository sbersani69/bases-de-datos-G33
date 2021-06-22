CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
agregar_personal (nombre varchar(100), rut varchar(10), edad int, sexo varchar(100), direccion int)

-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
idmax int;
idmax2 int;

-- definimos nuestra función
BEGIN

    SELECT INTO idmax
    MAX(usuarios.uid)
    FROM usuarios;

    SELECT INTO idmax2
    MAX(direcciones_asociadas.dir_as_id)
    FROM direcciones_asociadas;

    -- verificar si existe el rut en la base de datos, para ver si agregar o no al usuario (evitar duplicados).
    IF rut NOT IN (SELECT usuarios.rut FROM usuarios) THEN
        INSERT INTO usuarios VALUES(idmax+1, nombre, rut, edad, sexo);
        INSERT INTO direcciones_asociadas VALUES(idmax2+1, idmax+1, direccion);
        RETURN TRUE;
    ELSE
        -- y false si no se agregó
        RETURN FALSE;
    END IF;

-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql