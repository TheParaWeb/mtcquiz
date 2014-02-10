<div class="row">
    <h2 class="orange-text text-center">Edit Students</h2>
    <div class="small-11 large-6 small-offset-1 large-offset-0 columns">
        <fieldset>
            <legend>Edit Students</legend>
            <form action="<?php echo URL;?>admin/updateStudent/" method="post">
                <label for="selectStudent">Select Student</label>
                <select id="edit-student-select" name="selectStudent">
                    <option value="null">Select One...</option>
                    <?php foreach($this->students AS $student){?>

                    <option value="<?php echo $student['id'];?>">
                        <?php echo $student['name'];?>
                    </option>

                    <?php }?>
                </select>

                <label for="name">Name</label>
                <input id="name" type="text" name="name"/>

                <label for="email">Email</label>
                <input id="email" type="text" name="email"/>

                <div class="small-6 large-6 columns">
                    <label for="age">Age</label>
                    <input id="age" type="text" name="age"/>
                </div>

                <div class="small-6 large-6 columns">
                    <label for="sex">Sex</label>
                    <input id="sex" type="text" name="sex"/>
                </div>

                <!--
                <label for="school">School</label>
                <select name="school">
                    <option value="null">Select One...</option>
                    <?php
                    foreach ($this->activeDistricts AS $category) {
                        echo "<optgroup label='" . $category['district'] . "'>";
                        foreach ($this->schools AS $school) {
                            if ($school['district'] == $category['district']) {
                                echo "<option value='" . $school['name'] . "'>" . $school['name'] . "</option>";
                            }
                        }
                        echo "</optgroup>";
                    }
                    ?>
                </select>-->

                <input class="button large green expand" type="submit" value="Update" name="update"/>
                <a id="deleteStudentButton" href="<?php echo URL;?>admin/deleteStudent/" class="button large red expand">Delete</a>
            </form>
        </fieldset>
    </div>
    <div class="small-11 large-6 small-offset-1 large-offset-0 columns">
        <fieldset>
            <legend>Create Student</legend>
            <form action="<?php echo URL;?>admin/createStudent/" method="post">

                <label for="name">Name</label>
                <input type="text" name="name"/>

                <label for="email">Email</label>
                <input type="text" name="email"/>

                <div class="small-6 large-6 columns">
                    <label for="age">Age</label>
                    <input type="text" name="age"/>
                </div>

                <div class="small-6 large-6 columns">
                    <label for="sex">Sex</label>
                    <input type="text" name="sex"/>
                </div>

                <label for="school">School</label>
                <select name="school">
                    <option value="null">Select One...</option>
                    <?php
                    foreach ($this->activeDistricts AS $category) {
                        echo "<optgroup label='" . $category['district'] . "'>";
                        foreach ($this->schools AS $school) {
                            if ($school['district'] == $category['district']) {
                                echo "<option value='" . $school['name'] . "'>" . $school['name'] . "</option>";
                            }
                        }
                        echo "</optgroup>";
                    }
                    ?>
                </select>

                <input class="button large green expand" type="submit" value="Update" name="update"/>
            </form>
        </fieldset>
    </div>
</div>