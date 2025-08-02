<?= $header ?>
<?php

$currentLang = session()->get('site_lang') ?? 'nl';

if($currentLang == 'hy'){
    $currentLang = 'am';
}

$query = isset($_GET['search']) ? htmlspecialchars(trim($_GET['search']), ENT_QUOTES, 'UTF-8') : "";


?>


    <main>
        <div class="container">
            <section class="catalogs-section">

                <div class="catalog-headline">
                    <h1><?= lang('messages.catalogs-title') ?></h1>
                </div>

                <div class="catalog-box">

                    <div class="search-box">
                        <div class="searchbar desktop">
                            <img src="/public/icons/search.svg" alt="Search-icon" class="search-icon">
                            <input type="text" placeholder="<?=lang('messages.catalog-search-p-1') ?> <?=$count?> <?=lang('messages.catalog-search-p-2') ?>" value="<?=$query?>" class="search-input catalog-search">
                        </div>

                        <div class="mobile-search-box mobile">
                            <div class="mobile-search">
                                <div class="searchbar">
                                    <img src="/public/icons/search.svg" alt="Search-icon" class="search-icon">
                                    <input type="text" placeholder="<?=lang('messages.catalog-search-p-1') ?> <?$count?> <?=lang('messages.catalog-search-p-2') ?>" value="<?=$query?>" class="search-input catalog-search">
                                </div>
                                <div class="mobile-filter">
                                    <div class="arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none">
                                            <path d="M21 4H14" stroke="#3B52C3" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M10 4H3" stroke="#3B52C3" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M21 12H12" stroke="#3B52C3" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M8 12H3" stroke="#3B52C3" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M21 20H16" stroke="#3B52C3" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M12 20H3" stroke="#3B52C3" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M14 2V6" stroke="#3B52C3" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M8 10V14" stroke="#3B52C3" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                            <path d="M16 18V22" stroke="#3B52C3" stroke-width="2" stroke-linecap="round"
                                                  stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="category-item-box">
                            <div class="category-selector category-selector-blue custom-select catalog-sort">
                                <div class="button-text-container">
                                    <div class="selected"><?= $languages[0]['name-' . $currentLang] ?></div>
                                    <svg class="arrow selectArrow" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M6 9L12 15L18 9" stroke="#3B52C3" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="options" data-type="languages">
                                    <?php foreach ($languages as $language): ?>
                                        <div class="option"
                                             data-value="<?= $language['id'] ?>"><?= $language['name-' . $currentLang] ?>
                                            <img class="checkmark" src="/public/icons/checkmark-blue.svg"
                                                 alt="checkmark-icon"></div>
                                    <?php endforeach ?>
                                </div>
                            </div>

                            <div class="category-selector category-selector-blue custom-select catalog-sort">
                                <div class="button-text-container">
                                    <div class="selected"><?= $genres[0]['name-nl'] ?></div>
                                    <svg class="arrow selectArrow" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M6 9L12 15L18 9" stroke="#3B52C3" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="options" data-type="genres">
                                    <?php foreach ($genres as $genre): ?>
                                        <div class="option" data-value="<?= $genre['id'] ?>"><?= $genre['name-'. $currentLang] ?>
                                            <img class="checkmark" src="/public/icons/checkmark-blue.svg"
                                                 alt="checkmark-icon"></div>
                                    <?php endforeach ?>
                                </div>
                            </div>

                            <div class="category-selector category-selector-blue custom-select catalog-sort">
                                <div class="button-text-container">
                                    <div class="selected"><?= $types[0]['name-'.$currentLang] ?></div>
                                    <svg class="arrow selectArrow" xmlns="http://www.w3.org/2000/svg" width="24"
                                         height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M6 9L12 15L18 9" stroke="#3B52C3" stroke-width="2"
                                              stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="options" data-type="types">
                                    <?php foreach ($types as $type): ?>
                                    <div class="option <?=$type['id'] == 1 ? 'selected-option' : ''?>" data-value="<?= $type['id'] ?>"><?= $type['name-' . $currentLang] ?>
                                    <img class="checkmark" src="/public/icons/checkmark-blue.svg"
                                         alt="checkmark-icon"></div>
                                <?php endforeach ?>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="loader" style="display: none;"></div>

                    <div class="result-sort-cont">
                        <span class="result-count"> <?= $count == 1 || 0 ? $count . ' ' . lang('messages.result') : $count . ' ' . lang('messages.results') ?> </span>

                    </div>

                <div class="catalogs-container catalog-load-box">

                    <?php foreach ($catalogs as $catalog) {
                        $flagClass = 'nederlands-flag';
                        switch ($catalog['language']) {
                            case 2:
                                $flagSrc = "/public/images/nd-flag.png";
                                $flagAlt = "Nederlands-flag";
                                break;
                            case 3:
                                $flagSrc = "/public/images/armenian-flag.png";
                                $flagAlt = "Armenian-flag";
                                break;
                            case 5:
                                $flagSrc = "/public/images/usa-flag.png";
                                $flagAlt = "US-flag";
                                break;
                            default:
                                $flagSrc = null;
                                break;
                        }
                        ?>
                        <a href="/catalog-details?id=<?= $catalog['id'] ?>" class="catalog-card">
                            <div class="container-styles card-content-book">
                                <img src="<?= empty($catalog['image']) ? '/public/images/empty-image.png' : $catalog['image']?>" alt="book-image" class="book-image">
                                <div class="book-details-container">
                                    <div class="container-styles">
                                        <?php if ($flagSrc): ?>
                                            <img src="<?= $flagSrc ?>" alt="<?= $flagAlt ?>" class="<?= $flagClass ?>">
                                        <?php endif; ?>
                                        <span class="catalog-translation-text"><span><?= $catalog['language-name-' . $currentLang] ?></span> </span>
                                    </div>
<!--                                    <h3 class="catalog-author">--><?php //= $catalog['author-' . $currentLang] ?>
<!--                                        • --><?php //= $catalog['genre-name-' . $currentLang] ?><!--</h3>-->
                                    <div class="catalog-author"> <div class="author-part"><?=$catalog['author-'.$currentLang] ?></div>  • <div class="category-part"> <?=$catalog['genre-name-'.$currentLang]?></div></div>

                                    <h3 class="catalog-name"><?= $catalog['title-' . $currentLang] ?></h3>
                                    <span class="catalog-reading-type"><?= $catalog['type-name-' . $currentLang] ?></span>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
        </div>

        <div class="catalog-pagination-box">
            <?= $pagination ?>

        </div>

        </section>

        </div>

    </main>
<?= $footer ?>