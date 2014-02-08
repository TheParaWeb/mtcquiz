
<div class="row">
    <div class="small-offset-1 large-offset-0 small-11 large-4 columns">
        <h2>You Did It</h2>

        <p>Now that you’ve gotten your results, <a href="<?php echo URL; ?>share" class="green-text">share</a> them with
            a guidance counselor or your parents to discuss your education options.
            Then, learn more about what those careers involve to assess the job that best fits your interests.
            <!--Then, learn more about the path to that career in <a href="<?php echo URL; ?>results" class="orange-text">Career
                Paths</a> and take the <a href="<?php echo URL; ?>quiz/career" class="red-text">Career Quiz</a> to
            assess the job that best fits your interests.-->
            Not happy with your results? Feel free to <a href="<?php echo URL; ?>lifestyle/startOver" class="orange-text">take the quiz again</a>.
        </p>
    </div>

    <div class="small-offset-1 small-11 large-offset-0 large-4 columns">
        <div class="row buttons">
            <?php $student = $this->student;?>

            <?php if($student['lifestyle_complete']!=1):?>
            <a href="<?php echo URL; ?>lifestyle/startOver/" class="button large expand blue taken">
                <p>Lifestyle Quiz Complete</p>
                <p class="bold">Take Again</p>
            </a>
            <?php else:?>
            <a href="<?php echo URL;?>lifestyle" class="button large expand blue">Lifestyle Quiz</a>
            <?php endif;?>

            <a href="<?php echo URL; ?>quiz/career" class="button large expand disabled">Career Quiz</a><!--red -->

            <!--
            <a href="<?php echo URL;?>quiz/career" class="button large expand gray taken">
                <p>Career Quiz Complete</p>
                <p class="bold">Take Again</p>
            </a>
            -->
            <a href="<?php echo URL; ?>results" class="button large expand disabled">Career Paths</a><!--orange -->

            <a href="<?php echo URL; ?>share" class="button large expand green">Share</a>
        </div>
    </div>

    <div class="small-offset-1 small-11 large-offset-0 large-4 columns results">
        <h2 class="blue-text">Results:</h2>

        <p>Salary needed:</p>

        <h3><span class="green-text">$<?php echo $this->salary;?></span> yr.</h3>

        <p>Professions:</p>

        <?php
            foreach ($this->jobs AS $job){ ?>
              <a href="<?php echo URL."results/job/".$job['id'];?>/<?php echo $this->salary;?>" title="<?php echo $job['jobTitle'];?>">
                  <p class="bold"><?php echo $job['jobTitle'];?></p>
              </a>
            <?php }
        ?>
        <!--<p class="bold">Doctor</p>
        <p class="bold">Lawyer</p>
        <p class="bold">Coding Specialist</p>-->

        <a href="<?php echo URL; ?>results/jobs/<?php echo $this->salary;?>" class="red-text">Click here to see all professions in your salary range</a>
    </div>
</div>
