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

    $locale = $locales[$lang] ?? 'en_US';

    // Combine date and time
    $datetimeString = "$date $time";
    $datetime = new DateTime($datetimeString);

    $formatter = new IntlDateFormatter(
        $locale,
        IntlDateFormatter::LONG,
        IntlDateFormatter::SHORT,
        null,
        null,
        'd MMMM HH:mm' // Removed year (yyyy)
    );

    return $formatter->format($datetime);
}


$groupedAgendas = [];

foreach ($agendas as $agenda) {
    $month = $agenda['month-name-'.$currentLang];
    $groupedAgendas[$month][] = $agenda;
}


?>

    <main>
        <div class="container">
            <section class="agenda-section">

                <div class="agenda-headline">
                    <h1><?= lang('messages.agenda-title') ?></h1>

                    <div class="search-box">
                        <div class="searchbar">
                            <img src="/public/icons/search.svg" alt="Search-icon" class="search-icon">
                            <input type="text" placeholder="<?=lang('messages.catalog-search-p-1') ?> <?=$count?> <?=lang('messages.catalog-search-p-2') ?>" class="search-input agenda-search">
                        </div>
                    </div>

                </div>

                <div class="sticky-content">
                    <h3><?=date('Y')?></h3>
                </div>


                <div class="loader" style="display: none;"></div>


                <div class="agenda-container">

                    <?php foreach ($groupedAgendas as $monthName => $monthAgendas): ?>
                        <section class="months">
                            <h3><?= $monthName ?></h3>

                            <div class="agenda-box">
                                <?php foreach ($monthAgendas as $agenda): ?>
                                    <a href="/agenda-details?id=<?= $agenda['agenda_id'] ?>" class="card-styles">
                                        <img src="<?= empty($agenda['image']) ? '/public/images/empty-image.png' : $agenda['image'] ?>" class="card-image" alt="News-image">
                                        <div class="image-layer"></div>
                                        <div class="card-headline">
                                            <div class="info-box" style="background-color: rgba(255, 144, 47, 1)">
                                                <span><?= formatLocalizedDate($agenda['date'], $agenda['time'], $currentLang) ?>
</span>
                                            </div>
<!--                                            <div class="info-box white-info-box" style="background-color: rgba(255, 255, 255, 1)">-->
<!--                            <span style="color: rgba(60, 60, 60, 1)">-->
<?php //= formatLocalizedDate($agenda['date'], $agenda['time'], $currentLang) ?>
<!--                            </span>-->
<!--                                            </div>-->
                                        </div>
                                        <div class="card-content-event">
                                            <div class="book-details-container">
                                                <h3 class="event-name"><?= $agenda['title-' . $currentLang] ?></h3>
                                            </div>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endforeach; ?>

                </div>


            </section>

        </div>
    </main>

<?= $footer ?>