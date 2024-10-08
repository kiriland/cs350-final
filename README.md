
## CS350 Final Project -- Online Grocery Store
## How to run this project on Mac
1. Clone the project using the terminal to the desired location. Open the terminal and change the directory to where you want to clone the project to. After you've arrived at correct location type the following command, which will create a new folder cs350-final and download the files to it. **!!WARNING!!** Do not clone to Documents folder, it will break the XAMPP. 

git clone https://github.com/kiriland/cs350-final.git


  2. Open XAMPP. Inside the Apache Web Server config file, scroll down and change the DocumentRoot & Directory entries to the path of the folder where you cloned the project to. 
  Make sure to specify the full path, for example "/Users/username/cs350-final/", in both cases.
2. In the same config file, search for  **User daemon** entry and change it to **User yourMacUsername** (you can find your username from folder info).
3. Open Terminal App, and paste the following code to acess the mysql console

/Applications/xampp/xamppfiles/bin/mysql -u root -p

5. Inside the MySQL console paste and execute each query from the file **database.txt**, creating new database and new tables.

## Tasks needed to be done
 
 - [ ] User Registration - Partially done, no validation of the registration form (passwords don't have to be the same when asked to be re-entered, etc). 
 - [x] User Login
 - [x] Storing the user's session
 - [x] Adding to products to cart
 - [ ] Checking out the cart
 - [x] Database Storage of Products

## Working with the Database

In order for us to have the same database structure, I created a **database.txt** . Just copy and paste the queries one query at a time to your MySQL console and all of us will have the same working version of the database. If someone will make changes to the database, we will have to delete our local version of the database and create the one that is up to date with the **database.txt**.

To delete local database, open MySQL console and drop(delete) the database. This is in case someone updates the **database.txt**:

    DROP DATABASE csc350_final;
To open MySQL console on Mac, type in the Terminal

    /Applications/xampp/xamppfiles/bin/mysql -u root -p
    
  To open MySQL console on Windows, go to XAMPP , press SHELL, and type

    mysql -u root -p


**!! IMPORTANT !!** If you need to make changes to **mysqli_connect.php**, for example to adjust the MySQL username or password, make sure to write the command below before editing the file. The reason is so that your changes to the file will not break the connection for others when you commit and push your work.

  

    git update-index --skip-worktree mysqli_connect.php

## Working with git

  **!! IMPORTANT !!** To get the latest version of the project, run this command in terminal while in the directory of the project. **MAKE SURE TO RUN THIS EVERY TIME YOU START WORKING ON ANYTHING TO  GUARANTEE THAT YOU ARE WORKING ON THE LATEST VERSION OF THE PROJECT AND TO AVOID MERGE PROBLEMS IN THE FUTURE!**

    git pull origin

To commit to the repository (upload the files you worked on), run this command in terminal while in the directory of the project.:

     git add .
     git commit -m "MESSAGE describing the work you have done"
     git push origin main


Group Memebers:
- Kiril Andrieiev
- Busra Tas
- Eduardo Eligio


