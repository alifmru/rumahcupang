<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Contact Us</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            line-height: 1.6;
            margin-top: 80px; /* Memberikan jarak dari header */
        }

        .contact-container {
            background-color: #ffffff;
            padding: 2rem;
            margin: 2rem auto;
            width: 90%;
            max-width: 600px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-container h1 {
            text-align: center;
            margin-bottom: 1rem;
            color: #005b96;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        textarea {
            resize: none;
        }

        .submit-button {
            display: block;
            width: 100%;
            background: #005b96;
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        .submit-button:hover {
            background: #003f63;
            transform: scale(1.02);
        }

        footer {
            background: #005b96;
            color: white;
            text-align: center;
            padding: 1rem 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
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
        <form id="contact-form" class="contact-form" action="https://formspree.io/f/mqaavnab" method="POST">
            <div class="form">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form">            
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit" style="background-color: #ff6f61; color: white; border: none; border-radius: 5px; padding: 10px 20px; font-size: 1rem; font-weight: bold; cursor: pointer; transition: all 0.3s ease;" 
            onmouseover="this.style.backgroundColor='#000508'; this.style.transform='scale(1.05)'; this.style.boxShadow='0 4px 6px #005b96(0, 0, 0, 0.1)';" 
            onmouseout="this.style.backgroundColor='#ff6f61'; this.style.transform='scale(1)'; this.style.boxShadow='none';">
            Submit
            </button>

        </form>
    </section>

    <footer>
        <p>&copy; 2024 Rumah Cupang | All Rights Reserved.</p>
    </footer>
</body>
</html>
