<div class="row">
    <div class="small-offset-1 large-offset-3 small-11 large-6 columns">
        <h2>Log In</h2>

        <form action="login/login" method="post">

            <label for="email">Email</label>
            <input type="email" name="email">

            <input type="submit" name="submit" value="Login" class="button large expand green">
        </form>

        <?php
        if (isset($this->msg)) {
            if (is_array($this->msg)) {
                foreach ($this->msg AS $key => $value) {
                    echo "<span class='$key'>" . $value . "</span><br/>";
                }
            } else {
                echo "<span class='$key'>" . $this->msg . "</span>";
            }
        }
        ?>

        <a href="<?php echo URL; ?>login/signup" class="admin-login">First time here? Sign Up!</a>
    </div>
</div>