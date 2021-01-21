# Ticket Scheduler

### GOAL
 
Manages Ticket generation and ticket process

### TECHNICAL REQUIREMENTS
Laravel 8.x  
PHP 7.4.x  
MYSQL 8.x

###Create Database first and setup your .env file
### Run following commands

**1.** -> composer install
**2.** -> php artisan migrate
**3.** Go into your server, and search for cron and enter following command in 
        cammand input
        -> cd /path-to-your-project-directory && php artisan schedule:run >> /dev/null 2>&1
