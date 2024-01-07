<form class="search-form d-flex gap-1 align-items-center <?= $args['formClass']?? '';?>" method="get"
      action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group position-relative">
        <input id="search-form" type="search" name="s"
               class="form-control text-primary bg-white bg-opacity-10 ps-5 py-3"
               placeholder="جستجو..." aria-label="Search">
        <button type="submit"
                class="position-absolute start-0 top-50 translate-middle-y ps-3 btn text-info d-flex align-items-center z-top"
                aria-label="Search">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search"
                 viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
</form>