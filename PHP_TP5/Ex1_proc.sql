-- helpers
CREATE PROCEDURE set_error(message VARCHAR(100))
  BEGIN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = message;
  END;

-- 1. student check
DROP PROCEDURE IF EXISTS check_student;
CREATE PROCEDURE check_student(age VARCHAR(100))
  BEGIN
    SET @min = 1;
    SET @max = 45;
    IF age NOT BETWEEN @min AND @max THEN
      SET @message = CONCAT('Age must be between ', @min, ' and ', @max);
      CALL set_error(@message);
    END IF;
  END;

-- 2. teacher check
DROP PROCEDURE IF EXISTS check_teacher;
CREATE PROCEDURE check_teacher(id VARCHAR(100))
  BEGIN
    SET @wildcard = '[^0-9]%';
    IF id NOT LIKE @wildcard THEN
      SET @message = CONCAT('ID must be like : ', @wildcard);
      CALL set_error(@message);
    END IF;
  END;

-- 3. course check
DROP PROCEDURE IF EXISTS check_course;
CREATE PROCEDURE check_course(init VARCHAR(100))
  BEGIN
    SET @regex = '^[A-Z]{2}0[1-9]+';
    IF init NOT REGEXP @regex THEN
      SET @message = CONCAT('Init. must be like : ', @regex);
      CALL set_error(@message);
    END IF;
  END;

-- 4. session check
DROP PROCEDURE IF EXISTS check_session;
CREATE PROCEDURE check_session(room VARCHAR(100), start_time VARCHAR(100), end_time VARCHAR(100))
  BEGIN
    SET @regex = '^[A-Z]\d+';
    IF room NOT REGEXP @regex THEN
      SET @message = CONCAT('Room must be like : ', @regex);
      CALL set_error(@message);
    END IF
    SET @regex = '^(([0-1][0-9])|(2[0-3])):([0-5][0-9])$';
    IF start_time NOT REGEXP @regex OR end_time NOT REGEXP @regex THEN
      SET @message = CONCAT('Time must be like : ', @regex, ' | Example: 04:28');
      CALL set_error(@message);
    END IF;
  END;

-- 5. registration check
-- no check
