<?php

#AUTOGENERATED BY HYBRIDAUTH 2.1.1-dev INSTALLER - Wednesday 12th of June 2013 02:18:25 PM

/* !
 * HybridAuth
 * http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
 * (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
 */

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

return
        array(
            "base_url" => "http://www.superneur.com/site/oauth",
            "providers" => array(
                // openid providers
                "OpenID" => array(
                    "enabled" => false
                ),
                "AOL" => array(
                    "enabled" => false
                ),
                "Yahoo" => array(
                    "enabled" => false,
                    "keys" => array("id" => "", "secret" => "")
                ),
                "Facebook" => array(
                    "enabled" => true,
                    "keys" => array("id" => "351659061636541", "secret" => "393f4f0b514b55547baa2cb7cf131fb6")
                ),
                "Twitter" => array(
                    "enabled" => true,
                    "keys" => array("key" => "8Jwrr0TF73mHYKYOG6ePg", "secret" => "Wwi8fTACsgYZOqql7Kd2PeXI3KvrqpYLEREa9LnK4")
                ),
                "LinkedIn" => array(
                    "enabled" => true,
                    "keys" => array("key" => "aphpspmevxbt", "secret" => "P7foMBXzMQqkhCC7")
                ),
                "Google" => array(
                    "enabled" => true,
                    "keys" => array("id" => "889283514416.apps.googleusercontent.com", "secret" => "pm-kom9AL4Y7a0sl1wpHd6eF")
                ),
                // windows live
                "Live" => array(
                    "enabled" => false,
                    "keys" => array("id" => "", "secret" => "")
                ),
                "MySpace" => array(
                    "enabled" => false,
                    "keys" => array("key" => "", "secret" => "")
                ),
                "Foursquare" => array(
                    "enabled" => false,
                    "keys" => array("id" => "", "secret" => "")
                ),
            ),
            // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
            "debug_mode" => false,
            "debug_file" => ""
);
