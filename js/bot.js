document.addEventListener("DOMContentLoaded", () => {
    const definitions = {
        // Beginner Definitions
        "Object-Oriented": "A programming style that uses objects (like real-world items) to design software.",
        "Platform-Independent": "Software that can run on any operating system without changes.",
        "Abstraction": "Hiding complex details and showing only the necessary features.",
        "Encapsulation": "Bundling data and methods together, keeping them safe from outside interference.",
        "Inheritance": "A way for one class to use properties and methods of another class.",
        "Polymorphism": "The ability of something to take on many forms (like a shape or behavior).",
        "Bytecode": "A type of code that can be executed on any machine using a virtual interpreter like JVM.",
        "JVM": "Java Virtual Machine; runs Java programs by interpreting bytecode.",
        "Secure Programming": "A way of writing software that reduces risks of hacking or errors.",
        "General-Purpose": "Software or language suitable for a wide variety of tasks.",

        // Intermediate Definitions
        "Interface": "A contract in Java that defines methods that a class must implement.",
        "Abstract Class": "A class that cannot be instantiated and can include both abstract and concrete methods.",
        "filter": "An operation in Streams API to filter elements based on a condition.",
        "map": "An operation in Streams API to transform elements into another form.",
        "reduce": "An operation in Streams API to combine elements into a single result.",

        // Advanced Definitions
        "Memory Management": "Managing memory allocation and deallocation for applications.",
        "Garbage Collection": "A Java feature that automatically reclaims unused memory.",
        "Serial Garbage Collector": "A single-threaded garbage collector for small heaps.",
        "Parallel Garbage Collector": "A multi-threaded garbage collector to maximize throughput.",
        "CMS Garbage Collector": "A low-latency garbage collector for applications that need shorter pause times.",
        "G1 Garbage Collector": "A balanced garbage collector for throughput and latency.",
        "ReentrantLock": "A lock mechanism in Java that provides advanced synchronization features.",
        "ThreadLocal": "A variable that is local to the thread accessing it.",
        "Fork/Join Framework": "Introduced in Java 7 for parallel task execution using divide-and-conquer.",
        "Singleton Pattern": "A design pattern ensuring a class has only one instance.",
        "Observer Pattern": "A design pattern for event-driven programming.",
        "flatMap": "A Streams API operation to flatten nested data structures."
    };

    // Highlight terms in the document
    Object.keys(definitions).forEach(term => {
        const regex = new RegExp(`\\b${term}\\b`, 'gi'); // Case-insensitive match
        document.body.innerHTML = document.body.innerHTML.replace(regex, match => {
            return `<span class="highlight" data-term="${term}">${match}</span>`;
        });
    });

    // Add event listener for clicks on highlighted terms
    document.querySelectorAll(".highlight").forEach(element => {
        element.addEventListener("click", () => {
            const term = element.getAttribute("data-term");
            const botContent = document.getElementById("bot-content");
            if (definitions[term]) {
                botContent.innerHTML = `<p><strong>${term}:</strong> ${definitions[term]}</p>`;
            } else {
                botContent.innerHTML = `<p><strong>${term}:</strong> Definition not found.</p>`;
            }
        });
    });
});