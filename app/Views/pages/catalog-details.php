<?= $header ?>

<?php
$currentLang = session()->get('site_lang') ?? 'nl';

if ($currentLang == 'hy') {
    $currentLang = 'am';
}
?>


    <main class="container">
        <div class="news-details-navigation">
            <a class="home-nav" href="/"><?=lang('messages.home')?></a> /
            <a class="news-nav" href="/catalogs"><?=lang('messages.catalogs')?> </a> /
            <span><?= mb_strimwidth($catalog['title-'.$currentLang], 0, 45, '...') ?></span>
        </div>
        <section class="catalog-details-section">

            <div class="catalogs-details-box">
                <div class="catalog-details-vertaling-box">
                    <?php if ($catalog['language'] == 2) { ?>
                        <img src="/public/images/nd-flag.png" alt="Nederlands-flag" class="nederlands-flag">
                    <?php } elseif ($catalog['language'] == 3) { ?>
                        <img src="/public/images/armenian-flag.png" alt="armenain-flag" class="nederlands-flag">
                    <?php } elseif ($catalog['language'] == 5) { ?>
                    <img src="/public/images/usa-flag.png" alt="Usa-flag" class="nederlands-flag">
                    <?php } ?>

                    <span class="catalog-translation-text"><span><?= $catalog['language-name-' . $currentLang] ?></span></span>
                </div>

                <h1><?= $catalog['title-' . $currentLang] ?></h1>

                <h3 class="catalog-author"><?= $catalog['author-' . $currentLang] ?>
                    • <?= $catalog['genre-name-' . $currentLang] ?></h3>
                <p class="catalog-detail-year-country">
                    <?= $catalog['year'] ?>
                    , <?= $catalog['language-name-' . $currentLang] ?>
                </p>
                <div class="catalog-desc">
                    <?= $catalog['desc-' . $currentLang] ?>
                </div>

                <h3 class="catalog-reading-type"><?= $catalog['type-name-' . $currentLang] ?></h3>

                <a href="<?= $catalog['type'] == 2 ?
                    (empty($catalog['link']) ? base_url('/public/' . $catalog['pdf']) : $catalog['link'])
                    : '/contact' ?>"
                   class="redirect-catalog-btn brown-btn"
                    <?= ($catalog['type'] == 2 && !empty($catalog['pdf'])) ? 'download' : 'target="_blank"' ?>

                >

<span>
    <?php
    if ($catalog['type'] == 2 && empty($catalog['pdf'])) {
        echo lang('messages.online');
    } elseif ($catalog['type'] == 2) {
        echo lang('messages.download-pdf');
    } elseif ($catalog['type'] == 3) {
        echo lang('messages.make-contact');
    }
    ?>
</span>

                    <?php if ($catalog['type'] == 3) { ?>
                        <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M5 12H19M19 12L15 16M19 12L15 8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    <?php } ?>

                    <?php if ($catalog['type'] == 2 && empty($catalog['pdf'])) { ?>
                    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 12H19M19 12L15 16M19 12L15 8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <?php }

                    if ($catalog['type'] == 2 && !empty($catalog['pdf'])) {?>
                        <svg class="download-svg" xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                             viewBox="0 0 20 21" fill="none">
                            <path d="M3.33337 15.1097V16.7764C3.33337 17.2184 3.50897 17.6423 3.82153 17.9549C4.13409 18.2674 4.55801 18.443 5.00004 18.443H15C15.4421 18.443 15.866 18.2674 16.1786 17.9549C16.4911 17.6423 16.6667 17.2184 16.6667 16.7764V15.1097M5.83337 10.1097L10 14.2764M10 14.2764L14.1667 10.1097M10 14.2764V4.27637"
                                  stroke="white" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                  <?php  } ?>

                </a>
            </div>
            <div class="catalogs-details-image">
                <img src="<?= empty($catalog['image']) ? '/public/images/empty-image.png' : $catalog['image'] ?>" alt="catalog-image">
            </div>
        </section>
    </main>

<?= $footer ?>