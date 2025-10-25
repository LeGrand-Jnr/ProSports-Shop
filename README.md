# Pro Sports Shop

A simple, responsive e-commerce website template for sportswear and equipment built with HTML, CSS, JavaScript and PHP. This project is intended as a local, XAMPP-hosted demo storefront that includes product listing pages, cart functionality, and basic PHP endpoints for user signup, login and orders.

## Key Features
- Product listing and detail pages (static HTML/CSS/JS)
- Shopping cart and checkout flow (client-side + PHP hooks)
- Basic user authentication endpoints (`signup.php`, `login.php`) and order handling (`order.php`)
- Simple configuration file for database connection: `config.php`
- Organized assets in the `IMAGES/` folder

## Included Files (high level)
- `shop.html` — Products catalog
- `cart.html` — Shopping cart page
- `about.html`, `contact.html` — Informational pages
- `PRO SPORT SHOP.html` — Home / landing page (alternate)
- `signup.php`, `login.php` — User registration & authentication (PHP)
- `order.php` — Order submission endpoint (PHP)
- `config.php` — Database connection and config (update to match your environment)
- `index.js` — Client-side scripts used across pages
- `style.css` — Project styles
- `IMAGES/` — Product and UI images

> Note: This repo mixes static front-end pages with PHP server endpoints. It is intended to be run on a local PHP-enabled server (XAMPP, WAMP, LAMP).

## Requirements
- XAMPP (or another PHP + MySQL stack)
- PHP 7.x or later (the code uses standard PHP functions)
- A MySQL/MariaDB database (optional if you only use static pages)

## Quick Local Setup (Windows / XAMPP)
1. Install XAMPP from https://www.apachefriends.org/ (if not already installed).
2. Copy the project folder into XAMPP's `htdocs` directory. Example path used in this repository:

```powershell
# from PowerShell (example)
Copy-Item -Path "C:\path\to\ProSportsShop" -Destination "C:\xampp\htdocs\ProSportsShop" -Recurse
```

3. Start Apache and MySQL from the XAMPP Control Panel.
4. Create a database for the shop (if you plan to use the PHP endpoints). Using the MySQL console or phpMyAdmin:

```sql
-- example (run in phpMyAdmin or mysql client)
CREATE DATABASE prosportshop;
USE prosportshop;
-- Create tables for users, products and orders as needed (no dump included by default)
```

5. Update `config.php` with your database credentials (host, username, password, database name).
6. Open your browser and visit:

```
http://localhost/ProSportsShop/shop.html
```

## Database & Backend
This project provides PHP endpoints that expect a MySQL backend. There is no guaranteed database dump included.

## Customization
- Add or replace images inside `IMAGES/` and update product references in the HTML.
- Edit `style.css` to tune styling and responsive breakpoints.
- Extend `index.js` to add client-side features (filtering, local storage cart, etc.).
- Harden PHP scripts: use prepared statements (PDO or mysqli), session management, password hashing (password_hash), and validation before deploying publicly.


## Contributing
Contributions are welcome. Suggested workflow:

1. Fork the repository.
2. Create a feature branch: `git checkout -b feature/your-feature`.
3. Make changes and commit.
4. Open a pull request describing your changes.

Please open issues for bugs or feature requests.

## License
MIT License, Copyright (c) 2025

## Contact
Reach out to any of the original developers on the following accounts: 

Asante Ali Zakie 
Ceasar Delali
Abia Evans Magnus
Duah Bismark
Samuel Odonkor Nartey