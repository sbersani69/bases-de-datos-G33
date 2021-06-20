CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
contrasena1 (uid int, unombre varchar(100), rut varchar(100), edad int, sexo varchar(100), did int)


-- declaramos lo que retorna, en este caso un booleano
RETURNS BOOLEAN AS $$


-- definimos nuestra función
BEGIN

    -- verificar si existe la columna contrasena, si no existe la agregamos y seteamos la contraseña aleatoriamente
    IF 'contrasena' NOT IN (SELECT column_name FROM information_schema.columns WHERE table_name='usuarios') THEN
        ALTER TABLE usuarios ADD contrasena int;
        UPDATE usuarios SET contrasena = 100;
    END IF;

    -- si el uid en el argumento no está en la tabla, agregamos el usuario
    -- notar que ahora debemos agregar el dato de la columna generation en el values a insertar
    IF uid NOT IN (SELECT uid from usuarios) THEN
        INSERT INTO usuarios values(uid, unombre, rut, edad, sexo, did, 100);

        -- retornamos true si se agregó el valor
        RETURN TRUE;
    ELSE
        -- y false si no se agregó
        RETURN FALSE;

    END IF;

-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql