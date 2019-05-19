##


<<<<<<< HEAD
This application is programmed using PHP/LARAVEL 5.4 and Bootstrap 4.3 , FontAwesome. 
=======
This application is programmed using PHP/LARAVEL 5.4 blade, Bootstrap 4.3 and font awesome ...
>>>>>>> a81e46f... Shops: Some comments and Writing ReadMe

Some useful command that i used to do some setting and database configuration:

# 1 command that i used to do some intializing, setting and database configuration:

php artisan key:generate
php artisan migrate

php artisan make:migration name_migration --table=table_name

php artisan migrate:refresh --no-interaction --seed

php artisan make:seeder UsersTablesSeeder

php artisan db:seed
php artisan make:controller MainController
....

# 2 Design

Normally Laravel is very structred and elegant, there are many directories for many jobs;
I describe here what i used, and i hope that i didnt forget important one.

-Front End
is programmed mainly (my do) in two pages and one layouts
pages:
 1- the welcoming page: welcome.blade.php 
 2- the pages that contains shops and viewing the computed element (in back end) : shops.blade.php 

layouts:
 1- index.blade.php (its the template that yield the welcoming page or shops pages according to the demand)

the others pages in view/auth are generated automatically using laravel artisan ; its layouts is app.blade.php 
i've done some minor modification in the login/register .blade.php to sweet my needing and integrate awesome icons

- Routes
 the main routes are in web.php 

- Back End
 there are three models and three main controller that all extends from controller

 models

 User.php : conatains information about user like name password etc 
 	        and some useful methods to define some relation with the other Model like favorite shop.

 Shop.php : contains information about the shop , name , distance , liked and somme useful methods.

 FavoriteShop: contains informations about liked shops by the autorized user and some useful methods.  	        

Controllers 

FavoriteShopController: contains all the functions that interact with de database
                         save shop in the prefered list and so on ...

HomeController: contains controller to load the views welcome/shops 
                in the case of shops , the controller load variables  shops/favs to display correctly shops nearby and the favorite shops liked by the specific user.

AuthController: controller for login and logout 
                it still somme other function that not programmed yet like reset password, verify password


There are other useful code ; like
- public/css/* for bootstrap ;
- database/* for migrating table and creating fakes data to seed
- config/* for configuation project with the database etc...
- class shopshelpers for defining somme methods used directly in views: formatting distance and computing the time for a shops being disliked.

it still somme Exceptions are not raised yet, pretending for entering some insinficant password for example...


# 3 this project respond to the above requests:

As a User, You can sign up using your email & password
As a User, You can sign in using your email & password
As a User, You can display the list of shops sorted by distance
As a User, You can like a shop, so it can be added to your preferred shops

The preferred shops are not displayed in the main page.

As a User, You can dislike a shop, so it won’t be displayed within “Nearby Shops” list during the next 2 hours
As a User, You can display the list of preferred shops
As a User, You can remove a shop from your preferred shops list


