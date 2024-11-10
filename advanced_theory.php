<?php
session_start();
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$username = $isLoggedIn ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javify - Advanced Java</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="advanced-page">

<!-- Include Header -->
<?php include 'header.php'; ?>

<!-- Content Section -->
<section id="advanced-content">
    <div class="index-container text-center">
        <h1>Advanced Java Theory</h1>
        
        <h2>1. Java Memory Management and Garbage Collection</h2>
        <p>In advanced Java, understanding memory management is crucial, especially in environments where performance and resource optimization are critical. Java uses an automatic memory management system, known as Garbage Collection (GC), which automatically reclaims memory by deallocating objects that are no longer reachable.</p>
        <p>Advanced Java developers must be familiar with different Garbage Collection algorithms and their impact on application performance:</p>
        <ul>
            <li><strong>Serial Garbage Collector:</strong> Single-threaded and used in applications with small heaps, where pause times aren't critical.</li>
            <li><strong>Parallel Garbage Collector:</strong> Multithreaded and useful for maximizing throughput by running multiple garbage collection threads concurrently.</li>
            <li><strong>CMS (Concurrent Mark-Sweep) Garbage Collector:</strong> A low-latency collector designed to minimize pause times during the garbage collection process, often used in server applications.</li>
            <li><strong>G1 (Garbage-First) Garbage Collector:</strong> Designed to balance between throughput and latency, G1 divides the heap into regions and can reclaim space incrementally, allowing for more predictable pause times.</li>
        </ul>
        <p><strong>Key points:</strong></p>
        <ul>
            <li>Developers can fine-tune GC behavior with JVM flags (e.g., <code>-XX:+UseG1GC</code> for enabling the G1 garbage collector).</li>
            <li>Memory leaks can still occur in Java, typically when object references are unintentionally held, preventing garbage collection.</li>
        </ul>

        <h2>2. Java Concurrency and Synchronization Mechanisms</h2>
        <p>While basic multithreading concepts are covered in intermediate theory, advanced Java developers need to understand more sophisticated concurrency techniques and synchronization mechanisms.</p>

        <h3>Locks and the ReentrantLock Class</h3>
        <p>While the <code>synchronized</code> keyword is a common way to ensure thread safety, Java provides a more flexible alternative in the form of explicit locks using the <code>ReentrantLock</code> class. These locks provide advanced control over thread synchronization, such as the ability to:</p>
        <ul>
            <li>Try acquiring a lock without blocking (<code>tryLock()</code>).</li>
            <li>Interrupt a thread waiting to acquire a lock (<code>lockInterruptibly()</code>).</li>
            <li>Support fairness, ensuring that the longest-waiting thread gets the lock next.</li>
        </ul>

        <h3>ThreadLocal Variables</h3>
        <p>The <code>ThreadLocal</code> class provides thread-local variables, which are variables isolated to the thread that uses them. This allows developers to avoid synchronization when multiple threads need to work with variables that should not be shared.</p>
        <pre>
public class UserSession {
    private static final ThreadLocal&lt;String&gt; session = new ThreadLocal&lt;&gt;();

    public static void set(String user) {
        session.set(user);
    }

    public static String get() {
        return session.get();
    }
}
        </pre>
        <p>In this example, each thread will have its own instance of <code>session</code>, avoiding race conditions and thread interference.</p>

        <h3>Fork/Join Framework</h3>
        <p>Introduced in Java 7, the Fork/Join Framework is designed for work that can be broken down into smaller tasks. It uses a divide-and-conquer approach, where larger tasks are recursively split into smaller tasks that can run in parallel, allowing for efficient use of multiple processors.</p>
        <p><strong>Key class:</strong> <code>ForkJoinPool</code>.</p>
        <pre>
ForkJoinPool pool = new ForkJoinPool();
pool.invoke(new RecursiveTaskExample());
        </pre>

        <h2>3. Design Patterns in Java</h2>
        <p>Advanced Java developers should be familiar with design patterns, which are proven solutions to common software design problems. Here are a few particularly relevant ones:</p>

        <h3>Singleton Pattern</h3>
        <p>Ensures that a class has only one instance and provides a global point of access to it. This pattern is often used for managing shared resources like database connections or configuration settings.</p>
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

        <h3>Factory Pattern</h3>
        <p>This pattern provides an interface for creating objects in a superclass, allowing subclasses to alter the type of objects that will be created. It's commonly used when the exact type of object to create is determined at runtime.</p>

        <h3>Observer Pattern</h3>
        <p>The observer pattern is used to implement distributed event-handling systems. When the state of an object (subject) changes, all its dependents (observers) are notified and updated automatically.</p>
        <pre>
