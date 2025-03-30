<?php
// functions.php : Contient les fonctions principales du jeu

// Fonction pour récupérer tous les joueurs d'une équipe
function getPlayersByTeam($teamId) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM players WHERE team_id = ?");
    $stmt->execute([$teamId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour ajouter un joueur
function addPlayer($name, $age, $position, $strongFoot, $teamId) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO players (name, age, position, strong_foot, team_id) 
                           VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$name, $age, $position, $strongFoot, $teamId]);
}

// Fonction pour enregistrer un match
function recordMatch($team1Id, $team2Id, $score1, $score2, $winner) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO matches (team_1, team_2, score_team_1, score_team_2, winner) 
                           VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$team1Id, $team2Id, $score1, $score2, $winner]);
}
?>
