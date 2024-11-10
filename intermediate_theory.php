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
    <title>Javify - Intermediate Java</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body id="intermediate-page">

<!-- Include Header -->
<?php include 'header.php'; ?>

<!-- Content Section -->
<section id="intermediate-content">
    <div class="index-container text-center">
        <h1>Intermediate Java Theory</h1>
        
        <h2>1. Interfaces in Java</h2>
        <p>In Java, an interface is a reference type, similar to a class, that can contain only constants, method signatures, default methods, static methods, and nested types. Unlike classes, interfaces cannot contain instance fields or constructors. Interfaces are a key feature of abstraction in Java, as they allow developers to define what methods a class must implement without specifying how the methods should be implemented.</p>
        <p><strong>Key points:</strong></p>
        <ul>
            <li>Interfaces provide full abstraction and are used to achieve multiple inheritance (since Java doesn't support multiple inheritance with classes).</li>
            <li>A class can implement multiple interfaces, allowing for more flexibility and reusability of code.</li>
        </ul>
        <p><strong>Example:</strong></p>
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
        <p>In this example, the <code>Dog</code> class implements the <code>Animal</code> interface, providing specific implementations for the methods <code>eat()</code> and <code>sleep()</code>.</p>

        <h2>2. Abstract Classes</h2>
        <p>Abstract classes are classes that cannot be instantiated directly and may contain abstract methods, which are methods declared without an implementation. Abstract classes are similar to interfaces, but unlike interfaces, they can have method bodies (i.e., implemented methods), instance variables, and constructors. Abstract classes are useful when you want to create a class that cannot be instantiated, but other classes should inherit from.</p>
        <p><strong>Key points:</strong></p>
        <ul>
            <li>Use abstract classes when you want to provide some common functionality that can be shared across multiple subclasses but also allow them to have specific implementations for certain methods.</li>
            <li>An abstract class can have both abstract and concrete (implemented) methods.</li>
        </ul>
        <p><strong>Example:</strong></p>
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
        <p>Here, the <code>Car</code> class extends the <code>Vehicle</code> abstract class and provides its own implementation of the <code>startEngine</code> method, while it inherits the <code>stopEngine</code> method.</p>

        <h2>3. Generics in Java</h2>
        <p>Generics enable types (classes and interfaces) to be parameters when defining classes, interfaces, and methods. The main objective of generics is to provide type safety and to allow code reuse for different types. Instead of using Object types (which leads to unchecked casts), generics ensure compile-time type safety by allowing a class or method to operate on objects of various types while still maintaining type safety.</p>
        <p><strong>Key points:</strong></p>
        <ul>
            <li>Generics help catch type errors at compile-time.</li>
            <li>They allow the same code to be reused with different types of data.</li>
        </ul>
        <p><strong>Example:</strong></p>
        <pre>
class Box<T> {
    private T item;
    
    public void setItem(T item) {
        this.item = item;
    }
    
    public T getItem() {
        return item;
    }
}

public class Main {
    public static void main(String[] args) {
        Box<Integer> integerBox = new Box<>();
        integerBox.setItem(10);
        System.out.println(integerBox.getItem());
        
        Box<String> stringBox = new Box<>();
        stringBox.setItem("Hello Generics");
        System.out.println(stringBox.getItem());
    }
}
        </pre>
        <p>In this example, the <code>Box</code> class is generic and can be used to store any type of object. The type is specified when the object is created.</p>

        <h2>4. Lambda Expressions and Functional Interfaces</h2>
        <p>Introduced in Java 8, lambda expressions provide a clear and concise way to implement single-method interfaces (functional interfaces). A lambda expression allows you to define the implementation of a functional interface directly within the code, reducing boilerplate and improving code readability.</p>
        <p><strong>Key points:</strong></p>
        <ul>
            <li>Lambda expressions require a functional interface (an interface with only one abstract method).</li>
            <li>They provide a simpler syntax for defining anonymous functions.</li>
        </ul>
        <p><strong>Example:</strong></p>
        <pre>
interface Calculator {
    int operate(int a, int b);
}

public class Main {
    public static void main(String[] args) {
        // Lambda expression
        Calculator add = (a, b) -> a + b;
        System.out.println("Sum: " + add.operate(5, 3));
    }
}
        </pre>
        <p>In this example, the <code>Calculator</code> interface has a single method <code>operate</code>, and the lambda expression provides an implementation for this method.</p>

        <h2>5. Streams API</h2>
        <p>The Streams API, introduced in Java 8, allows developers to process data in a declarative and functional style. Streams are sequences of elements that support aggregate operations like filtering, mapping, and reduction. They are not data structures themselves but provide a way to operate on data in a pipelined manner.</p>
        <p><strong>Key points:</strong></p>
        <ul>
            <li>Streams can be used to transform or process large data sets efficiently.</li>
            <li>Streams support operations like <code>filter</code>, <code>map</code>, <code>reduce</code>, and <code>collect</code>.</li>
        </ul>
        <p><strong>Example:</strong></p>
        <pre>
import java.util.Arrays;
import java.util.List;

public class Main {
    public static void main(String[] args) {
        List<Integer> numbers = Arrays.asList(1, 2, 3, 4, 5, 6);
        
        numbers.stream()
               .filter(n -> n % 2 == 0)  // Filter even numbers
               .forEach(System.out::println);  // Print each number
    }
}
        </pre>
        <p>This example demonstrates filtering even numbers from a list using streams.</p>

        <h2>6. Concurrency with Executors</h2>
        <p>Java provides a high-level API for managing threads using the Executor framework. This framework simplifies the execution of tasks in a multithreaded environment by decoupling task submission from thread management. The ExecutorService interface provides methods for managing the lifecycle of tasks, allowing you to execute tasks asynchronously without dealing with low-level thread management.</p>
        <p><strong>Key points:</strong></p>
        <ul>
            <li>The Executor framework helps manage thread pools efficiently.</li>
            <li>The Callable interface allows you to return values from tasks executed asynchronously.</li>
        </ul>
        <p><strong>Example:</strong></p>
        <pre>
import java.util.concurrent.ExecutorService;
import java.util.concurrent.Executors;

public class Main {
    public static void main(String[] args) {
        ExecutorService executor = Executors.newFixedThreadPool(2);
        
        executor.submit(() -> System.out.println("Task 1 is running"));
        executor.submit(() -> System.out.println("Task 2 is running"));
        
        executor.shutdown();
    }
}
        </pre>
        <p>This example uses an <code>ExecutorService</code> to submit multiple tasks to a thread pool for execution.</p>

        <h2>7. Java Reflection</h2>
        <p>Reflection is a feature in Java that allows a program to inspect and modify the behavior of classes, methods, and fields at runtime. Using reflection, you can get information about a class's methods and fields, create objects dynamically, and invoke methods without knowing the class at compile time.</p>
        <p><strong>Key points:</strong></p>
        <ul>
            <li>Reflection is useful for tasks such as dynamic object creation, method invocation, and accessing private fields.</li>
            <li>Reflection can be powerful but should be used carefully due to performance overhead and security concerns.</li>
        </ul>
        <p><strong>Example:</strong></p>
        <pre>
import java.lang.reflect.Method;

public class Main {
    public static void main(String[] args) throws Exception {
        Class<?> clazz = Class.forName("java.util.ArrayList");
        Method[] methods = clazz.getMethods();
        
        for (Method method : methods) {
            System.out.println(method.getName());
        }
    }
}
        </pre>
        <p>This example demonstrates using reflection to list all the methods of the <code>ArrayList</code> class.</p>

        <!-- "Go to Quiz" Button -->
        <div class="text-center">
            <a href="intermediate_quiz.php" class="btn quiz-btn">Go to Quiz</a>
        </div>
    </div>
</section>

<!-- Include Footer -->
<?php include 'footer.php'; ?>

</body>
</html>
