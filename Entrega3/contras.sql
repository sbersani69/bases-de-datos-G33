CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
contras (uid int, unombre varchar(100), rut varchar(100), edad int, sexo varchar(100), contra varchar(100))


-- declaramos lo que retorna, en este caso un booleano
RETURNS VOID AS $$

-- definimos nuestra función
BEGIN
    -- seteamos la contraseña hecha aleatoriamente
    UPDATE usuarios SET contraseña = contra WHERE usuarios.uid = uid AND usuarios.rut = rut;


-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql