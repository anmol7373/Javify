# **Javify**

## **Overview**
**Javify** is an interactive web-based learning platform designed to make learning Java programming fun and easy for beginners. It offers simplified Java theory, engaging quizzes in multiple formats, and a chatbot assistant to guide users by offering hints and answering questions. With a gamified point system, learners can track their progress and earn rewards for their efforts.

---

## **Features**
- **Simplified Java Theory**: Clear and concise explanations of Java topics to help users grasp the basics quickly.
- **Interactive Quizzes**: Test your understanding with multiple-choice, drag-and-drop, and open-ended questions.
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
