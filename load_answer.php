<?php 
session_start();


include 'connection.php';


$checkSql = "SELECT COUNT(*) FROM user_answers WHERE user_id = ? AND question_id = ?";
$checkStmt = $conn->prepare($checkSql);
$checkStmt->bind_param("ii", $userId, $questionNumber);
$checkStmt->execute();
$checkStmt->bind_result($count);
$checkStmt->fetch();
$checkStmt->close();

if ($count > 0) {
    // If a record exists, update the existing record
    $updateSql = "UPDATE user_answers SET selected_answer = ? WHERE user_id = ? AND question_id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("sii", $selectedAnswer, $userId, $questionNumber);
    $updateStmt->execute();
    $updateStmt->close();
    
} else {
    // If no record exists, insert a new record
    $insertSql = "INSERT INTO user_answers (user_id, question_id, selected_answer) VALUES (?, ?, ?)";
    $insertStmt = $conn->prepare($insertSql);
    $insertStmt->bind_param("iis", $userId, $questionNumber, $selectedAnswer);
    $insertStmt->execute();
    $insertStmt->close();
}

echo $selectedAnswer;


?>