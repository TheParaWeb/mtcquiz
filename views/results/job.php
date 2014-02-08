<?php $job = $this->job;?>
<div class="row">
    <div class="small-offset-1 small-11 large-offset-1 large-9 columns jobdesc">
        <h2 class="jobtitle orange-text"><?php echo $job[0]['jobTitle'];?></h2>
        <h4><?php echo $job[0]['category'];?></h4>

        <h2 class="salary"><span class="green-text">$<?php echo $job[0]['salary'];?></span> /yr</h2>
        <p><?php echo $job[0]['description'];?></p>

        <a class="button large expand red" href="<?php echo URL;?>results/category/<?php echo base64_encode($job[0]['category']);?>"
           title="See all <?php echo $job[0]['category'];?> jobs.">
            See all jobs in this category.
        </a>

        <a class="button large expand blue" href="<?php echo URL;?>results/jobs/<?php echo $this->salary;?>"
           title="See all relevant jobs.">
            See all relevant jobs.
        </a>

    </div>
</div>