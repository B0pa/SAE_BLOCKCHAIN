const quizzes = [
    {
        question: "Qu'est-ce que la blockchain ?",
        choices: [
            { text: "A. un systeme de covoiturage.", type: "text" },
            { text: "B. Un satélite", type: "text" },
            { text: "C. Une base de donnée déscentralisée", type: "text" },
        ],
        correctAnswer: 3, // Associez le numéro de la réponse correcte ici
    },
    {
        question: "Qu'est-ce que la blockchain ?",
        choices: [
            { text: "A. un systeme de vente en ligne de vetement.", type: "text" },
            { text: "B. Un satélite", type: "text" },
            { text: "C. Une base de donnée déscentralisée", type: "text" },
        ],
        correctAnswer: 3, // Associez le numéro de la réponse correcte ici
    },
];

let score = 0;

function displayQuizzes()
{
    const quizzesContainer = document.getElementById("quizzes");

    quizzes.forEach((quiz, quizIndex) => {
        const quizElement = document.createElement("div");
        quizElement.classList.add("quiz");

        const questionElement = document.createElement("div");
        questionElement.classList.add("question-container");
        questionElement.textContent = `Question ${quizIndex + 1}: ${quiz.question}`;
        const optionsElement = document.createElement("div");
        optionsElement.classList.add("grid-container");

        quiz.choices.forEach((choice, choiceIndex) => {
            const label = document.createElement("label");

            const input = document.createElement("input");
            input.type = "radio";
            input.name = "quiz-" + quizIndex;
            input.value = choice.text;
            input.setAttribute("data-numero", choiceIndex + 1); // Associez le numéro de réponse ici

            if (choice.type === "text") {
                label.textContent = choice.text;
            } else if (choice.type === "image") {
                const img = new Image();
                img.src = choice.image;
                img.alt = "Réponse " + choice.text;
                label.appendChild(img);
            }

            label.appendChild(input);

            label.addEventListener("click", () => highlightAnswer(label));

            optionsElement.appendChild(label);
        });

        quizElement.appendChild(questionElement);
        quizElement.appendChild(optionsElement);

        quizzesContainer.appendChild(quizElement);
    });
}

function checkAnswers()
{
    const quizElements = document.querySelectorAll('.quiz');
    quizElements.forEach((quizElement, quizIndex) => {
        const selectedOption = quizElement.querySelector(`input[name = "quiz-${quizIndex}"]:checked`);

        if (selectedOption) {
            const userAnswerNumero = parseInt(selectedOption.getAttribute("data-numero"), 10); // Récupérer le numéro de la réponse de l'utilisateur
            const correctAnswerNumero = quizzes[quizIndex].correctAnswer;

            if (userAnswerNumero === correctAnswerNumero) {
                score += 50;
            }
        }
    });

    displayResult();
}

function displayResult()
{
    alert("Vous avez maintenant un score de " + score + " points !");
    const scoreDisplay = document.getElementById("score");
    scoreDisplay.textContent = `Chain : ${score}`;
}

displayQuizzes();
