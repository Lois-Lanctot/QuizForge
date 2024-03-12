-- Drop all Tables
DROP TABLE IF EXISTS t_quiz, t_questions, `t_options`, t_results;


-- Trivia Tables
-- trivia.php can be found on the individual cpanel accounts

-- Create the 't_quiz' table
CREATE TABLE t_quiz (
                        id INT AUTO_INCREMENT PRIMARY KEY,
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

INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (1,'What is this quiz for',1);
INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (1,'Why have we done this', 2);
INSERT INTO `t_questions`(`quiz_id`, `title`, `options_id`) VALUES (1,'What is this quiz for',3);

INSERT INTO `t_options`(`id`, `name`, `result`) VALUES (1, 'suffering',false);