<div class="row">
    <div class="small-offset-1 large-offset-0 small-11 large-5 columns">
        <h2>Welcome</h2>

        <p>Ever wonder how much money it will cost to live in a mansion? To buy a new SUV? Answer a series of questions
            about the kind of life you’d like to live, and discover the amount of money you’ll need to make to cover
            costs. Then, learn what jobs can provide the income you need. <a class="red-text" href="<?php echo URL;?>lifestyle/">Get started now!</a></p>
    </div>

    <div class="small-offset-1 small-11 large-5 columns homebuttons">
        <div class="row buttons">
            <?php if($this->lifestyleStarted):?>
                <a href="<?php echo URL; ?>resume" class="button large expand blue">Lifestyle Quiz</a>
            <?php else:?>
                <a href="<?php echo URL; ?>lifestyle" class="button large expand blue">Lifestyle Quiz</a>
            <?php endif;?>
        </div>

        <div class="row buttons">
            <a href="<?php echo URL; ?>login" class="button large expand green">Login</a>
        </div>
    </div>
</div>
