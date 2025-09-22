# Simela Gen2 - Login System Setup

## Overview
This CodeIgniter application now includes a complete login system based on the provided HTML template.

## Features
- User authentication with email and password
- Session management
- Form validation
- Responsive AdminLTE-based UI
- Google reCAPTCHA integration (ready for configuration)
- Secure password hashing
- Dashboard with user information

## Setup Instructions

### 1. Database Setup
1. Create a MySQL database for your application
2. Import the SQL file: `database/users_table.sql`
3. Update database configuration in `application/config/database.php`:
   ```php
   $db['default'] = array(
       'hostname' => 'localhost',
       'username' => 'your_username',
       'password' => 'your_password',
       'database' => 'your_database_name',
       'dbdriver' => 'mysqli',
       // ... other settings
   );
   ```

### 2. AdminLTE Assets
You need to download and place AdminLTE 3.1.0 assets in the `assets/AdminLTE-3.1.0/` directory:

1. Download AdminLTE from: https://github.com/ColorlibHQ/AdminLTE/releases/tag/v3.1.0
2. Extract the files to `assets/AdminLTE-3.1.0/`
3. Ensure the following structure exists:
   ```
   assets/AdminLTE-3.1.0/
   ├── dist/
   │   ├── css/adminlte.min.css
   │   └── js/adminlte.min.js
   ├── plugins/
   │   ├── bootstrap/js/bootstrap.bundle.min.js
   │   ├── fontawesome-free/css/all.min.css
   │   ├── icheck-bootstrap/icheck-bootstrap.min.css
   │   └── jquery/jquery.min.js
   ```

### 3. Default Login Credentials
- Email: admin@simela.com
- Password: password123

### 4. reCAPTCHA Configuration
1. Get your reCAPTCHA site key from Google reCAPTCHA
2. Update the site key in `application/views/login.php`:
   ```html
   <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div>
   ```

## File Structure
```
application/
├── controllers/
│   ├── Login.php          # Login controller
│   └── Dashboard.php      # Dashboard controller
├── models/
│   └── User_model.php     # User authentication model
├── views/
│   ├── login.php          # Login page view
│   └── dashboard.php      # Dashboard view
└── config/
    └── routes.php         # Updated routes
```

## Usage
1. Access the application: `http://your-domain/`
2. The login page will be displayed by default
3. Enter credentials to access the dashboard
4. Use the logout link to sign out

## Security Features
- Password hashing using PHP's `password_hash()`
- Session management
- Form validation
- SQL injection protection through CodeIgniter's query builder
- CSRF protection (can be enabled in config)

## Next Steps
- Implement Google OAuth integration
- Add user registration functionality
- Add password reset feature
- Implement role-based access control
- Add more dashboard features
