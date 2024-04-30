<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <style>
<<<<<<< HEAD
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
=======
        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
        }

        .navbar {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
        }

        .nav-menu {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .nav-item {
            margin-right: 20px;
        }

        .nav-link {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #cceeff;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
            height: 100vh;
        }

        .sidebar {
            width: 300px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin-right: 20px;
        }

        .conversation {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 8px;
            padding: 15px;
        }

        .conversation:hover {
            background-color: #f0f0f0;
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .user-info h3 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .user-info span {
            font-size: 14px;
            color: #888;
        }

        .message-section {
            flex: 1;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            overflow: hidden;
        }

        .messages {
            max-height: 400px;
            overflow-y: auto;
        }

        .message {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .message .avatar {
            margin-right: 15px;
        }

        .message-content {
            max-width: 80%;
        }

        .message-input {
            margin-top: 20px;
        }

        .message-input textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: none;
            outline: none;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .message-input button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .message-input button:hover {
            background-color: #0056b3;
        }

        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .sidebar {
                width: 100%;
                margin-right: 0;
                margin-bottom: 20px;
>>>>>>> f0f0f85 (chatapp layout.)
            }
        }
    </style>
</head>
<body>
<<<<<<< HEAD
    <div class="container">
        <div class="conversation-container">
            <h2>Conversations</h2>
            <input type="text" placeholder="Search users...">
=======
    <nav class="navbar">
        <a href="#" class="navbar-brand">Chat App</a>
        <ul class="nav-menu">
            <li class="nav-item"><a href="#" class="nav-link">New Users</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Manage Users</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Profile</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="sidebar">
            <h2>Conversations</h2>
>>>>>>> f0f0f85 (chatapp layout.)
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
