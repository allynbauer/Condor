<?php
// We extend the UserData class to seperate local changes
// from the global validator
class App_UserData extends UserData {
    /* define your custom validators here */
    
    /*
    function deliverPackage() {
      $data = new OpenStruct();
      $data->winsauce = $this->getWinSauce();
      return $data;
      // etcs
    }
    */
}
?>