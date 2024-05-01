<?php include 'header.php'; ?>

    <!-- Chat List -->
    <div class="chat-list">
        <div class="chat-item">
            <img src="profile-pic1.jpg" alt="Profile Picture">
            <div class="chat-details">
                <div class="contact-name">John Doe</div>
                <div class="last-message">Hey, how are you?</div>
                <div class="timestamp">10:30 AM</div>
            </div>
        </div>
        <div class="chat-item">
            <img src="profile-pic2.jpg" alt="Profile Picture">
            <div class="chat-details">
                <div class="contact-name">Jane Smith</div>
                <div class="last-message">Let's meet at the coffee shop</div>
                <div class="timestamp">Yesterday</div>
            </div>
        </div>
        <!-- More chat items here -->
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <input type="text" placeholder="Search">
    </div>

    <!-- Message Area -->
    <div class="message-area">
        <div class="message received">
            <img src="profile-pic1.jpg" alt="Profile Picture">
            <div class="message-content">
                <div class="message-text">Hey, how are you?</div>
                <div class="message-timestamp">10:30 AM</div>
            </div>
        </div>
        <div class="message sent">
            <img src="profile-pic2.jpg" alt="Profile Picture">
            <div class="message-content">
                <div class="message-text">I'm good, thanks!</div>
                <div class="message-timestamp">10:35 AM</div>
            </div>
        </div>
        <!-- More messages here -->
    </div>

    <!-- Message Input -->
    <div class="message-input">
        <textarea placeholder="Type your message..."></textarea>
        <i class="fas fa-paperclip"></i> <!-- Attach icon -->
        <button><i class="fas fa-paper-plane"></i></button> <!-- Send icon -->
    </div>

 <?php include 'header.php'; ?>
</body>
</html>
