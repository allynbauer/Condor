What is Condor?
====================
Condor is a real **simple** PHP framework. It is designed using [MVC](http://en.wikipedia.org/wiki/Model–view–controller) - Condor brings the VC, you bring the M. It's mostly targeted towards developers who don't want all the overhead of a more elaborate framework but get sick of doing the same thing over and over to bootstrap the development process. In some ways, Condor's simplicity becomes a burden - it means that you still have to handle a lot of the typical application development cycle yourself. That said, it should make development easier for most people in most situations - provided you have a good grasp of PHP and are not afraid to get your hands dirty.

Configuration
====================
To get it working you gotta change the base route in the [.htaccess](http://en.wikipedia.org/wiki/Htaccess) file. This allows the system to forward the URL to the routing system to let it do the controller bling stuff. I have found some situations prevent the
setting of the WEB_ROOT constant correctly. In these situations it will become neccessary for you to set them manually. This constant
is declared in `index.php`.

Sys
====================
Condor uses a simple system for accessing global variables. It lets you get accces to them without having to declare global inside daughter[scopes](http://php.net/manual/en/language.variables.scope.php), or by using the [$GLOBALS](http://www.php.net/manual/en/reserved.variables.globals.php) array.
It's pretty simple to use; basically, you just pretend like global variables exist in sys() like such:
    
	sys()->variable = 'Set the variable';
	echo sys()->variable;
	
This is how you might gain access to the database [PDO](http://php.net/manual/en/book.pdo.php) instance - it is declared in `lib/database.php`.
So, to get access to it you can just do:
    sys()->db->whatever;

Usage of sys is not required but I like it as it means avoiding having to state my intentions to use global variables.

Routes
====================
Condor has a simple controller-level routing system. You can define routes per controller by adding a `$routes` instance variable
to them. If defined, `$routes` should be an array where keys are the method to call if matched and the values are strings in the format of
    path/to/:route
Where the controller is assumed and :name denotes a parameter. These parameters are considered Get parameters and are subsequently handled with the getData validation object.

So for example, if you had a controller called users and wanted to route a user's profile, you could do
    class UsersController {
		public $routes = array(
			'profile' => ':id/profile'
		);
		
		function profile($params) {
			// access to :id either via $params
			$user_id = $params['id'];
			// or via getData (prefered as it implies was validated)
			$user_id = sys()->getData->getintrange('id');
		}
	}

If `$routes` is undefined or a match is not found, the default match will be in this format:
    WEB_ROOT/:controller/:action/:params

- :controller matches 'app' if empty
- :action matches 'index' if empty
- :params is 0 or more parameters and will be provided to the :action via array

So, `/WEB_ROOT/app/index` is the same as `/WEB_ROOT`.

Flash
====================
Condor has a simple flash system based on the flash system in Rails. By default css is provided for notice and error, but you can make your own and handle them however.

    sys()->flash->error = "Hey, you sucked at something.";
    sys()->flash->notice = "You are awesome!";

Do and Do Not
====================
-  **DO**       make controllers for your stuff.
-  **DO**       change the stuff up in /lib to work for you.
-  **DO**       validate your data by adding methods to /lib/userdata_app.php
-  **DO**       check out the simple demo that exist.
-  **DO NOT**   modify files in /system unless you want to change them everytime you upgrade.
-  **DO NOT**   create variables that start with an underscore - these may interfere with Condor's system components.

Upgrading
====================
In general you can upgrade to new versions of Condor by replacing the system folder in the upgrade with the one you have. Hopefully it will not become necessary to change anything outside of this directory, so upgrading is literally as simple as a drag and drop. That said, on occasion it may become necessary to do more elaborate upgrades. If this happens, all of the upgrades that occur outside the scope of the system folder will be individually documented.

Be Aware
====================
This isn't done yet (or even close to resembling it), so don't come crying to me if you download it and it maxes out your credit cards or kills your rabbit or something.

To Document
====================
-  purpose of each folder
-  alternative templates
-  alternative view renders

To Do
====================
-  add error page handling
-  fix sys handling of assignment
-  provide [RESTful](http://en.wikipedia.org/wiki/Representational_State_Transfer) route options
-  automatic (but optional) GET form URL rewriting based upon routes
-  make sure routes handles last parameter optional
