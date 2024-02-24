-- Drop all Tables
DROP TABLE IF EXISTS t_quiz, t_questions, `t_options`, t_results, p_quiz, p_questions, `p_options`, p_results;


-- Personality Tables

-- Create the 'p_quiz' table
CREATE TABLE p_quiz (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL
);

-- Create the 'p_questions' table
CREATE TABLE p_questions (
    quiz_id INT,
    title VARCHAR(255) NOT NULL,
    options_id INT,
    FOREIGN KEY (quiz_id) REFERENCES quiz(id),
    FOREIGN KEY (options_id) REFERENCES options(id)
);

-- Create the ‘p_options’ table
CREATE TABLE p_options (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    result_id INT,
    FOREIGN KEY (result_id) REFERENCES results(id)
);


-- Create the ‘p_results’ table
CREATE TABLE p_results (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(5000) NOT NULL
);


-- Trivia Tables

-- Create the 't_quiz' table
CREATE TABLE t_quiz (
  id INT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL
);

-- Create the 't_questions' table
CREATE TABLE t_questions (
   quiz_id INT,
   title VARCHAR(255) NOT NULL,
   options_id INT,
   FOREIGN KEY (quiz_id) REFERENCES quiz(id),
   FOREIGN KEY (options_id) REFERENCES options(id)
);

-- Create the ‘t_options’ table
CREATE TABLE t_options (
     id INT PRIMARY KEY,
     name VARCHAR(255) NOT NULL,
     result Boolean
);


