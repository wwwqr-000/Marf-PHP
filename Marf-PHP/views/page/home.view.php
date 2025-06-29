<?php

class Home extends View {
    protected static $name = "home";
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
            unset($_SESSION["test"]["error"]);
        }

        $name = "";
        if (isset(Client::getData("session")["test"]) && isset(Client::getData("session")["test"]["name"]) && !empty(Client::getData("session")["test"]["name"])) {
            $name = "<h1 class=\"has-text-centered is-size-4 mt-6\">Your text: " . Client::getData("session")["test"]["name"] . "</h1>";
        }

        return <<< HTML_CONTENT
        <!DOCTYPE html>
        <html>
        <head>
            <title>Home page ({$ip} | {$protocol})</title>
            <link rel="stylesheet" href="assets/css/self.css">
            <link rel="stylesheet" href="assets/css/bulma.css">
            {$error}
        </head>
        <body>
            <div class="section has-text-centered">
                <h1 class="title mb-5">Thanks for using Marf-PHP!</h1>
                <p class="is-size-6">This is a encrypted string: {$encStr}</p>
                <p class="is-size-6">This is that string, but decrypted: {$decStr}</p>
                <p class="is-size-6">This is the hash of {$decStr}: {$hashStr}</p>
            </div>
            <div class="container centered-container is-flex is-justify-content-center is-align-items-center">
                <form class="box has-text-centered" method="post" action="">
                    <div class="field">
                        <div class="control">
                            <input class="input has-text-centered" type="text" name="{$rName}" placeholder="Enter some text" required>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <input class="button is-primary" type="submit" value="Send" title="Send example POST">
                        </div>
                    </div>
                </form>
            </div>

            {$name}
        </body>
        </html>
        HTML_CONTENT;
    }
}
?>