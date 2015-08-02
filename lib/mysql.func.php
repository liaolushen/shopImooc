<?php

/**
 * connect database
 */
function connect() {
    $link = mysql_connect(DB_HOST, DB_USER, DB_PWD) or die("database connect error:" . mysql_errno() . ":" . mysql_error());
    mysql_set_charset(DB_CHARSET);
    mysql_select_db(DB_DBNAME) or die("database open failed");
    return $link;
}

/**
 * Func : finish insert operation
 *@param string $table
 *@param array $array
 *@return number
 * Syntax : INSERT INTO table_name (column1,column2,column3,...) VALUES (value1,value2,value3,...);
 */
function insert($table, $array) {
    $keys = join(",", array_keys($array));
    $vals = "'" . join("','", array_values($array)) . "'";
    $sql = "insert into {$table} ({$key}) values ({$vals})";
    mysql_query($sql);
    return mysql_insert_id();
}

/**
 * Func : finish update operation
 *@param string $table
 *@param array $array
 *@param string $where
 *@return number
 * Syntax : UPDATE table_name SET column1=value1,column2=value2,... WHERE some_column=some_value;
 */
function update($table, $array, $where = null) {
    foreach ($array as $key => $val) {
        if ($str == null) {
            $sep = "";
        } else {
            $sep = ",";
        }
        $str .= $sep . $key . "='" . $val . "'";
    }
    $sql = "update {$table} set {$str} " . ($where == null ? null : "where " . $where);
    mysql_query($sql);
    return mysql_affected_rows();
}

/**
 * Func : finish delete operation
 *@param string $table
 *@param string $where
 *@return number
 * Syntax : DELETE FROM table_name WHERE some_column=some_value;
 */
function delete($table, $where = null) {
    $where = ($where == null ? null : "where " . $where);
    $sql = "delete from ($table) {$where}";
    mysql_query($sql);
    return mysql_affected_rows();
}

/**
 * Func : get specific one item
 *@param string $sql
 *@param string $result_type
 *@return multitype
 */
function fetchOne($sql, $result_type=MYSQL_ASSOC) {
    $result = mysql_query($sql);
    $row = mysql_fetch_array($result, $result_type);
    return $row;
}

/**
 * Func : get all item in the result
 *@param string $sql
 *@param string $result_type
 *@return multitype
 */
function fetchAll($sql, $result_type=MYSQL_ASSOC) {
    $result = mysql_query($sql);
    while (@$row=mysql_fetch_array($result, $result_type)) {
        $rows[] = $row;
    }
    return rows;
}

/**
 * Func : get the number of rows to be affected
 */
function getResultNum($sql) {
    $result = mysql_query($sql);
    return mysql_num_rows($result)
}