<div class="container">
<div id="third-submenu">
    <a href="index.php?page=appointment&subpage=appointment">Home</a> | <a href="index.php?page=appointment&subpage=appointment&action=view">Records</a> | <a href="index.php?page=appointment&subpage=appointment&action=create">Create</a> | <a href="index.php?page=appointment&subpage=appointment&action=modify">Edit</a>
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
                    require_once 'appointment-module/main.php';
                break; 
            }
    ?>
  </div>
        </div>