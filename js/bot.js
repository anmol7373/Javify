function toggleBot() {
    const botContainer = document.getElementById("chatbot-container");
    const botToggle = document.getElementById("chatbot-toggle");
    if (botContainer.style.display === "none" || !botContainer.style.display) {
        botContainer.style.display = "flex";
        botToggle.style.display = "none";
    } else {
        botContainer.style.display = "none";
        botToggle.style.display = "block";
    }
}

async function showDefinition(word) {
    const responseContainer = document.getElementById("chatbot-response");
    responseContainer.textContent = "Loading...";
    try {
        const response = await fetch(`http://localhost:5000/explain?word=${word}`);
        const data = await response.json();
        if (response.ok) {
            responseContainer.textContent = `${data.word}: ${data.definition}`;
        } else {
            responseContainer.textContent = data.error;
        }
    } catch (error) {
        responseContainer.textContent = "Error fetching definition.";
    }
}