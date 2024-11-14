<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Javify/config.php';

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
    <title>Javify - Intermediate Java Quiz</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
</head>
<body id="intermediate-quiz-page">

<!-- Quiz Content Section -->
<section id="intermediate-quiz-content">
    <div class="index-container text-center">
        <h1>Intermediate Java Quiz</h1>
        
        <h2>Multiple Choice Questions (MCQ)</h2>
        <form action="<?php echo BASE_URL; ?>pages/submit_quiz.php" method="post">
            <p>1. Which of the following is true about interfaces in Java?</p>
            <input type="radio" name="q1" value="A"> A) Interfaces can contain constructors<br>
            <input type="radio" name="q1" value="B"> B) A class can implement multiple interfaces<br>
            <input type="radio" name="q1" value="C"> C) Interfaces can have instance fields<br>
            <input type="radio" name="q1" value="D"> D) A class can extend multiple interfaces<br><br>

            <p>2. What keyword is used to define an abstract class in Java?</p>
            <input type="radio" name="q2" value="A"> A) extends<br>
            <input type="radio" name="q2" value="B"> B) implements<br>
            <input type="radio" name="q2" value="C"> C) abstract<br>
            <input type="radio" name="q2" value="D"> D) final<br><br>

            <p>3. What is the main benefit of using generics in Java?</p>
            <input type="radio" name="q3" value="A"> A) To support multiple inheritance<br>
            <input type="radio" name="q3" value="B"> B) To enhance performance of JVM<br>
            <input type="radio" name="q3" value="C"> C) To enable type safety at compile-time<br>
            <input type="radio" name="q3" value="D"> D) To reduce memory usage<br><br>

            <p>4. Which of the following is required for a lambda expression in Java?</p>
            <input type="radio" name="q4" value="A"> A) Multiple abstract methods in the interface<br>
            <input type="radio" name="q4" value="B"> B) An interface with a single abstract method<br>
            <input type="radio" name="q4" value="C"> C) A method with return type void<br>
            <input type="radio" name="q4" value="D"> D) A functional class<br><br>

            <p>5. Which method of the Stream API is used to filter elements from a stream?</p>
            <input type="radio" name="q5" value="A"> A) map()<br>
            <input type="radio" name="q5" value="B"> B) filter()<br>
            <input type="radio" name="q5" value="C"> C) reduce()<br>
            <input type="radio" name="q5" value="D"> D) collect()<br><br>

            <h2>Open-ended Questions</h2>
            <p>6. What is the key difference between an abstract class and an interface in Java?</p>
            <textarea name="q6" rows="4" cols="50"></textarea><br><br>

            <p>7. How does the ExecutorService framework simplify thread management in Java?</p>
            <textarea name="q7" rows="4" cols="50"></textarea><br><br>

            <p>8. What is the purpose of the Callable interface, and how does it differ from Runnable?</p>
            <textarea name="q8" rows="4" cols="50"></textarea><br><br>

            <p>9. Explain how Java’s Reflection API can be used to dynamically invoke methods.</p>
            <textarea name="q9" rows="4" cols="50"></textarea><br><br>

            <p>10. Describe a use case where lambda expressions are particularly useful in Java.</p>
            <textarea name="q10" rows="4" cols="50"></textarea><br><br>

            <h2>Drag-and-Drop (Match the Concepts)</h2>
            <p>11. Match the components with their descriptions:</p>
            <ul>
                <li><strong>Abstract Class</strong> → <input type="text" name="q11a" placeholder="Enter letter"></li>
                <li><strong>Lambda Expression</strong> → <input type="text" name="q11b" placeholder="Enter letter"></li>
                <li><strong>Generic Type</strong> → <input type="text" name="q11c" placeholder="Enter letter"></li>
                <li><strong>ExecutorService</strong> → <input type="text" name="q11d" placeholder="Enter letter"></li>
            </ul>
            <p>Options:</p>
            <ul>
                <li>A) Provides a mechanism for thread management and task execution</li>
                <li>B) Allows methods and classes to operate on various data types while ensuring compile-time type safety</li>
                <li>C) Simplifies the implementation of functional interfaces by using a more concise syntax</li>
                <li>D) Cannot be instantiated directly but can contain both abstract and concrete methods</li>
            </ul><br>

            <p>12. Match the Stream API methods with their functionality:</p>
            <ul>
                <li><strong>filter()</strong> → <input type="text" name="q12a" placeholder="Enter letter"></li>
                <li><strong>map()</strong> → <input type="text" name="q12b" placeholder="Enter letter"></li>
                <li><strong>reduce()</strong> → <input type="text" name="q12c" placeholder="Enter letter"></li>
                <li><strong>collect()</strong> → <input type="text" name="q12d" placeholder="Enter letter"></li>
            </ul>
            <p>Options:</p>
            <ul>
                <li>A) Aggregates the elements of a stream into a single result</li>
                <li>B) Transforms the elements of a stream by applying a function</li>
                <li>C) Extracts elements from a stream that meet a specific condition</li>
                <li>D) Gathers the elements of a stream into a data structure such as a List</li>
            </ul><br>

            <h2>True or False (Bonus)</h2>
            <p>13. True or False: Generics in Java ensure type safety at runtime.</p>
            <input type="radio" name="q13" value="True"> True<br>
            <input type="radio" name="q13" value="False"> False<br><br>

            <p>14. True or False: Lambda expressions in Java can only be used with interfaces that have more than one abstract method.</p>
            <input type="radio" name="q14" value="True"> True<br>
            <input type="radio" name="q14" value="False"> False<br><br>

            <p>15. True or False: In the Executor framework, submit() can return a Future object that allows you to retrieve the result of a task.</p>
            <input type="radio" name="q15" value="True"> True<br>
            <input type="radio" name="q15" value="False"> False<br><br>

            <button type="submit" class="btn submit-btn">Submit Quiz</button>
        </form>
    </div>
</section>

<!-- Include Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

</body>
</html>
