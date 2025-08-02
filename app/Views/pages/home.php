<?= $header ?>

<?php

$currentLang = session()->get('site_lang') ?? 'nl';
if ($currentLang == 'hy') {
    $currentLang = 'am';
}


function formatLocalizedDate($dateString, $lang = 'en')
{
    // Map language codes to locales
    $locales = [
        'am' => 'hy_AM', // Armenian
        'en' => 'en_US', // English
        'nl' => 'nl_NL', // Dutch
    ];

    // Fallback to English if language code not found
    $locale = $locales[$lang] ?? 'en_US';

    // Create DateTime object
    $date = new DateTime($dateString);

    // Create the formatter
    $formatter = new IntlDateFormatter(
        $locale,
        IntlDateFormatter::LONG,
        IntlDateFormatter::NONE
    );

    // Force day-month-year with full month name
    $formatter->setPattern('d MMMM yyyy');

    return $formatter->format($date);
}


?>

<main class="home-background-image">
    <div class="container">
        <section class="main-headline">
            <h1><?= lang('messages.hero-title') ?></h1>
            <h2><?= lang('messages.hero-subtitle') ?></h2>
            <?php if ($text['status'] == 1) { ?>
                <a href="<?= $text['link'] ?>" target="_blank" class="btn-styles see-more">
                    <span><?= $text['text-' . $currentLang] ?></span>
                    <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg" width="21" height="21"
                         viewBox="0 0 21 21" fill="none">
                        <path d="M4.6665 10.5H16.3332" stroke="black" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"/>
                        <path d="M10.5 4.66669L16.3333 10.5L10.5 16.3334" stroke="black" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            <?php } ?>
        </section>

        <section class="news-book-event-section">
            <div class="card-container">
                <a href="/news-details?id=<?= $news['new_id'] ?>" class="card-styles">
                    <img src="<?= empty($news['image']) ? '/public/images/empty-image.png' : $news['image'] ?>"
                         class="card-image" alt="News-image">
                    <div class="image-layer"></div>
                    <div class="card-headline">
                        <div class="info-box" style="background-color: rgba(203, 0, 0, 1)">
                            <span><?= lang('messages.latest') ?></span>
                        </div>
                    </div>
                    <div class="card-content-news">
                        <span><?= $news['author-' . $currentLang] ?> • <?= formatLocalizedDate($news['date'], $currentLang) ?></span>
                        <h3><?= $news['title-' . $currentLang] ?></h3>
                    </div>
                </a>
                <div class="card-footer">
                    <a class="redirect-home-text" href="/news"><?= lang('messages.home-redirect') ?>
                        <svg onclick="window.location.href='/news'" class="arrow-right"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M5 12H19M19 12L15 16M19 12L15 8" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>

            </div>
            <div class="card-container">
                <a href="/catalog-details?id=<?= $catalogs['id'] ?>" class="card-styles"
                   style="background-color: rgba(27, 33, 65, 1)">
                    <div class="image-layer"></div>
                    <div class="card-headline">
                        <div class="info-box" style="background-color: rgba(59, 82, 195, 1)">
                            <span><?= lang('messages.highlighted') ?></span>
                        </div>
                    </div>
                    <div class="container-styles card-content-book">
                        <img src="<?= empty($catalogs['image']) ? '/public/images/empty-image.png' : $catalogs['image'] ?>"
                             alt="book-image" class="book-image">
                        <div class="book-details-container">
                            <div class="container-styles">
                                <img src="/public/images/nd-flag.png" alt="Nederlands-flag" class="nederlands-flag">
                                <span class="translation-text"><?= $catalogs['language-name-' . $currentLang] ?></span>
                            </div>
                            <div class="book-author">
                                <div class="author-part"><?= $catalogs['author-' . $currentLang] ?></div>
                                •
                                <div class="category-part"> <?= $catalogs['genre-name-' . $currentLang] ?></div>
                            </div>
                            <h3 class="book-name"><?= $catalogs['title-' . $currentLang] ?></h3>
                            <span class="book-reading-type"><?= $catalogs['type-name-' . $currentLang] ?></span>
                        </div>
                    </div>
                </a>
                <div class="card-footer">
                    <a class="redirect-home-text" href="/catalogs"><?= lang('messages.home-redirect') ?>
                        <svg onclick="window.location.href='/catalogs'" class="arrow-right"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M5 12H19M19 12L15 16M19 12L15 8" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>

                </div>
            </div>
            <div class="card-container">
                <a href="/agenda-details?id=<?= $agenda['agenda_id'] ?>" class="card-styles">
                    <img src="<?= empty($agenda['image']) ? '/public/images/empty-image.png' : $agenda['image'] ?>"
                         class="card-image" alt="News-image">
                    <div class="image-layer"></div>
                    <div class="card-headline">
                        <div class="info-box" style="background-color: rgba(255, 144, 47, 1)">
                            <span><?= formatLocalizedDate($agenda['date'], $currentLang) ?></span>
                        </div>
                        <!--                        <div class="info-box white-info-box" style="background-color: rgba(255, 255, 255, 1)">-->
                        <!--                            <span style="color: rgba(60, 60, 60, 1)">-->
                        <?php //=formatLocalizedDate($agenda['date'], $currentLang)?><!--</span>-->
                        <!--                        </div>-->

                    </div>
                    <div class="card-content-event">
                        <div class="book-details-container">
                            <h3 class="event-name"><?= $agenda['title-' . $currentLang] ?></h3>
                        </div>
                    </div>
                </a>
                <div class="card-footer">
                    <a class="redirect-home-text" href="/agenda"><?= lang('messages.home-redirect') ?>
                        <svg onclick="window.location.href='/agenda'" class="arrow-right"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M5 12H19M19 12L15 16M19 12L15 8" stroke="white" stroke-width="2"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>

                </div>

        </section>
    </div>
</main>
<div class="home-footer-text-box"><span class="home-footer-text-bolder"><?=lang('messages.home-footer-text1')?> </span>&nbsp; <span class="home-footer-text-lighter"><?=lang('messages.home-footer-text2')?></span></div>
<?= $footer ?>

