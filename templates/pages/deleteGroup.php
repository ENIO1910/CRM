<div class="show">
  <?php $group = $params['group'] ?? null; ?>
  <?php if ($group) : ?>
    <ul>
        <li>Id: <?php echo $group['id'] ?></li>
        <li>Name: <?php echo $group['name'] ?></li>
    </ul>
    <form method="POST" action="/?action=deleteGroup">
      <input name="id" type="hidden" value="<?php echo $group['id'] ?>" />
      <input type="submit" value="Delete" />
    </form>
  <?php else : ?>
    <div>No data to display</div>
  <?php endif; ?>
  <a href="/">
    <button>Back to users list</button>
  </a>
</div>