<?php 
if(isset($errorMSG)){
    echo $errorMSG;
}
?>

<form action="<?= FRONT_ROOT . '/user/logIn' ?>" method="post">
    
    <label>Email</label>
    <input type="text" name="email">
    <label>Password</label>
    <input type="text" name="pass">

    
    <button type="submit">
        enviar
    </button>
</form>