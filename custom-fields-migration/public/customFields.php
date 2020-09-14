<div>
    <form action="" method="POST">
        <div>
            <label for="">Insert table name</label>
            <input type="text" name="tableName" required>
        </div>
        <div>
            <label for="">Insert field name(s)</label>
            <textarea cols="30" rows="10" name="customFields"></textarea>
        </div>
        <div>
            <button type="submit" name="migrate">Migrate</button>
        </div>
    </form>
</div>
<?php require_once('resources/insertCustomFields.php') ?>

