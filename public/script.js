document.getElementById("send-btn").addEventListener("click", function() {
    let userInput = document.getElementById("user-input").value;
    if (userInput.trim() === "") return;

    let chatBox = document.getElementById("chat-box");
    chatBox.innerHTML += `<p><strong>You:</strong> ${userInput}</p>`;

    fetch("chat.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `message=${encodeURIComponent(userInput)}`
    })
    .then(response => response.json())
    .then(data => {
        chatBox.innerHTML += `<p><strong>LLM:</strong> ${data.response}</p>`;
        document.getElementById("user-input").value = "";
    });
});
