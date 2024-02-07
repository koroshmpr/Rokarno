<?php
global $cur_lan;
?>
<div class="position-absolute <?= $args['containerClass'] ?? ''; ?> <?= $cur_lan == 'en' ? 'start-0' : 'end-0';?> d-flex flex-column opacity-lg-25">
        <span data-aos="fade-down" data-aos-delay="1000" data-aos-duration="800">
            <?php
            $args = array(
                'class' => '',
                'fill-color' => '#9CCAAA',
                'fill-opacity' => '0.8'
            );
            get_template_part('template-parts/svg/tales/tale', null, $args);
            ?>
        </span>
    <span data-aos="zoom-in" data-aos-delay="1300" data-aos-duration="800">
            <?php
            $args = array(
                'class' => 'translate-x-100',
                'fill-color' => '#9CCAAA',
                'fill-opacity' => '0.3'
            );
            get_template_part('template-parts/svg/tales/tale', null, $args);
            ?>
        </span>
    <span data-aos="fade-left" data-aos-delay="1400" data-aos-duration="800">
            <?php
            $args = array(
                'class' => '',
                'fill-color' => '#CEC8C0',
                'fill-opacity' => '0.3'
            );
            get_template_part('template-parts/svg/tales/tale', null, $args);
            ?>
        </span>
</div>
<?php
//$args = array (
//    'containerClass' => 'bottom-0'
//);
//
//get_template_part('template-parts/loop/tile-object' , null , $args)
?>