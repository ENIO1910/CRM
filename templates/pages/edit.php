<div>
  <h3>User edit</h3>
  <div>
    <?php if (!empty($params['user'])) : ?>
      <?php $user = $params['user']; ?>
      <form class="note-form" action="/?action=edit" method="post">
        <input name="id" type="hidden" value="<?php echo $user['id'] ?>" />
          <ul>
              <li>
                  <label>Username <span class="required">*</span></label>
                  <input type="text" name="username" class="field-long" value="<?php echo $user['username'] ?>"/>
              </li>
              <li>
                  <label>Hasło<span class="required">*</span></label>
                  <input type="password" name="password" class="field-long" value="<?php echo $user['password'] ?>"/>
              </li>
              <li>
                  <label>First name<span class="required">*</span></label>
                  <input type="text" name="first_name" class="field-long" value="<?php echo $user['first_name'] ?>"/>
              </li>
              <li>
                  <label>Last name<span class="required">*</span></label>
                  <input type="text" name="last_name" class="field-long" value="<?php echo $user['last_name'] ?>" />
              </li>
              <li>
                  <label>Birthdate<span class="required">*</span></label>
                  <input type="date" name="birthdate" class="field-long" value="<?php echo $user['birthdate'] ?>" />
              </li>
              <?php if (!empty($params['groups'])) : ?>
                  <?php $groups = $params['groups']; ?>
                  <li>
                      <label for="group">Choose a group:</label>

                      <select name="group_id">
                          <?php foreach($groups as $group) : ?>
                              <option value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
                          <?php endforeach; ?>
                      </select>
                  </li>
              <?php endif; ?>
              <li>
                  <input type="submit" value="Submit"/>
              </li>
          </ul>
      </form>
    <?php else : ?>
      <div>
          No data to display
        <a href="/"><button>Back to users list</button></a>
      </div>
    <?php endif; ?>
  </div>
</div>