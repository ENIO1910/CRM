<div class="show">
  <?php $user = $params['user'] ?? null; ?>
  <?php if ($user) : ?>
    <ul>
        <li>Id: <?php echo $user['id'] ?></li>
        <li>Nick: <?php echo $user['Nazwa'] ?></li>
        <li>Password: <?php echo $user['password'] ?></li>
        <li>Name: <?php echo $user['imie'] ?></li>
        <li>Surname: <?php echo $user['nazwisko'] ?></li>
        <li>Birth date: <?php echo $user['data_urodzenia'] ?></li>
        <li>Group: <?php echo $user['lista_grup_uzytkownikow'] ?></li>
    </ul>
    <form method="POST" action="/?action=delete">
      <input name="id" type="hidden" value="<?php echo $user['id'] ?>" />
      <input type="submit" value="Usuń" />
    </form>
  <?php else : ?>
    <div>Brak danych od wyświetlenia</div>
  <?php endif; ?>
  <a href="/">
    <button>Powrót do listy użytkowników</button>
  </a>
</div>