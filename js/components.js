document.addEventListener('DOMContentLoaded', function() {
    const chatbot = document.getElementById('chatbot');
    const chatIcon = document.getElementById('chat-icon');
    const closeBtn = document.getElementById('close-btn');
    const userInput = document.getElementById('user-input');
    const sendBtn = document.getElementById('send-btn');
    const chatBody = document.querySelector('.chat-body');

    chatbot.style.display = 'none';

    chatIcon.addEventListener('click', function() {
        chatbot.style.display = 'block';
        chatIcon.style.display = 'none'; 
    });

    closeBtn.addEventListener('click', function() {
        chatbot.style.display = 'none';
        chatIcon.style.display = 'block'; 
    });

    sendBtn.addEventListener('click', function() {
        const inputText = userInput.value;

        if (inputText.trim() === '') { 
            return; 
        }

        
        chatBody.innerHTML = ''; 

        
        const userMessageDiv = document.createElement('div');
        userMessageDiv.className = 'user-message'; 
        userMessageDiv.textContent = inputText;
        chatBody.appendChild(userMessageDiv);

        
        userInput.value = '';

        
        fetch('components/chatbot.php', { 
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'userInput=' + encodeURIComponent(inputText)
        })
        
        .then(response => response.json())
        .then(data => {
            const botResponseDiv = document.createElement('div');
            botResponseDiv.className = 'bot-response'; 
            botResponseDiv.textContent = data.response;
            chatBody.appendChild(botResponseDiv);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    
    document.getElementById('cart-button').addEventListener('click', function() {
        document.getElementById('cart-overlay').style.display = 'block';
    });

    document.getElementById('cart-close-button').addEventListener('click', function() {
        document.getElementById('cart-overlay').style.display = 'none';
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var popup = document.getElementById('newsletter-popup');
    var closeBtn = document.querySelector('.newsletter-close-btn');

    popup.style.display = 'flex';

    closeBtn.addEventListener('click', function() {
        popup.style.display = 'none';
    });
});
