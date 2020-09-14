<?php

if(isset($_POST['migrate']) && !empty($_POST['tableName'])){
    $tableName = $_POST['tableName'];
    $customFields = explode(',',  $_POST['customFields']);
    $customFields = array_map('trim', $customFields);
    $columns = $query->getColumns($config->getDatabase1(), $tableName);
    $sql = $query->getCustomFieldsSchema($columns, $customFields, $config->getDatabase2(), $tableName);
    $res = $query->insertCustomFieldsSchema($config->getDatabase2(), $sql);
    if($res) echo "Custom fields was migrated successfully";
    else echo "Migration error occured";
}