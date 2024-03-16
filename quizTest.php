<form id="quizForm">
    <div class="question_row">
        <h6 style="color:#006600; margin-top:20px;">1 : Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</h6>
        <div class="Answer_row">
            <label style="color: #333333;"><input type="radio" name="question_1" value="Haji"> Haji</label>
            <label style="color: #333333;"><input type="radio" name="question_1" value="ahsan"> ahsan</label>
            <label style="color: #333333;"><input type="radio" name="question_1" value="dojacat"> dojacat</label>
            <label style="color: #333333;"><input type="radio" name="question_1" value="2pac"> 2pac</label>
            <input type="hidden" name="correct_answer_1" value="dojacat">
        </div>
    </div>
    <div class="question_row">
        <h6 style="color:#006600; margin-top:20px;">2 : Another question here.</h6>
        <div class="Answer_row">
            <label style="color: #333333;"><input type="radio" name="question_2" value="pheeka"> pheeka</label>
            <label style="color: #333333;"><input type="radio" name="question_2" value="basharat"> basharat</label>
            <label style="color: #333333;"><input type="radio" name="question_2" value="nanshop"> nanshop</label>
            <label style="color: #333333;"><input type="radio" name="question_2" value="amirDogar"> amirDogar</label>
            <input type="hidden" name="correct_answer_2" value="amirDogar">
        </div>
    </div>
    <div class="question_row">
        <h6 style="color:#006600; margin-top:20px;">3 : Yet another question here.</h6>
        <div class="Answer_row">
            <label style="color: #333333;"><input type="radio" name="question_3" value="doodh"> doodh</label>
            <label style="color: #333333;"><input type="radio" name="question_3" value="DAhi"> DAhi</label>
            <label style="color: #333333;"><input type="radio" name="question_3" value="Lasi"> Lasi</label>
            <label style="color: #333333;"><input type="radio" name="question_3" value="dukaan"> dukaan</label>
            <input type="hidden" name="correct_answer_3" value="Lasi">
        </div>
    </div>
    <!-- Add more questions and options as needed -->
    <button type="submit" id="submitBtn">Submit</button>
</form>

<div id="answers"></div>
<div id="correct_answers"></div>

<script>
    document.getElementById("quizForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission
        
        var answersArray = [];
        var correctAnswerArray = [];

        // Find all questions and their corresponding answers
        var questions = document.querySelectorAll(".question_row");
        questions.forEach(function(question, index) {
            var questionText = question.querySelector("h6").textContent;
            var answers = question.querySelectorAll("input[type='radio']");
            var correctAnswer = question.querySelector("input[type='hidden']").value;

            var selectedAnswer = "";
            answers.forEach(function(answer) {
                if (answer.checked) {
                    selectedAnswer = answer.value; // Use 'value' instead of 'textContent'
                }
            });

            answersArray.push({ question: questionText, answer: selectedAnswer });
            correctAnswerArray.push({ question: questionText, correctAnswer: correctAnswer });
        });

        // Display answers and correct answers
        displayResults(answersArray, correctAnswerArray);
    });

    function displayResults(answersArray, correctAnswerArray) {
        var resultsHTML = "Results:<br>";

        for (var i = 0; i < answersArray.length; i++) {
            resultsHTML += "Question " + (i + 1) + ": ";
            resultsHTML += "Selected Answer - " + answersArray[i].answer + ", ";
            resultsHTML += "Correct Answer - " + correctAnswerArray[i].correctAnswer + "<br>";
        }

        document.getElementById("answers").innerHTML = resultsHTML;
    }
</script>

