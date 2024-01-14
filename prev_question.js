function loadSavedAnswer() {
    
    var currentQuestion = $('#currentQuestionId').text();

    // Load the previously saved answer from the server via Ajax
    $.ajax({
        type: "POST",
        url: "load_answer.php", 
        data: { question: currentQuestion },
        success: function(savedAnswer) {
            // Set the saved answer as the checked option
            console.log("answer"+savedAnswer);
            // $("input[name='answer'][value='" + savedAnswer + "']").prop("checked", true);
        },
        error: function(error) {
            console.log("Ajax request failed:", error);
            // Handle Ajax error
        }
    });
}





// Code works on click of prev button


function getPrevQuestion() {

    //saveAndNext();

    loadSavedAnswer();

    var currentQuestionId = $("#currentQuestionId").text(); 
    currentQuestionId = $.trim(currentQuestionId)
    // console.log(currentQuestionId)


    // Use Ajax to fetch the next question
    $.ajax({
        type: "POST",
        url: "get_prev_question.php",
        data: { currentQuestionId: currentQuestionId },
        dataType: 'json', // Expect JSON response
        success: function(response) {

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
                console.log(response.currentQuestionId);
                updateNavigationButtons(response.currentQuestionId);
                
                // ...
            }

        },
        error: function(error) {

            console.log("Ajax request failed:", error);
        }
    });

    $("input[name='answer']").prop("checked", false);
    }