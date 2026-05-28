
<footer class="hf">

  <div class="hf-top">
  <?php $array = [
    'linkedin' => esc_url(get_theme_mod('hop_linkedin')),
    'facebook' => esc_url(get_theme_mod('hop_facebook')),
    'github' => esc_url(get_theme_mod('hop_github'))
  ];

  ?>
    <div>
      <div class="hf-brand-name">Hopreneur<span>.</span></div>
      <p class="hf-brand-desc">Building websites for small businesses and entrepreneurs that are built to last and built to work.</p>
      <div class="hf-socials">
        <?php foreach($array as $key => $url){
          if(!empty($url)){
            ?>
            <a href="<?php echo $val; ?>" class="hf-social" title="<?php echo esc_attr($key); ?>" aria-label="<?php echo esc_attr($key); ?>">
              <i class="fab fa-<?php echo esc_attr($key); ?>">

              </i>
            </a>

            <?php
          }

        }
        ?>
      </div>
    </div>

    <div>
      <div class="hf-col-title">Services</div>
      <ul class="hf-links">
        <?php $services = get_posts([
          'post_type' => 'service',
          'number_posts' => -1,
          'post_status' => 'publish'
        ]);
        foreach($services as $service){
          ?>
          <li><a href="<?php echo get_the_permalink($service->post_id); ?>">
            <i class="ti ti-layout" aria-hidden="true"></i>
            <?php echo $service->post_title; ?></a>
          </li>

          <?php
        }

        ?>
      </ul>
    </div>

    <div>
      <div class="hf-col-title">Company</div>
      <ul class="hf-links">
        <?php $pages = get_pages();
        foreach($pages as $page){
          ?>
          <li>
        <a href="<?php echo get_permalink($page->ID); ?> ">
            <?php echo $page->post_title; ?>
        </a>
      </li>
          <?php
        }

        ?>
      </ul>
    </div>

    <div>
      <div class="hf-col-title">Contact</div>
      <div>
        <div class="hf-contact-item">
          <span class="hf-contact-label">Email</span>
          <a href="mailto:muhammad.tws49@gmail.com" class="hf-contact-val">
            muhammad.tws49@gmail.com
          </a>
        </div>
        <div class="hf-contact-item">
          <span class="hf-contact-label">Location</span>
          <span class="hf-contact-val">Toronto, Canada</span>
        </div>
        <div class="hf-contact-item">
          <span class="hf-contact-label">Hours</span>
          <span class="hf-contact-val">Mon – Fri, 9am – 6pm</span>
        </div>
        <div class="hf-contact-item">
          <span class="hf-contact-label">Response Time</span>
          <span class="hf-contact-val">Within 12 Hours</span>
        </div>
      </div>
    </div>

  </div>


    <div id="mc_embed_signup">
    <form action="https://englishaccessvirtual.us13.list-manage.com/subscribe/post?u=6dd9a2693801375b334b9176b&amp;id=dbe5e7b8ce&amp;f_id=00f300e9f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
        <div id="mc_embed_signup_scroll">
          <div class="input-area">
            <h2>Subscribe</h2>
            <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
            <div class="mc-field-group"><label for="mce-EMAIL">Email Address</label>
            <input class="email-input" type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value="">
          </div>
            <div id="mce-responses" class="clear foot">
            <div class="response" id="mce-error-response" style="display: none;"></div>
            <div class="response" id="mce-success-response" style="display: none;"></div>
            <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Subscribe">
          </div>
          </div>
      <div aria-hidden="true" style="position: absolute; left: -5000px;">
        /* real people should not fill this in and expect good things - do not remove this or risk form bot signups */
        <input type="text" name="b_6dd9a2693801375b334b9176b_dbe5e7b8ce" tabindex="-1" value="">
       </div>
        <div class="optionalParent">
            <div class="clear foot">
                <p class="img-refer" style="margin: 0px auto;">
                  <a href="http://eepurl.com/i9CoM2" title="Mailchimp - email marketing made easy and fun">
                  <span style="display: inline-block; background-color: white; border-radius: 4px;">
                    <img class="refferal_badge" src="https://digitalasset.intuit.com/render/content/dam/intuit/mc-fe/en_us/images/intuit-mc-rewards-text-dark.svg" alt="Intuit Mailchimp" style="width: 220px; height: 40px; display: flex; padding: 2px 0px; justify-content: center; align-items: center;">
                  </span>
                </a>
              </p>
            </div>
        </div>
    </div>
</form>
</div>

  <div class="hf-bottom">
    <div class="hf-copy">© 2025 Hopreneur Web Services. All rights reserved.</div>
    <div class="hf-badges">
      <span class="hf-badge">WordPress Expert</span>
      <span class="hf-badge">Squarespace Expert</span>
    </div>
    <div class="hf-legal-links">
      <a href="#">Privacy Policy</a>
      <a href="#">Terms of Use</a>
      <a href="#">Sitemap</a>
    </div>
  </div>

</footer>

<?php wp_footer(); ?>

</body>
</html>