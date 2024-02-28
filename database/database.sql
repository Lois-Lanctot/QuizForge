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
                        description VARCHAR(500) NOT NULL
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
                           id INT,
                           name VARCHAR(255) NOT NULL,
                           result Boolean
);


INSERT INTO `t_quiz`( id, `title`, `description`) VALUES (1, 'Quiz Test 1','lorem ipsum dolor sit amet, consectetur adip esse cillum iscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim a in reprehenderit in voluptate velit');

INSERT INTO `t_quiz`( id, `title`, `description`) VALUES (2, 'Quiz Test 2','lorem ipsum dolor sit amet, consectetur adip esse cillum iscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim a in reprehenderit in voluptate velit');

INSERT INTO `t_quiz`( id, `title`, `description`) VALUES (3, 'Quiz Test 3','lorem ipsum dolor sit amet, consectetur adip esse cillum iscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim a in reprehenderit in voluptate velit');


INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (1,'What is this quiz for',1);
INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (1,'Why have we done this', 2);
INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (1,'What is this quiz for',3);
INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (1,'What is this quiz for', 4);


INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (2,'What is this quiz for',5);
INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (2,'Why have we done this', 6);
INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (2,'What is this quiz for',7);
INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (2,'What is this quiz for', 8);


INSERT INTO `t_options`(`id`, `name`, `result`) VALUES (1, 'suffering',false);
INSERT INTO `t_options`(`id`, `name`, `result`) VALUES (1, 'pain',false);
INSERT INTO `t_options`(`id`, `name`, `result`) VALUES (1, 'learning',true);
