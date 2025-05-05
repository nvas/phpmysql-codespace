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
| Field            | Meaning                                                                 |
|------------------|-------------------------------------------------------------------------|
| mysqldump        | The command-line utility to export (dump) a MySQL/MariaDB database.     |
| -h 127.0.0.1     | Hostname or IP address of the database server (here, 127.0.0.1 = localhost). |
| -u mariadb       | Username used to connect to the database (mariadb is the username).     |
| -p               | Prompts for the user's password (it won’t show as you type).            |
| mariadb          | Name of the database to be exported.                                    |
| > export.sql     | Redirects the output to a file named export.sql.                        |

##  License

This project is licensed under the **Educational Use License**.  
See [EDUCATIONAL_LICENSE.txt](./EDUCATIONAL_LICENSE.txt) for details.
