USE school_db;

-- Cherchez le nom et le prénom de tous les étudiants de moins de 20 ans.
SELECT first_name, last_name, age FROM student WHERE age < 20;

-- Cherchez le nom et le prénom de l’enseignant responsable du cours de Statistiques.
SELECT first_name, last_name FROM teacher WHERE id IN (
  SELECT responsible_id FROM course WHERE title LIKE 'Qui%'
);
SELECT first_name, last_name, title AS 'Course' FROM teacher t
INNER JOIN course c ON t.id = c.responsible_id
WHERE title LIKE 'Qui%';

--  Cherchez le nom et le prénom de tous les étudiants inscrits au cours de Probabilités.
SELECT first_name, last_name FROM student WHERE num IN (
  SELECT student_id FROM registration WHERE course_init IN (
    SELECT init FROM course WHERE title LIKE 'Qui%'
  )
);
SELECT
  concat(student.first_name, ' ', student.last_name) AS 'Student',
  title as 'Course',
  concat(teacher.first_name, ' ', teacher.last_name) AS 'Responsible teacher'
FROM student
INNER JOIN registration ON student.num = registration.student_id
INNER JOIN course ON registration.course_init = course.init
INNER JOIN teacher ON course.responsible_id = teacher.id
WHERE title LIKE  'Qui%';

-- Déterminez le nombre d’enseignants intervenant dans le cours de Modélisation Stochatique.
SELECT count(*) as 'Number of teachers teaching Qui' FROM teacher WHERE id IN (
  SELECT responsible_id FROM course WHERE title LIKE 'Qui%'
)

--  Où et quand a lieu le premier cours d’Algèbre linéaire ?
SELECT
  title AS 'course_title',
  session.num AS 'session_id',
  date, start_time, end_time,
  room AS 'place'
FROM course
INNER JOIN session ON session.course_init = course.init
WHERE title = 'Alias qui in.'
-- GROUP BY title;

-- Affichez un « emploi du temps » du cours de Logique.

-- Pour chaque enseignant, indiquez le nombre de cours dans lesquels il intervient
-- (restreignez les réponses à l’ensemble des enseignants qui interviennent dans au moins deux cours).

-- Ajoutez un cours magistral de Logique le 14 décembre
-- avec Jacques Herbrand en salle S250 de 14h à 18h.

-- Listez les étudiants inscrits à aucun cours.

-- Combien d’étudiants (différents) ont assistés à au moins
-- une séance animée par Leonhard Euler ?