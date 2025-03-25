# PHP + MySQL Codespace Setup

This repository provides a ready-to-use **PHP + MariaDB development environment** using GitHub Codespaces.

## Quick Start

### 1. Fork and Launch

1. Go to [GitHub](https://github.com)
2. Log in or sign up
3. Visit this repo: [https://github.com/nvas/phpmysql-codespace](https://github.com/nvas/phpmysql-codespace)
4. Click **Fork**
5. Click **Code → Create Codespace on main**

### 2. Start Services

Once inside the Codespace:

```bash
apachectl start
```

- Open the **Ports** tab
- Click the 🌐 icon next to port 80 to open the site

### 3. Access MySQL

In the terminal:

```bash
mysql -h 127.0.0.1 -u mariadb -p
```

Use password:

```
mariadb
```

---

## File Structure

```
.devcontainer/
├── Dockerfile              # PHP + MariaDB client + extensions
├── docker-compose.yml      # Services for app + db
├── devcontainer.json       # Dev container setup config
├── startup.sh              # Starts and seeds DB
├── setup-mariadb.sql       # SQL file to set up initial DB + sample data
```

---

## Import/Export database

### Import 
```bash
mysqldump -h 127.0.0.1 -u mariadb -p your_new_database_name < import.sql
```
### Export
```bash
mysqldump -h 127.0.0.1 -u mariadb -p mariadb > export.sql
```

##  License

This project is licensed under the **Educational Use License**.  
See [EDUCATIONAL_LICENSE.txt](./EDUCATIONAL_LICENSE.txt) for details.
