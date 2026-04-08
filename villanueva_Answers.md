# Reflection Answers

### 1. What is the difference between GET and POST requests?
In this project, we used **GET** to retrieve and display pages (like the Registration form and Dashboard). It sends data through the URL and is intended for "reading" data. We used **POST** to submit the registration form. It sends data in the request body, making it more secure and suitable for "writing" or creating data in the database.

### 2. Why is @csrf mandatory in Laravel forms?
The `@csrf` directive generates a hidden token that protects against **Cross-Site Request Forgery**. It ensures that the request being handled by our Laravel server is actually coming from our application's form and not from a malicious third-party site. Without it, Laravel will reject the request (giving a 419 error) to keep the user data safe.

### 3. How does the User model bridge the gap between your code and the database?
The `User` model uses **Eloquent ORM** (Object-Relational Mapper). It allows us to treat the `users` database table as a PHP class. Instead of writing complex SQL queries like `INSERT INTO users...`, we can simply use PHP methods like `User::create($data)` or `$user->delete()`. The model handles the translation between our object-oriented code and the relational database automatically.

### 4. What happens to the user data if you run php artisan migrate:refresh?
Running `migrate:refresh` will **rollback (delete) all your tables** and then run the migrations again from scratch. This means **all your registered users and dashboard data will be permanently deleted**. It’s a great tool during development when you are changing your database structure, but it should never be used on a live site where you want to keep your data.

---
**Submission Instructions:**
- Save your reflection answers in this file (`Surname_Answers.md`).
- Ensure your `.env` is properly configured for your local database.
- Have fun figuring it out! 🚀
