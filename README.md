HTML/PHP Workshop
========

Now there is time to make the code more secure. 

Create a class Request, that it would be placed in a src folder.

In the Request class we will check that both key and variable are passed through the url and either ignore or return a value by default.

Also protect the exit against XXS with `htmlspechialchars`

Now we have already two folders with files, we better start to use namespaces to it. 
That would help us in case the project scales.

Require the `vendor/autoload.php` to be able to use the class Request from the index without including it on the file.

