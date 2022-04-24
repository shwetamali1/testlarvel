# testlarvel

for peforming crud operation i followed following steps
create  databasbe xml into mysql connect to .env file then
1.create model and migration file :
 php artisan make:model contacts -m
 then write function in migeation and used below command to create table in db
    php artisan migrate

    then created routes in web.php
    then cretaed controller using below command used below code to create corntroler
    php artisan make:controller ContactsCRUDController
    in last cretaed view means html files
    Make Directory Name contacts
index.blade.php
create.blade.php
edit.blade.php



--------------
for import xml contacts and store i db follow similr below steps
create route
then create model and migration using below command
php artisan make:model XmlData -m

then created controller using below command
php artisan make:controller ReadXmlController
then create blade file in view