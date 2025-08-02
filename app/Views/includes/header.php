
<?php
$currentLang = session()->get('site_lang') ?? 'nl';
// Determine if HTTPS is on
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ||
             $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// Get the domain name
$domain = $_SERVER['HTTP_HOST'];

// Get the request URI (the path)
$request = $_SERVER['REQUEST_URI'];

// Combine to get the full URL
$current_url = $protocol . $domain . $request;

?>
<!doctype html>
<html lang="<?php echo $currentLang ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/styles/styles.css?v=<?php echo time(); ?>">
    <title>Mateos Tsaretsi</title>
    <link rel="icon" type="image/png" href="/public/images/Favicon.png">
    <meta name="description" content="Discover the Armenian Library in the Netherlands — a cultural hub for books, heritage, and Armenian community events. Visit us or explore our online archive.">
    <meta name="keywords" content="Armenian library, Netherlands, Armenian culture, Armenian books, Armenian community, Armenian events">
    <link rel="canonical" href="<?=base_url('catalogs')?>">
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Library",
            "name": "Armenian Library in the Netherlands",
            "url": "<?=base_url('catalogs')?>",
            "address": {
                "@type": "5693 BA",
                "streetAddress": "Kalverstraat 23A ",
                "addressLocality": "Amsterdam",
                "addressCountry": "Netherlands"
            },
            "telephone": "+31 561 234 562"
        }
    </script>

</head>
<body>

<header>
    <nav class="navigation" aria-label="Main Navigation">
        <a href="/" class="logo">
            <img src="/public/images/logo.svg" class="logo-1" alt="Mateos">
            <img src="/public/images/logo-2.svg" class="logo-2" alt="Mateos">
        </a>

        <ul class="menu">
            <li class="<?=$slug == 'verhaal' ? 'active' : ''?>"><a href="/verhaal"><?= lang('messages.verhaal') ?></a></li>
            <li class="<?=$slug == 'news' ? 'active' : ''?>"><a href="/news"><?= lang('messages.news-menu') ?></a></li>
            <li class="<?=$slug == 'catalogs' ? 'active' : ''?>"><a href="/catalogs"><?= lang('messages.catalogs') ?></a></li>
            <li class="<?=$slug == 'agenda' ? 'active' : ''?>"><a href="/agenda"><?= lang('messages.agenda') ?></a></li>
        </ul>
        <div class="burger-menu-button">
            <svg class="burger-menu-icon" xmlns="http://www.w3.org/2000/svg" width="29" height="22" viewBox="0 0 29 22" fill="none">
                <line id="top-line" y1="1" x2="29" y2="1" stroke="white" stroke-width="2"/>
                <line id="middle-line" y1="11" x2="29" y2="11" stroke="white" stroke-width="2"/>
                <line id="bottom-line" y1="21" x2="29" y2="21" stroke="white" stroke-width="2"/>
            </svg>
        </div>

        <div class="mobile-menu-container-box ">
            <div class="mobile-menu-container mobile">
                <ul class="mobile-menu">
                    <li class="<?=$slug == 'verhaal' ? 'mobile-active' : ''?>"><a href="/verhaal"><?= lang('messages.verhaal') ?></a></li>
                    <li class="<?=$slug == 'news' ? 'mobile-active' : ''?>"><a href="/news"><?= lang('messages.news-menu') ?></a></li>
                    <li class="<?=$slug == 'catalogs' ? 'mobile-active' : ''?>"><a href="/catalogs"><?= lang('messages.catalogs') ?></a></li>
                    <li class="<?=$slug == 'agenda' ? 'mobile-active' : ''?>"><a href="/agenda"><?= lang('messages.agenda') ?></a></li>
                </ul>
                <a href="/contact" class="btn-styles brown-btn">
                    <span><?= lang('messages.contact') ?></span>
                    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 12H19M19 12L15 16M19 12L15 8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>

                <div class="mobile-language">
                    <a href="<?= base_url('language/switch/en') ?>" data-lang="en">
                        <img src="/public/images/usa-flag.png" alt="English">
                    </a>
                    <a href="<?= base_url('language/switch/nl') ?>" data-lang="nl">
                        <img src="/public/images/netherlands-flag.png" alt="Dutch">
                    </a>
                    <a href="<?= base_url('language/switch/hy') ?>" data-lang="hy">
                        <img src="/public/images/armenian-flag.png" alt="Armenian">
                    </a>
                </div>
            </div>
        </div>
        <div class="container-styles contact-language-container">
            <a href="/contact" class="btn-styles brown-btn">
                <span><?= lang('messages.contact') ?></span>
                <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M5 12H19M19 12L15 16M19 12L15 8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
            <div class="dropdown" id="languageDropdown">
                <div class="dropdown-toggle language-toggle-btn" id="selectedLanguage">

                    <img src="/public/images/<?=$currentLang == 'en' ? 'usa-flag.png' : ($currentLang == 'nl' ? 'netherlands-flag.png' : 'armenian-flag.png')?>" alt="Dutch">

                </div>
                <div class="dropdown-menu">
                    <a href="<?= base_url('language/switch/en') ?>" data-lang="en">
                        <img src="<?= base_url('public/images/usa-flag.png') ?>" alt="English"> English
                    </a>
                    <a href="<?= base_url('language/switch/nl') ?>" data-lang="nl">
                        <img src="<?= base_url('public/images/netherlands-flag.png') ?>" alt="Dutch"> Nederlands
                    </a>
                    <a href="<?= base_url('language/switch/hy') ?>" data-lang="hy">
                        <img src="<?= base_url('public/images/armenian-flag.png') ?>" alt="Armenian"> Հայերեն
                    </a>
                </div>
            </div>

        </div>
    </nav>
</header>