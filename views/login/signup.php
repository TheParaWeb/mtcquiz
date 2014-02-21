<div class="row">
    <div class="small-offset-1 large-offset-3 small-11 large-6 columns">
        <h2>Create My Profile</h2>

        <form action="createUser" method="post">
            <label for="name">Name</label>
            <input type="text" name="name">

            <label for="email">Email</label>
            <input type="email" name="email">

            <label for="gender">Gender</label>

            <div class="form-dropdown">
                <select name="gender">
                    <option value="null">Select One...</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>
            </div>

            <label for="age">Age</label>
            <input type="text" name="age">


            <label for="school">School</label>

            <div class="form-dropdown">
                <select name="school">
                    <option value="null">Select One...</option>
                    <?php
                    foreach ($this->schoolCategories AS $category) {
                        echo "<optgroup label='" . $category['district'] . "'>";
                        foreach ($this->schools AS $school) {
                            if ($school['district'] == $category['district']) {
                                echo "<option value='" . $school['name'] . "'>" . $school['name'] . "</option>";
                            }
                        }
                        echo "</optgroup>";
                    }
                    ?>
                    <optgroup label='Other'>
                        <option value="Homeschool">I'm homeschooled...</option>
                        <option value="Other">My school is not listed here...</option>
                    </optgroup>
                </select>
            </div>
            <input type="submit" name="submit" value="Save" class="button large expand green">
            <?php
                if(isset($this->msg)){
                    foreach($this->msg AS $class => $message){
                        echo "<span class='".$class."'>".$message."</span>";
                    }
                }
            ?>
        </form>

    </div>
</div>