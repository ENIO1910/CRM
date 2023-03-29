<div>
  <h3>User edit</h3>
  <div>
    <?php if (!empty($params['note'])) : ?>
      <?php $note = $params['note']; ?>
      <form class="note-form" action="/?action=edit" method="post">
        <input name="id" type="hidden" value="<?php echo $note['id'] ?>" />
        <ul>
            <li>
                <label>Nazwa <span class="required">*</span></label>
                <input type="text" name="nazwa" class="field-long"/>
            </li>
            <li>
                <label>Hasło</label>
                <input type="password" name="password" class="field-long"/>
            </li>
            <li>
                <label>Imie</label>
                <input type="text" name="imie" class="field-long"/>
            </li>
            <li>
                <label>Nazwisko</label>
                <input type="text" name="nazwisko" class="field-long"/>
            </li>
            <li>
                <label>Data urodzenia</label>
                <input type="date" name="date" class="field-long"/>
            </li>
            <li>
                <input type="submit" value="EDIT"/>
            </li>
        </ul>
      </form>
    <?php else : ?>
      <div>
        Brak danych do wyświetlenia
        <a href="/"><button>Powrót do listy notatek</button></a>
      </div>
    <?php endif; ?>
  </div>
</div>