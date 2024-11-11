<?php
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
    <title>Javify - Beginner Java Theory</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
</head>
<body id="beginner-page">

<!-- Include Header -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/header.php'; ?>

<!-- Content Section -->
<section id="beginner-content">
    <div class="index-container text-center">
        <h1>Beginner Java Theory</h1>
        
        <h2>What is Java?</h2>
        <p>Java is a high-level, general-purpose, object-oriented, and secure programming language developed by James Gosling at Sun Microsystems, Inc. in 1991. It was originally known as OAK. In 1995, Sun Microsystems renamed it to Java, and in 2009, Oracle Corporation acquired Sun Microsystems, gaining control of Java.</p>
        
        <h2>Editions of Java</h2>
        <p>Each edition of Java has different capabilities. There are three main editions:</p>
        <ul>
            <li><strong>Java Standard Edition (JSE):</strong> Used to create programs for desktop computers.</li>
            <li><strong>Java Enterprise Edition (JEE):</strong> Designed for large-scale applications that run on servers, managing heavy traffic and complex transactions.</li>
            <li><strong>Java Micro Edition (JME):</strong> Used to develop applications for small devices such as set-top boxes, phones, and appliances.</li>
        </ul>

        <h2>Types of Java Applications</h2>
        <p>There are four types of Java applications that can be created using Java programming:</p>
        <ul>
            <li><strong>Standalone Applications:</strong> Java standalone applications use GUI components like AWT, Swing, and JavaFX, which include buttons, lists, menus, and scroll panels. These are also known as desktop applications.</li>
            <li><strong>Enterprise Applications:</strong> Distributed applications designed to support large-scale businesses.</li>
            <li><strong>Web Applications:</strong> Applications that run on a server, created with JSP, Servlet, Spring, and Hibernate.</li>
            <li><strong>Mobile Applications:</strong> Java ME provides a platform for developing mobile applications, including Android apps.</li>
        </ul>

        <h2>Java Platform</h2>
        <p>The Java Platform is a collection of programs that help develop and run Java programs. It includes an execution engine, a compiler, and libraries, and is platform-independent.</p>

        <h2>Features of Java</h2>
        <ul>
            <li><strong>Simple:</strong> Java has a clean and easy-to-understand syntax. Complex features of C++ are either removed or simplified in Java, such as pointers and operator overloading.</li>
            <li><strong>Object-Oriented:</strong> Java is an object-oriented language, which means it revolves around objects that hold data and behavior. Every Java program contains at least one class and one object.</li>
            <li><strong>Robust:</strong> Java uses strong memory management, including garbage collection and exception handling, to check errors at compile-time and runtime.</li>
            <li><strong>Secure:</strong> Java provides security by avoiding explicit pointers and running programs within a virtual machine, along with a security manager to manage access to Java classes.</li>
            <li><strong>Platform-Independent:</strong> Java provides a "write once, run anywhere" capability. Java code is compiled into bytecode that can run on any machine with a Java Virtual Machine (JVM).</li>
            <li><strong>Portable:</strong> Java bytecode is platform-independent, and the language avoids implementation-dependent features. Storage details, like primitive data types' sizes, are predefined.</li>
            <li><strong>High Performance:</strong> Java enables high performance through the Just-In-Time (JIT) compiler.</li>
            <li><strong>Distributed:</strong> Java supports networking and is designed for distributed environments, using protocols like TCP/IP. Technologies like EJB and RMI support distributed systems development.</li>
            <li><strong>Multi-threaded:</strong> Java supports multithreading, allowing simultaneous handling of multiple tasks.</li>
        </ul>

        <h2>OOPs (Object-Oriented Programming System)</h2>
        <p>Object-oriented programming solves complex problems by breaking them into smaller sub-problems. It uses objects, which represent real-world entities, to make programs easier to understand and develop. Key concepts include:</p>
        <ul>
            <li><strong>Class:</strong> A class is a template or blueprint that defines data members and methods for an object. An object is an instance of a class, and we define a class using the `class` keyword.</li>
            <li><strong>Object:</strong> An object is a real-world entity, such as a desk or a circle, with a unique state and behavior. Data fields and their values define the object's state, also known as its attributes.</li>
            <li><strong>Abstraction:</strong> Abstraction hides irrelevant information from the user, focusing only on essential details. For example, a driver knows how to drive a car without needing to understand its internal mechanics. In Java, abstraction is achieved through abstract classes and interfaces.</li>
            <li><strong>Encapsulation:</strong> Encapsulation binds data and methods into a single unit, a class. Java Beans are fully encapsulated classes, encapsulating all data fields and methods.</li>
            <li><strong>Inheritance:</strong> Inheritance enables a class to inherit properties and methods from another class, promoting code reuse. In Java, we use the `extends` keyword for inheritance.</li>
            <li><strong>Polymorphism:</strong> Polymorphism allows a single action to be performed in different ways. For example, a boy behaves like a student in school and a son at home. Java supports two types of polymorphism: runtime and compile-time.</li>
        </ul>

        <!-- "Go to Quiz" Button -->
        <div class="text-center">
            <a href="<?php echo BASE_URL; ?>pages/beginner_quiz.php" class="btn quiz-btn">Go to Quiz</a>
        </div>
    </div>
</section>

<!-- Include Footer -->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/Javify/includes/footer.php'; ?>

</body>
</html>
