<?php $questionData = $this->questionData; ?>
<?php //print_r($this->answers); ?>
    <div class="row">
        <div class="small-offset-1 small-11 large-offset-3 large-6 columns">
            <h2 class="blue-text">Lifestyle Quiz</h2>

            <h2>Question <?php echo $this->currentIndex + 1; ?>/15</h2>
        </div>
    </div>

    <div class="row question">
        <div class="small-offset-1 small-11 large-offset-3 large-6 columns">
            <form action="<?php echo URL; ?>lifestyle/update/<?php echo $this->currentIndex; ?>" method="post">
                <label><?php echo $questionData['question']; ?></label>

                <?php
                $i = 1;
                foreach ($questionData['answers'] AS $answer => $data) {
                    ?>
                    <?php if ($answer != 'null'): ?>
                        <div class="answer">
                            <?php if ($questionData['type'] == 'multiple'): ?>
                                <input type="checkbox" <?php if ($this->answers[$i-1] == 'answer' . $i) {
                                    echo 'checked="checked"';
                                } ?>
                                       name="answer<?php echo $i; ?>" value="answer<?php echo $i; ?>"
                                       id="answer<?php echo $i; ?>">
                                <label
                                    for="answer<?php echo $i; ?>"><?php echo $answer . "<span class='detail'>" . $data['detail'] . "</span>"; ?></label>
                            <?php else: ?>
                                <input type="radio" <?php if ($this->answers[0] == 'answer' . $i) {
                                    echo 'checked="checked"';
                                } ?>
                                       name="answer1" value="answer<?php echo $i; ?>" id="answer<?php echo $i; ?>">
                                <label
                                    for="answer1"><?php echo $answer . "<span class='detail'>" . $data['detail'] . "</span>"; ?></label>
                            <?php endif; ?>
                        </div>
                    <?php
                    endif;
                    $i++;
                }
                ?>


                <div class="row buttons">
                    <div class="small-offset-1 small-11 large-offset-0 large-4 columns">
                        <input type="submit" name="submit" value="Next" class="button large red">
                    </div>

                    <div class="small-offset-1 small-11 large-offset-0 large-4 columns">
                        <a href="<?php echo URL; ?>lifestyle/index/<?php echo $this->currentIndex - 1; ?>"
                            class="button large blue">Back</a>
                    </div>

                    <div class="small-offset-1 small-11 large-offset-0 large-4 columns">
                        <a href="<?php echo URL; ?>lifestyle/save" class="button large green">Save</a>
                    </div>
                </div>

            </form>

        </div>
    </div>
<?php //print_r($this->questionData);?>