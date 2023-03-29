<div class="list">
  <section>
    <div class="message">
      <?php
      if (!empty($params['error'])) {
        switch ($params['error']) {
          case 'missingNoteId':
            echo 'Niepoprawny identyfikator notatki';
            break;
          case 'noteNotFound':
            echo 'Notatka nie została znaleziona';
            break;
        }
      }
      ?>
    </div>
    <div class="message">
      <?php
      if (!empty($params['before'])) {
        switch ($params['before']) {
          case 'created':
            echo 'Notatka zostało utworzona';
            break;
          case 'deleted':
            echo 'Notatka została usunięta';
            break;
          case 'edited':
            echo 'Notatka została zaktualizowana';
            break;
        }
      }
      ?>
    </div>

    <div class="tbl-header">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nazwa</th>
            <th>Imie</th>
            <th>Nazwisko</th>
            <th>Data urodzenia</th>
            <th>Akcje</th>
          </tr>
        </thead>
      </table>
    </div>
    <div class="tbl-content">
      <table>
        <tbody>
          <?php foreach ($params['users'] ?? [] as $user) : ?>
            <tr>
              <td  style="text-align:center;"><?php echo $user['id'] ?></td>
              <td  style="text-align:center;"><?php echo $user['Nazwa'] ?></td>
                <td  style="text-align:center;"><?php echo $user['imie'] ?></td>
                <td  style="text-align:center;"><?php echo $user['nazwisko'] ?></td>
                <td  style="text-align:center;"><?php echo $user['data_urodzenia'] ?></td>
              <td>
                <a href="/?action=show&id=<?php echo $user['id'] ?>">
                  <button>Szczegóły</button>
                </a>
                <a href="/?action=delete&id=<?php echo $user['id'] ?>">
                  <button>Usuń</button>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>
</div>