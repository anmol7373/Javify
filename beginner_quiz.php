<?php
session_start();
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
if (!$isLoggedIn) {

    header("Location: index.php");
    exit;
}
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javify - Beginner Java Quiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="beginner-quiz-page">

<!-- Include Header -->
<?php include 'header.php'; ?>

<!-- Quiz Content Section -->
<section id="beginner-quiz-content">
    <div class="index-container text-center">
        <h1>Beginner Java Quiz</h1>
        
        <h2>Multiple Choice Questions (MCQ)</h2>
        <form action="submit_quiz.php" method="post">
            <p>1. Who developed Java?</p>
            <input type="radio" name="q1" value="A"> A) Dennis Ritchie<br>
            <input type="radio" name="q1" value="B"> B) James Gosling<br>
            <input type="radio" name="q1" value="C"> C) Bjarne Stroustrup<br>
            <input type="radio" name="q1" value="D"> D) Guido van Rossum<br><br>

            <p>2. Which edition of Java is used for desktop applications?</p>
            <input type="radio" name="q2" value="A"> A) Java Standard Edition (JSE)<br>
            <input type="radio" name="q2" value="B"> B) Java Micro Edition (JME)<br>
            <input type="radio" name="q2" value="C"> C) Java Enterprise Edition (JEE)<br>
            <input type="radio" name="q2" value="D"> D) Java Virtual Edition (JVE)<br><br>

            <p>3. Which of the following is a feature of Java?</p>
            <input type="radio" name="q3" value="A"> A) Object-Oriented<br>
            <input type="radio" name="q3" value="B"> B) Platform-Specific<br>
            <input type="radio" name="q3" value="C"> C) Manual Memory Management<br>
            <input type="radio" name="q3" value="D"> D) No Security<br><br>

            <p>4. What is the purpose of Java's garbage collector?</p>
            <input type="radio" name="q4" value="A"> A) To manage memory automatically<br>
            <input type="radio" name="q4" value="B"> B) To compile code<br>
            <input type="radio" name="q4" value="C"> C) To run programs faster<br>
            <input type="radio" name="q4" value="D"> D) To handle user input<br><br>

            <p>5. Which keyword is used to define a class in Java?</p>
            <input type="radio" name="q5" value="A"> A) class<br>
            <input type="radio" name="q5" value="B"> B) object<br>
            <input type="radio" name="q5" value="C"> C) extends<br>
            <input type="radio" name="q5" value="D"> D) new<br><br>

            <h2>Open-ended Questions</h2>
            <p>6. What is a class in Java?</p>
            <textarea name="q6" rows="4" cols="50"></textarea><br><br>

            <p>7. Why is Java considered platform-independent?</p>
            <textarea name="q7" rows="4" cols="50"></textarea><br><br>

            <p>8. What is an object in Java? Give an example of a real-world object.</p>
            <textarea name="q8" rows="4" cols="50"></textarea><br><br>

            <p>9. What does encapsulation mean in Java?</p>
            <textarea name="q9" rows="4" cols="50"></textarea><br><br>

            <p>10. Name two types of applications that can be developed using Java.</p>
            <textarea name="q10" rows="4" cols="50"></textarea><br><br>

            <h2>Drag-and-Drop (Match the Concepts)</h2>
            <p>11. Match the types of Java applications with their descriptions:</p>
            <ul>
                <li><strong>Standalone Application</strong> → <input type="text" name="q11a" placeholder="Enter letter"></li>
                <li><strong>Web Application</strong> → <input type="text" name="q11b" placeholder="Enter letter"></li>
                <li><strong>Enterprise Application</strong> → <input type="text" name="q11c" placeholder="Enter letter"></li>
                <li><strong>Mobile Application</strong> → <input type="text" name="q11d" placeholder="Enter letter"></li>
            </ul>
            <p>Options:</p>
            <ul>
                <li>A) Applications designed for smartphones</li>
                <li>B) Applications that run on servers</li>
                <li>C) Applications that run on a desktop with a graphical user interface</li>
                <li>D) Distributed applications for large businesses</li>
            </ul><br>

            <p>12. Match the Java features with their descriptions:</p>
            <ul>
                <li><strong>Platform-Independent</strong> → <input type="text" name="q12a" placeholder="Enter letter"></li>
                <li><strong>Object-Oriented</strong> → <input type="text" name="q12b" placeholder="Enter letter"></li>
                <li><strong>Secure</strong> → <input type="text" name="q12c" placeholder="Enter letter"></li>
                <li><strong>Robust</strong> → <input type="text" name="q12d" placeholder="Enter letter"></li>
            </ul>
            <p>Options:</p>
            <ul>
                <li>A) Code runs on any operating system</li>
                <li>B) Focuses on using objects in programs</li>
                <li>C) Provides safety by avoiding explicit pointers</li>
                <li>D) Has strong memory management and error checking</li>
            </ul><br>

            <h2>True or False (Bonus)</h2>
            <p>13. True or False: Java supports multi-threading, allowing multiple tasks to run simultaneously.</p>
            <input type="radio" name="q13" value="True"> True<br>
            <input type="radio" name="q13" value="False"> False<br><br>

            <p>14. True or False: Java was originally called OAK.</p>
            <input type="radio" name="q14" value="True"> True<br>
            <input type="radio" name="q14" value="False"> False<br><br>

            <p>15. True or False: Java can only be used to develop desktop applications.</p>
            <input type="radio" name="q15" value="True"> True<br>
            <input type="radio" name="q15" value="False"> False<br><br>

            <button type="submit" class="btn submit-btn">Submit Quiz</button>
        </form>
    </div>
</section>

<!-- Include Footer -->
<?php include 'footer.php'; ?>

</body>
</html>
