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
    <title>Javify - Advanced Java Quiz</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="advanced-quiz-page">

<!-- Include Header -->
<?php include 'header.php'; ?>

<!-- Quiz Content Section -->
<section id="advanced-quiz-content">
    <div class="index-container text-center">
        <h1>Advanced Java Quiz</h1>
        
        <h2>Multiple Choice Questions (MCQ)</h2>
        <form action="submit_quiz.php" method="post">
            <p>1. Which garbage collector in Java is designed to balance between throughput and low-latency applications?</p>
            <input type="radio" name="q1" value="A"> A) Serial GC<br>
            <input type="radio" name="q1" value="B"> B) Parallel GC<br>
            <input type="radio" name="q1" value="C"> C) G1 GC<br>
            <input type="radio" name="q1" value="D"> D) CMS GC<br><br>

            <p>2. Which class in Java provides more control over thread synchronization than the synchronized keyword?</p>
            <input type="radio" name="q2" value="A"> A) ThreadLocal<br>
            <input type="radio" name="q2" value="B"> B) ForkJoinPool<br>
            <input type="radio" name="q2" value="C"> C) ReentrantLock<br>
            <input type="radio" name="q2" value="D"> D) Semaphore<br><br>

            <p>3. What does the flatMap() method in Java Streams do?</p>
            <input type="radio" name="q3" value="A"> A) It maps each element of the stream to another stream and flattens the result.<br>
            <input type="radio" name="q3" value="B"> B) It collects elements into a List.<br>
            <input type="radio" name="q3" value="C"> C) It filters elements based on a condition.<br>
            <input type="radio" name="q3" value="D"> D) It reduces the stream elements into a single value.<br><br>

            <p>4. What is the main advantage of using ThreadLocal variables in Java?</p>
            <input type="radio" name="q4" value="A"> A) It allows shared access to the same variable across multiple threads.<br>
            <input type="radio" name="q4" value="B"> B) It ensures each thread has its own isolated copy of the variable.<br>
            <input type="radio" name="q4" value="C"> C) It locks the variable to prevent access by multiple threads.<br>
            <input type="radio" name="q4" value="D"> D) It enhances performance by parallelizing operations.<br><br>

            <p>5. Which of the following is true about the Fork/Join framework?</p>
            <input type="radio" name="q5" value="A"> A) It divides tasks into smaller subtasks and executes them in a single thread.<br>
            <input type="radio" name="q5" value="B"> B) It utilizes a divide-and-conquer approach for parallel processing.<br>
            <input type="radio" name="q5" value="C"> C) It only supports single-core processors.<br>
            <input type="radio" name="q5" value="D"> D) It cannot return results from tasks.<br><br>

            <h2>Open-ended Questions</h2>
            <p>6. What is the difference between synchronized and ReentrantLock in Java, and when would you use ReentrantLock over synchronized?</p>
            <textarea name="q6" rows="4" cols="50"></textarea><br><br>

            <p>7. Explain the benefits and potential risks of using Java’s ThreadLocal variables.</p>
            <textarea name="q7" rows="4" cols="50"></textarea><br><br>

            <p>8. Describe how the reduce() method works in Java Streams and give a real-world example of its use.</p>
            <textarea name="q8" rows="4" cols="50"></textarea><br><br>

            <p>9. What are the key differences between the CMS and G1 garbage collectors in Java?</p>
            <textarea name="q9" rows="4" cols="50"></textarea><br><br>

            <p>10. How does the Fork/Join framework improve the performance of divide-and-conquer algorithms in Java?</p>
            <textarea name="q10" rows="4" cols="50"></textarea><br><br>

            <h2>Drag-and-Drop (Match the Concepts)</h2>
            <p>11. Match the garbage collectors to their descriptions:</p>
            <ul>
                <li><strong>Serial GC</strong> → <input type="text" name="q11a" placeholder="Enter letter"></li>
                <li><strong>Parallel GC</strong> → <input type="text" name="q11b" placeholder="Enter letter"></li>
                <li><strong>CMS GC</strong> → <input type="text" name="q11c" placeholder="Enter letter"></li>
                <li><strong>G1 GC</strong> → <input type="text" name="q11d" placeholder="Enter letter"></li>
            </ul>
            <p>Options:</p>
            <ul>
                <li>A) Low-latency garbage collection with concurrent phases, but susceptible to memory fragmentation.</li>
                <li>B) Single-threaded garbage collection, suitable for small applications.</li>
                <li>C) Balances throughput and low-latency by reclaiming memory in regions and controlling pause times.</li>
                <li>D) Multi-threaded garbage collection focused on maximizing application throughput.</li>
            </ul><br>

            <p>12. Match the concurrency mechanisms to their functionality:</p>
            <ul>
                <li><strong>ReentrantLock</strong> → <input type="text" name="q12a" placeholder="Enter letter"></li>
                <li><strong>ThreadLocal</strong> → <input type="text" name="q12b" placeholder="Enter letter"></li>
                <li><strong>ForkJoinPool</strong> → <input type="text" name="q12c" placeholder="Enter letter"></li>
                <li><strong>synchronized</strong> → <input type="text" name="q12d" placeholder="Enter letter"></li>
            </ul>
            <p>Options:</p>
            <ul>
                <li>A) Provides thread-local variables, isolating variables to the thread that uses them.</li>
                <li>B) A divide-and-conquer framework designed for parallel task execution.</li>
                <li>C) A flexible lock mechanism offering features like non-blocking attempts and fairness policies.</li>
                <li>D) A simpler synchronization method that automatically locks and unlocks resources.</li>
            </ul><br>

            <h2>True or False (Bonus)</h2>
            <p>13. True or False: The flatMap() method in the Stream API is used to flatten collections of elements into a single stream.</p>
            <input type="radio" name="q13" value="True"> True<br>
            <input type="radio" name="q13" value="False"> False<br><br>

            <p>14. True or False: The Singleton pattern is used to create multiple instances of a class that share common resources.</p>
            <input type="radio" name="q14" value="True"> True<br>
            <input type="radio" name="q14" value="False"> False<br><br>

            <p>15. True or False: Java modules, introduced in Java 9, allow classes in a module to access all classes from other modules without restrictions.</p>
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
