const startQuiz = document.querySelector('.start-quiz-btn');
const nameInput = document.querySelector('.name-input');
const einde = document.querySelector('.endButton');

if (startQuiz) {

    startQuiz.style.pointerEvents = "none";
    startQuiz.style.cursor = "default";
}

function trackText() {
    startQuiz.style.pointerEvents = "auto";
    startQuiz.style.cursor = "pointer";

    if (startQuiz) {
        startQuiz.addEventListener('click', function () {
            window.location = "quiz_questions.php"
        })
    }
}

einde.addEventListener('click', function () {
    console.log('test');
    window.location = "index.php"
})