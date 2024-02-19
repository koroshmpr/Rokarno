</main>
<footer>
</footer>

<?php
if (!is_front_page()) {
    get_template_part('template-parts/backto-top');
}
if (is_singular('product')) { ?>
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="backdrop-filter: blur(8px)">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content bg-white bg-opacity-10 p-lg-3 border-white border-opacity-25 rounded-0">
                <div class="modal-body text-center overflow-hidden">
                    <img class="img-fluid position-relative product-image__modal" src="<?= get_field('brand_logo_img', 'option')['url']; ?>" alt="Full-size Image">
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
