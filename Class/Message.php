<?php 

require_once 'database.php';

class Message {
        protected $connection ; 


        public function __construct(){
                $this->connection = new Database();
        }


        public function add($ip ,$user_agent , $message ){

                $user = [

                        'ip' => $ip
                ];

                // search user  
                $user_search   =  $this->connection->select('users', "ip='$ip'");
 
                if ( $user_search){
                        $user_id = $user_search[0]['id'];
                      
                }else{
                        $user_id  = $this->connection->insert('users',$user);
                }
                $messages = [
                        'user_id' => $user_id,
                        'message'  => $message,
                        'user_agent' => $user_agent
                ];

                $add_message  = $this->connection->insert('messages' , $messages);

                if ($add_message && $user_id ){
                        return " پیام شما افزوده شد  ";
                }
  

        }

        public function getMessage($ip){

                $result = $this->connection->getLastMessage($ip);
                if (count($result) > 0){
                        return $result[0]['message'];
                }else{
                        return null;
                }
        }
}


?>