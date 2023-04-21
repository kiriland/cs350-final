
## CS350 Final Project -- Online Grocery Store
!!IMPORTANT!! Before you make changes to mysqli_connect.php make sure to write the command below, so that your changes will not break the file for others.

    git update-index --skip-worktree mysqli_connect.php
  

## Todo
 - [x] Registration Page Design
 - [x] Login Page Design
 - [ ] User Registration - Partially done, no validation of entries. 
 - [ ] User Authentication
 - [ ] Database Storage of Products

In order for us to have the same database structure, I created a **database.txt** . Just copy and paste the queries and we will have the same working version of the database. If someone will make changes to the database, we will have to delete our local version of the database and create the one that is up to date from the **database.txt**.

To delete local database

    DROP DATABASE csc350_final;

  
  To get the latest version of the project write in terminal 

    git pull origin

To commit to the repository

     git add .
     git commit -m "MESSAGE"
     git push origin main

Group Memebers:
- Kiril Andrieiev
- Busra Tas
- Eduardo Eligio
