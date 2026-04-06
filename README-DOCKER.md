# WordPress Docker Setup - Mechanical PM Portfolio

## Prerequisites

- Docker Desktop installed
- Docker Compose installed
- At least 4GB RAM available for Docker

## Quick Start

1. **Start the Docker containers:**
   ```bash
   docker-compose up -d
   ```

2. **Access WordPress:**
   - WordPress site: http://localhost:8000
   - phpMyAdmin: http://localhost:8080

3. **Install WordPress:**
   - Open http://localhost:8000
   - Follow the WordPress installation wizard
   - Choose language: English
   - Set up admin account:
     - Site Title: "Mechanical PM"
     - Username: (your choice)
     - Password: (your choice)
     - Email: (your email)

4. **Access the WordPress admin:**
   - URL: http://localhost:8000/wp-admin
   - Login with credentials from step 3

## Docker Commands

### Start containers
```bash
docker-compose up -d
```

### Stop containers
```bash
docker-compose down
```

### View logs
```bash
docker-compose logs -f wordpress
```

### Restart containers
```bash
docker-compose restart
```

### Stop and remove all data (WARNING: deletes database)
```bash
docker-compose down -v
```

## Container Details

### WordPress Container
- **Name:** mechanical-pm-wp
- **Port:** 8000
- **Volume:** `./wordpress` (all WordPress files)
- **Theme Volume:** `./wp-content/themes/mechanical-pm-theme`

### MySQL Container
- **Name:** mechanical-pm-db
- **Database:** wordpress
- **Username:** wordpress
- **Password:** wordpress
- **Root Password:** rootpassword

### phpMyAdmin Container
- **Name:** mechanical-pm-phpmyadmin
- **Port:** 8080
- **Access:** http://localhost:8080
- **Login:** root / rootpassword

## Theme Development

The custom theme directory is mapped to:
```
./wp-content/themes/mechanical-pm-theme
```

Any changes to files in this directory will be immediately reflected in WordPress.

## Troubleshooting

### Port already in use
If port 8000 or 8080 is already in use, edit `docker-compose.yml`:
```yaml
ports:
  - "8001:80"  # Change 8000 to another port
```

### Database connection error
1. Wait 30 seconds for database to fully start
2. Restart containers: `docker-compose restart`
3. Check logs: `docker-compose logs db`

### Permission errors
```bash
sudo chown -R $(whoami) wordpress/
```

### Reset WordPress completely
```bash
docker-compose down -v
rm -rf wordpress/
docker-compose up -d
```

## Backup & Restore

### Backup database
```bash
docker exec mechanical-pm-db mysqldump -u wordpress -pwordpress wordpress > backup.sql
```

### Restore database
```bash
docker exec -i mechanical-pm-db mysql -u wordpress -pwordpress wordpress < backup.sql
```

## Next Steps

1. Install required plugins (ACF, Contact Form 7)
2. Activate the mechanical-pm-theme
3. Begin theme development
4. Import content

## URLs Reference

- **WordPress Site:** http://localhost:8000
- **WordPress Admin:** http://localhost:8000/wp-admin
- **phpMyAdmin:** http://localhost:8080
- **Theme Directory:** `/wp-content/themes/mechanical-pm-theme`
