const startQuiz = document.querySelector('.start-quiz-btn');

if (startQuiz) {
    startQuiz.addEventListener('click', function () {
        window.location = "quiz_questions.php"
    })
}