
# Hiworld JSC


## Installation (Cakephp 3.0.10)

1. Clone project from git server.
2. Create database (mysql).
3. Rename file `config/app.default.php` to `config/app.php`.
4. Config database: find `Datasources` in `config/app.php`, then config database info.
5. Set permission `777` folder `tmp/`.
6. Update Composer: 
    
        # cd path/to/project/
        # php composer.phar update
        
7. Create default database:
        
        # cd path/to/project/
        # bin/cake migrations migrate
        
8. Open browser, enter url of project.
9. Default admin account:
        
        Email: admin@hiworld.com.vn
        Password: 12345678
        