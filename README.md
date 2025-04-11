<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# XenoRoss's Laravel Website

This is a personal Laravel-based website project designed to serve as a portfolio, dev blog, and sandbox for experimenting with backend/frontend integration. It's built with **Laravel**, **MySQL**, and **Alpine.js**, and hosted on a self-managed **Proxmox LXC container**.

The site currently consists of a homepage and a blog section. Authenticated users (just me, for now) can create, edit, and delete posts. All users can read them. Posts are stored in a MySQL database and rendered with Blade components.

---

## Features

- **Homepage with dynamic cards**  
  Each card links to internal or external content; external links open in new tabs.
  
- **Blog system**  
  The latest post is highlighted, with the five most recent posts shown in a sidebar layout.

- **Auth-protected blog controls**  
  Admin-only blog creation, editing, and deletion through a non-public login route.

- **Dark mode toggle**  
  Uses Tailwind and stores the user’s theme preference in browser localStorage.

- **Blade component-driven layout**  
  Header, footer, and content areas are all modular and reusable.

- **Icon support**  
  Includes icons via [Lucide](https://lucide.dev/) and [SimpleIcons](https://simpleicons.org/).

---

## Tech Stack

- **Backend**: Laravel, MySQL
- **Frontend**: Blade, TailwindCSS, Alpine.js
- **Hosting**: Proxmox LXC container, Nginx reverse proxy, Cloudflare SSL
- **Package Management**: Composer (PHP), npm (Node)

---

## Deployment Notes

The app is hosted inside a Proxmox LXC container with a shared ZFS dataset. Laravel and MySQL are installed directly within the same container for simplicity.

### Initial Setup

```bash
apt update && apt upgrade -y
apt install -y php php-cli php-mbstring php-xml php-bcmath php-curl php-mysql php-zip php-gd php-tokenizer php-common mysql-server unzip curl git composer
```

### Composer & Laravel
```bash
composer install --no-dev --optimize-autoloader
cp .env.example .env
php artisan key:generate
php artisan migrate
```

### Node.js & Asset Compilation
```bash
curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
apt remove libnode-dev -y    # Prevents header conflicts on Ubuntu 22.04
apt install -y nodejs npm
npm install
npm run build
```

Make sure your MySQL user credentials match your .env file, and that Laravel has permission to write to the storage and bootstrap/cache directories.

---

## Known Issues / Roadmap

- [ ] Handle edge case where no blog posts exist (currently breaks layout)
- [ ] Add ISS tracker widget on homepage
- [ ] Modularize more components (e.g., modal confirmations)
- [ ] Add user roles (admin vs regular)
- [ ] Potential Docker or Ansible deployment down the line

---

## License

MIT — use it, fork it, break it, improve it. Just don’t claim it as your own.

---

## Author

**Eryk Ross** — [xenoross.com](https://xenoross.com)
