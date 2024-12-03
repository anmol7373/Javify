<?php
// Include the header file from the 'includes' directory of the server's document root
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';

// Check if the user is logged in by verifying the 'logged_in' session variable
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

// If the user is not logged in, redirect them to the home page and terminate the script
if (!$isLoggedIn) {
    header("Location: " . BASE_URL . "index.php"); // Redirect to the base URL's index.php page
    exit; // Ensure no further code is executed after the redirect
}

// Retrieve the username from the session if the user is logged in; otherwise, set it as an empty string
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beginner Java Theory - Javify</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="<?php echo BASE_URL; ?>js/bot.js" defer></script>
</head>
<body id="beginner-page">

<section id="beginner-content">
    <div class="content-container">
        <h1>Beginner Java Theory</h1>
        <p>Welcome, <strong><?php echo htmlspecialchars($username); ?></strong>! Click on the sections below to expand and learn more about Java theory.</p>

        <!-- Collapsible Cards -->
        <div class="card-container">
            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    <h2>What is Java?</h2>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <p>Java is a high-level, general-purpose, object-oriented, and secure programming language developed by James Gosling at Sun Microsystems, Inc. in 1991. Originally known as OAK, it was renamed Java in 1995 and later acquired by Oracle Corporation in 2009.</p>
                </div>
            </div>

            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    <h2>Editions of Java</h2>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <p>Java has three main editions:</p>
                    <ul>
                        <li><strong>Java Standard Edition (JSE):</strong> For desktop computers.</li>
                        <li><strong>Java Enterprise Edition (JEE):</strong> For large-scale server applications.</li>
                        <li><strong>Java Micro Edition (JME):</strong> For small devices like phones.</li>
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    <h2>Features of Java</h2>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <ul>
                        <li><strong>Simple:</strong> Easy-to-learn syntax, simplifying complex C++ features.</li>
                        <li><strong>Object-Oriented:</strong> Revolves around classes and objects.</li>
                        <li><strong>Robust:</strong> Includes strong memory management and error handling.</li>
                        <li><strong>Platform-Independent:</strong> "Write once, run anywhere" via bytecode and JVM.</li>
                        <li><strong>Secure:</strong> Avoids explicit pointers and ensures safety with JVM.</li>
                    </ul>
                </div>
            </div>

            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    <h2>OOPs Concepts</h2>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <ul>
                        <li><strong>Class:</strong> Blueprint for objects.</li>
                        <li><strong>Object:</strong> Instance of a class representing real-world entities.</li>
                        <li><strong>Abstraction:</strong> Hiding complex details from users.</li>
                        <li><strong>Encapsulation:</strong> Binding data and methods in a single unit.</li>
                        <li><strong>Inheritance:</strong> Reusing code by inheriting properties from parent classes.</li>
                        <li><strong>Polymorphism:</strong> Performing actions in multiple ways.</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- "Go to Quiz" Button -->
        <div class="action-section">
            <a href="<?php echo BASE_URL; ?>modules/beginner/beginner_quiz.php" class="btn quiz-btn">Go to Quiz</a>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

<script>
    // JavaScript to toggle the card open/close
    function toggleCard(element) {
        const cardBody = element.nextElementSibling;
        const icon = element.querySelector('.toggle-icon');
        if (cardBody.style.maxHeight) {
            cardBody.style.maxHeight = null;
            icon.textContent = '+';
        } else {
            cardBody.style.maxHeight = cardBody.scrollHeight + 'px';
            icon.textContent = '−';
        }
    }
</script>

<!-- Floating Bot Container -->
<?php
    // Assuming username is already fetched and stored in the session (as in the navbar)
    $username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'User';
?>

<div id="floating-bot">
    <div id="bot-icon-container">
        <span id="bot-icon">&#129302;</span> <!-- Robot icon -->
        <div id="intro-speaking-bubble">Click me for help!</div>
    </div>
    <div class="speaking-bubble">
        Hi, <span id="bot-username"><?php echo $username; ?></span>! How can I help you?
    </div>
    <div id="bot-header">Javify Bot</div>
    <div id="bot-content">
        <p>Click on a highlighted term to see its explanation!</p>
    </div>
</div>
   

</body>
</html>
