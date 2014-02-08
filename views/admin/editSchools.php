

<h2 class="text-center blue-text" xmlns="http://www.w3.org/1999/html">Configure Schools</h2>
<div class="small-offset-1 large-offset-0 small-11 large-3 columns">

    <h4>Edit Active School Districts</h4>
    <div id="activateDistrict" class="small-12 large-12">
        <table class="small-12 large-12 scrollable">
            <caption class="note orange-text">*this table is scrollable.</caption>
            <tbody>
                <?php foreach ($this->activeDistricts AS $district) { ?>
                    <?php $url = base64_encode($district['district']); ?>
                    <tr>
                        <td style="width:80%;"><?php echo $district['district']; ?></td>
                        <td><a class="red-text deactivate" href="<?php echo URL; ?>admin/deactivateDistrict/<?php echo $url; ?>" title="Deactivate">Deactivate</a>
                      </td>
                    </tr>
                <? } ?>
            </tbody>
        </table>
        <a href="#" class="activateDistrict">+Activate District</a>
    </div>
    <!-- END school districts -->

    <div id="deactivateDistricts" class="small-12 large-12">
        <fieldset>
            <legend>Activate District</legend>
            <form name="activateDistrict" action="<?php echo URL;?>admin/activateDistrict/" method="post">
                <label for="selectDistrict">Select District</label>
                <select name="selectDistrict">
                    <option value="null">Select One...</option>
                </select>

                <input class="button large green expand" type="submit" value="Activate"/>

                <span class="orange-text">
                    *Activating a district also activates all schools in that district.
                    To only activate specific schools, select the school on the right and select the "Activate" checkbox.</span>

            </form>
        </fieldset>
        <a class="deactivateDistricts" href="#">+Deactivate District</a>
    </div>

</div><!-- END left column -->


<div class="small-offset-1 large-offset-1 small-11 large-6 columns">

    <fieldset id="editJobs">
        <legend>Edit Current Schools</legend>
        <form name="editSchool" action="<?php echo URL;?>admin/updateSchool/" method="post"/>
        <div class="row">
            <div class="small-8 large-8 columns">
                <legend for="school">Select School</legend>
                <select name="school">
                    <option value="null">Select One...</option>
                </select>
            </div>

            <div class="small-4 large-4 columns" style="margin-top:25px;">
                <label style="float:left; margin-right:10px;" for="active">Active?</label>
                <input style="float:left;" type="checkbox" value="1"/>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                <label for="schoolName">School Name</label>
                <input type="text" name="schoolName"/>
            </div>
            <div class="small-12 large-6 columns">
                <label for="district">Disctict</label>
                <select name="district">
                    <option value="null">Select One...</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                <label for="contactName">Contact Name</label>
                <input type="text" name="contactName"/>
            </div>
            <div class="small-12 large-6 columns">
                <label for="contactEmail">Contact Email</label>
                <input type="email" name="contactEmail"/>
            </div>
        </div>

        <div class="row">
            <div class="small-12 large-6 columns">
                <span class="orange-text">*By default, all school contact information is set to info@mtcquiz.com. Please verify all info when activating the school.</span>
                <!--<a class="button large red expand delete-school" href="#">Delete</a>-->
            </div>
            <div class="small-12 large-6 columns">
                <input class="button large green expand" type="submit" value="Save"/>
            </div>
        </div>
    </fieldset>

</div>

