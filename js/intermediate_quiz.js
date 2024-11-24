let currentQuestionIndex = 1; // Start from question 1
const totalQuestions = document.querySelectorAll(".question-block").length;
let answeredQuestions = new Set();
let isQuizOngoing = true; // Flag to track if the quiz is ongoing

// Initialize the quiz
function initializeQuiz() {
    showQuestion(currentQuestionIndex);
    updateQuestionStatus();
    preventNavigationDuringQuiz();
}

// Show a specific question
function showQuestion(index) {
    // Hide all questions
    document.querySelectorAll(".question-block").forEach((block) => {
        block.style.display = "none";
    });

    // Show the current question
    const currentQuestion = document.getElementById(`question-${index}`);
    if (currentQuestion) {
        currentQuestion.style.display = "block";

        // Update button visibility
        const prevButton = currentQuestion.querySelector(".prev-btn");
        const nextButton = currentQuestion.querySelector(".next-btn");
        const submitButton = currentQuestion.querySelector(".submit-btn");

        if (prevButton) prevButton.style.display = index === 1 ? "none" : "inline-block";
        if (nextButton) nextButton.style.display = index === totalQuestions ? "none" : "inline-block";
        if (submitButton) submitButton.style.display = index === totalQuestions ? "inline-block" : "none";
    }
}

// Navigate to a specific question
function navigateQuestion(index) {
    if (index >= 1 && index <= totalQuestions) {
        currentQuestionIndex = index;
        showQuestion(index);
    }
}

// Update the question status in the sidebar
document.querySelectorAll(".answer-options input[type='radio']").forEach((input) => {
    input.addEventListener("change", (event) => {
        const questionNumber = currentQuestionIndex;
        answeredQuestions.add(questionNumber); // Mark the question as answered
        updateQuestionStatus();
    });
});

// Update sidebar question tiles
function updateQuestionStatus() {
    document.querySelectorAll(".question-number").forEach((tile, index) => {
        if (answeredQuestions.has(index + 1)) {
            tile.classList.add("answered");
        } else {
            tile.classList.remove("answered");
        }
    });
}

// Submit the quiz with pop-up
function submitQuiz() {
    const quizForm = document.getElementById("quiz-form");
    if (quizForm) {
        quizForm.submit();
    }
}

// Prevent navigation during the quiz with a pop-up
function preventNavigationDuringQuiz() {
    const navLinks = document.querySelectorAll("nav a, footer a");

    navLinks.forEach((link) => {
        link.addEventListener("click", (event) => {
            if (isQuizOngoing) {
                event.preventDefault(); // Prevent navigation
                showNavigationPopup(link.href); // Show the pop-up
            }
        });
    });
}

// Show the navigation pop-up
function showNavigationPopup(targetUrl) {
    showPopup("You are currently taking the quiz. Do you want to quit?", () => {
        isQuizOngoing = false; // Mark quiz as not ongoing
        window.location.href = targetUrl; // Navigate to the target URL
    });
}

// Generic function to show a pop-up
function showPopup(message, confirmCallback) {
    // Create overlay
    const overlay = document.createElement("div");
    overlay.classList.add("popup-overlay");

    // Create pop-up
    const popup = document.createElement("div");
    popup.classList.add("popup");

    // Add message
    const messageEl = document.createElement("p");
    messageEl.textContent = message;
    popup.appendChild(messageEl);

    // Add buttons
    const buttonsContainer = document.createElement("div");
    buttonsContainer.classList.add("popup-buttons");

    const confirmButton = document.createElement("button");
    confirmButton.textContent = "Yes";
    confirmButton.classList.add("popup-btn", "confirm-btn");
    confirmButton.addEventListener("click", () => {
        confirmCallback();
        document.body.removeChild(overlay); // Close the pop-up
    });

    const cancelButton = document.createElement("button");
    cancelButton.textContent = "No";
    cancelButton.classList.add("popup-btn", "cancel-btn");
    cancelButton.addEventListener("click", () => {
        document.body.removeChild(overlay); // Close the pop-up
    });

    buttonsContainer.appendChild(confirmButton);
    buttonsContainer.appendChild(cancelButton);
    popup.appendChild(buttonsContainer);
    overlay.appendChild(popup);

    document.body.appendChild(overlay);
}

// Initialize on page load
document.addEventListener("DOMContentLoaded", initializeQuiz);
