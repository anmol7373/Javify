<?php
// Include the header file, which might contain common elements like navigation, starting HTML tags, etc.
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';

// Check if the user is logged in by verifying the session variable.
// If the user is not logged in, redirect them to the homepage.
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
if (!$isLoggedIn) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}

// Set the username if the user is logged in, otherwise keep it as an empty string.
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intermediate Java Theory - Javify</title>
    <!-- Link to the main stylesheet and the specific theory page stylesheet -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/theory.css">
    <script src="<?php echo BASE_URL; ?>js/bot.js" defer></script>
</head>
<body id="intermediate-page">

<section id="intermediate-content">
    <div class="content-container">
        <h1>Intermediate Java Theory</h1>
        <!-- Greet the user and show their username, ensuring it's properly escaped to prevent XSS attacks -->
        <p>Welcome, <strong><?php echo htmlspecialchars($username); ?></strong>! Expand the sections below to learn more about Intermediate Java topics.</p>

        <!-- Collapsible Cards for Intermediate Java Topics -->
        <div class="card-container">
            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    <h2>1. Interfaces in Java</h2>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <p>An interface is a reference type, similar to a class, that contains only constants, method signatures, and nested types.</p>
                    <p>Key Points:</p>
                    <ul>
                        <li>Provides full abstraction and supports multiple inheritance.</li>
                        <li>Classes can implement multiple interfaces.</li>
                    </ul>
                    <!-- Code snippet showing the usage of an interface and its implementation -->
                    <pre>
interface Animal {
    void eat();
    void sleep();
}

class Dog implements Animal {
    public void eat() {
        System.out.println("Dog is eating");
    }
    public void sleep() {
        System.out.println("Dog is sleeping");
    }
}
                    </pre>
                </div>
            </div>

            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    <h2>2. Abstract Classes</h2>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <p>Abstract classes cannot be instantiated and may contain abstract methods (methods without implementation).</p>
                    <ul>
                        <li>Used to provide shared functionality and allow specific implementations in subclasses.</li>
                        <li>Can have both abstract and concrete methods.</li>
                    </ul>
                    <!-- Code snippet showing the usage of abstract classes and their implementation -->
                    <pre>
abstract class Vehicle {
    abstract void startEngine();
    void stopEngine() {
        System.out.println("Engine stopped");
    }
}

class Car extends Vehicle {
    void startEngine() {
        System.out.println("Car engine started");
    }
}
                    </pre>
                </div>
            </div>

            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    <h2>3. Generics in Java</h2>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <p>Generics provide type safety and allow reusable code for various types.</p>
                    <ul>
                        <li>Catch type errors at compile time.</li>
                        <li>Reuse code with different data types.</li>
                    </ul>
                    <!-- Code snippet showing the usage of generics in Java -->
                    <pre>
class Box<T> {
    private T item;
    public void setItem(T item) { this.item = item; }
    public T getItem() { return item; }
}

Box<Integer> integerBox = new Box<>();
integerBox.setItem(10);
System.out.println(integerBox.getItem());
                    </pre>
                </div>
            </div>

            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    <h2>4. Lambda Expressions</h2>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <p>Introduced in Java 8, lambda expressions provide a concise way to implement functional interfaces.</p>
                    <ul>
                        <li>Used for single-method interfaces.</li>
                        <li>Improves readability and reduces boilerplate code.</li>
                    </ul>
                    <!-- Code snippet showing the usage of lambda expressions -->
                    <pre>
Calculator add = (a, b) -> a + b;
System.out.println("Sum: " + add.operate(5, 3));
                    </pre>
                </div>
            </div>

            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    <h2>5. Streams API</h2>
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <p>The Streams API, introduced in Java 8, allows processing data in a declarative and functional style.</p>
                    <ul>
                        <li>Supports operations like <code>filter</code>, <code>map</code>, and <code>reduce</code>.</li>
                        <li>Processes data efficiently in a pipelined manner.</li>
                    </ul>
                    <!-- Code snippet showing the usage of Streams API -->
                    <pre>
numbers.stream()
       .filter(n -> n % 2 == 0)
       .forEach(System.out::println);
                    </pre>
                </div>
            </div>
        </div>

        <!-- "Go to Quiz" Button to proceed to the intermediate quiz page -->
        <div class="action-section">
            <a href="<?php echo BASE_URL; ?>modules/intermediate/intermediate_quiz.php" class="btn quiz-btn">Go to Quiz</a>
        </div>
    </div>
</section>

<!-- Include the footer file, which might contain common elements like ending HTML tags, footer info, etc. -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

<script>
    // JavaScript function to toggle the visibility of the card's body when clicked
    function toggleCard(element) {
        const cardBody = element.nextElementSibling;
        const icon = element.querySelector('.toggle-icon');
        if (cardBody.style.maxHeight) {
            // Collapse the card
            cardBody.style.maxHeight = null;
            icon.textContent = '+';
        } else {
            // Expand the card
            cardBody.style.maxHeight = cardBody.scrollHeight + 'px';
            icon.textContent = '−'; // Unicode for minus sign
        }
    }
</script>

<!-- Floating Bot Container -->
<div id="floating-bot">
    <div id="bot-header">Javify Bot</div>
    <div id="bot-content">
        <p>Click on a highlighted term to see its explanation!</p>
    </div>
</div>

</body>
</html>
