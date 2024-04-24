<div id="subcontent">
    <table class="data-table">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Address</th>
            <th>Access Level</th>
            <th>Action</th>
        </tr>
        <?php
        $count = 1;
        if ($user->list_users() != false) {
            foreach ($user->list_users() as $value) {
                extract($value);
        ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $user_lastname . ', ' . $user_firstname; ?></td>
                    <td><?php echo $user_gender; ?></td>
                    <td><?php echo $user_email; ?></td>
                    <td><?php echo $user_address; ?></td>
                    <td><?php echo $user_access; ?></td>

                    <td>
                        <button class="edit-button btn open-button" onclick="openFormUser('<?php echo $user_id; ?>', '<?php echo $user_lastname; ?>', '<?php echo $user_firstname; ?>', '<?php echo $user_access; ?>', '<?php echo $user_email; ?>')">Edit</button> | 
                        <a href="processes/process.user.php?action=delete&user_id=<?php echo $user_id; ?>" id="delete-button-<?php echo $user_id; ?>" class="delete-button-user btn red-button">Delete</a>
                    </td>
                </tr>
        <?php
                $count++;
            }
        } else {
            echo "No Record Found.";
        }
        ?>
    </table>
</div>


<!-- The form -->
<div class="form-popup" id="popup-user">
    <form method="POST" id="myForm-user" action="processes/process.user.php?action=update" class="form-container">
        <h1>Editing user</h1>
        <input type="hidden" id="user_id" name="user_id">
        <div id="form-block-half">
            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lname" value="" placeholder="Your last name..">

            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="fname" value="" placeholder="Your first name..">

            <select name="gender" id="gender" class="input">
                <option selected disabled>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label for="email">Email</label>
            <input type="text" id="email" class="input" name="email" required>

            <label for="address">Address</label>
            <input type="text" id="address" class="input" name="address" required>

            <label for="Access">Access</label>
            <input type="text" id="Access" class="input" name="Access" placeholder="Access...">

        </div>
        <div id="button-block">
            <button type="button" class="btn" id="submit-button" onclick="confirmChangesUsers()">Save</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </div>
    </form>
</div>
