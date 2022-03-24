const startQuiz = document.querySelector('.start-quiz-btn');
const nameInput = document.querySelector('.name-input');

startQuiz.style.pointerEvents = "none";
startQuiz.style.cursor = "default";

function trackText(){
    startQuiz.style.pointerEvents = "auto";
    startQuiz.style.cursor = "pointer";

    if (startQuiz) {
        startQuiz.addEventListener('click', function () {
            window.location = "quiz_questions.php"
        })
    }
}