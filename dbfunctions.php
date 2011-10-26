<?php
include('config.php');

function cleanInput($input) {

  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );

    $output = preg_replace($search, '', $input);
    return $output;
  }

function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}


function connect() {
 $con = mysql_connect(DBHOST, DBUSER, DBPASS);
 if(!$con){
  trigger_error("Problem connecting to server");
 }  
 $db =  mysql_select_db(DBNAME, $con);
  if(!$db){
   trigger_error("Problem selecting database");
 }  
return $con;
}

function disconnect($con) {
 $discdb = mysql_close($con);
  if(!$discdb){
   trigger_error("Problem disconnecting database");
 }  
}

function execute_query($sql){
 $con = connect();
 $result = mysql_query($sql, $con);
 if(!$result){
  trigger_error("Problem executing query");
	var_dump($sql);
 }
 disconnect($con);
}

function execute_select_query($sql) {
 $con = connect();
 $result = mysql_query($sql, $con);
 if(!$result){
  trigger_error("Problem selecting data");
	var_dump($sql);
 }
 $result_array = array();
 while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
  $result_array[] = $row;
 }
 disconnect($con);
 return $result_array;  
}

function execute_select($table, array $columns = array(),$criterio = null) {
	if($columns[0] == '*') $query = 'SELECT * FROM '.$table;
	else $query = 'SELECT '.implode(', ',$columns).' FROM '.$table;
  if ($criterio) $query.= ' WHERE '.$criterio.';';
  else $query .= ';';
  return execute_select_query($query);
}

function execute_insert($table, array $data = array()) {
  $columnas = '`'.implode('`, `',array_keys($data)).'`';
  $valores = implode('", "',array_values(array_map("sanitize",$data)));
  $query = 'INSERT INTO `'.$table.'` ('.$columnas.') VALUES ("'.$valores.'")';
  execute_query($query);
  $i = 0;
  $query_resultado = '';
  $cantidad = count($data)-1;
  foreach ($data as $columna => $valor) {
    $query_resultado .= ' `'.$columna.'` = "'.$valor.'"';
    if ($i < $cantidad) $query_resultado .= ' AND';
    $i++;
  }
  $select = execute_select('`'.$table.'`',array('id'),$query_resultado);
  return $select[0]['id'];
}

function execute_update($table, array $data = array(),$criterio) {
  $query = 'UPDATE `'.$table.'` SET ';
  $total = count($data) - 1;
  $i = 0;
  foreach ($data as $columna => $valor) {
    $query .= '`'.$columna.'` = "'.$valor.'"';
    if ($i < $total) $query .= ', ';
    $i++;
  }
  $query.= ' WHERE '.$criterio.';';
  return execute_query($query);
}

function execute_delete($table, $criterio) {
  $query = 'DELETE FROM '.sanitize($table).' WHERE '.sanitize($criterio).';';
  execute_query($query);
}


?>
