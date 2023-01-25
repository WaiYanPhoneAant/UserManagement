# User Management System with Pure PHP
user management with pure php(framework thinking)

## Project Setup
```bash
  git clone https://github.com/WaiYanPhoneAant/UserManagement.git
  cd UserManagement
```


## Database configuration in config.php

```php
  "database"=>[
    'dbhost'=>'localhost', //your host
    'dbname'=>'database name',//database name
    'dbuser'=>'root',//user name
    'dbpassword'=>''//password
   ]
```

### Migration
```bash
   php migrate.php
```

### Run 
```bash
   php -S localhost:8000
```
