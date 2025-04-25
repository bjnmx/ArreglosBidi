-- 🅰️ a) Nombre y apellidos de todos los alumnos
select nombre, apellido1, apellido2
from persona
join alumno on persona.id = alumno.id_alumno;


-- 🅱️ b) Profesores + nombre del departamento
select persona.nombre,persona.apellido1, persona.apellido2, departamento.nombre AS departamento
    from persona
    join profesor ON persona.id = profesor.id_profesor
    join departamento ON profesor.id_departamento = departamento.id;



-- 🅲 c) Profesores que no imparten ninguna asignatura
SELECT p.nombre, p.apellido1,p.apellido2,s.genero AS sexo
        FROM persona p
        JOIN profesor prof ON p.id = prof.id_profesor
        LEFT JOIN asignatura a ON prof.id_profesor = a.id_profesor
        JOIN sexo s ON p.id_Sexo = s.id
        WHERE a.id IS NULL;

-- 🅳 d) Número total de alumnos

SELECT COUNT(*) as total_alumnos
    from alumno;

-- 🅴 e) Asignaturas de un alumno en particular (ejemplo: alumno con ID 3)
select a.nombre as  asignatura
    from alumno_se_matricula_asignatura am
    join asignatura a ON am.id_asignatura = a.id
    where am.id_alumno = 3;




-- 🅵 f) Asignaturas + profesor que las imparte
select a.nombre as asignatura, p.nombre, p.apellido1, p.apellido2
    FROM asignatura a
    JOIN profesor prof ON a.id_profesor = prof.id_profesor
    JOIN persona p ON prof.id_profesor = p.id;




-- 🅶 g) Alumnos de una asignatura específica (ejemplo: asignatura ID = 1)
select per.nombre, per.apellido1, per.apellido2
    from alumno_se_matricula_asignatura am
    join persona  per ON am.id_alumno = per.id
    where am.id_asignatura  = 1;

SELECT
    per.nombre AS alumno_nombre,
    per.apellido1,
    per.apellido2,
    asi.nombre AS asignatura
FROM alumno_se_matricula_asignatura am
         JOIN persona per ON am.id_alumno = per.id
         JOIN asignatura asi ON am.id_asignatura = asi.id
WHERE am.id_asignatura = 1;



--  3.2 Generación de procedimientos almacenados
--- Retoma las consultas e) y g) y realízalas mediante un procedimiento almacenado, ingresando el alumno y asignatura como parámetros de entrada respectivamente.
DELIMITER $$

CREATE PROCEDURE asignaturas_por_alumno(IN alumno_id INT)
BEGIN
SELECT
    a.nombre AS asignatura,
    a.tipo,
    a.curso,
    a.cuatrimestre
FROM alumno_se_matricula_asignatura am
         JOIN asignatura a ON am.id_asignatura = a.id
WHERE am.id_alumno = alumno_id;
END;

DELIMITER ;

CALL asignaturas_por_alumno(3);
