<div class="show">
  <?php $user = $params['user'] ?? null; ?>
  <?php if ($user) : ?>
  <h3>Details about user</h3>
    <ul>
      <li>Id: <?php echo $user['id'] ?></li>
      <li>Nick: <?php echo $user['Nazwa'] ?></li>
      <li>Password: <?php echo $user['password'] ?></li>
      <li>Name: <?php echo $user['imie'] ?></li>
      <li>Surname: <?php echo $user['nazwisko'] ?></li>
      <li>Birth date: <?php echo $user['data_urodzenia'] ?></li>
      <li>Group: <?php echo $user['lista_grup_uzytkownikow'] ?></li>
    </ul>
    <a href="/?action=edit&id=<?php echo $user['id'] ?>">
      <button>Edytuj</button>
    </a>
  <?php else : ?>
    <div>No note to display</div>
  <?php endif; ?>
  <a href="/">
    <button>Back to user list</button>
  </a>
</div>