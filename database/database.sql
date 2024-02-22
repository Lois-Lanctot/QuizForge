-- Create the 'quiz' table
CREATE TABLE quiz (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL
);

-- Create the 'questions' table
CREATE TABLE questions (
    quiz_id INT,
    title VARCHAR(255) NOT NULL,
    options_id INT,
    FOREIGN KEY (quiz_id) REFERENCES quiz(id),
    FOREIGN KEY (options_id) REFERENCES options(id)
);

-- Create the ‘options’ table
CREATE TABLE options (
    id INT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    result_id INT,
    FOREIGN KEY (result_id) REFERENCES results(id)
);


-- Create the ‘results’ table
CREATE TABLE results (
    id INT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(5000) NOT NULL
);