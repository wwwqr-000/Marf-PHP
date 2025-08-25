<h1>About the urls.php file of Marf-PHP</h1>


Marf-PHP uses the <code>urls.php</code> file to route a incoming request from a client to a view. <code>urls.php</code> contains one class, <code>Urls</code> and in that class, one public static method: <code>getUrl()</code>. Marf-PHP uses a match case for routing logic. If a condition is true in the match case, it's returning a array with view and (optional) middleware content. If the match case can't find anything, the <code>default</code> will be triggered, returning a "not found" view. Every default view can be customized or replaced by your own custom view. At the begin of the match case, there is a check if the website is in "online" mode. This is determened from the <code>.env</code> file. The paragraph underneath explains the syntax for a route-arrray.

<h2>Route syntax explenation</h2>

The match case has two parts. The first part is the bool-checker. After that, <code> => </code> is used to point to the return value, the second part. You can use every logic to check, even custom functions can be used, or for example the <code>str_contains()</code> function, to check if the <code>$route</code> contains a certain string.

<h2>Route return syntax</h2>

<code>$route == "/" => ["allowed" => []]</code> In this case "allowed" is pointing to the array that contains the content that is used when allowed by the middleware.
<code>$route == "/" => ["allowed" => [], "denyView" => "aCustomView"]</code> The "denyView" points to a view that will be displayed for the client if the middleware returns a negative response.
<code>$route == "/" => ["allowed" => [["type" => "GET", "view" => "aRandomView"]], "denyView" => "aCustomView"]</code> "allowed" points to a two dimensional array, containing "type". "type" points to a string contaning a allowed request method. In this case, "GET". And if it's "GET", the "aRandomView" is displayed for the client. In this case, and in the example line above, the "denyView" can be removed, seen there is no middleware used. Use <code>"type" => "*"</code> to accept any request method.
<code>$route == "/" => ["allowed" => [["type" => "GET", "view" => "aRandomView"], ["type" => "POST", "view" => "aPostView"]]]</code> In this example, two request methods are handled.
<code>$route == "/" => ["allowed" => [["type" => "GET", "view" => "aRandomView", "middleware" => [MiddlewareRegister::check("isHttps")]]], "denyView" => "aCustomView"]</code> "middleware" can be added in the inner-array. If added, "denyView" is required, seen middleware is used. The middleware array can hold multiple middleware register checks. If one of the results is false, "denyView" is triggered.
<code>$route == "/" => ["allowed" => [ ["type" => "GET", "view" => "adminCheck", "middleware" => [ MiddlewareRegister::check("isAdmin", "user123") ]] ], "denyView" => "securityWarning"]</code> In this case, "MiddlewareRegister::check" passes a argument. In the middleware file, this argument can be used in it's boolean logic. (Don't remove the <code>check($arg = null)</code> in any case!)
