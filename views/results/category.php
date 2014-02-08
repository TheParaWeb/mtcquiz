<div class="row">
    <div class="small-11 large-12 small-offset-1 large-offset-0">
        <h4 class="orange-text">View All Jobs By Category</h4>
    </div>
    <div class="small-11 large-6 small-offset-1 large-offset-0 columns">
        <table class="small-12 large-12 expand joblist">
            <caption><?php echo $this->category;?></caption>
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($this->jobs AS $job){?>
                    <tr>
                        <td><a href="<?php echo URL;?>results/job/<?php echo $job['id'];?>/" title="View Job"><?php echo $job['jobTitle'];?></a></td>
                        <td>$<?php echo number_format($job['salary']);?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <div class="small-11 large-6 small-offset-1 large-offset-0 columns">
        <?php if($this->lifestyleComplete):?>
            <a href="<?php echo URL;?>dashboard/" title="Dashboard" class="button large red expand">Dashboard</a>
            <a href="<?php echo URL;?>share/" title="Share your results!" class="button large green expand">Share</a>
            <a href="<?php echo URL; ?>lifestyle/startOver/" class="button large expand blue taken">
                <p>Lifestyle Quiz Complete</p>
                <p class="bold">Take Again</p>
            </a>
        <?php else:?>
            <a href="<?php echo URL;?>lifestyle/" title="Lifestyle Quiz" class="button large blue expand">Lifestyle Quiz</a>
            <a href="<?php echo URL;?>login/" title="Login" class="button large green expand">Login</a>
        <?php endif;?>
        <a href="<?php echo URL;?>results/jobs/1/" title="See All Jobs" class="button large orange expand">See All Jobs</a>
    </div>

</div>
