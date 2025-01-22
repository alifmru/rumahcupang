<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Link ke file CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="./CSS/contact.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="Logo">
        </div>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="login/login.php" class="login-button">Login</a>
        </nav>
    </header>

    <section class="contact-container">
        <h1>Contact Us</h1>
        <form id="contact-form" action="https://formspree.io/f/mqaavnab" method="POST">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" style="background-color: #ff6f61; color: white; border: none; border-radius: 5px; padding: 10px 20px; font-size: 1rem; font-weight: bold; cursor: pointer; transition: all 0.3s ease;" 
            onmouseover="this.style.backgroundColor='#000508'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 6px #005b96(0, 0, 0, 0.1)';" 
            onmouseout="this.style.backgroundColor='#ff6f61'; this.style.transform='scale(1)'; this.style.boxShadow='none';">
            Submit
            </button>

        </form>
    </section>
</body>
<!-- Footer -->
    <footer1>
        <p>&copy; 2024 Rumah Cupang | All Rights Reserved.</p>
    </footer1>
    
</html>
