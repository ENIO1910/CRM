<html lang="en">

<head>
  <title>CRM</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
  <link href="/public/style.css" rel="stylesheet">
</head>

<body class="body">
  <div class="wrapper">
    <div class="header">
      <h1><i class="far fa-clipboard"></i>CRM</h1>
    </div>

    <div class="container">
      <div class="menu">
        <ul>
          <li><a href="/">Users</a></li>
          <li><a href="/?action=create">Add user</a></li>
          <li><a href="/?action=listGroup">Group</a></li>
          <li><a href="/?action=createGroup">Add group</a></li>
        </ul>
      </div>
      <div class="page">
        <?php require_once("templates/pages/$page.php"); ?>
      </div>
    </div>

    <div class="footer">
      <p>CRM w PHP</p>
    </div>
  </div>
</body>

</html>