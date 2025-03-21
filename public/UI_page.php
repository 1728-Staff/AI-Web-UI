<?php include '../templates/header.php'; ?>

<div id="chat-wrapper">
    <div class="chat-box" id="chat-box">
        <!-- Output from the LLM will appear here -->
        <p><em>Welcome to SynapseIQ. How can I assist your department today?</em></p>
    </div>
    
    <div class="chat-entry">
        <input type="text" id="user-input" placeholder="Type your message here..." />
        <button id="send-btn">Send</button>
    </div>
</div>

<?php include '../templates/footer.php'; ?>
