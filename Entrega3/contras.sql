CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
contras (uid int, unombre varchar(100), rut varchar(100), edad int, sexo varchar(100), contra varchar(100))


-- declaramos lo que retorna, en este caso un booleano
RETURNS VOID AS $$

-- definimos nuestra función
BEGIN
    -- verificar si existe la columna contrasena, si no existe la agregamos y seteamos la contraseña aleatoriamente
    UPDATE usuarios SET contrasena = contra WHERE usuarios.uid = uid AND usuarios.rut = rut;


-- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql