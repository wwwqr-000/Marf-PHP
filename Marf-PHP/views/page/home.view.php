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

        $error = "";
        if (isset(Client::getData("session")["test"]) && isset(Client::getData("session")["test"]["error"]) && !empty(Client::getData("session")["test"]["error"])) {
            $msg = Security::sanitizeTxt(Client::getData("session")["test"]["error"]);
            $error = "<script>setTimeout(() => { window.alert('$msg'); }, 100);</script>";
        }

        $name = "";
        if (isset(Client::getData("session")["test"]) && isset(Client::getData("session")["test"]["name"]) && !empty(Client::getData("session")["test"]["name"])) {
            $name = "<h1>Your text: " . Client::getData("session")["test"]["name"] . "</h1>";
        }

        return <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Home page ({$ip} | {$protocol})</title>
            <link rel="stylesheet" href="assets/css/self.css">
            {$error}
        </head>
        <body>
            <h1>Thanks for using Marf-PHP!</h1>
            <br>
            <p>This is a encrypted string: {$encStr}</p>
            <p>This is that string, but decrypted: {$decStr}</p>
            <p>This is the hash of {$decStr}: {$hashStr}</p>
            <form method="post" action="">
                <input class="pl-d" type="text" name="{$rName}" placeholder="Enter some text">
                <input type="submit" value="send">
            </form>
            {$name}
        </body>
        </html>
        HTML_CONTENT;
    }
}

ViewRegister::register(new Home());
?>