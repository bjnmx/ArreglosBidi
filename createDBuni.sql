DROP DATABASE IF EXISTS universidad2025;
CREATE DATABASE universidad2025 CHARACTER SET utf8mb4 COLLATE=utf8mb4_unicode_ci;
USE universidad2025;
SET NAMES utf8mb4;

CREATE TABLE departamento (
                              id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                              nombre VARCHAR(50) NOT NULL,
                              INDEX(nombre)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 1. Crear tabla sexo
CREATE TABLE sexo (
                      id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      genero ENUM('H','M') NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 2. Crear tabla tipo_persona
CREATE TABLE tipo_persona (
                              id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                              tipo ENUM('profesor','alumno') NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Ahora sí: crear persona
CREATE TABLE persona (
                         id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                         nif VARCHAR(9) UNIQUE,
                         nombre VARCHAR(25) NOT NULL,
                         apellido1 VARCHAR(50) NOT NULL,
                         apellido2 VARCHAR(50),
                         ciudad VARCHAR(25) NOT NULL,
                         direccion VARCHAR(50) NOT NULL,
                         telefono VARCHAR(9),
                         fecha_nacimiento DATE NOT NULL,
                         id_sexo TINYINT UNSIGNED NOT NULL,
                         id_tipo_persona TINYINT UNSIGNED NOT NULL,
                         FOREIGN KEY (id_sexo) REFERENCES sexo(id),
                         FOREIGN KEY (id_tipo_persona) REFERENCES tipo_persona(id),
                         INDEX(id_sexo),
                         INDEX(id_tipo_persona)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO sexo (genero) VALUES ('H'), ('M');
INSERT INTO tipo_persona (tipo) VALUES ('profesor'), ('alumno');



-- crear tabla profesor
create table profesor(
    id_profesor int unsigned primary key,
    id_departamento int unsigned not null ,
    foreign key (id_profesor) references persona(id) on delete cascade,
    foreign key (id_departamento) references departamento(id) on delete cascade,
    INDEX(id_departamento)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



-- crear tabla alumno
create table alumno (
    id_alumno int unsigned primary key,
    foreign key (id_alumno) references persona(id) on delete cascade
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- crear tabla de grado
create table grado(
        id int unsigned auto_increment primary key,
        nombre varchar(100) not null
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- crear tabla de asignatura
create table asignatura(
    id int unsigned auto_increment primary key,
    nombre varchar(100) not null,
    creditos float(4,2) unsigned not null,
    tipo enum('basica','obligatoria','optativa') not null,
    curso tinyint unsigned not null,
    cuatrimestre tinyint unsigned not null,
    id_profesor int unsigned,
    id_grado int unsigned not null,
    foreign key (id_profesor) references profesor(id_profesor) on delete set null,
    foreign key (id_grado) references grado(id) on delete cascade,
    INDEX(id_profesor),
    INDEX(id_grado)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- crear tabla de curso escolares
create table curso_escolar(
    id int unsigned auto_increment primary key,
    anyo_inicio YEAR NOT NULL,
    anyo_fin YEAR NOT NULL
) ENGINE =InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- crear tabla de matriculas de alumnos en asignaturas
create table alumno_se_matricula_asignatura(
    id_alumno int unsigned not null,
    id_asignatura int unsigned not null,
    id_curso_escolar int unsigned not null,
    primary key (id_alumno,id_asignatura,id_curso_escolar),
    foreign key (id_alumno) references alumno(id_alumno) on delete cascade,
    foreign key (id_asignatura) references asignatura(id) on delete  cascade,
    foreign key (id_curso_escolar) references curso_escolar(id) on delete cascade,
    INDEX(id_asignatura),
    INDEX(id_curso_escolar)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- crear tabla de notas de evaluación
create table nota(
    id_alumno int unsigned,
    id_asignatura int unsigned,
    id_curso_escolar int unsigned,
    nota decimal(4,2) check ( nota >= 0.00 and nota <= 10.00 ),
    PRIMARY KEY (id_alumno,id_asignatura,id_curso_escolar),
    FOREIGN KEY (id_alumno) REFERENCES  alumno(id_alumno) ON DELETE CASCADE,
    FOREIGN KEY (id_asignatura) REFERENCES  asignatura(id) ON DELETE CASCADE,
    FOREIGN KEY (id_curso_escolar) REFERENCES  curso_escolar(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT  CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;