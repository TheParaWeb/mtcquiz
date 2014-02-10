<div class="row">
    <div class="small-offset-1 large-offset-3 small-11 large-6 columns">
        <h2>Edit Category</h2>

        <form action="<?php echo URL; ?>admin/updateCategory/<?php echo $this->category;?>/" method="post">
            <label for="title">Category Title</label>
            <input type="text" name="title" value="<?php echo base64_decode($this->category); ?>"/>

            <input type="submit" name="submit" value="Save" class="button large expand green">
            <a class="button large expand red" href="<?php echo URL;?>admin/editJobs/" title="Go Back">Cancel</a>
            <?php
            if (isset($this->msg)) {
                if (is_array($this->msg)) {
                    foreach ($this->msg AS $key => $value) {
                        echo "<span class='$key'>" . $value . "</span>";
                    }
                } else {
                    echo "<span class='$key'>" . $this->msg . "</span>";
                }

            }
            ?>
        </form>
    </div>
</div>