<?php $categories = $this->jobCategories; ?>
<?php $jobs = $this->jobs; ?>

<h2 class="text-center orange-text" xmlns="http://www.w3.org/1999/html">Edit or Create Jobs</h2>
<div class="small-offset-1 large-offset-0 small-11 large-3 columns">

    <h4>Edit Categories</h4>

    <table class="expand">
        <tbody>
        <?php foreach ($categories AS $category) { ?>
            <?php $url = base64_encode($category['category']); ?>
            <tr>
                <td><?php echo $category['category']; ?></td>
                <td><a class="blue-text" href="<?php echo URL; ?>admin/editCategory/<?php echo $url; ?>" title="Edit">Edit</a>
                </td>

                <?php if ($this->role == 'owner'): ?>
                    <td><a class="red-text delete"
                           href="<?php echo URL; ?>admin/deleteCategory/<?php echo $url; ?>" title="Edit">Delete</a>
                    </td>
                <?php else: ?>
                    <td><a class="red-text unauthorized"
                           href="<?php echo URL; ?>admin/deleteCategory/<?php echo $url; ?>" title="Edit">Delete</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php }?>
        </tbody>
    </table>

    <div class="small-12 large-12">
        <a id="create" href="#" title="Create New Category">+Add New Category</a>
        <fieldset class="new-category">
            <legend>Create New Category</legend>

            <form action="<?php echo URL; ?>admin/createCategory/" method="post">

                <label for="category">Category Title</label>
                <input type="text" name="category" required>

                <span class="form-info red-text">*When creating a new category, a new job must be created for that category.</span>

                <label for="jobTitle">Job Title</label>
                <input type="text" name="jobTitle" required/>

                <label for="salary">Monthly Salary</label>
                <input type="text" name="salary" placeholder="50000" required/>

                <label for="description">Description</label>
                <textarea name="description" required></textarea>

                <input class="button large expand green" type="submit" value="Create Category"/>

            </form>

        </fieldset>
    </div>
    <!-- END add new category -->

</div><!-- END left column -->


<div class="small-offset-1 large-offset-1 small-11 large-6 columns">
    <div class="small-12 large-12">
        <aside class="warning">
            <span class="warning">Warning!</span>
            Making changes to the jobs database can cause the statistical data to be inaccurate. It is recommended that
            you only
            make change to this database between school years, or during a time of slow traffic on the app!
        </aside>
    </div>
    <div class="small-12 large-6 columns">
        <fieldset class="edit-jobs">
            <legend>Edit Jobs</legend>
            <form action="<?php echo URL; ?>admin/updateJob/" method="post">
                <label for="selectJob">Select Job</label>

                <select id="edit-job-select" name="selectJob">
                    <option value="null">Select One...</option>
                    <?php foreach ($categories AS $category){ ?>
                    <optgroup label="<?php echo $category['category']; ?>">
                        <?php foreach ($jobs AS $job) { ?>
                            <?php if ($job['category'] == $category['category']): ?>
                                <option value="<?php echo $job['id'];?>"><?php echo $job['jobTitle']; ?></option>
                            <?php endif; ?>
                        <?php } ?>
                        <?php } ?>
                </select>

                <label for="category">Select Category</label>
                <select name="category">
                    <option value="null">Select One...</option>
                    <?php foreach ($categories AS $category) { ?>
                        <option
                            value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?></option>
                    <?php } ?>
                </select>

                <label for="job">Job Title</label>
                <input id="edit-jobTitle" type="text" name="job" required/>

                <label for="salary">Monthly Salary</label>
                <input id="edit-salary" type="text" name="salary" placeholder="50000" required/>

                <label for="description">Description</label>
                <textarea id="edit-description" name="description"></textarea>

                <input class="button large expand green" type="submit" value="Update Job"/>

                <a class="button large expand red" href="#">Delete Job</a>

            </form>
        </fieldset>
    </div>
    <!-- END edit jobs -->

    <div class="small-12 large-6 columns">
        <fieldset class="edit-jobs">
            <legend>Create Jobs</legend>
            <form action="<?php echo URL; ?>admin/createJob/" method="post">

                <label for="category">Select Category</label>
                <select name="category">
                    <option value="null">Select One...</option>
                    <?php foreach ($categories AS $category) { ?>
                        <option
                            value="<?php echo $category['category']; ?>"><?php echo $category['category']; ?></option>
                    <?php } ?>
                </select>

                <label for="job">Job Title</label>
                <input type="text" name="job" required/>

                <label for="salary">Monthly Salary</label>
                <input type="text" name="salary" placeholder="50000" required/>

                <label for="description">Description</label>
                <textarea name="description"></textarea>

                <input class="button large expand blue" type="submit" value="Create Job"/>
            </form>
        </fieldset>
    </div>
    <!-- END create jobs -->

</div>

