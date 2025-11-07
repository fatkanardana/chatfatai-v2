document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('chat-form');
    const input = document.getElementById('user-input');
    const chatBox = document.getElementById('chat-box');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const message = input.value.trim();
        if (!message) return;

        chatBox.innerHTML += `<div class="user-msg">${message}</div>`;
        input.value = '';
        alert("JS berhasil jalan!");


        try {
            const res = await fetch('/api/chat', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ message }),
            });
            const data = await res.json();
            chatBox.innerHTML += `<div class="bot-msg">${data.reply}</div>`;
        } catch (err) {
            console.error('Error:', err);
        }
    });
});
