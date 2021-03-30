# Zendesk Product Security

Simple web server set-up:
1. Download and install PHP 8.0 [from here](https://www.php.net/downloads)
2. Clone [this git repo](https://github.com/hussain1998/product_security_challenge) onto your computer
3. Change directory to /product_security_challenge/project/
4. Run `php -S localhost:8000 router.php` in command line
5. Use the browser to access [http://localhost:8000/](http://localhost:8000/) 

Added functionalities:
- Used PHP session to stay logged in during the session
- Created a CSRF token which will be embedded into forms to prevent CSRF attack
- Used [HTML Purifier](http://htmlpurifier.org/) library to sanitize inputs (Standards compliant)
- Stored username and salted hashed passwords accounts.txt file. Used PHP's password_hash() for hashing.

| File               | Purpose                                                     |
|--------------------|-------------------------------------------------------------|
| index.php          | Main entry point. Shows a log in page                       |
| login.php          | Process log in information and verifies users               |
| create-account.php | Allows users to create an account                           |
| welcome.php        | Users will be redirected to this page if they are logged in |
| accounts.txt       | Usernames and salted hashed passwords stored in here        |
| /assets            | Folder containing CSS                                       |
| /libraries         | Folder containing HTML Purifier library                     |

Sample account stored in accounts.txt:
- Username: `user`
- Password: `user`

### The Zendesk Product Security Challenge

Hello friend,

We are super excited that you want to be part of the Product Security team at Zendesk.

**To get started, you need to fork this repository to your own Github profile and work off that copy.**

In this repository, there are the following files:
1. README.md - this file
2. project/ - the folder containing all the files that you require to get started
3. project/index.html - the main HTML file containing the login form
4. project/assets/ - the folder containing supporting assets such as images, JavaScript files, Cascading Style Sheets, etc. You shouldn’t need to make any changes to these but you are free to do so if you feel it might help your submission

As part of the challenge, you need to implement an authentication mechanism with as many of the following features as possible. It is a non exhaustive list, so feel free to add or remove any of it as deemed necessary.

- [X] Input sanitization
- [X] Password hashed
- [ ] Prevention of timing attacks
- [ ] Logging
- [X] CSRF prevention
- [ ] Multi factor authentication
- [ ] Password reset / forget password mechanism
- [ ] Account lockout
- [ ] Cookie
- [ ] HTTPS
- [ ] Known password check

You will have to create a simple binary (platform of your choice) to provide any server side functionality you may require. Please document steps to run the application. Your submission should be a link to your Github repository which you've already forked earlier together with the source code and binaries.

Thank you!
