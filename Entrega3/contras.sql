CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
contras (uid int, unombre varchar(100), rut varchar(100), edad int, sexo varchar(100))


-- declaramos lo que retorna, en este caso un booleano
RETURNS VOID AS $$

-- definimos nuestra función
BEGIN

    -- verificar si existe la columna contrasena, si no existe la agregamos y seteamos la contraseña aleatoriamente
    IF 'contrasena' NOT IN (SELECT column_name FROM information_schema.columns WHERE table_name='usuarios') THEN
        ALTER TABLE usuarios ADD contrasena varchar(100);
        UPDATE usuarios SET contrasena = (SELECT substring(usuarios.rut, 0, 4) FROM usuarios);
    END IF;


-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql