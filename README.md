# rpg-test

Purpose:    wanna mess around with stuff to better my understanding of it and work on my logic
Using:      HTML, CSS, JavaScript, XAMPP, PHP, SQL 

----------------------------------------------------------------------------------------------------------------------

1   First, I needed to get XAMPP up. I used XAMPP to be able to practice and use PHP. To use XAMPP, first I needed to open the XAMPP control panel and start the Apache and SQL modules. 

2   Then, I wanted to work on the login and signup pages right away. To do this, I had to make create a database, and make a table which would contain the username and password of the user. 

    To do this, I used the terminal, which uses MariaDB in order to create the database. I used the command 'Mysql -u root -p'. Once I did this, it prompted me to input my password, and I honestly don't know which one it was set to, but I just decided to change it to avoid the trouble. To do this, I used the command to enter a new password 'mysqladmin -u root password'. After this, I could use SQL commands to create everything.

    For Mac, it was the same commands, but the XAMPP panel doesn't have a shell option on there, so we have to go to the a file (i forgot which one but i'll update when i find out, i think it was either 'xampp' or 'xamppfiles'). 

3   Commands: 
    create database rpg;
    use rpg;
    create table users (userID INT NOT NULL PRIMARY KEY AUTO_INCREMENT, username VARCHAR(255), password VARCHAR(255));

4   For steps, these were the only ones that don't have a file attached to them, so the rest of 
    steps will be included as comments in the rest of the files, assuming I had issues with them
    or they are not obvious. 




