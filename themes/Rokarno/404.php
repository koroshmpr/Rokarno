<?php
get_header();
?>

<section class="py-5 d-flex flex-column justify-content-center align-items-center">
    <article class="z-top position-relative text-center p-5 shadow-lg bg-primary text-white" data-aos="zoom-in">
        <div class="fw-bolder my-auto d-flex align-items-center justify-content-center gap-1 overflow-hidden">
            <div data-aos="fade-down" data-aos-delay="600" style="font-size:120px">4</div>
            <div data-aos="fade-down" data-aos-delay="400" style="font-size:120px">0</div>
            <div data-aos="fade-down" data-aos-delay="200" style="font-size:120px">4</div>
        </div>
        <p data-aos="zoom-in" data-aos-delay="100">Page not found!</p>
        <h3 data-aos="zoom-in" data-aos-delay="150">Your page has been deleted!</h3>
        <p data-aos="zoom-in" data-aos-delay="200">You can use the return button to go back to the main page of the website</p>
        <div class="overflow-hidden mt-5">
            <a data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000" href="/" class="btn bg-secondary text-primary fw-bold shadow-sm">Return
                to the main page</a>
        </div>
    </article>
</section>

<?php
get_footer();
?>
