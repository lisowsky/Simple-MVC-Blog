<?php $this->getHeader(); ?>
<h1>Logowanie:</h1>
<form action="" method="post">
    Nazwa użytkownika: <input type="text" name="username" /><br />
    Hasło: <input type="text" name="password" /><br /><br />
    <input type="submit" value="Zaloguj" />
</form>
<?php $this->getFooter(); ?>