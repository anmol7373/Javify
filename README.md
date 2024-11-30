## **Overview**
**Javify** is an interactive web-based learning platform designed to make learning Java programming engaging and accessible for everyone. Whether you’re a complete beginner or looking to strengthen your existing Java knowledge, **Javify** offers a structured way to learn with clear explanations, interactive quizzes, and a user-friendly interface. 

The platform provides:
- **Simplified Java theory**: Dive into clear and concise explanations designed to simplify Java programming concepts for learners of all levels.
- **Gamified progress tracking**: Earn points for answering quiz questions correctly. These points help you measure your success and compete to secure your position at the top of the scoreboard.
- **Challenge yourself**: Compete with others, accumulate points, and aim for the top ranks on the leaderboard.
- **Chatbot assistance**: (Upcoming feature) A virtual assistant ready to provide hints, clarify doubts, and guide you through the learning process.

With **Javify**, learning Java becomes more than just reading and practicing—it’s about achieving mastery, progressing through challenges, and securing your spot as a top learner on the scoreboard!

---

## **Features**
- **Simplified Java Theory**: Clear and concise explanations of Java topics to help users grasp the basics quickly.
- **Interactive Quizzes**: 
   - **Multiple-choice questions**: Test your understanding by selecting the correct option from a list of choices. Only one correct answer is allowed per question.
   - **True/False questions**: Simple binary questions to quickly assess your knowledge of Java concepts.
- **Gamified Learning**: Earn points for correct quiz answers, and use those points to get hints or assistance from the chatbot.
- **Chatbot Assistant**: A virtual assistant that answers Java-related questions and provides hints to help users when they’re stuck.
- **User Accounts**: Create an account to track your progress, save your points, and access personalized content.

---

## **Technologies Used**
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Chatbot**: Python
- **Version Control**: Git

---

## **Getting Started**

### **1. Prerequisites**
- Install [XAMPP](https://www.apachefriends.org/index.html) on your system.
- Ensure that **Apache** and **MySQL** services are running in XAMPP.

---

### **2. Installation**

1. Clone the repository to the XAMPP `htdocs` folder:
   ```bash
   git clone https://github.com/anmol7373/Javify

   Move the Javify folder into the htdocs directory inside your XAMPP installation folder.

2. Start XAMPP Services:
   - Open the XAMPP Control Panel.
   - Start the Apache and MySQL services.

3. Open phpMyAdmin to import the database:
   - In your browser, go to http://localhost/phpmyadmin.
   - Follow these steps to set up the database:
      1. Click on "New" in the left-hand menu to create a new database.
      2. Name the database javify and click "Create."
      3. Click on the javify database in the left-hand menu.
      4. Select the "Import" tab.
      5. Click "Choose File" and upload the provided javify.sql file.
      6. Click "Go" to import the database.

4. Configure the database connection:
   - Open the config.php file located in the root directory of the project.
   - Update the database credentials to match your local environment:
     ```bash
     define('DB_HOST', 'localhost');
     define('DB_USER', 'root'); // Default XAMPP username
     define('DB_PASSWORD', ''); // Default XAMPP password is empty
     define('DB_NAME', 'javify');

5. Access the Website:
   - In your browser, go to http://localhost/Javify.
   - Register a new user or log in with existing credentials to start using the platform.

### **3. Using Javify**

   - Homepage: Navigate through the courses and quizzes via the homepage.
   - Register/Login: Create an account or log in to access quizzes and track progress.
   - Open phpMyAdmin: Use http://localhost/phpmyadmin to view or manage the database.
   - Run the Website: Access it at http://localhost/javify to start learning.

### **4. Planned Enhancements**

   - Interactive Question Formats: Add drag-and-drop and other interactive quiz formats.
   - Detailed Progress Analytics: Provide users with insights on their learning progress and weak areas.

### **5. License

MIT License

Copyright (c) 2024 Anmol Rangram, Adrien Bubel, Sébastien Porfiri

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.