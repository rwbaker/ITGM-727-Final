This repo is the final project for ITGM-727.

Below are some basic instructions to get this application running on your own web server. I initially tried to get this running on the college web host, but I continuously had challenges with session support, which the authentication system depends on.


## Setup Instructions

1. Upload all the repo files to your web server, or point your web server to the
`www` folder of this repo.
2. Create a database.
3. Update `includes/helpers/config.php` with your DB connection details & database name.
4. Using phpMyAdmin, copy and paste the contents of `includes/db.sql` to create the needed tables.

## Run
Fire up your browser to http://localhost or whatever your server URL is. On the home page (`index.php`), you can create a new user. Login via `login.php`.

## Admin User
Once you've created a user, you can use phpMyAdmin to run the SQL found in  `includes/admin.sql`. This will convert the first user into an Admin user. Once you log in as an Admin user, you'll be directed to the admin section (`admin/index.php`). Here you can see all the users, their data, and create new users.

Only when logged in as Admin can you create other Admin users.
