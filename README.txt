0- First, if you work on Linux OS you should give access to read and write to those files:
sudo chmod 777 uploads
sudo chmod 777 visiteurs

1- Import the database "immobilier.sql" to your Mysql (in this project i worked with Mysql SGBD) with the name "immobilier".

2- Aften moving this directory to your ServerDirectories ( Xampp,Wampp,.. ) Open "cnx.php" file and change the server, username and the [ password ].

3- To have an root or admin access you should connect as :
email : elmehdiaitfakir@gmail.com
password : admin 

4- to access as a simple user you can register.


###### THINGS TO DO ... ######
--> Crypte password on database, and use a function to decrypte it to verify login of a Simple user or admin.
--> Add a "status" attribute on database (tables: annonces,reservations,utilisateurs) for not deleting lines from database, just changing the "status" from "1" to "0" or "0" to "1" (which "0" means the line was deleted)

##############################

Enjoy it !
