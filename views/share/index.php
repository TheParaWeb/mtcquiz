<div class="row">
    <div class="small-offset-1 large-offset-0 small-11 large-5 columns">
        <h2>Take the Next Step</h2>

        <p>You've got an idea about the income you'll need to sustain your ideal lifestyle and have seen some careers that provide that income. Now, learn more about how to attain those jobs. Let your family, friend, or guidance counselor know your results, and talk to them about how you can reach those goals.</p>
    </div>

    <div class="small-offset-1 small-11 large-5 columns">
        <!--<div class="row buttons">
            <a href="<?php echo URL; ?>lifestyle" class="button large expand blue">Lifestyle Quiz</a>
        </div>

        <div class="row buttons">
            <a href="<?php echo URL; ?>login" class="button large expand green">Login</a>
        </div>-->

        <div class="row share">
            <form action="<?php echo URL;?>share/sendMail/" method="post">

                <fieldset>
                    <legend>Who would you like to share with?</legend>
                    <input type="checkbox" name="parents" value="parents" id="parents">
                    <label id="parents" for="parents">Email to family / friends.</label>

                    <div id="hidden-email">
                        <label for="email">Email Address to Use</label>
                        <input type="email" name="email" placeholder="yourname@yourdomain.com"/>
                    </div>

                    <input type="checkbox" name="counselor" value="counselor" id="counselor">
                    <label for="counselor">Share with your guidance counselor</label>

                    <input type="submit" value="Share" class="button large green">
                </fieldset>
            </form>
        </div>
    </div>
</div>