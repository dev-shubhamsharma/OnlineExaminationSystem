<?php
// Assume you have a variable $currentQuestionId which represents the current question ID
$currentQuestionId = 1; // You need to set this dynamically based on user navigation

// Fetch the question from the database
$sql = "SELECT * FROM questions_table WHERE question_id = $currentQuestionId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $question = $row['question'];

    $option1 = $row['option_a'];
    $value1 = $row['option_a'];

    $option2 = $row['option_b'];
    $value2 = $row['option_b'];

    $option3 = $row['option_c'];
    $value3 = $row['option_c'];

    $option4 = $row['option_d'];
    $value4 = $row['option_d'];
} else {
    echo "Question not found";
}
?>
