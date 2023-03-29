<div>
    <h3>Add user</h3>
    <div>
        <form class="note-form" action="/?action=create" method="post">
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
                    <input type="submit" value="Submit"/>
                </li>
            </ul>
        </form>
    </div>
</div>