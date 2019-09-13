<?

class DB {
    private $db;

    public function __construct( $host, $pass, $user, $name ) {
        try {
            $this->db = new PDO('mysql:host='.$host.';dbname='.$name.';', $user, $pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->query('SET NAMES utf8');
            return true;
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function select_user( $table, $field, $where ){
        $sth = $this->db->prepare("SELECT * FROM {$table} WHERE {$field} = ?");   
        $sth->bindParam(1, $where);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    
    public function select_logs( $table, $field_1, $where_1, $field_2, $where_2 ){
        $sth = $this->db->prepare("SELECT * FROM {$table} WHERE {$field_1} = ? AND {$field_2} >= ? ORDER BY id DESC");   
        $sth->bindParam(1, $where_1);
        $sth->bindParam(2, $where_2);
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function update_user( $table, $field_0, $where_0, $field_1, $where_1, $field_2, $where_2, $field_3, $where_3, $field_4, $where_4, $field_5, $where_5, $field_6, $where_6, $field_7, $where_7 ){
        $sth = $this->db->prepare("UPDATE {$table} SET {$field_1} = ?, {$field_2} = ?, {$field_3} = ?, {$field_4} = ?, {$field_5} = ?, {$field_6} = ?, {$field_7} = ?  WHERE {$field_0} = ?");   
        $sth->bindParam(1, $where_1);
        $sth->bindParam(2, $where_2);
        $sth->bindParam(3, $where_3);
        $sth->bindParam(4, $where_4);
        $sth->bindParam(5, $where_5);
        $sth->bindParam(6, $where_6);
        $sth->bindParam(7, $where_7);
        $sth->bindParam(8, $where_0);
        $sth->execute();        
    }

    public function select_ban( $table, $field, $where ){
        $sth = $this->db->prepare("SELECT * FROM {$table} WHERE {$field} = ?");   
        $sth->bindParam(1, $where);
        $sth->execute();
        return $sth->fetch(PDO::FETCH_ASSOC);
    }
    
    public function insert_ban( $table, $field_1, $field_2, $where_2, $field_3, $where_3, $field_4, $where_4, $field_5 ){
        $date = $where_4[2]."-".$where_4[1]."-".$where_4[0];
        $sth = $this->db->prepare("INSERT INTO {$table} ({$field_1}, {$field_2}, {$field_3}, {$field_4}, {$field_5}) VALUES ('', ?, ?, ?, ?)");   
        $sth->bindParam(1, $where_2);
        $sth->bindParam(2, $where_3);
        $sth->bindParam(3, $date);
        $sth->bindParam(4, $where_4[3]);
        $sth->execute();
    }

    public function delete_ban( $table, $field, $where ){
        $sth = $this->db->prepare("DELETE FROM {$table} WHERE {$field} = ?");   
        $sth->bindParam(1, $where);
        $sth->execute();
    }
    
    public function update_warn( $table, $field_0, $where_0, $field_1, $where_1 ){
        if($where_1 == 1){
            $sth = $this->db->prepare("UPDATE {$table} SET {$field_1} = {$field_1}+?  WHERE {$field_0} = ?");  
        }
        else{
            $sth = $this->db->prepare("UPDATE {$table} SET {$field_1} = ?  WHERE {$field_0} = ?");
        }
        $sth->bindParam(1, $where_1);
        $sth->bindParam(2, $where_0);
        $sth->execute();        
    }
}

?>