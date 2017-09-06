<?php

class DatabaseQuery
{
    protected static $table_name;

    public static function find_all() {
        $sql = "SELECT * FROM "
            . PX . static::$table_name . " LIMIT 1000";

        $result = static::find_by_query($sql);

        return !empty($result) ? $result : false;
    }

    public static function count_all() {
        global $database;
        $sql = "SELECT COUNT(*) FROM "
            . PX . static::$table_name;

        $result = $database->query($sql);
        $row = $database->fetch_array($result);
        return array_shift($row);
    }

    public static function find_by_ID($ID = 0) {
        global $database;

        $sql = "SELECT * FROM "
            . PX . static::$table_name
            . " WHERE ID=" . $database->escape_value($ID) . " LIMIT 1";

        $result = static::find_by_query($sql);

        return !empty($result) ? array_shift($result) : false;
    }

    public static function find_by_query($query = '') {
        global $database;

        $result = $database->query($query);

        $object = [];
        while ($row = $database->fetch_array($result)) {
            $object[] = static::get_class_data($row);
        }

        return $object;
    }

    private static function get_class_data($row) {
        $class_name = get_called_class();
        $object = new $class_name;

        foreach ($row as $row_name => $value) {
            if($object->has_row_name($row_name)) {
                $object->$row_name = $value;
            }
        }

        return $object;
    }

    private function has_row_name($row_name) {
        $row_names_from_class = $this->table_row_names();
        return array_key_exists($row_name, $row_names_from_class);
    }

    protected function table_row_names() {
        $table_row_names = [];
        foreach (static::$db_fields as $field) {
            if(property_exists($this, $field)) {
                $table_row_names[$field] = $this->$field;
            }
        }

        return $table_row_names;
    }

    protected function check_table_rows() {
        global $database;

        $clean_table_rows = [];

        foreach ($this->table_row_names() as $key => $value) {
            $clean_table_rows[$key] = $database->escape_value($value);
        }

        return $clean_table_rows;
    }

    public function save() {
        //check has Object ID
        return isset($this->ID) ? $this->update() : $this->create();
    }

    protected function create() {
        global $database;

        $fields = $this->check_table_rows();

        $array_keys = array_keys($fields);
        $array_values = array_values($fields);

        //remove ID field from list!
        if(strtolower($array_keys[0]) == 'id' ) {
            unset($array_keys[0]);
            unset($array_values[0]);
        }

        $sql = "INSERT INTO " . PX . static::$table_name . " ("
            . join(", ", $array_keys)
            . ") values ('"
            . join("', '", $array_values)
            . "')";

        if($database->query($sql)) {
            return true;
        }

        return FALSE;
    }

    protected function update() {
        global $database;
        $fields = $this->check_table_rows();

        $fields_pairs = [];
        foreach ($fields as $key => $value) {
            $fields_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . PX . static::$table_name . " SET "
            . join(", ", $fields_pairs)
            . "WHERE ID=" . $database->escape_value($this->ID);

        $database->query($sql);

        return $database->check_last_query() == 1 ? true : false;

    }

    public function delete() {
        global $database;

        $sql = "DELETE FROM " . PX . static::$table_name . " WHERE ID=" . $database->escape_value($this->ID);

        $database->query($sql);

        return $database->check_last_query() == 1 ? true : false;

    }


}