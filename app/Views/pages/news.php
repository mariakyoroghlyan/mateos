<?= $header ?>

<?php

$currentLang = session()->get('site_lang') ?? 'nl';

if ($currentLang == 'hy') {
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

$query = isset($_GET['search']) ? htmlspecialchars(trim($_GET['search']), ENT_QUOTES, 'UTF-8') : "";
?>

<main class="news-main">

    <div class="container">
        <section class="news-section">

            <h1><?= lang('messages.news-title') ?></h1>

            <div class="news-box">
                <div class="search-box">
                    <div class="searchbar desktop">
                        <img src="/public/icons/search.svg" alt="Search-icon" class="search-icon">
                        <input type="text" placeholder="<?= lang('messages.news-search') ?>"
                               class="search-input news-search" value="<?= $query ?>">
                    </div>

                    <div class="mobile-search-box mobile">
                        <div class="mobile-search">
                            <div class="searchbar">
                                <img src="/public/icons/search.svg" alt="Search-icon" class="search-icon">
                                <input type="text" placeholder="<?= lang('messages.news-search') ?>"
                                       class="search-input news-search" value="<?= $query ?>">
                            </div>
                        </div>
                    </div>

                    <div class="category-item-box mobile-filter-toggle">
                        <div class="category-selector category-selector-red custom-select">
                            <div class="button-text-container">
                                <div class="selected"><?= $categories[3]['name-' . $currentLang] ?></div>
                                <svg class="arrow selectArrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9L12 15L18 9" stroke="#CB0000" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="options news-select" data-type="category">
                                <?php foreach ($categories as $category) { ?>
                                    <div class="option"
                                         data-value="<?= $category['id'] ?>"> <?= $category['name-' . $currentLang] ?>
                                        <img class="checkmark" src="/public/icons/checkmark-red.svg"
                                             alt="checkmark-icon"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="container-styles result-sort-cont">
                    <span class="result-count"> <?= $count == 1 || 0 ? $count . ' ' . lang('messages.result') : $count . ' ' . lang('messages.results') ?> </span>
                    <!--                    <div class="container-styles sort-box"><span class="sort-text selectArrow">-->
                    <?php //=lang('messages.sort') ?><!--</span>-->
                    <div class="sort-selector sort-custom-select">
                        <div class="button-text-container">
                            <div class="selected"><?= lang('messages.newest') ?></div>
                            <svg class="sorted-icon selectArrow" xmlns="http://www.w3.org/2000/svg" width="24"
                                 height="24"
                                 viewBox="0 0 24 24" fill="none">
                                <path d="M6 9L12 15L18 9" stroke="black" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="sort-options" data-type="data-sorted">
                            <div class="sort-option" data-value="desc"> <?= lang('messages.newest') ?>
                                <img class="checkmark" src="/public/icons/checkmark-red.svg" alt="checkmark-icon">
                            </div>
                            <div class="sort-option" data-value="esc"> <?= lang('messages.oldest') ?>
                                <img class="checkmark" src="/public/icons/checkmark-red.svg" alt="checkmark-icon">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="loader" style="display: none;"></div>

            <div class="news-container news-load-box">
                <?php
                foreach ($news as $new) { ?>
                    <a href="/news-details?id=<?= $new['new_id'] ?>" class="card-styles">
                        <img src="<?= empty($new['image']) ? '/public/images/empty-image.png' : $new['image'] ?>" class="card-image" alt="News-image">
                        <div class="image-layer"></div>
                        <div class="card-headline">
                            <div class="info-box" style="background-color: rgba(203, 0, 0, 1)">
                                <span><?= $new['name-' . $currentLang] ?></span>
                            </div>
                        </div>
                        <div class="card-content-news">
                               <span>
    <?= $new['author-' . $currentLang] ?> •
    <?php
    $date = new DateTime($new['date']);
    $today = new DateTime();
    $yesterday = (new DateTime())->modify('-1 day');

    // Define localized labels
    $labels = [
        'am' => ['today' => 'Այսօր', 'yesterday' => 'Երեկ'],
        'nl' => ['today' => 'Vandaag', 'yesterday' => 'Gisteren'],
        'en' => ['today' => 'Today', 'yesterday' => 'Yesterday'],
    ];

    $langLabels = $labels[$currentLang] ?? $labels['en'];

    if ($date->format('Y-m-d') === $today->format('Y-m-d')) {
        echo $langLabels['today'];
    } elseif ($date->format('Y-m-d') === $yesterday->format('Y-m-d')) {
        echo $langLabels['yesterday'];
    } else {
        echo formatLocalizedDate($new['date'], $currentLang);
    }
    ?>
</span>

                            <h3><?= $new['title-' . $currentLang] ?></h3>
                        </div>
                    </a>
                <?php } ?>

            </div>
            <div class="pagination-box">
                <?= $pagination ?>
            </div>
        </section>

    </div>

</main>


<?= $footer ?>
