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
    select {
  /* Reset */
  appearance: none;
  border: 0;
  outline: 0;
  font: inherit;
  /* Personalize */
  width: 20rem;
  padding: 1rem 4rem 1rem 1rem;
  background: var(--arrow-icon) no-repeat right 0.8em center / 1.4em,
    linear-gradient(to left, var(--arrow-bg) 3em, var(--select-bg) 3em);
  color: black;
  border-radius: 0.25em;
  box-shadow: 0 0 1em 0 rgba(0, 0, 0, 0.2);
  cursor: pointer;
  /* Remove IE arrow */
  &::-ms-expand {
    display: none;
  }
  /* Remove focus outline */
  &:focus {
    outline: none;
  }
  /* <option> colors */
  option {
    color: inherit;
    background-color: var(--option-bg);
  }
}
:root {
  --arrow-bg: rgba(128,128,128, 0.3);
  --arrow-icon: url(https://upload.wikimedia.org/wikipedia/commons/9/9d/Caret_down_font_awesome_whitevariation.svg);
  --option-bg: black;
  --select-bg: rgba(255, 255, 255, 0.2);
}
.button {
  position: relative;
  width: 170px;
  height: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  border: 1px solid #34974d;
  background-color: #3aa856;
}

.button, .button__icon, .button__text {
  transition: all 0.3s;
}

.button .button__text {
  transform: translateX(30px);
  color: #fff;
  font-weight: 600;
}

.button .button__icon {
  position: absolute;
  transform: translateX(109px);
  height: 100%;
  width: 39px;
  background-color: #34974d;
  display: flex;
  align-items: center;
  justify-content: center;
}

.button .svg {
  width: 30px;
  stroke: #fff;
}

.button:hover {
  background: #34974d;
}

.button:hover .button__text {
  color: transparent;
}

.button:hover .button__icon {
  width: 148px;
  transform: translateX(0);
}

.button:active .button__icon {
  background-color: #2e8644;
}

.button:active {
  border: 1px solid #2e8644;
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
            <!--<label for="map">Map:</label>
            <a href="https://www.google.com/maps" target="_blank"><button type="button">Maps</button></a>
            <br> -->
            <label for="password">Password</label>
            <input type="password" id="password" class="input" name="password" placeholder="Enter password.." required>

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" class="input" name="confirmpassword" placeholder="Confirm password.." required>

            <!-- <label for="username">Username</label>
            <input type="text" autocomplete="off" name="username" class="input" placeholder="Username"> -->
        </div>
        
<button type="button" class="button">
  <span class="button__text">Add Item</span>
  <span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
</button>
    </form>
</div>
