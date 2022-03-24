const volgendeVraag = document.querySelector('.btnSubmitQuestion');
const vraag = document.querySelector('.question-count');
const nextQuestion = document.querySelector('.dummy');


var vragenAantal = 1;
let questionIndex = 1;

const questions = ["Hoe oud ben je?", "Ga je vaak op schoolreis?",
"Doe je mee aan een sport? of een andere buiten schoolse activiteit",
"Komen jou vrienden vaak bij jou thuis?", "Hebben je ouders een auto?",
"Hebben jullie thuis een TV?", "Hoevaak per jaar gaan jullie uit met het gezin?",
"Voel je je vaak buiten gesloten?", "Word je gepest?",
"Heb je de nieuwste spelcomputer, speelgoed, schoenen etc?"];

const elements = [];



volgendeVraag.addEventListener('click', function () {
    if (vragenAantal != 10) {
        vragenAantal++;
        vraag.textContent = `Vraag ${vragenAantal}/10`;
        nextQuestion.textContent = questions[questionIndex];
        questionIndex++;
    }
})
