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
    <title>Javify - Advanced Java Theory</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/advanced_theory.css">
</head>
<body id="advanced-page">

<section id="advanced-content">
    <div class="content-container">
        <h1>Advanced Java Theory</h1>

        <div class="card-container">
            <!-- Card 1 -->
            <div class="card">
                <div class="card-header">
                    1. Java Memory Management and Garbage Collection
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <p>Understanding memory management is crucial, especially in performance-critical environments. Java's Garbage Collection (GC) system reclaims memory by deallocating unreachable objects.</p>
                    <ul>
                        <li><strong>Serial Garbage Collector:</strong> Single-threaded, for applications with small heaps.</li>
                        <li><strong>Parallel Garbage Collector:</strong> Multithreaded, designed for maximizing throughput.</li>
                        <li><strong>CMS (Concurrent Mark-Sweep) Collector:</strong> Reduces pause times for low-latency applications.</li>
                        <li><strong>G1 Garbage Collector:</strong> Balances throughput and latency with region-based heap management.</li>
                    </ul>
                    <p><strong>Tip:</strong> Use JVM flags like <code>-XX:+UseG1GC</code> to configure the garbage collector.</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="card">
                <div class="card-header">
                    2. Java Concurrency and Synchronization Mechanisms
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <h3>Locks and the ReentrantLock Class</h3>
                    <p>While <code>synchronized</code> ensures thread safety, the <code>ReentrantLock</code> class provides advanced locking mechanisms:</p>
                    <ul>
                        <li>Try acquiring a lock without blocking (<code>tryLock()</code>).</li>
                        <li>Interrupt waiting threads (<code>lockInterruptibly()</code>).</li>
                        <li>Fairness policies for lock acquisition.</li>
                    </ul>

                    <h3>ThreadLocal Variables</h3>
                    <p>Each thread gets its own instance of a <code>ThreadLocal</code> variable:</p>
                    <pre><code>
public class UserSession {
    private static final ThreadLocal<String> session = new ThreadLocal<>();

    public static void set(String user) {
        session.set(user);
    }

    public static String get() {
        return session.get();
    }
}
                    </code></pre>

                    <h3>Fork/Join Framework</h3>
                    <p>Introduced in Java 7, it uses divide-and-conquer tasks for efficient parallelism:</p>
                    <pre><code>
ForkJoinPool pool = new ForkJoinPool();
pool.invoke(new RecursiveTaskExample());
                    </code></pre>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="card">
                <div class="card-header">
                    3. Design Patterns in Java
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <h3>Singleton Pattern</h3>
                    <pre><code>
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
                    </code></pre>

                    <h3>Observer Pattern</h3>
                    <p>Used for distributed event-handling:</p>
                    <pre><code>
interface Observer {
    void update(String event);
}

class EventObserver implements Observer {
    public void update(String event) {
        System.out.println("Event received: " + event);
    }
}
                    </code></pre>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="card">
                <div class="card-header">
                    4. Java Stream API Advanced Operations
                    <span class="toggle-icon">+</span>
                </div>
                <div class="card-body">
                    <h3>flatMap()</h3>
                    <pre><code>
List<List<String>> nestedList = Arrays.asList(
    Arrays.asList("a", "b"),
    Arrays.asList("c", "d")
);

List<String> flatList = nestedList.stream()
    .flatMap(Collection::stream)
    .collect(Collectors.toList());
                    </code></pre>
                </div>
            </div>

            <!-- Add more cards as needed -->
        </div>

        <!-- Quiz Button -->
        <div class="action-section">
            <a href="<?php echo BASE_URL; ?>modules/advanced/advanced_quiz.php" class="btn quiz-btn">Go to Quiz</a>
        </div>
    </div>
</section>

<script>
    // Toggle functionality for cards
    document.querySelectorAll('.card-header').forEach(header => {
        header.addEventListener('click', () => {
            const cardBody = header.nextElementSibling;
            cardBody.style.maxHeight = cardBody.style.maxHeight ? null : `${cardBody.scrollHeight}px`;
            header.querySelector('.toggle-icon').textContent =
                cardBody.style.maxHeight ? '-' : '+';
        });
    });
</script>

<!-- Include Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

</body>
</html>
