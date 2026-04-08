<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Project Setup Guide (For Students)

Follow these steps to clone and run the project locally. You are encouraged to explore and modify the code freely.


### 1. Install Dependencies

Install PHP and JavaScript dependencies:

```bash
composer install
npm install
```

### 2. Setup Environment File

Copy the example environment file:

```bash
copy .env.example .env
```

Then open `.env` and configure your database and other settings if needed.

### 3. Generate Application Key

```bash
php artisan key:generate
```

### 4. Run Migrations (if applicable)

```bash
php artisan migrate
```

### 5. Build Frontend Assets

```bash
npm run dev
```

### 6. Run the Application

```bash
php artisan serve
```

Open your browser and go to:

```
http://127.0.0.1:8000
```

---

---

## Comprehensive Project: The User Management Portal

This project combines **Navigation**, **Form Handling (Session/Validation)**, and **Database CRUD** into one continuous development workflow.

### Objective
Build a complete web application where users can navigate between pages, register with detailed information, and manage that data in a database.

---

### Phase 1: Layout & Navigation (Foundation)
*Goal: Build a responsive frame for your application.*

1. **Navbar Component**: Create `resources/views/components/navbar.blade.php`.
   - Add links for: `Home`, `About`, `Contact`, `Services`, `Showcases`, `Blog`, and `Dashboard`.
2. **Master Layout**: Create `resources/views/components/layout.blade.php` and use `<x-navbar />` inside it.
3. **Static Routes**: Define GET routes in `routes/web.php` for each page.
   - Home → "Welcome to homepage"
   - About → "About us section"
   - ...and so on.

---

### Phase 2: Form Handling & Validation
*Goal: Practice secure data collection and user feedback.*

1. **Registration View**: Create `user_registration.blade.php`.
2. **Form Elements**: Build a form that collects:
   - First Name, Last Name, Email, Age, etc.
3. **POST Route**: Create a route to handle the form submission.
4. **Validation Logic**: Use `request()->validate([...])` to:
   - Reject empty inputs.
   - Ensure the email is in a valid format.
   - Prevent duplicate emails (check the database).
5. **Flash Messages**: Use Laravel Sessions to show a "Success" message after submission.

---

### Phase 3: Database CRUD operations
*Goal: Move from temporary storage to persistent database storage.*

1. **Migration**: Update the `users` table migration:
   - Add: `first_name`, `last_name`, `middle_name`, `nickname`, `email` (unique), `age`, `address`, `contact_number`.
   - Run `php artisan migrate`.
2. **Store**: Inside your controller/route logic, save the validated data to the `User` model.
3. **Display (Read)**: Create a table view that lists every user currently in the database.
4. **Delete**: Add a delete button for each user row.
5. **Update**: Create an "Edit" form that allows you to change existing user details.

---

## Reflection Questions

1. What is the difference between GET and POST requests?
2. Why is `@csrf` mandatory in Laravel forms?
3. How does the `User` model bridge the gap between your code and the database?
4. What happens to the user data if you run `php artisan migrate:refresh`?

---

## Submission Instructions
1. Save your reflection answers in a file named `Surname_Answers.md` in the root directory.
2. Ensure your `.env` is properly configured for your local database.
3. Have fun building!



## Notes for Students

- Feel free to modify the code and experiment  
- Breaking things is part of learning—don’t be afraid to try  
- If something stops working, you can always re-clone the project  
- Make sure your database is properly configured in `.env`  

---

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. It simplifies common tasks like routing, authentication, and database management.

Documentation: https://laravel.com/docs

---

## License

This project follows the MIT license.