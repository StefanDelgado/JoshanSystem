<div id="third-submenu">
    <a href="index.php?page=event&subpage=event">List of Events</a> | <a href="index.php?page=appointment&subpage=appointment&action=create">Set an Event</a> | <a href="index.php?page=appointment&subpage=appointment&action=modify">Modify an Event</a> | Search <input type="text"/> 
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'appointment-module/create-appointment.php';
                break; 
                case 'modify':
                    require_once 'appointment-module/modify-appointment.php';
                break; 
                case 'view':
                    require_once 'appointment-module/view-appointment.php';
                break;
                case 'result':
                    require_once 'appointment-module/search-appointment.php';
                break;
                default:
                    require_once 'event-module/main.php';
                break; 
            }
    ?>
  </div>