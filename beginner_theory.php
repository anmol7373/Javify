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
    <title>Javify - Beginner Java</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="beginner-page">

<!-- Navbar -->
<header id="index-header">
    <div class="index-container">
        <div class="logo">
            <img src="images/Logo-2.png" alt="Javify Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="auth-links">
                <?php if ($isLoggedIn): ?>
                    <li><a href="profile.php" class="btn auth-btn">Hello, <?php echo htmlspecialchars($username); ?></a></li>
                    <li><a href="logout.php" class="btn auth-btn">Logout</a></li>
                <?php else: ?>
                    <li><a href="login_register.php" class="btn auth-btn">Login / Register</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>

<!-- Content Section -->
<section id="beginner-content">
    <div class="index-container text-center">
        <h1>Beginner Java Theory</h1>
        
        <h2>What is Java?</h2>
        <p>Java is a high-level, general-purpose, object-oriented, and secure programming language developed by James Gosling at Sun Microsystems, Inc. in 1991. Originally called OAK, it was renamed to Java in 1995. Oracle Corporation acquired Sun Microsystems in 2009, and with it, Java.</p>
        
        <h2>Editions of Java</h2>
        <ul>
            <li><strong>Java Standard Editions (JSE):</strong> Used to create programs for desktop computers.</li>
            <li><strong>Java Enterprise Edition (JEE):</strong> Used to create large programs that run on servers, handling heavy traffic and complex transactions.</li>
            <li><strong>Java Micro Edition (JME):</strong> Used for applications on small devices such as set-top boxes and phones.</li>
        </ul>

        <h2>Types of Java Applications</h2>
        <ul>
            <li><strong>Standalone Applications:</strong> Java applications that use GUI components like AWT, Swing, and JavaFX.</li>
            <li><strong>Enterprise Applications:</strong> Distributed applications.</li>
            <li><strong>Web Applications:</strong> Applications that run on servers, often using JSP, Servlets, Spring, and Hibernate.</li>
            <li><strong>Mobile Applications:</strong> Developed with Java ME, commonly for Android app development.</li>
        </ul>

        <h2>Java Platform</h2>
        <p>Java Platform includes an execution engine, a compiler, and libraries. It’s platform-independent, allowing Java programs to run on various devices.</p>

        <h2>Features of Java</h2>
        <ul>
            <li><strong>Simple:</strong> Clean syntax, easy to understand.</li>
            <li><strong>Object-Oriented:</strong> Java is based on objects, classes, and inheritance.</li>
            <li><strong>Robust:</strong> Strong memory management with garbage collection and exception handling.</li>
            <li><strong>Secure:</strong> No explicit pointers and uses a virtual machine.</li>
            <li><strong>Platform-Independent:</strong> Write once, run anywhere.</li>
            <li><strong>Portable:</strong> Bytecode is platform-independent.</li>
            <li><strong>High Performance:</strong> Uses the Just-In-Time compiler.</li>
            <li><strong>Distributed:</strong> Java supports networking and is designed for distributed environments.</li>
            <li><strong>Multi-threaded:</strong> Allows handling multiple jobs simultaneously.</li>
        </ul>

        <h2>OOPs (Object-Oriented Programming System)</h2>
        <ul>
            <li><strong>Class:</strong> A blueprint for objects with data members and methods.</li>
            <li><strong>Object:</strong> Real-world entity with state, identity, and behavior.</li>
            <li><strong>Abstraction:</strong> Hides unnecessary details from the user.</li>
            <li><strong>Encapsulation:</strong> Binds data and methods in a single unit.</li>
            <li><strong>Inheritance:</strong> Enables a class to inherit properties from another class.</li>
            <li><strong>Polymorphism:</strong> Allows actions to take many forms, such as method overloading and overriding.</li>
        </ul>
    </div>
</section>

</body>
</html>
