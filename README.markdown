What is Condor?
====================
Condor is a *simple* PHP framework. It is designed using MVC - Condor brings the VC, you bring the M. 

Configuration
====================
To get it working you gotta change the base route in the .htaccess file. This allows the system to forward the URL to the routing system to let it do the controller bling stuff.

Routes
====================
Condor has a simple flash system based on the flash system in Rails. By default css is provided for notice and error, but you can make your own and handle them however.

`sys()->flash->error = "Hey, you sucked at something.";`

`sys()->flash->notice = "You are awesome!";`

Do and Do Not
====================
-  DO       make controllers for your stuff.
-  DO       change the stuff up in /lib to work for you.
-  DO       validate your data by adding methods to /lib/userdata_app.php
-  DO       check out the simple demo that exist.
-  DO NOT   modify files in /system unless you want to change them everytime you upgrade.

Be Aware
====================
This isn't done yet (or even close to resembling it), so don't come crying to me if you download it and it maxes out your credit cards or kills your rabbit or something.

To Document
====================
purpose of each folder
how to upgrade

To Do
====================
add error page handling
