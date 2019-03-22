HTML/PHP Workshop
========

Now instead of returning just an echo, we will return a Response.

In our index.php, the request would be stored and a Response will be sent having in count the values sent on the Request.

Create a class response, to manage it.
We will take in count the following values:
    - the content 
    - the statusCode 
    - the protocolVersion

The response status text would be also the following:
```
php$statusTexts = [
    200 => 'OK',
    404 => 'Not found',
];
``` 

Create a send() method that set the headers with the `header` php method and then echo the content.