interface Observer {
    void update(String event);
}

class EventObserver implements Observer {
    public void update(String event) {
        System.out.println("Event received: " + event);
    }
}
        </pre>

        <h2>4. Java Stream API Advanced Operations</h2>
        <p>Advanced usage of the Stream API involves operations like <code>flatMap</code>, <code>reduce</code>, and parallel streams.</p>

        <h3>flatMap()</h3>
        <p>The <code>flatMap()</code> method is used to flatten nested collections or arrays, commonly transforming a stream of collections into a stream of elements.</p>
        <pre>
List&lt;List&lt;String&gt;&gt; nestedList = Arrays.asList(
    Arrays.asList("a", "b"), 
    Arrays.asList("c", "d")
);

List&lt;String&gt; flatList = nestedList.stream()
    .flatMap(Collection::stream)
    .collect(Collectors.toList());
        </pre>

        <h3>reduce()</h3>
        <p>The <code>reduce()</code> operation performs a reduction on the elements of the stream, combining them into a single result (e.g., summing or multiplying numbers).</p>
        <pre>
List&lt;Integer&gt; numbers = Arrays.asList(1, 2, 3, 4);
int sum = numbers.stream()
    .reduce(0, Integer::sum);
        </pre>

        <h3>Parallel Streams</h3>
        <p>For large datasets, parallel streams can help take advantage of multiple CPU cores. By using <code>parallelStream()</code>, the operations can be run concurrently.</p>
        <pre>
List&lt;Integer&gt; numbers = Arrays.asList(1, 2, 3, 4);
numbers.parallelStream()
    .forEach(System.out::println);
        </pre>

        <h2>5. Annotations and Meta-Annotations</h2>
        <p>Annotations provide metadata for classes, methods, and variables. In advanced development, annotations play a critical role, especially in frameworks like Spring and JPA (Java Persistence API).</p>
        <p>Some key annotations:</p>
        <ul>
            <li><code>@Override</code>: Indicates that a method is overriding a method in a superclass.</li>
            <li><code>@SuppressWarnings</code>: Tells the compiler to ignore specific warnings.</li>
            <li><code>@FunctionalInterface</code>: Indicates that an interface is intended to be a functional interface (i.e., it has exactly one abstract method).</li>
        </ul>

        <h3>Custom Annotations</h3>
        <p>Java allows the creation of custom annotations, which can be processed at runtime using reflection.</p>
        <pre>
@Retention(RetentionPolicy.RUNTIME)
@Target(ElementType.METHOD)
public @interface MyAnnotation {
    String value();
}
        </pre>
        <p>Annotations can also be meta-annotated, meaning annotations can have annotations that describe how they behave.</p>

        <h2>6. Java Modules</h2>
        <p>Introduced in Java 9, the Java Platform Module System (JPMS) allows developers to create modularized applications. Modules are self-contained units of code that explicitly state their dependencies on other modules and their public APIs, improving encapsulation and scalability for large applications.</p>
        <p><strong>Key points:</strong></p>
        <ul>
            <li>A module is defined by a <code>module-info.java</code> file.</li>
            <li>A module can export certain packages and keep other packages hidden.</li>
            <li>Modules can specify which other modules they require.</li>
        </ul>
        <pre>
module com.example.myapp {
    requires java.sql;
    exports com.example.myapp.utils;
}
        </pre>

        <h2>7. Java Native Interface (JNI)</h2>
        <p>The Java Native Interface (JNI) allows Java code to interact with code written in other languages like C and C++. This is useful when you need to use platform-specific features or integrate with legacy code that is not written in Java.</p>
        <p><strong>Key points:</strong></p>
        <ul>
            <li>JNI is often used when performance is critical, and Java alone may not suffice.</li>
            <li>It introduces complexities, such as managing native memory, and should be used cautiously due to potential stability and security risks.</li>
        </ul>
        <pre>
public class NativeExample {
    native void printMessage();
    
    static {
        System.loadLibrary("NativeLib");
    }
}
        </pre>
        <p>In this example, the <code>printMessage()</code> method is implemented in C/C++ and invoked from Java using JNI.</p>

        <!-- "Go to Quiz" Button -->
        <div class="text-center">
            <a href="advanced_quiz.php" class="btn quiz-btn">Go to Quiz</a>
        </div>
    </div>
</section>

<!-- Include Footer -->
<?php include 'footer.php'; ?>

</body>
</html>
