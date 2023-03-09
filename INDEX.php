<html>
    <form action="post.php" method="post">
        <input type="text" name="comment" value="">
        <input type="submit" name="submit" value="Submit">
    <form>

        setcookie("galleta", "cookiegenerado", time()+3000, "/","", false, false);
<!--crea una cookie  -->

    <?php 
        setcookie("galleta", "cookiepreparado", time()+3000, "/","", false, false);
        //crea token csrf
        session_start();
        if (empty($_SESSION['token'])) {
        if (function_exists('mcrypt_create_iv')) {
            $_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
        } else {
            $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        }
        }
        $token = $_SESSION['token'];
    ?>
    
        
</html>