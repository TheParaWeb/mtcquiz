<div class="row">
    <h2 class="orange-text text-center">Edit Students</h2>
    <div class="small-11 large-6 small-offset-1 large-offset-0 columns">
        <fieldset>
            <legend>Edit Students</legend>
            <form action="<?php echo URL;?>admin/updateStudent/" method="post">
                <label for="selectStudent">Select Student</label>
                <select name="selectStudent">
                    <option value="null">Select One...</option>
                </select>

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
                </select>

                <input class="button large green expand" type="submit" value="Update" name="update"/>
                <a href="#" class="button large red expand">Delete</a>
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
                </select>

                <input class="button large green expand" type="submit" value="Update" name="update"/>
            </form>
        </fieldset>
    </div>
</div>