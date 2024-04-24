<div id="second-submenu">
    <?php if ($user_access == 'Manager'){?>
    <a href="index.php?page=settings&subpage=users">Users</a> |
    <?php } else {?>
        <a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id;?>">Profile</a> | 
    <?php }?>
    <a href="index.php?page=settings&subpage=systems">System Settings</a>
</div>

<div id="content">
    <?php
      switch($subpage){
                case 'users':
                    require_once 'users-module/index.php';
                break; 
                case 'module_two':
                    require_once 'module-folder/';
                break; 
                case 'module_xxx':
                    require_once 'module-folder/';
                break; 
                default:
                    require_once 'color.php';
                break; 
            }
    ?>
  </div>
  