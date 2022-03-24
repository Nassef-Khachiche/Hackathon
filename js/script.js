const volgendeVraag = document.querySelector('.btnSubmitQuestion');
const vraag = document.querySelector('.question-count');

var vragenAantal = 0;



volgendeVraag.addEventListener('click', function () {
    if (vragenAantal != 12) {
        vragenAantal++;
        vraag.textContent = `Vraag ${vragenAantal}/12`;
    }
})
