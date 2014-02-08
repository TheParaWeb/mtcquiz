<div class="row">
    <div class="small-11 large-12 small-offset-1 large-offset-0">
        <h2 class="orange-text"><?php echo $this->headerText;?></h2>
    </div>

    <?php foreach($this->categories AS $category=>$categoryArray){?>
    <div class="small-11 large-12 small-offset-1 large-offset-0 columns joblist" style="clear:none;">
        <table class="small-12 large-12 expand">
            <caption class="blue-text"><?php echo $category;?></caption>
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categoryArray AS $job){?>
                    <tr>
                        <td class="small-9"><a href="<?php echo URL;?>results/job/<?php echo $job['id'];?>/"><?php echo $job['jobTitle'];?></a></td>
                        <td class="small-3">$<?php echo number_format($job['salary']);?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <?php }?>
</div>