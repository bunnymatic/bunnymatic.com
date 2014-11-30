<?
if (!defined("CLASS_GEARDB_PHP")) {
   define ("CLASS_GEARDB_PHP",1);

   require_once "db/class.Mydb.php";
   class geardb extends Mydb {
      var $_hostname   = 'localhost';                
      var $_username   = 'pill_productions';                
      var $_userpswd   = 'pill';                     
      var $_socketpath = '/var/lib/mysql/mysql.sock';
      var $_dbname     = 'eat!this';                      
     
   }
}
?>
