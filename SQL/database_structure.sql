-- Création de la table des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Création de la table des équipes
CREATE TABLE teams (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Création de la table des joueurs
CREATE TABLE players (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    position VARCHAR(100) NOT NULL,
    strong_foot VARCHAR(50),
    team_id INT NOT NULL,
    FOREIGN KEY (team_id) REFERENCES teams(id)
);

-- Création de la table des matchs
CREATE TABLE matches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    team_1 INT NOT NULL,
    team_2 INT NOT NULL,
    score_team_1 INT NOT NULL,
    score_team_2 INT NOT NULL,
    winner INT,
    FOREIGN KEY (team_1) REFERENCES teams(id),
    FOREIGN KEY (team_2) REFERENCES teams(id),
    FOREIGN KEY (winner) REFERENCES teams(id)
);

-- Création de la table des transactions
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    amount INT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    type VARCHAR(50) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
