<footer>
    <div class="about-footer-container">
        <h3><?= lang('messages.website') ?></h3>
        <ul>
            <li><a href="/verhaal"><?= lang('messages.verhaal') ?></a></li>
            <li><a href="/news"><?= lang('messages.news') ?></a></li>
            <li><a href="/catalogs"><?= lang('messages.catalogs') ?></a></li>
            <li><a href="/agenda"><?= lang('messages.agenda') ?></a></li>
            <li><a href="/contact"><?= lang('messages.contact') ?></a></li>
        </ul>
    </div>
    <div class="socials-footer-container">
        <h3><?= lang('messages.social-media') ?></h3>
        <ul>
            <li><a href="https://www.instagram.com/mateostsaretsi/" target="_blank" rel="noopener noreferrer"><?= lang('messages.instagram') ?></a></li>
            <li><a href="https://www.facebook.com/people/Armenian-Library-Amsterdam/61550582824640/" target="_blank" rel="noopener noreferrer"><?= lang('messages.facebook') ?></a></li>
        </ul>
    </div>
    <div class="location-footer-container">
        <h3><?= lang('messages.visit-us') ?></h3>
        <p class="location-text"><?= lang('messages.address') ?></p>
        <a href="https://maps.app.goo.gl/MHsAGXR1f3WJ3gkm6" class="btn-styles white-btn" target="_blank"
           rel="noopener noreferrer"><span><?= lang('messages.open-google-maps') ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" class="arrow" width="24" height="24" viewBox="0 0 24 24"
                 fill="none">
                <path d="M7.05011 16.9497L16.9496 7.05024M16.9496 7.05024V12.7071M16.9496 7.05024H11.2927"
                      stroke="black" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <div class="container-styles mark-container">
            <img src="/public/icons/mark.svg" class="mark" alt="<?= lang('messages.mark') ?>">
            <span class="mark-text"><?= lang('messages.by-appointment-only') ?></span>
        </div>
        <a href="/contact" class="btn-styles brown-btn"><span><?= lang('messages.make-appointment') ?></span>
            <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                 fill="none">
                <path d="M5 12H19M19 12L15 16M19 12L15 8" stroke="white" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
    <div class="footer-logo-container">
        <img src="/public/images/footer-logo.svg" alt="footer-logo">
    </div>
</footer>

<script src="/public/scripts/script.js"></script>
</body>
</html>
