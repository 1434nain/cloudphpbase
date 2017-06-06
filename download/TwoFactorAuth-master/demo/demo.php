
   
        <?php
        require_once 'loader.php';
        Loader::register('../lib','RobThree\\Auth');

        use \RobThree\Auth\TwoFactorAuth;

        $tfa = new TwoFactorAuth('MyApp');
        
        $secret = $tfa->createSecret(160);  // Though the default is an 80 bits secret (for backwards compatibility reasons) we recommend creating 160+ bits secrets (see RFC 4226 - Algorithm Requirements)
        echo $secret;
        echo "<br />";
	$code = $tfa->getCode($secret);
        echo $code;
        ?>
   
    
