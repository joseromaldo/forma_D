-- SCRIPT EXAMEN FINAL INGENERÍA DE SOFTWARE
CREATE DATABASE company WITH LOG;
-- TABLA PARA EL REGISTRO DE PROGRAMADORES
CREATE TABLE programador(
pro_id SERIAL NOT NULL,
pro_grado VARCHAR (50),
pro_arma VARCHAR (50),
pro_nombre VARCHAR (50),
pro_apellido VARCHAR (50),
pro_correo VARCHAR (50),
PRIMARY KEY (pro_id)
);
-- TABLA PARA EL REGISTRO DE APLICACIONES
CREATE TABLE aplicacion(
apl_id SERIAL NOT NULL,
apl_nombre VARCHAR (50),
apl_estado SMALLINT DEFAULT 1,
apl_descripcion VARCHAR (100),
apl_fechaentrega DATETIME YEAR TO DAY,
PRIMARY KEY (apl_id)
);
-- TABLA PARA EL CONTROL DE ASIGNACIONES
CREATE TABLE asignacion(
asi_id SERIAL NOT NULL,
asi_programador INTEGER,
asi_aplicacion INTEGER,
PRIMARY KEY (asi_id),
FOREIGN KEY (asi_programador) REFERENCES programador (pro_id),
FOREIGN KEY (asi_aplicacion) REFERENCES aplicacion (apl_id)
);
-- TABLA PARA EL CONTROL DE TAREAS Y PROGRESO DEL TRABAJO
CREATE TABLE tarea(
tar_id SERIAL NOT NULL,
tar_nombre VARCHAR (50),
tar_fecha DATETIME YEAR TO DAY,
tar_asignacion INTEGER,
tar_estado DECIMAL (10,2) 
);
