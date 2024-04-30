<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <style>
        /* Styles for responsiveness */
        @media screen and (min-width: 768px) {
            /* Desktop and tablet styles */
            .container {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                align-items: flex-start;
            }
            .conversation-container {
                flex: 1;
            }
            .conversation {
                display: flex;
                align-items: center;
                padding: 10px;
                border-bottom: 1px solid #ccc;
            }
            .avatar {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                margin-right: 10px;
            }
            .message-section {
                flex: 2;
                padding: 10px;
                overflow-y: auto;
                max-height: 400px;
                border-right: 1px solid #ccc;
            }
            .message {
                display: flex;
                align-items: flex-start;
                margin-bottom: 15px;
            }
            .message .avatar {
                margin-right: 10px;
            }
            .message .user-info {
                font-weight: bold;
            }
            .message .user-info span {
                font-weight: normal;
                color: #888;
            }
            .message-input {
                flex: 1;
                padding: 10px;
            }
            .message-input textarea {
                width: 100%;
                height: 100px;
                resize: none;
            }
        }
        @media screen and (max-width: 767px) {
            /* Mobile styles */
            .container {
                flex-direction: column;
            }
            .conversation-container {
                order: 2;
            }
            .message-section {
                border-right: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="conversation-container">
            <h2>Conversations</h2>
            <input type="text" placeholder="Search users...">
            <div class="conversation">
                <img class="avatar" src="user1.jpg" alt="User Avatar">
                <div class="user-info">
                    <h3>User 1</h3>
                    <span>Status: Active</span>
                </div>
            </div>
            <div class="conversation">
                <img class="avatar" src="user2.jpg" alt="User Avatar">
                <div class="user-info">
                    <h3>User 2</h3>
                    <span>Status: Away</span>
                </div>
            </div>
            <!-- Add more conversations here -->
        </div>
        <div class="message-section">
            <h2>Messages</h2>
            <div class="messages">
                <div class="message">
                    <img class="avatar" src="user1.jpg" alt="User Avatar">
                    <div class="message-content">
                        <div class="user-info">
                            <h3>User 1</h3>
                            <span>Status: Active</span>
                        </div>
                        <p>Hi there!</p>
                    </div>
                </div>
                <!-- Add more messages here -->
            </div>
            <div class="message-input">
                <textarea placeholder="Type your message..."></textarea>
                <button>Send</button>
            </div>
        </div>
    </div>
</body>
</html>
