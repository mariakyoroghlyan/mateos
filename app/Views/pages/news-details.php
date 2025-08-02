<?= $header ?>

<?php
$currentLang = session()->get('site_lang') ?? 'nl';

if($currentLang == 'hy'){
    $currentLang = 'am';
}
function formatLocalizedDate($dateString, $lang = 'nl')
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

    <main>
        <div class="container news-details-container">
            <section class="news-details-section">
                <div class="container-styles news-details-headline">
                    <div class="title-box">
                        <div class="news-details-navigation">
                            <a class="home-nav" href="/"><?=lang('messages.home')?></a> /
                            <a class="news-nav" href="/news"><?=lang('messages.news')?> </a> /
                            <span><?= mb_strimwidth($news['title-'.$currentLang], 0, 45, '...') ?></span>
                        </div>

                        <div class="info-box" style="background-color: rgba(203, 0, 0, 1)"><span><?=$news['name-'.$currentLang]?></span></div>
                        <h1 class="news-title"><?=$news['title-'.$currentLang]?></h1>
                        <h3 class="news-details"><?=$news['author-'.$currentLang]?> • <?=formatLocalizedDate($news['date'], $currentLang)?></h3>
                    </div>
                    <img src="<?= empty($news['image']) ? '/public/images/empty-image.png' : $news['image']?>" alt="news-image" class="news-image">
                </div>

                <div class="news-details-content">
                    <div class="news-description-box">
                        <?=$news['desc-'.$currentLang]?>
                    </div>

<!--                    <h3>Volg ons op social media en wees er altijd als eerste bij</h3>-->
<!---->
<!--                    <div class="container-styles social-box">-->
<!--                        <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><img src="/public/icons/facebook.svg" alt="facebook"></a>-->
<!--                        <a href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><img src="/public/icons/linkedin.svg" alt="linkedin"></a>-->
<!--                        <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><img src="/public/icons/instagram.svg" alt="Instagram"></a>-->
<!--                    </div>-->
                </div>
            </section>
        </div>
    </main>

<?= $footer ?>