<?php
session_start();
?>
<! DOCTYPE html>
<html lang="en" dir="ltr">
  <cabeza>
    <meta charset="utf-8">
    <title>CSRF Security</title>
    <style>
      #contenedor{
        width: 100%;
        margin: 0;
        background-color: #ff;
      }
      .login{
        display: Table;
        margin: 0 auto;
        padding: 20px;
        Border: 5px solid #ddd;
      }
     
    </style>
  </cabeza>
  <cuerpo>
    <div id="contenedor">
      <div class="login">
        <?php
        if($_POST){
          $name = isset($_POST['name']) ? $_POST['name'] : '';
          $password = isset($_POST['password']) ? $_POST['password'] : '';
          $csrf = isset($_POST['csrf']) ? $_POST['csrf'] : '';
          if(!empty($name) && !empty($password) && !empty($csrf)){
            if($_SESSION['csrf'] === $csrf){
                echo "Welcome!";
                unset($_SESSION['csrf']);
            }else{
              echo "¡¡ATAQUE CSRF!!";
            }
          }
        }
        $token = md5(uniqid(rand(), true));
        $_SESSION['csrf'] = $token;
         ?>

        <form action="" method="POST">
          <input type="text" name="name" placeholder="Name" /><br />
          <input type="password" name="password" placeholder="password" /><br />
          <input type="hidden" name="csrf" value="<?php echo $token; ?>" />
          <input type="submit" value="Enter" />
        </forma>
      </Div>
    </Div>
  </cuerpo>
</html>