<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';

$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
if (!$isLoggedIn) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intermediate Java Theory - Javify</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/theory.css">
</head>
<body id="intermediate-page">

<section id="intermediate-content">
    <div class="content-container">
        <h1>Intermediate Java Theory</h1>
        <p>Welcome, <strong><?php echo htmlspecialchars($username); ?></strong>! Expand the sections below to learn more about Intermediate Java topics.</p>

        <!-- Collapsible Cards -->
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
                    <pre>
numbers.stream()
       .filter(n -> n % 2 == 0)
       .forEach(System.out::println);
                    </pre>
                </div>
            </div>
        </div>

        <!-- "Go to Quiz" Button -->
        <div class="action-section">
            <a href="<?php echo BASE_URL; ?>modules/intermediate/intermediate_quiz.php" class="btn quiz-btn">Go to Quiz</a>
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

</body>
</html>
