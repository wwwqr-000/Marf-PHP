<?php

class Home extends View {
    protected $name = "home";
    protected $fnex = "php";

    private function getProtocol() {
        if (Client::isHttps()) {
            return "https";
        }
        return "http";
    }

    public function show() {
        $ip = Client::getIP();
        $protocol = $this->getProtocol();
        $encStr = Security::encryptStr("Marf-PHP");
        $decStr = Security::decryptStr($encStr);
        $hashStr = Security::hashStr($decStr);

        $rName = Security::genCSRFField("name");
        
        return <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Home page ({$ip} | {$protocol})</title>
            <link rel="stylesheet" href="assets/css/self.css">
        </head>
        <body>
            <h1>Thanks for using Marf-PHP!</h1>
            <br>
            <p>This is a encrypted string: {$encStr}</p>
            <p>This is that string, but decrypted: {$decStr}</p>
            <p>This is the hash of {$decStr}: {$hashStr}</p>
            <form method="post" action="">
                <input type="text" name="{$rName}">
            </form>
        </body>
        </html>
        HTML_CONTENT;
    }
}

ViewRegister::register(new Home());
?>