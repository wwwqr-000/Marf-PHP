<h1>About the registers of Marf-PHP</h1>


Marf-PHP uses the word "registers" to define PHP files that register certain parts to the framework. The <code>registers/</code> folder contains two files, <code>middlewareRegister.php</code> and <code>viewRegister.php</code>. <code>middlewareRegister.php</code> methods are triggered in <code>public/index.php</code> and registers all middleware when triggered. The same applies to the <code>viewRegister.php</code> file. It registers all views when a request comes in. Both files have different inner methods, but they are only used by the framework itself.
