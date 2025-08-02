<?= $header ?>

<?php
$currentLang = session()->get('site_lang') ?? 'nl';
if($currentLang == 'hy'){
    $currentLang = 'am';
}

function formatLocalizedDate($date, $time = '00:00:00', $lang = 'nl')
{
    $locales = [
        'am' => 'hy_AM', // Armenian
        'en' => 'en_US', // English
        'nl' => 'nl_NL', // Dutch
    ];

    $atWords = [
        'am' => 'ժամը',    // Armenian
        'en' => 'at',      // English
        'nl' => 'om',      // Dutch
    ];

    $locale = $locales[$lang] ?? 'en_US';
    $at = $atWords[$lang] ?? 'at';

    // Combine date and time
    $datetimeString = "$date $time";
    $datetime = new DateTime($datetimeString);

    // Format only the date (without time)
    $dateFormatter = new IntlDateFormatter(
        $locale,
        IntlDateFormatter::LONG,
        IntlDateFormatter::NONE,
        null,
        null,
        'd MMMM'
    );

    // Format time separately
    $timeFormatter = new IntlDateFormatter(
        $locale,
        IntlDateFormatter::NONE,
        IntlDateFormatter::SHORT,
        null,
        null,
        'HH:mm'
    );

    $formattedDate = $dateFormatter->format($datetime);
    $formattedTime = $timeFormatter->format($datetime);

    return "$formattedDate $at $formattedTime";
}

?>
    <main>

        <div class="container agenda-details-container">

            <section class="agenda-details-section">
                <div class="news-details-navigation agenda-details-navigation">
                    <a class="home-nav" href="/"><?=lang('messages.home')?></a> /
                    <a class="news-nav" href="/agenda"><?=lang('messages.agenda')?> </a> /
                    <span><?= mb_strimwidth($agenda['title-'.$currentLang], 0, 45, '...') ?></span>
                </div>
                <div class="container-styles agenda-details-heading">

                    <div class="agenda-details-content">
                        <div class="info-box" style="background: rgba(255, 144, 47, 1)">
                            <span><?= formatLocalizedDate($agenda['date'], $agenda['time'], $currentLang) ?></span></div>
                        <h1><?= $agenda['title-' . $currentLang] ?></h1>
                        <h3><?= formatLocalizedDate($agenda['date'], $agenda['time'], $currentLang) ?>
                        </h3>


                    </div>
                    <img class="agenda-image" src="<?= empty($agenda['image']) ? '/public/images/empty-image.png' : $agenda['image']?>" alt="agenda-image">
                </div>

                <div class="agenda-description-container">
                    <div class="agenda-description">
                    <div>
<?= $agenda['desc-' . $currentLang] ?>
                    </div>

                        <h3><?=lang('messages.social-title')?></h3>

                        <div class="container-styles social-box">
                            <a href="https://www.facebook.com/people/Armenian-Library-Amsterdam/61550582824640/" target="_blank" rel="noopener noreferrer"><img
                                        src="/public/icons/facebook.svg" alt="facebook"></a>
                            <a href="https://www.instagram.com/mateostsaretsi/" target="_blank" rel="noopener noreferrer"><img
                                        src="/public/icons/instagram.svg" alt="Instagram"></a>
                        </div>
                    </div>
                </div>


            </section>

        </div>
    </main>

<?= $footer ?>