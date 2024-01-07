<button class="btn text-primary d-none d-lg-inline fs-6" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasTop">
    <i class="bi bi-search"></i>
</button>

<div class="offcanvas offcanvas-top bg-white d-flex flex-row align-items-center justify-content-center" tabindex="-1" id="offcanvasSearch" aria-labelledby="offcanvasTopLabel" style="height: 90px!important">
    <div class="offcanvas-header">
        <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body container">
        <form class="search-form d-flex gap-1 align-items-center" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="input-group">
                <input id="search-form" type="search" name="s" class="form-control text-primary bg-white bg-opacity-10"
                       placeholder="جستجو..." aria-label="Search">
                <button type="submit" class="btn bg-primary text-white d-flex align-items-center rounded-end" aria-label="Search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>