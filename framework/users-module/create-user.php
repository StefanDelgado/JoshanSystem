<?php if (isset($_GET['errmsg'])) { echo "<p style='color: red'>" . htmlspecialchars($_GET['errmsg']) . "</p>"; } ?>
<h3>Provide the Required Information</h3>
<div id="form-block">
    <form method="POST" action="processes/process.user.php?action=new">
        <div id="form-block-half">
            <label for="fname">First Name</label>
            <input type="text" id="fname" class="input" name="firstname" placeholder="Your name.." required>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" class="input" name="lastname" placeholder="Your last name.." required>

            <label for="nname">Nickname</label>
            <input type="text" id="nname" class="input" name="nickname" placeholder="Your nickname" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="other">other</option>
            </select>

            <label for="access">Access Level</label>
            <select id="access" name="access">
              <option value="Client">Client</option>
              <option value="Staff">Staff</option>
              <option value="Manager">Manager</option>
            </select>
        </div>
        <div id="form-block-half">
            <label for="email">Email</label>
            <input type="email" id="email" class="input" name="email" placeholder="Your email.." required>

            <label for="address">Address</label>
            <input type="text" id="address" class="input" name="address" placeholder="Your address.." required>

            <label for="map">Map:</label>
            <button><a href="https://www.google.com/maps" target_blank></a>Maps</button> <br>

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password.." required>

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password.." required>
            
        </div>
        <div id="button-block">
        <input type="submit" value="Save">
        </div>
  </form>
</div>