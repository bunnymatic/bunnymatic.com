<?
   class NavBar {
      var $_ht;
      var $_wd;
      var $_name;
      var $_displayname;
      var $_files = array();

      # spec display name, name, height, width
      # displayname is what the users will see
      # name is used in the 'name' section of the img tag
      # 
      # if off/on/in/opt are all left blank, then 
      # the filenames will be build using
      #   $dir + "/" + $name + "_" + status2color("off/on/in/opt");
      # 
      # if $off/$on/$in/$opt are specified, $ext will be ignored
      # and the filenames will be build as
      #   $dir+"/"+$(off/in/opt/on)

      function NavBar( $name, $ht, $wd,
                      $dir="", $off="", $on="", $in="", $opt="",
                      $ext=".gif") {
         $this->_ht = $ht;
         $this->_wd = $wd;
         $this->_name = $name;
         $this->_displayname = $name;

         if (($off=="") && ($on=="") && ($in=="") && ($opt=="") ) {
            foreach ( array("off","on","in","opt") as $stat ) {
               $this->_files[$stat] = $dir . "/" . $this->_name ."_". status2color($stat) . $ext;
            }
         } else {
            $this->_files["off"] = $dir . "/" . $off;
            $this->_files["on"] = $dir . "/" . $on;
            $this->_files["in"] = $dir . "/" . $in;
            $this->_files["opt"] = $dir . "/" . $opt;
         }
      }

      function img($status="off",$extra_args="") {
         $str = "<img alt=\"".$this->_displayname."\" "
               ."height=\"".$this->_ht."\" width=\"".$this->_wd."\" "
               ."name=\"". $this->_name ."\" src=\"".$this->_files[$status]."\" "
               . $extra_args .">";
         return $str;
      }

      function displayname() {
         return ($this->_displayname);
      }
      function name() { 
         return ($this->_name);
      }

      function fname($status="off") {
         return ($this->_files[$status]);
      }
   }
?>
