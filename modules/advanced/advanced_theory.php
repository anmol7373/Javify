<?php
// Include the header file for consistent structure
include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php';

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
if (!$isLoggedIn) {
    // Redirect the user to the homepage if not logged in
    header("Location: " . BASE_URL . "index.php");
    exit;
}

// Retrieve the username of the logged-in user
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javify - Advanced Java Theory</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <script src="<?php echo BASE_URL; ?>js/bot.js" defer></script>
</head>
<body id="advanced-page">

<section id="advanced-content">
    <div class="content-container">
        <h1>Advanced Java Theory</h1>
        <p>Welcome, <strong><?php echo htmlspecialchars($username); ?></strong>! Expand the sections below to dive deeper into Advanced Java topics.</p>

        <div class="card-container">
            <!-- Card 1 -->
            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    1. Java Memory Management and Garbage Collection
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <p>Understanding memory management is crucial in performance-critical environments. Java's Garbage Collection (GC) reclaims memory by deallocating unreachable objects.</p>
                    <ul>
                        <li><strong>Serial Garbage Collector:</strong> Single-threaded, for small heaps.</li>
                        <li><strong>Parallel Garbage Collector:</strong> Multithreaded for maximizing throughput.</li>
                        <li><strong>CMS Collector:</strong> Reduces pause times for low-latency applications.</li>
                        <li><strong>G1 Garbage Collector:</strong> Balances throughput and latency with region-based heap management.</li>
                    </ul>
                    <pre><code>-XX:+UseG1GC</code></pre>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    2. Java Concurrency and Synchronization Mechanisms
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body"><br>
                    <h3>Locks and the ReentrantLock Class</h3>
                    <p>ReentrantLock offers advanced thread synchronization:</p>
                    <ul>
                        <li>Try acquiring a lock without blocking (<code>tryLock()</code>).</li>
                        <li>Interrupt waiting threads (<code>lockInterruptibly()</code>).</li>
                        <li>Fairness policies for lock acquisition.</li>
                    </ul>
                    <pre>
public class UserSession {
    private static final ThreadLocal<String> session = new ThreadLocal<>();

    public static void set(String user) {
        session.set(user);
    }

    public static String get() {
        return session.get();
    }
}
                    </pre>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    3. Design Patterns in Java
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body"><br>
                    <h3>Singleton Pattern</h3>
                    <pre>
public class Singleton {
    private static Singleton instance;

    private Singleton() {}

    public static Singleton getInstance() {
        if (instance == null) {
            instance = new Singleton();
        }
        return instance;
    }
}
                    </pre>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="card">
                <div class="card-header" onclick="toggleCard(this)">
                    4. Java Stream API Advanced Operations
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body"><br>
                    <h3>flatMap()</h3>
                    <pre>
List<List<String>> nestedList = Arrays.asList(
    Arrays.asList("a", "b"),
    Arrays.asList("c", "d")
);

List<String> flatList = nestedList.stream()
    .flatMap(Collection::stream)
    .collect(Collectors.toList());
                    </pre>
                </div>
            </div>
        </div>

        <!-- Quiz Button -->
        <div class="action-section">
            <a href="<?php echo BASE_URL; ?>modules/advanced/advanced_quiz.php" class="btn quiz-btn">Go to Quiz</a>
        </div>
    </div>
</section>

<script>
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

<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

<div id="floating-bot">
    <div id="bot-header">Javify Bot</div>
    <div id="bot-content">
        <p>Click on a highlighted term to see its explanation!</p>
    </div>
</div>

</body>
</html>