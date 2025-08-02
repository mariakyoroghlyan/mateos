<?= $header ?>


<main>
    <div class="container contact-container">
        <section class="contact-section">

            <div class="contact-headline">

                <h1><?= lang('messages.contact-title') ?></h1>
            </div>

            <div class="container-styles contact-box">

                <div class="contact-box-container">
                    <div class="contact-info">
                        <h2>
                            <?= lang('messages.contact-subtitle') ?>
                        </h2>
                        <div class="contact-details-box">


                            <div class="contact-details">

                                <div class="contact-info-title-box">
                                    <h3><?= lang('messages.contact-info-title') ?></h3>
                                    <div class="contact-info-box">
                                        <div class="contact-details-methods">
                                            <span><?= lang('messages.tel') ?></span>
                                            <span><?= lang('messages.email') ?></span>
                                            <span><?= lang('messages.address-contact') ?></span>
                                        </div>
                                        <div class="contact-details-info">
                                            <a href="tel:+31561234562">+31 561 234 562 </a>
                                            <a href="mailto:info@mateostsaretsi.nl">info@mateostsaretsi.nl</a>
                                            <a href="https://maps.app.goo.gl/MHsAGXR1f3WJ3gkm6" target="_blank" rel="noopener noreferrer">
                                                <?= lang('messages.address') ?>
                                            </a>
                                        </div>
                                    </div>
                                    <a href="https://maps.app.goo.gl/MHsAGXR1f3WJ3gkm6" target="_blank" rel="noopener noreferrer" class="btn-styles brown-btn">
                                        <span><?= lang('messages.open-google-maps') ?></span>
                                        <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M7.05011 16.9498L16.9496 7.05027M16.9496 7.05027V12.7071M16.9496 7.05027H11.2927" stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>

                                    <img class="contact-image mobile" src="/public/images/contact-image.png" alt="contact-image">
                                </div>


                                <div class="contact-social-box">
                                    <h3><?= lang('messages.socials') ?></h3>
                                    <div class="container-styles social-box">
                                        <a href="https://www.facebook.com/people/Armenian-Library-Amsterdam/61550582824640/" target="_blank" rel="noopener noreferrer"><img src="/public/icons/facebook.svg" alt="facebook"></a>
                                        <a href="https://www.instagram.com/mateostsaretsi/" target="_blank" rel="noopener noreferrer"><img src="/public/icons/instagram.svg" alt="Instagram"></a>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                    <img class="contact-image desktop" src="/public/images/contact-image.png" alt="contact-image">

                </div>

            </div>

        </section>
    </div>
</main>


<?= $footer ?>
