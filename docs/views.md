<h1>About the views of Marf-PHP</h1>


The <code>views/</code> folder contains all the views of the framework. All files that have <code>.view.php</code> in their filename are automatically registered by the framework. All views should extend from the <code>View</code> class.

<h2>Requirements in your view class</h2>

There are some methods and attributes that should be used in your view class. 

* <code>protected static $name = ""</code> Give every view a unique name.
* <code>protected $fnex = ""</code> fnex stands for "Filename extention". Yea, views can emulate other files than php! Want to show a image? By programming it yourself? <code>$fnex</code> makes it possible! (By default, use "php" for php files, "html" for html files, and so on...) $fnex is based on [MIME](https://en.wikipedia.org/wiki/MIME#Content-Transfer-Encoding).
* <code>public function show()</code> This function should return the contents of your view.
