# 🎬 Movie & Series Favorites Manager

This project is a web application that allows users to browse movies, TV series, and actors, and manage their favorite titles and personalities. It leverages the public [TMDB (The Movie Database) API](https://www.themoviedb.org/documentation/api) to fetch rich media data, combined with a modern Laravel backend, Livewire interactivity, and Tailwind CSS for a sleek, responsive user interface.

---

## ✨ Features

- 🔍 Search and browse **movies**, **TV series**, and **actors** using TMDB data  
- ⭐ Add or remove movies, series, and actors from your **favorites list**  
- 📅 View detailed information including release dates, cast, crew, and ratings  
- 🏠 Responsive and interactive UI powered by **Livewire** and **Tailwind CSS**  
- 🔒 User authentication and personalized favorites storage  
- 🗄️ Efficient data management with **MySQL** database backend  

---

## 🛠️ Tech Stack

| Layer         | Technology            |
|---------------|-----------------------|
| Backend       | Laravel               |
| Frontend      | Livewire + Blade      |
| Styling       | Tailwind CSS          |
| Database      | MySQL                 |
| External API  | TMDB (The Movie Database) API |

---

## 🚀 Getting Started

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/movies-favorites.git
cd movies-favorites
```
### 2. Install dependencies
```bash
composer install
npm install && npm run dev
```
### 3. Setup environment variables
```bash
cp .env.example .env
php artisan key:generate
```
Configure your .env file with your database credentials and add your TMDB API key:
```bash
TMDB_API_KEY=your_tmdb_api_key_here
```
4. Run database migrations
```bash
php artisan migrate
```
5. Serve the application
```bash
php artisan serve
```
Visit http://localhost:8000 to start using the app.

🔍 How It Works
   The app uses the TMDB API to fetch up-to-date information about movies, TV shows, and actors in real-time.
   Users can create an account and log in to save their favorite items.
   Favorite selections are stored in the app’s MySQL database linked to the user.
   Livewire provides smooth, reactive UI updates without full page reloads, enhancing user experience.

📦 Project Structure Highlights

  - app/Http/Livewire/ — Livewire components managing interactive UI parts

  - resources/views/ — Blade templates for frontend layout and pages

  - app/Models/ — Laravel Eloquent models for User, Favorite, etc.
 
  - routes/web.php — Application routes

  -  config/services.php — Configuration for TMDB API access

🙌 Contributing

Feel free to open issues or submit pull requests to improve the project. Please follow the coding standards and write tests for new features.

📚 Resources
    Laravel Documentation
    Livewire Documentation
    Tailwind CSS Documentation
    TMDB API Documentation

📄 License

© 2025 Abderrahim El Ouariachi. All rights reserved. 

👨‍💻 Author

Abderrahim El Ouariachi – Full-Stack Developer
