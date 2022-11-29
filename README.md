# Web-Pregnancy-Tracker

This web application uses HTML, CSS, and JS for the front-end as well as SQL and PHP for the back-end. 

With three different portals, the user can either log in through the patient or doctor portal. The patient user can enter in pregnancies to track, see their perscriptions, and request/see appointments. The doctor user can perscribe medication, search patient records, and see their upcoming appointments. With the third portal, system admin, the user can create doctor accounts and edit/delete any record in the system.

```
To run this project please download and install PHP and a web server that runs PHP and MySQL.
For this project we used the cross-platform, Apache, MySQL, PHP and Perl server XAMPP.
PHP software can be downloaded at https://www.php.net/downloads.php.
The server can be downloaded at https://www.apachefriends.org/download.html.
Once downloaded and installed XAMPP, navigate to the phpAdmin page and create a new user account.
Place this project's folder inside the htdocs folder found in the xampp folder.

Create a new file called "Global.php" in the root file of this project.
Inside this file create a php tag and replace the fields with the information from your user account
you created (as seen down below).
    <?php
        $servername = "servername";
        $userAccountName = "name";
        $userAccountPassword = "password";
    ?>
Once created and it is your first time accessing this page, run the "db_init.php" file.
If you already initialized the database locally, you can start the web application
by running "start_web.php"
This will create the database and nagivate you to the log in page.
```