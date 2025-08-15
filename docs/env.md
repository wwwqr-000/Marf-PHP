<h1>About the environment file</h1>

Marf-PHP uses a <code>.env</code> file to store sensitive data, like passwords and tokens. The <code>.env</code> file is also used as config for the whole framework. This repo contains a <code>.env_example</code> file. Rename it to .env and fill in the correct credentials. Down below is a list of fields and a explenation for them.

<h3>Security</h3>

* SECURITY_HASH_ALGO (The name of the algorithm used for hashing)
* SECURITY_AES_KEY (A string of exactly 32 chars, representing the AES-key)
* SECURITY_AES_ALGO (The name of the algorithm used to encrypt and decrypt strings)
* SECURITY_SESSION_REFRESH_TIME (The time it takes in minutes to refresh the <code>$_SESSION</code> identifier for a client. (<code>$_SESSION</code> does not get reset when identifier is refreshed))
* SECURITY_PHPSESID_LENGTH (The length of the <code>$_SESSION</code> identifier. "128" is recommended, the higher, the more secure)

<h3>Database</h3>

* DATABASE_NAME (The name of the database)
* DATABASE_HOST (The domain name or url pointing to the database device)
* DATABASE_PORT (The port the database service runs on)
* DATABASE_USER_NAME (The name of the database user)
* DATABASE_USER_PASSWORD (The password of the database user)
* DATABASE_ENABLED (If the database is enabled or not)

<h3>General</h3>

* GENERAL_WEBSITE_IS_ONLINE (If the website is active or not, redirects uers to a spesific view if the website is not activte, configured in <code>urls.php</code>)
