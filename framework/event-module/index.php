<div id="third-submenu">
    <a href="index.php?page=event&subpage=event">List of Events</a> | <a href="index.php?page=event&subpage=event&action=create">Set an Event</a> | <a href="index.php?page=event&subpage=event&action=modify">Modify an Event</a> | Search <input type="text"/> 
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'event-module/create-event.php';
                break; 
                case 'modify':
                    require_once 'event-module/modify-event.php';
                break; 
                case 'view':
                    require_once 'event-module/view-event.php';
                break;
                case 'result':
                    require_once 'event-module/search-event.php';
                break;
                default:
                    require_once 'event-module/main.php';
                break; 
            }
    ?>
  </div>