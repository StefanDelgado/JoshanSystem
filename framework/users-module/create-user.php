<style>
    .input {
        border: none;
        width: 90%;
        outline: none;
        border-radius: 15px;
        padding: 1em;
        background-color: #ccc;
        box-shadow: inset 2px 5px 10px rgba(0,0,0,0.3);
        transition: 300ms ease-in-out;
    }

    .input:focus {
        background-color: white;
        transform: scale(1.05);
        box-shadow: 13px 13px 100px #969696, -13px -13px 100px #ffffff;
    }

    #form-block {
        width: 70%;
        margin: 0 auto;
    }

    #form-block-half {
        width: 100%;
        margin-bottom: 20px;
    }

    #button-block {
        text-align: center;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        border-radius: 4px;
    }

    button:hover {
        background-color: #45a049;
    }

    h3 {
        text-align: center;
    }

    label {
        margin-top: 10px;
        display: block;
    }
</style>
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
              <option value="Other">Other</option>
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
            <a href="https://www.google.com/maps" target="_blank"><button type="button">Maps</button></a>
            <br>

            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password.." required>

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password.." required>

            <label for="username">Username</label>
            <input type="text" autocomplete="off" name="username" class="input" placeholder="Username">
        </div>
        <div id="button-block">
            <input type="submit" value="Save">
        </div>
    </form>
</div>
