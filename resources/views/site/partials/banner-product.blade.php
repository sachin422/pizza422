<div class="banner">

    <div class="check-it">
        <div class="container">
            <div class="right-collapse pull-right">
                <a href="#" class="rewards btn">REWARDS</a>
            </div>
        </div>
        <!--container-->
    </div>
    <!--check-it-->

    <div class="delivery">

        <div class="container">
            <div class="inner-delivery">
                <?php

                $location = Cookie::get('cm_user_location');
                    unset($location['id']);

                ?>
                <p class="pull-left">Location: {{ implode(', ', $location)  }}</p>
                <a href="javascript:void(0)" class="btn change-address pull-left ax-load-modal" data-modal="change-location">Change Location</a>
            </div>
            <!--inner-delivery-->
        </div>
        <!--container-->
    </div>
    <!--delivery-->

</div>