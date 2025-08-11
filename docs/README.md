<h1>Documentation of Marf-PHP</h1>

<h2>About</h2>

Marf-PHP is a lightweight web-framework with minimal dependencies (Only applied at encryption and database interactions). Marf-PHP is based on a "view setup" like Laravel. Unlike Laravel, Marf-PHP's views are also seen as API's or anything else that interacts with incoming and outgoing packets. Every file inside the <code>view</code> folder, containing <code>.view.php</code>, is seen as a view and will automatically be imported by the framework. Use <code>require, require_once, include or include_once</code> in the show method of a view, otherwise, the import-method will be triggered for every request, no matter the url/ path. In Marf-PHP, there is no need to register views yourself. It is automatically handled. Marf-PHP consists out of some base categories. These will be listed and explained down below.
