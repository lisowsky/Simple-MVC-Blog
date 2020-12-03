<?php $this->getHeader(); ?>
<h1>Zarejestruj użytkownika</h1>
<form action="" method="post">
    Nazwa użytkownika: <input type="text" name="username" /><br />
    Hasło: <input type="password" name="password" /><br />
    E-Mail: <input type="email" name="email" /><br />
    <input type="submit" value="Zarejestruj" />
</form>
<?php $this->getFooter(); ?>