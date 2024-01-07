<article class="position-relative share-button">
    <span class="share-icon">
        <svg xmlns="http://www.w3.org/2000/svg" id="Layer_2" data-name="Layer 2" width="20" height="20"
             viewBox="0 0 21.42 23.68">
              <defs>
                <style>
                  .share-1 {
                      fill: #0071bc;
                  }
                </style>
              </defs>
              <g id="Layer_1-2" data-name="Layer 1">
                <path class="share-1"
                      d="M17.26,15.57c-1.63,0-3.05,.92-3.73,2.25l-5.74-2.87c.34-.59,.54-1.27,.54-1.99s-.18-1.34-.49-1.91l5.42-4.25c.76,.8,1.85,1.3,3.05,1.3,2.3,0,4.17-1.82,4.17-4.05S18.6,0,16.31,0s-4.17,1.82-4.17,4.05c0,.65,.16,1.26,.44,1.8l-5.44,4.27c-.76-.75-1.81-1.21-2.97-1.21-2.3,0-4.17,1.82-4.17,4.05s1.87,4.05,4.17,4.05c1.12,0,2.13-.43,2.88-1.13l6.1,3.05c-.04,.22-.06,.45-.06,.68,0,2.23,1.87,4.05,4.17,4.05s4.17-1.82,4.17-4.05-1.87-4.05-4.17-4.05Z"/>
              </g>
        </svg>
    </span>
    <div class="share-list position-absolute start-50 bottom-100 pb-3 rounded-2 overflow-hidden">
        <?php
        $svgSize = 18;
        $args = array(
            'sizeSvgX' => $svgSize,
            'sizeSvgY' => $svgSize,
        );
        // Get the current post URL
        $postUrl = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        // Get the post title and encode it for use in the share links
        $postTitle = urlencode(get_the_title());
        // Get the author's Twitter handle (replace "twitter" with your user meta key)
        $twitterHandle = get_the_author_meta('twitter');
        // Get the website name for use in the Twitter share link
        $websiteName = get_bloginfo('name');
        ?>
        <ul class="d-flex list-unstyled gap-2 m-0 align-items-center justify-content-center border border-info p-2">
            <li>
                <a class="bg-white" title="aparat" target="_blank"
                   href="https://www.aparat.com/share?url=<?php echo urlencode($postUrl); ?>">
                    <?php get_template_part('template-parts/svg/aparat', null, $args); ?>
                </a>
            </li>
            <li>
                <a class="bg-white" title="telegram" target="_blank"
                   href="https://telegram.me/share/url?url=<?php echo urlencode($postUrl); ?>&text=<?php echo $postTitle; ?>">
                    <?php get_template_part('template-parts/svg/telegram', null, $args); ?>
                </a>
            </li>
            <li>
                <a class="bg-white" title="youtube" target="_blank"
                   href="https://www.youtube.com/share?url=<?php echo urlencode($postUrl); ?>">
                    <?php get_template_part('template-parts/svg/youtube', null, $args); ?>
                </a>
            </li>
            <li>
                <a class="bg-white" title="instagram" target="_blank"
                   href="https://www.instagram.com/share?url=<?php echo urlencode($postUrl); ?>">
                    <?php get_template_part('template-parts/svg/instagram', null, $args); ?>
                </a>
            </li>
            <li>
                <a class="bg-white" title="X" target="_blank"
                   href="https://twitter.com/intent/tweet?text=<?php echo urlencode('Check out this awesome post from ' . $websiteName . ': ') . $postTitle; ?>&url=<?php echo urlencode($postUrl); ?>&via=<?php echo urlencode($twitterHandle); ?>">
                    <?php get_template_part('template-parts/svg/twitter', null, $args); ?>
                </a>
            </li>
            <li>
                <a class="bg-white" title="linkedin" target="_blank"
                   href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($postUrl); ?>&title=<?php echo $postTitle; ?>">
                    <?php get_template_part('template-parts/svg/linkedin', null, $args); ?>
                </a>
            </li>
        </ul>
    </div>
</article>