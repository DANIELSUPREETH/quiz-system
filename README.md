# 🚀 Dynamic Quiz System (Laravel)

## 📌 Overview
This project is a dynamic quiz system built using Laravel.  
It supports multiple question types and uses a modular architecture for evaluation.

---

## ✨ Features

- Binary (Yes/No)
- Single Choice
- Multiple Choice
- Text Input
- Number Input
- Step-by-step quiz UI
- Score calculation
- API-based submission

---

## 🛠 Tech Stack

- Laravel (PHP)
- Blade + JavaScript
- SQLite
- Docker (for deployment)

---

## ⚙️ Setup Instructions

### 1. Clone repo
git clone https://github.com/YOUR_USERNAME/quiz-system.git  
cd quiz-system  

---

### 2. Install dependencies
composer install  

---

### 3. Setup environment
cp .env.example .env  
php artisan key:generate  

---

### 4. Create database
type nul > database/database.sqlite  

---

### 5. Run migrations
php artisan migrate --seed  

---

### 6. Run server
php artisan serve  

---

### 7. Open app
http://127.0.0.1:8000/quiz/1  

---

## 🌐 Live Demo

https://your-app-name.onrender.com/quiz/1

---

## 🧠 Architecture

- Strategy pattern for question handling  
- Resolver for dynamic logic selection  
- Extensible design  

---

## 👨‍💻 Author

Daniel Supreeth