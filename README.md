# Laravel DDD ToDo App

A simple yet structured ToDo List application built with **Laravel** using **Domain-Driven Design (DDD)** and Clean Architecture principles.

---

## 🧱 Project Structure

This project follows a layered architecture with clear separation of concerns:

- **Domain**: Core business logic and entities  
- **Application**: Use cases, service interfaces  
- **Infrastructure**: Framework-specific implementations  
- **Presentation**: Controllers and HTTP layer (optional, in progress)

---

## 🚀 Features (In Progress)

- Add, update, and delete tasks
- Toggle task completion
- List tasks by status (completed / pending)
- Modular service structure
- Unit-testable core logic
- Clean, decoupled code

---

## 🛠 Tech Stack

- Laravel 10+
- PHP 8.2
- MySQL
- Composer
- (Planned: Docker, PHPUnit, Swagger)

---

## 🗂 Folder Overview

```
app/
 ├── Domain/          → Entities, Value Objects, Interfaces
 ├── Application/     → Use Cases, DTOs
 ├── Infrastructure/  → Repositories, Eloquent implementations
 ├── Http/Controllers → API layer (optional)
```

---

## 📌 Roadmap

- [ ] Implement full CRUD operations  
- [ ] Write Unit Tests for Domain Layer  
- [ ] Add Swagger API docs  
- [ ] Create Docker setup  
- [ ] Deploy demo version (optional)

---

## ✍️ Author

Fatemeh Yaghoobi  
[LinkedIn](https://linkedin.com/in/fatemehyaghoobi) • [GitHub](https://github.com/fateme48984)

---

## 📃 License

MIT – use it, fork it, learn from it 🚀
