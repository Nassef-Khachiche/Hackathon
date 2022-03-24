const startQuiz = document.querySelector('.start-quiz-btn');

if (startQuiz) {
    startQuiz.addEventListener('click', function () {
        window.location = "quiz_questions.php"
    })
}
const nextQuestion = document.querySelector('.dummy');
if (nextQuestion) {
    const questions = ["Hoe oud ben je?", "Ga je vaak op schoolreis?"];
    let questionIndex = 0;
    nextQuestion.textContent = questions[questionIndex];
}

