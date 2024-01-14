<?php

    include "connection.php";
    include "fetch_questions.php";

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Exam Window</title>

    <link rel="stylesheet" href="style.css">


    <!-- Jquery Library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="next_question.js"></script>
    <script src="prev_question.js"></script>

    <script>

        function updateNavigationButtons(currentQuestionId) {
            var totalQuestions = <?php echo 10; ?>; 

            // console.log("In function current ques id "+currentQuestionId);

            // Disable or enable the Next button based on the current question
            if (currentQuestionId === totalQuestions) {
                $("#next-btn").prop("disabled", true);
                $("#next-btn").addClass("disabled");        
            } else {
                $("#next-btn").prop("disabled", false);
                $("#next-btn").removeClass("disabled");
            }

            // Disable or enable the Prev button based on the current question
            if (currentQuestionId === 1) {
                $("#prev-btn").prop("disabled", true);
                $("#prev-btn").addClass("disabled");        
            } else {
                $("#prev-btn").prop("disabled", false);
                $("#prev-btn").removeClass("disabled");

            }
        }





        // To Disable next and prev buttons
        $(document).ready(function() {
            updateNavigationButtons(1);
            loadSavedAnswer();
        });

        
    </script>


    
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Oipl Logo">
        <h1>Online Examination System</h1>
        <button class="btn">End Exam</button>
    </header>


    <main>
        <section class="center-div">
            <div class="title-container">
                <h2>Python (Programming Langauge) Assessment</h2>
            </div>

            <div class="question-container">
                <p class="question" id="question">
                    <?php echo $question; ?>
                </p>
            </div>

            <div class="option-container">
                <input type="radio" id="radiobtn_1" name="answer" value="<?php echo $value1; ?>">
                <label for="radiobtn_1" id="option_1">
                    <?php echo $option1; ?>
                </label>
            </div>

            <div class="option-container">
                <input type="radio" id="radiobtn_2" name="answer" value="<?php echo $value2; ?>">
                <label for="radiobtn_2" id="option_2">
                    <?php echo $option2; ?>
                </label>
            </div>

            <div class="option-container">
                <input type="radio" id="radiobtn_3" name="answer" value="<?php echo $value3; ?>">
                <label for="radiobtn_3" id="option_3">
                    <?php echo $option3; ?>
                </label>
            </div>

            <div class="option-container">
                <input type="radio" id="radiobtn_4" name="answer" value="<?php echo $value4; ?>">
                <label for="radiobtn_4" id="option_4">
                    <?php echo $option4; ?>
                </label>
            </div>

            <div class="meter"></div>

            <div class="bottom-container">

            <button class="prev-btn btn" id="prev-btn" onclick="getPrevQuestion()">Prev</button>

            <p class="question-count">
                Ques: 
                <span id="currentQuestionId">
                    <?php echo $currentQuestionId; ?>    
                </span>
                /
                <span>15</span>
            </p>

            <p class="timer">
                <span class="minutes-count">00</span>:<span class="seconds-count">12</span>
            </p>
            <button class="next-btn btn" id="next-btn" onclick="getNextQuestion()">Next</button>

            </div>



        </section>



    </main>
</body>
</html>