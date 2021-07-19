-- database
DROP DATABASE IF EXISTS school_db;
CREATE DATABASE IF NOT EXISTS school_db ;
USE school_db;

-- 1. student table
DROP TABLE IF EXISTS student;
CREATE TABLE student (
  num INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  last_name VARCHAR(50),
  first_name VARCHAR(50),
  age INT UNSIGNED
);

-- 2. teacher table
DROP TABLE IF EXISTS teacher;
CREATE TABLE teacher (
  id VARCHAR(50),
  last_name VARCHAR(50),
  first_name VARCHAR(50),
  PRIMARY KEY (id)
);

-- 3. course table
DROP TABLE IF EXISTS course;
CREATE TABLE course (
  init VARCHAR(50),
  title VARCHAR(50),
  responsible_id VARCHAR(50),
  sessions_count INT UNSIGNED,
  PRIMARY KEY (init),
  INDEX (title),
  FOREIGN KEY (responsible_id) REFERENCES teacher(id)
);

-- 4. session table
DROP TABLE IF EXISTS session;
CREATE TABLE session (
  course_init VARCHAR(50),
  num INT UNSIGNED,
  type ENUM('CM', 'TD', 'TP'),
  date DATE,
  room VARCHAR(50),
  start_time VARCHAR(5),
  end_time VARCHAR(5),
  teacher_id VARCHAR(50),
  FOREIGN KEY (course_init) REFERENCES course(init),
  PRIMARY KEY (course_init, num),
  FOREIGN KEY (teacher_id) REFERENCES teacher(id)
);

-- 5. registration table
DROP TABLE IF EXISTS registration;
CREATE TABLE registration (
  student_id INT,
  course_init VARCHAR(50),
  FOREIGN KEY (student_id) REFERENCES student(num),
  FOREIGN KEY (course_init) REFERENCES course(init),
  PRIMARY KEY (student_id, course_init)
);