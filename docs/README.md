<h1>The documentation seen the Marf-PHP framework</h1>

<h2>About</h2>

Marf-PHP is a lightweight web-framework. Marf-PHP is based on a "view setup" like laravel. Every file inside the <code>view</code> folder, containing <code>.view.php</code>, is seen as a view and will automatically be imported by the framework. Use <code>require, require_once, include or include_once</code> in the show method of a view, otherwise, the import will be triggered for every request, view-wide.

