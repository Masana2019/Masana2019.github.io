<?

session_start();

//INCLUDED DATABASE
require_once("Database.php");

//SYSTEM CLASS
class AP extends DB{
    public $config;
    
    public function __construct($config) {
        parent::__construct($config['DATABASE']['HOST'], $config['DATABASE']['PASS'], $config['DATABASE']['USER'], $config['DATABASE']['NAME']);
        $this->config = $config;
    }
    
    public function logined($name, $pass){
        $user = parent::select_user($this->config['DATABASE']['TABLE_USERS'], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_NAME'], $name);
        if((!empty($user)) && ($user[$this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_PASS']] == $pass) && ($user[$this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN']] > 0)){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function search_user($name){
        $user = parent::select_user($this->config['DATABASE']['TABLE_USERS'], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_NAME'], $name);
        if(!empty($user)){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function select_profile($name){
        return parent::select_user($this->config['DATABASE']['TABLE_USERS'], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_NAME'], $name);
    }
    
    public function select_money_logs($name){
        return parent::select_logs($this->config['DATABASE']['TABLE_LOGS'], $this->config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_NAME'], $name, $this->config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_MONEY'], "1");
    }
    
    public function set_moder($name, $moder){
        $moder = explode(",", $moder);
        parent::update_user($this->config['DATABASE']['TABLE_USERS'], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_NAME'], $name, $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN'], $moder[0], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_1'], $moder[1], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_2'], $moder[2], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_3'], $moder[3], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_4'], $moder[4], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_5'], $moder[5], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_ADMIN_DOSTUP_6'], $moder[6] );
    }
    
    public function select_ban($name){
        return parent::select_ban($this->config['DATABASE']['TABLE_BANS'], $this->config['DATABASE']['TABLE_BANS_FIELDS']['FIELD_USER_NAME'], $name);
    }
    
    public function ban_user($name, $ban, $admin){
        $ban = explode(",", $ban);
        parent::insert_ban($this->config['DATABASE']['TABLE_BANS'], $this->config['DATABASE']['TABLE_BANS_FIELDS']['FIELD_ID'], $this->config['DATABASE']['TABLE_BANS_FIELDS']['FIELD_USER_NAME'], $name, $this->config['DATABASE']['TABLE_BANS_FIELDS']['FIELD_ADMIN_NAME'], $admin, $this->config['DATABASE']['TABLE_BANS_FIELDS']['FIELD_DATE'], $ban, $this->config['DATABASE']['TABLE_BANS_FIELDS']['FIELD_REASON'] );
    }
    
    public function unban_user($name){
        parent::delete_ban($this->config['DATABASE']['TABLE_BANS'], $this->config['DATABASE']['TABLE_BANS_FIELDS']['FIELD_USER_NAME'], $name );
    }
    
    public function warn_user($name){
        parent::update_warn($this->config['DATABASE']['TABLE_USERS'], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_NAME'], $name, $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_WARN'], "1");
    }
    
    public function unwarn_user($name){
        parent::update_warn($this->config['DATABASE']['TABLE_USERS'], $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_NAME'], $name, $this->config['DATABASE']['TABLE_USERS_FIELDS']['FIELD_WARN'], "0");
    }
    
    public function watch_logs($name, $date){
        $date = explode(",", $date);
        $date = $date[2]."-".$date[1]."-".$date[0]." 00:00:00";
        return parent::select_logs($this->config['DATABASE']['TABLE_LOGS'], $this->config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_NAME'], $name, $this->config['DATABASE']['TABLE_LOGS_FIELDS']['FIELD_DATE'], $date);
    }
}

$ap = new AP($config);

?>