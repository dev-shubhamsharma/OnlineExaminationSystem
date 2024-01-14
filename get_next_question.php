<?php

include "connection.php";


$currentQuestionId = $_POST['currentQuestionId'];

// Use the $conn connection from your original PHP file

// Fetch the next question from the database
$nextQuestionId = $currentQuestionId + 1;
$sql = "SELECT * FROM questions_table WHERE question_id = $nextQuestionId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $question = $row['question'];
    $option1 = $row['option_a'];
    $option2 = $row['option_b'];
    $option3 = $row['option_c'];
    $option4 = $row['option_d'];

    // Return the question and options as JSON
    $response = [
        'question' => $question,
        'options' => [$option1, $option2, $option3, $option4],
        'currentQuestionId' => $nextQuestionId
    ];

    echo json_encode($response);
} else {
    echo json_encode(['error' => 'No more questions']);
}
?>

