use universidad2025;

-- Insertar departamentos
INSERT INTO departamento (nombre) VALUES
                                      ('Matemáticas'),
                                      ('Física'),
                                      ('Informática');
-- Insertar sexos
INSERT INTO sexo (genero) VALUES
                              ('H'),
                              ('M');
INSERT INTO tipo_persona(tipo) values
                                   ('profesor'),
                                   ('alumno');

-- Insertar personas (2 profesores, 2 alumnos)
INSERT INTO persona (
    nif, nombre, apellido1, apellido2, ciudad, direccion, telefono, fecha_nacimiento, id_sexo, id_tipo_persona
) VALUES
      ('12345678A', 'Juan', 'Pérez', 'López', 'Madrid', 'Calle A, 123', '600123456', '1980-05-10', 1, 1),
      ('87654321B', 'Luis', 'Martín', 'Rojas', 'Sevilla', 'Calle B, 45', '600654321', '1975-03-20', 1, 1),
      ('23456789C', 'Ana', 'García', 'Mendoza', 'Valencia', 'Calle C, 78', '600234567', '2002-06-15', 2, 2),
      ('98765432D', 'Lucía', 'Sánchez', 'Torres', 'Bilbao', 'Calle D, 98', '600987654', '2001-11-02', 2, 2);


-- Insertar profesores
INSERT INTO profesor (id_profesor, id_departamento) VALUES
                                                        (1, 1),
                                                        (2, 3);

-- Insertar alumnos
INSERT INTO alumno (id_alumno) VALUES
                                   (3),
                                   (4);

-- Insertar grados
INSERT INTO grado (nombre) VALUES
                               ('Grado en Matemáticas'),
                               ('Grado en Física'),
                               ('Grado en Ingeniería Informática');

-- Insertar asignaturas
INSERT INTO asignatura (
    nombre, creditos, tipo, curso, cuatrimestre, id_profesor, id_grado
) VALUES
      ('Álgebra Lineal', 6.00, 'basica', 1, 1, 1, 1),
      ('Cálculo Diferencial', 6.00, 'obligatoria', 1, 2, 2, 1),
      ('Programación I', 6.00, 'obligatoria', 1, 1, 2, 3);

-- Insertar cursos escolares
INSERT INTO curso_escolar (anyo_inicio, anyo_fin) VALUES
                                                      (2023, 2024),
                                                      (2024, 2025);

-- Insertar matrículas
INSERT INTO alumno_se_matricula_asignatura (
    id_alumno, id_asignatura, id_curso_escolar
) VALUES
      (3, 1, 1),
      (3, 2, 1),
      (4, 3, 1);

-- Insertar notas
INSERT INTO nota (
    id_alumno, id_asignatura, id_curso_escolar, nota
) VALUES
      (3, 1, 1, 8.50),
      (3, 2, 1, 7.75),
      (4, 3, 1, 9.20);