<?php if(get_option('field_6') || get_option('field_7') || get_option('field_8') ) {  ?>
        <div class="container ">
                <div class="tabs-section flex">

                        <!-- first tab -->
                        <?php if(get_option('field_6')) {  ?>
                        <input type="radio" class="tabs-radio" name="tabs-info" id="tab1" checked>
                        <label for="tab1" class="tabs-label"><?php  $tab1 = get_option('field_6');  echo esc_html($tab1);  ?></label>
                        <div class="tabs-content">
                                <?php
                                $tab1_content = get_option('field_9');
                                echo esc_html($tab1_content);
                                ?>
                        </div>
                        <?php } ?>
                        
                        <!-- second tab -->
                        <?php if(get_option('field_7')) {  ?>
                        <input type="radio" class="tabs-radio" name="tabs-info" id="tab2">
                        <label for="tab2" class="tabs-label"><?php $tab2 = get_option('field_7'); echo esc_html($tab2);  ?></label>
                        <div class="tabs-content">
                                <?php
                                $tab2_content = get_option('field_10');
                                echo esc_html($tab2_content);
                                ?>
                        </div>
                        <?php } ?>

                        <!-- third tab -->
                        <?php if(get_option('field_8')) {  ?>
                        <input type="radio" class="tabs-radio" name="tabs-info" id="tab3">
                        <label for="tab3" class="tabs-label"><?php $tab2 = get_option('field_8'); echo esc_html($tab2);  ?></label>
                        <div class="tabs-content">
                                <?php
                                $tab3_content = get_option('field_11');
                                echo esc_html($tab3_content);
                                ?>
                        </div>
                        <?php } ?>

                </div>
        </div>
        <?php } ?>