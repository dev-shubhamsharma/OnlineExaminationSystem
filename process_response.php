<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input if necessary
    $selectedAnswer = isset($_POST['answer']) ? $_POST['answer'] : '';
    $questionNumber = isset($_POST['question']) ? $_POST['question'] : '';

    if($selectedAnswer !== NULL)
    {
        // Get the user ID (replace with your user identification logic)
        $userId = 1; // Replace with the actual user ID

        // Connect to the database
        include 'connection.php';

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert the response into the user_responses table
        $insertSql = "INSERT INTO user_answers (user_id, question_id, selected_answer) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("iis", $userId, $questionNumber, $selectedAnswer);
        $stmt->execute();

        $stmt->close();
        $conn->close();

        // Process the user's response (e.g., store in a database, check correctness, etc.)
        // For this example, we'll just echo the selected answer.
        
        // echo "Question " . $questionNumber . ": User selected: " . $selectedAnswer;
    }

    
}
?>















<?php
// session_start();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Validate and sanitize user input if necessary
//     $selectedAnswer = isset($_POST['answer']) ? $_POST['answer'] : '';
//     $questionNumber = isset($_POST['question']) ? $_POST['question'] : '';

//     // Get the user ID (replace with your user identification logic)
//     $userId = 1; // Replace with the actual user ID

//     include 'connection.php';

//     if ($conn->connect_error) {
//         die("Connection failed: " . $conn->connect_error);
//     }

//     // Insert the response into the user_responses table
//     $insertSql = "INSERT INTO user_answers (user_id, question_id, selected_answer) VALUES (?, ?, ?)";
//     $stmt = $conn->prepare($insertSql);
//     $stmt->bind_param("iis", $userId, $questionNumber, $selectedAnswer);
//     $stmt->execute();

//     $stmt->close();
//     $conn->close();

//     // Store the selected answer in the session if needed
//     $_SESSION['answers'][$questionNumber] = $selectedAnswer;

//     // Process the user's response (e.g., store in a database, check correctness, etc.)
//     // For this example, we'll just echo the selected answer.
//     echo "Question " . $questionNumber . ": User selected: " . $selectedAnswer;
// }
?>
