Ejercicio PHP-2022-003
Realizar una página web, en HTML, con un solo botón que diga procesar. Al hacer click sobre el mismo debe llamar a una página PHP que dispare el programa para resolver la siguiente situación: Elaborar un informe conforme al siguiente modelo: 
Nombre Cantidad de Cantidad de Promedio
del Alumno veces rendidas aprobados (aprob)
Juan Perez 10 5 8.75
José Tuduri 23 6 7.02
Mikael Joki 11 11 9.00
Total Alumnos: 999
Promedio General: 99.99
Para ello contamos con la siguiente base de datos: COLEGIO, que
contiene las tablas: ALUMNOS, DOCENTES, ASIGNATURAS y EXAMENES, cuya
descripciones detallamos, están normalizadas y no tienen claves
primarias.
ALUMNOS Campos:
AluNombre (del alumno, texto 30)
 AluLegajo (entero)
AluOtrosDatos (texto 50)
DOCENTES Campos:
 DocDocente (doc. del docente, texto 8)
 DocNombre (texto 30)
ASIGNATURAS Campos:
AsiAsignatura (cód. de asignatura, entero)
 AsiNombre (nombre asignatura, texto 20)
EXAMENES Campos:
ExaFecha (del Examen, datetime)
AluLegajo (del alumno que rindió, entero)
DocDocente (doc. del docente, texto 8)
ExaNota (nota obtenida, simple prec.)
AsiAsignatura (cód. de asignatura, entero)

NOTAS:1. Las notas son de 1 a 10 y se considera aprobado con 7 o más.