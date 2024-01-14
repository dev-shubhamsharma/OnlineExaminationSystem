
function saveAndNext() {

    var selectedAnswer = $("input[name='answer']:checked").val();
    var currentQuestion = $('#currentQuestionId').text();

    // Send the selected answer to the server via Ajax
    $.ajax({
        type: "POST",
        url: "process_response.php",
        data: { answer: selectedAnswer, question: currentQuestion },
        success: function(response) {
            console.log(response); // Log the server response
            // Optionally, you can update the UI or perform other actions
        },
        error: function(error) {
            console.log("Ajax request failed:", error);
            // Handle Ajax error
        }
    });

    // Update the question (this is just a placeholder, update it based on your logic)
    // currentQuestion++;
    // $("#question").text("Question " + currentQuestion + ": New Question?");
    // $("input[name='answer']").prop("checked", false); // Clear selected answer
}









// Code works on click of next button

function getNextQuestion() {

    saveAndNext();

    var selectedAnswer = $("input[name='answer']:checked").val();
    console.log(selectedAnswer);



    var currentQuestionId = $("#currentQuestionId").text(); 
    currentQuestionId = $.trim(currentQuestionId)
    // console.log(currentQuestionId)


    // Use Ajax to fetch the next question
    $.ajax({
        type: "POST",
        url: "get_next_question.php",
        data: { currentQuestionId: currentQuestionId },
        dataType: 'json', // Expect JSON response
        success: function(response) {
            // console.log(response)

            if (response.error) {
                console.log(response.error);
                // Handle error
            } else {
                // Update the question and options
                $("#question").text(response.question);
                // Update options as needed
                $("#option_1").text(response.options[0]);
                $("#radiobtn_1").val(response.options[0]);

                $("#option_2").text(response.options[1]);
                $("#radiobtn_2").val(response.options[1]);

                $("#option_3").text(response.options[2]);
                $("#radiobtn_3").val(response.options[2]);

                $("#option_4").text(response.options[3]);
                $("#radiobtn_4").val(response.options[3]);

                $("#currentQuestionId").text(response.currentQuestionId); 
                // console.log(response.currentQuestionId);
                updateNavigationButtons(response.currentQuestionId);
                // ...
            }

        },
        error: function(error) {

            console.log("Ajax request failed:", error);
        }
    });

    // to clear the answer when move to next question
    $("input[name='answer']").prop("checked", false);
}