const quizzes = [
    {
        question: "Qu'est-ce que la blockchain ?",
        choices: [
            { text: "A. Un système de compte bancaire.", type: "text" },
            { text: "B. Un satellite", type: "text" },
            { text: "C. Une base de données décentralisée", type: "text" },
        ],
        correctAnswer: 3, // Associez le numéro de la réponse correcte ici
    },
    {
        question: "Quelle est la meilleure NFT ?",
        choices: [
            { image: '/img/image1.jpg', type: "image" },
            { image: "/img/image2.jpg", type: "image" },
            { image: "/img/image3.jpg", type: "image" },
        ],
        correctAnswer: 2, // Associez le numéro de la réponse correcte ici
    },
];

let score = 0;

function displayQuizzes() {
    const quizzesContainer = document.getElementById("quizzes");

    quizzes.forEach((quiz, quizIndex) => {
        const quizElement = document.createElement("div");
        quizElement.classList.add("quiz","pt-5");

        const questionElement = document.createElement("div");
        const questionText = document.createElement("h2");
        questionElement.classList.add("question-container","bg-dark", "text-white", "text-center", "rounded-pill","w-75","w-lg-50", "mx-auto");
        questionText.textContent = `Question ${quizIndex + 1}: ${quiz.question}`;
        questionElement.appendChild(questionText);

        const optionsElement = document.createElement("div");
        optionsElement.classList.add("pt-3","d-flex");
        quiz.choices.forEach((choice, choiceIndex) => {
            const label = document.createElement("label");
            label.classList.add("my-3");
            const input = document.createElement("input");
            input.type = "radio";
            input.name = "quiz-" + quizIndex;
            input.value = choice.text;
            input.setAttribute("data-numero", choiceIndex + 1); // Associez le numéro de réponse ici
            input.classList.add("d-none","d-flex","justify-content-around");

            if (choice.type === "text") {
                label.textContent = choice.text;
                label.classList.add("btn","btn-secondary","btn-outline-dark","rounded-pill","w-25","text-white");
                optionsElement.classList.add("flex-column","align-items-center","isCheck");
            } else if (choice.type === "image") {

                const img = new Image();
                img.src = choice.image;
                img.alt = "Réponse " + choice.text;
                img.style.width = "200px";
                img.style.height = "200px";
                img.classList.add("img-fluid","rounded");
                optionsElement.classList.add("flex-column","flex-lg-row","align-items-center","justify-content-around");
                label.appendChild(img);
            }

            label.appendChild(input);

            //label.addEventListener("click", () => highlightAnswer(label));

            optionsElement.appendChild(label);
        });

        quizElement.appendChild(questionElement);
        quizElement.appendChild(optionsElement);

        quizzesContainer.appendChild(quizElement);
    });
}

function checkAnswers() {
    const quizElements = document.querySelectorAll('.quiz');
    quizElements.forEach((quizElement, quizIndex) => {
        const selectedOption = quizElement.querySelector(`input[name="quiz-${quizIndex}"]:checked`);

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

function displayResult() {
    alert("Vous avez maintenant un score de " + score + " points !");
    const scoreDisplay = document.getElementById("score");
    scoreDisplay.textContent = `NFT : ${score}`;
}

displayQuizzes();
