<div class="show">
  <?php $user = $params['user'] ?? null; ?>
  <?php if ($user) : ?>
    <ul>
        <li>Id: <?php echo $user['id'] ?></li>
        <li>Nick: <?php echo $user['username'] ?></li>
        <li>Password: <?php echo $user['password'] ?></li>
        <li>Name: <?php echo $user['first_name'] ?></li>
        <li>Surname: <?php echo $user['last_name'] ?></li>
        <li>Birth date: <?php echo $user['birthdate'] ?></li>
    </ul>
    <form method="POST" action="/?action=delete">
      <input name="id" type="hidden" value="<?php echo $user['id'] ?>" />
      <input type="submit" value="Delete" />
    </form>
  <?php else : ?>
    <div>No data to display</div>
  <?php endif; ?>
  <a href="/">
    <button>Back to users list</button>
  </a>
</div>