<style>
  .input {
  border: none;
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
  box-shadow: 13px 13px 100px #969696,
             -13px -13px 100px #ffffff;
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
input[type="date"]{
    background-color: grey;
    padding: 1em;
    font-family: "Roboto Mono", monospace;
    color: #ffffff;
    font-size: 18px;
    border: none;
    outline: none;
    border-radius: 5px;
    width: calc(26% - 1em); /* Adjust the width */
    margin-bottom: 1em; /* Add margin to bottom */
}

::-webkit-calendar-picker-indicator{
    background-color: #ffffff;
    padding: 5px;
    cursor: pointer;
    border-radius: 3px;
}

</style>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
<section class="appointment-form">
    <h3>Provide the Required Information</h3>
    <div class="form-block">
        <form method="POST" action="processes/process.appointment.php?action=new">
            <div class="form-block-half">
                <label for="lname">Last Name</label>
                <input type="text" id="lname" class="input" name="lname" placeholder="Your last name..">

                <label for="fname">First Name</label>
                <input type="text" id="fname" class="input" name="fname" placeholder="Your first name..">

                <label for="purpose">Purpose</label>
                <input type="text" id="purpose" class="input" name="purpose" placeholder="State your purpose..">
            </div>
            <br>

            <div class="form-block-half">
                <label for="date">Date</label>
                <br>
                <input type="date" id="date" name="date" min="<?php echo date('Y-m-d'); ?>" required>
                <br>

                <label for="time">Time</label>
                <br>
                <select id="time" name="time">
                    <option value="8:00">8:00 am</option>
                    <option value="10:00">10:00 am</option>
                    <option value="13:00">1:00 pm</option>
                    <option value="15:00">3:00 pm</option>
                </select>
            </div>

            <div id="button-block">
                <input type="submit" value="Save">
            </div>
        </form>
    </div>
</section>
