const volgendeVraag = document.querySelector('.btnSubmitQuestion');
const vraag = document.querySelector('.question-count');
const nextQuestion = document.querySelector('.dummy');
const emptyDiv = document.querySelector('.elements');
const buttonEnd = document.querySelector('.buttonEnd');

// let answer = document.getElementById('answer');
let answerList = [];
var vragenAantal = 1;
var index = 0;
let answerIndex = 0;


const questions = [
    "Ga je vaak op schoolreis?",
    "Doe je mee aan een sport? of een andere buiten schoolse activiteit",
    "Komen jou vrienden vaak bij jou thuis?", "Hebben je ouders een auto?",
    "Hebben jullie thuis een TV?", "Hoevaak per jaar gaan jullie uit met het gezin?",
    "Voel je je vaak buiten gesloten?", "Word je gepest?",
    "Heb je de nieuwste spelcomputer, speelgoed, schoenen etc?"
];

const number = '<input type="number" id="answer" class="answer">'
const radio = '<input type="radio" name="radio" id="answer" class="answer" value="Ja"><label class="label" for"radio">Ja </label> <input type="radio" name="radio" id="answer" class="answer" value="Nee"> <label for"radio">Nee </label> <input type="radio" name="radio" id="answer" class="answer" value="Soms"><label for"radio">Soms</label> <input type="radio" name="radio" id="answer" class="answer" value="Niet"> <label for"radio">Antwoord ik liever niet </label>'

if (volgendeVraag) {
    volgendeVraag.addEventListener('click', function () {
        let answer = document.getElementById('answer');
        if (vragenAantal != 11) {
            switch (vragenAantal) {
                case 1:
                    emptyDiv.innerHTML = radio;
                    break;
                case 2:
                    emptyDiv.innerHTML = radio;
                    break;
                case 3:
                    emptyDiv.innerHTML = radio;
                    break;
                case 4:
                    emptyDiv.innerHTML = radio;
                    break;
                case 5:
                    emptyDiv.innerHTML = radio;
                    break;
                case 6:
                    emptyDiv.innerHTML = number;
                    break;
                case 7:
                    emptyDiv.innerHTML = radio;
                    break;
                case 8:
                    emptyDiv.innerHTML = radio;
                    break;
                case 9:
                    emptyDiv.innerHTML = radio;
                    break;
                case 10:
                    emptyDiv.innerHTML = radio;
                    break;
            }
            vragenAantal++;

            vraag.textContent = `Vraag ${vragenAantal}/10`;
            nextQuestion.textContent = questions[index];
            index++;

        answerList.push(answer.value);
        answerIndex++;
        console.log(answerList);
        loadEndPage();
    }
})

function loadEndPage() {
        if (vragenAantal == 11) {
            vraag.textContent = 'Vraag 10/10';
            window.location = "einde.php";
        }
    }
}