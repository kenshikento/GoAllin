GoAllin is a small basic Social network

The application is using laravel as a Backend and for the front end just using standard bootstrap class for styling. For the database i was using Phpmyadmin (Xampp) also design of all tables Resources\assets\design 


The Specification:

o A home page welcoming all visitors to the site – use some placeholder text.

o A sign up page, where a visitor can register (with a name, email and password). This should only be visible to Guests.

o A log in page, where a registered user can log in to the site. This should only be visible to Guests.

o A form for Users to send a message to another User.

* It should not allow messages with more than one word

* It should not allow messages that have already been sent.

- Currently validation stops users sending same messages that they have sent [should change form request]

* It should not allow them to send themselves a message.

o A page for Users to view the messages they have received.

-Dash Board page shows all messages they have received 

o Bonus: A way to create or delete a user on the command line by passing in their user ID or email address.

Using artisan tinker you can (should use Seeder)

-Create
php artisan tinker  - 
$user = new User;
$user -> email 	   = 'admin';
$user -> name  	   = 'admin';
$user -> password  = Hash::make('password');
$user -> save();

-Delete 
$user = app\User::find(1);
$user->delete();

o Bonus: Come up with a name for this social network.
GoAllin

The requirements that are not done - 

* Bonus: A way for a User to reply to a message that has been sent to them.
-Currently no reply function
o Bonus: A page where any visitor can see an archive of all messages that have been sent – it should be paginated so that no more than 20 appear at once.
-Message Board page however there is no pagination. 


o Bonus: A way for a User to see all of their sent and received messages with a specific other User (i.e. Their “conversation”).

Improvements and errors- 
Changing method of getting the data to eloquent method as its a lot cleaner to use.
In order to display the messages both users have to message on messageboard.
Few bugs around delete 
