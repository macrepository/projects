<?php

class query extends db{

    public function getColumns($database1, $table){
        $sql = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?";
        $res = $this->query($sql, array($database1, $table), "select", $database1);
        return $res;
    }

    public function getCustomFieldsSchema($columns, $customFields, $database2, $table){
        $row = '';
        foreach($columns as $key => $field){
            if(in_array($field['COLUMN_NAME'], $customFields)){
                $is_nullable = $field['IS_NULLABLE'] == 'YES' ? 'NULL' : 'NOT NULL';
                $row .= $field['COLUMN_NAME'] . ' ' . $field['COLUMN_TYPE'] . ' ' . $is_nullable . ',';
            }
        }
        $row = rtrim($row, ',');
        $sql = "ALTER TABLE $database2.$table ADD ($row)";
        return $sql;
    }

    public function insertCustomFieldsSchema($database2, $sql){
        $res = $this->query($sql, array(), 'insert', $database2);
        return $res;
    }
}