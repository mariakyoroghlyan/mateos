// agenda search
// document.addEventListener('DOMContentLoaded', function () {
//     const searchInputs = document.querySelectorAll('.agenda-search'); // Select all matching elements
//     let lang = document.documentElement.lang || 'nl';
//     if (lang === 'hy') {
//         lang = 'am';
//     }
//
//     searchInputs.forEach(function (searchInput) {
//         let debounceTimeout;
//
//         function handleSearch() {
//             const query = searchInput.value.trim();
//             const newUrl = new URL(window.location.href);
//             if (query === '') {
//                 newUrl.searchParams.delete('search');
//             } else {
//                 newUrl.searchParams.set('search', query);
//             }
//             history.pushState(null, '', newUrl);
//
//             const agendaContainer = document.querySelector('.agenda-container');
//             agendaContainer.innerHTML = '';
//
//             const loader = document.querySelector('.loader');
//             if (loader) loader.style.display = 'block';
//
//             fetch('/search-agenda', {
//                 method: 'POST',
//                 headers: {
//                     'Content-Type': 'application/x-www-form-urlencoded'
//                 },
//                 body: 'query=' + encodeURIComponent(query)
//             })
//                 .then(response => response.json())
//                 .then(parsedData => {
//                     const agendas = parsedData.agenda;
//
//                     const groupedAgendas = agendas.reduce((acc, agenda) => {
//                         const monthName = agenda['month-name-' + lang];
//                         if (!acc[monthName]) acc[monthName] = [];
//                         acc[monthName].push(agenda);
//                         return acc;
//                     }, {});
//
//                     if (Object.keys(groupedAgendas).length === 0) {
//                         agendaContainer.innerHTML = `<p class="no-results">${noResultsMessages[lang]}</p>`;
//                     } else {
//                         renderAgenda(groupedAgendas);
//                     }
//                 })
//                 .catch(error => {
//                     console.error('AJAX error:', error);
//                 })
//                 .finally(() => {
//                     if (loader) loader.style.display = 'none';
//                 });
//         }
//
//         // Debounced input handler
//         searchInput.addEventListener('input', function () {
//             clearTimeout(debounceTimeout);
//             debounceTimeout = setTimeout(() => {
//                 if (document.activeElement !== searchInput) {
//                     handleSearch();
//                 }
//             }, 500); // Delay in ms
//         });
//
//         // Handle Enter key press immediately
//         searchInput.addEventListener('keydown', function (e) {
//             if (e.key === 'Enter') {
//                 e.preventDefault(); // prevent form submit
//                 clearTimeout(debounceTimeout);
//                 handleSearch();
//             }
//         });
//     });
//
//     function renderAgenda(groupedAgendas) {
//         const agendaContainer = document.querySelector('.agenda-container');
//         agendaContainer.innerHTML = '';
//
//         for (const [monthName, monthAgendas] of Object.entries(groupedAgendas)) {
//             let monthHTML = `<section class="months">
//                 <h3>${monthName}</h3>
//                 <div class="agenda-box">`;
//
//             monthAgendas.forEach(agenda => {
//                 monthHTML += `<a href="/agenda-details?id=${agenda.agenda_id}" class="card-styles">
//                     <img src="${agenda['image']}" class="card-image" alt="Event image">
//                     <div class="image-layer"></div>
//                     <div class="card-headline">
//                         <div class="info-box" style="background-color: rgba(255, 144, 47, 1)">
//                             <span>${agenda['category-name-' + lang]}</span>
//                         </div>
//                         <div class="info-box white-info-box" style="background-color: rgba(255, 255, 255, 1)">
//                             <span style="color: rgba(60, 60, 60, 1)">
//                                 ${formatDateLocalized(agenda['date'] + ' ' + agenda['time'], lang)}
//                             </span>
//                         </div>
//                     </div>
//                     <div class="card-content-event">
//                         <div class="book-details-container">
//                             <h3 class="event-name">${agenda['title-' + lang]}</h3>
//                         </div>
//                     </div>
//                 </a>`;
//             });
//
//             monthHTML += `</div></section>`;
//             agendaContainer.innerHTML += monthHTML;
//         }
//     }
//
//     function formatDateLocalized(datetime, lang = 'nl') {
//         const date = new Date(datetime);
//         const day = date.getDate();
//         const hours = date.getHours().toString().padStart(2, '0');
//         const minutes = date.getMinutes().toString().padStart(2, '0');
//
//         const monthNames = {
//             en: ['January', 'February', 'March', 'April', 'May', 'June', 'July',
//                 'August', 'September', 'October', 'November', 'December'],
//             nl: ['januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli',
//                 'augustus', 'september', 'oktober', 'november', 'december'],
//             am: ['Հունվար', 'Փետրվար', 'Մարտ', 'Ապրիլ', 'Մայիս', 'Հունիս', 'Հուլիս',
//                 'Օգոստոս', 'Սեպտեմբեր', 'Հոկտեմբեր', 'Նոյեմբեր', 'Դեկտեմբեր'],
//         };
//
//         const langKey = lang === 'am' ? 'am' : (lang === 'en' ? 'en' : 'nl');
//         const monthName = monthNames[langKey][date.getMonth()];
//
//         if (lang === 'en' || lang === 'am') {
//             return `${monthName} ${day} ${hours}:${minutes}`;
//         } else {
//             return `${day} ${monthName} ${hours}:${minutes}`;
//         }
//     }
//
//     // Define your noResultsMessages object
//     const noResultsMessages = {
//         nl: '0 resultaten',
//         en: '0 results',
//         am: '0 Արդյունքներ'
//     };
// });


document.addEventListener('DOMContentLoaded', function () {
    const searchInputs = document.querySelectorAll('.agenda-search'); // Select all matching elements
    let lang = document.documentElement.lang || 'nl';
    if (lang === 'hy') {
        lang = 'am';
    }

    searchInputs.forEach(function (searchInput) {
        let debounceTimeout;

        function handleSearch() {
            const query = searchInput.value.trim();
            const newUrl = new URL(window.location.href);
            if (query === '') {
                newUrl.searchParams.delete('search');
            } else {
                newUrl.searchParams.set('search', query);
            }
            history.pushState(null, '', newUrl);

            const agendaContainer = document.querySelector('.agenda-container');
            agendaContainer.innerHTML = '';

            const loader = document.querySelector('.loader');
            if (loader) loader.style.display = 'block';

            fetch('/search-agenda', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'query=' + encodeURIComponent(query)
            })
                .then(response => response.json())
                .then(parsedData => {
                    const agendas = parsedData.agenda;

                    const groupedAgendas = agendas.reduce((acc, agenda) => {
                        const monthName = agenda['month-name-' + lang];
                        if (!acc[monthName]) acc[monthName] = [];
                        acc[monthName].push(agenda);
                        return acc;
                    }, {});

                    if (Object.keys(groupedAgendas).length === 0) {
                        agendaContainer.innerHTML = `<p class="no-results">${noResultsMessages[lang]}</p>`;
                    } else {
                        renderAgenda(groupedAgendas);
                    }
                })
                .catch(error => {
                    console.error('AJAX error:', error);
                })
                .finally(() => {
                    if (loader) loader.style.display = 'none';
                });
        }

        // Debounced input handler (live search while typing)
        searchInput.addEventListener('input', function () {
            clearTimeout(debounceTimeout);
            debounceTimeout = setTimeout(() => {
                handleSearch();
            }, 500); // Delay in ms
        });

        // Handle Enter key press immediately
        searchInput.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault(); // prevent form submit
                clearTimeout(debounceTimeout);
                handleSearch();
            }
        });
    });

    function renderAgenda(groupedAgendas) {
        const agendaContainer = document.querySelector('.agenda-container');
        agendaContainer.innerHTML = '';

        for (const [monthName, monthAgendas] of Object.entries(groupedAgendas)) {
            let monthHTML = `<section class="months">
                <h3>${monthName}</h3>
                <div class="agenda-box">`;

            monthAgendas.forEach(agenda => {
                monthHTML += `<a href="/agenda-details?id=${agenda.agenda_id}" class="card-styles">
                    <img src="${agenda.image && agenda.image.trim() ? agenda.image : '/public/images/empty-image.png'}" class="card-image" alt="Event image">

                    <div class="image-layer"></div>
                    <div class="card-headline">
                        <div class="info-box" style="background-color: rgba(255, 144, 47, 1)">
                            <span> ${formatDateLocalized(agenda['date'] + ' ' + agenda['time'], lang)}</span>
                        </div>
                      
                    </div>
                    <div class="card-content-event">
                        <div class="book-details-container">
                            <h3 class="event-name">${agenda['title-' + lang]}</h3>
                        </div>
                    </div>
                </a>`;
            });

            monthHTML += `</div></section>`;
            agendaContainer.innerHTML += monthHTML;
        }
    }

    function formatDateLocalized(datetime, lang = 'nl') {
        const date = new Date(datetime);
        const day = date.getDate();
        const hours = date.getHours().toString().padStart(2, '0');
        const minutes = date.getMinutes().toString().padStart(2, '0');

        const monthNames = {
            en: ['January', 'February', 'March', 'April', 'May', 'June', 'July',
                'August', 'September', 'October', 'November', 'December'],
            nl: ['januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli',
                'augustus', 'september', 'oktober', 'november', 'december'],
            am: ['Հունվար', 'Փետրվար', 'Մարտ', 'Ապրիլ', 'Մայիս', 'Հունիս', 'Հուլիս',
                'Օգոստոս', 'Սեպտեմբեր', 'Հոկտեմբեր', 'Նոյեմբեր', 'Դեկտեմբեր'],
        };

        const langKey = lang === 'am' ? 'am' : (lang === 'en' ? 'en' : 'nl');
        const monthName = monthNames[langKey][date.getMonth()];

        if (lang === 'en' || lang === 'am') {
            return `${monthName} ${day} ${hours}:${minutes}`;
        } else {
            return `${day} ${monthName} ${hours}:${minutes}`;
        }
    }

    // Define your noResultsMessages object
    const noResultsMessages = {
        nl: '0 resultaat',
        en: '0 result',
        am: '0 Արդյունք'
    };
});

// agenda search

// news asc : desc
// document.addEventListener("DOMContentLoaded", function () {
//
//     const selector = document.querySelector('.sort-selector');
//     const buttonTextContainer = selector.querySelector('.button-text-container');
//     const selectedText = selector.querySelector('.selected');
//     const options = selector.querySelectorAll('.sort-option');
//     const optionsContainer = selector.querySelector('.sort-options');
//
//     // Toggle dropdown visibility
//     buttonTextContainer.addEventListener('click', function (e) {
//         optionsContainer.classList.toggle('show');
//         selector.classList.toggle('open'); // optional, for styling
//     });
//
//     // Handle option selection
// // Handle option selection
//     options.forEach(option => {
//         option.addEventListener('click', function () {
//             const value = this.getAttribute('data-value');
//             selectedText.textContent = this.textContent.trim();
//
//             // Remove checkmark from all
//             options.forEach(opt => opt.classList.remove('active'));
//             // Add checkmark to selected
//             this.classList.add('active');
//
//             // Close dropdown
//             optionsContainer.classList.remove('show');
//             selector.classList.remove('open');
//
//             // Update URL parameter for sorting
//             const sortedDir = new URL(window.location.href);
//             sortedDir.searchParams.set('data-sorted', value);
//             history.pushState(null, '', sortedDir);
//
//             // Trigger the AJAX request
//             sendAjaxRequest(value);
//         });
//     });
//
//     // Close dropdown when clicking outside
//     document.addEventListener('click', function (e) {
//         if (!selector.contains(e.target)) {
//             optionsContainer.classList.remove('show');
//             selector.classList.remove('open');
//         }
//     });
//
//
//     const icon = document.querySelector('.sorted-icon');
//     const sortBox = document.querySelector('.sort-box');
//
//     if (sortBox) {
//         sortBox.addEventListener('click', () => {
//             icon.classList.toggle('rotated');
//         });
//     }
//
//     function sendAjaxRequest(value) {
//         let language = document.documentElement.lang || 'en';
//         if (language === 'hy') language = 'am';
//
//         const xhr = new XMLHttpRequest();
//         let url = '/news-sort';
//         let params = '';
//         let query = new URLSearchParams(window.location.search).get('search') || '';
//         const category = new URLSearchParams(window.location.search).get('category') || '';
//         const isRotated = icon.classList.contains('rotated');
//
//         const sortedDir = new URL(window.location.href);
//
//         sortedDir.searchParams.set('data-sorted', value);
//         history.pushState(null, '', sortedDir);
//
//         if (query) {
//             params += `query=${encodeURIComponent(query)}&`;
//         }
//
//         if (category) {
//             params += `data-type=category&data-value=${encodeURIComponent(category)}&`;
//         }
//
//         params += `data-sorted=${encodeURIComponent(value)}`;
//
//         xhr.open('POST', url, true);
//         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//
//         xhr.onload = function () {
//             if (xhr.status === 200) {
//                 const response = JSON.parse(xhr.responseText);
//
//                 const news = response.news;
//                 const pagination = response.pagination;
//
//                 document.querySelector('.pagination-box').innerHTML = pagination;
//                 const newsContainer = document.querySelector('.news-load-box');
//                 newsContainer.innerHTML = '';
//
//                 const count = response.count;
//                 let resultText = '';
//
//                 if (language === 'en') {
//                     resultText = count === 1
//                         ? '1 result'
//                         : `${count} results`;
//                 } else if (language === 'am') {
//                     resultText = `${count} արդյունք`; // Armenian doesn't require plural change
//                 } else {
//                     resultText = count === 1
//                         ? '1 resultaat'
//                         : `${count} resultaten`; // Dutch
//                 }
//
//                 document.querySelector('.result-count').innerHTML = resultText;
//
//                 news.forEach(item => {
//                     const displayDate = getDisplayDate(item.date, language); // Use your global `language` variable
//
//                     const card = `
//         <a href="/news-details?id=${item.new_id}" class="card-styles">
//             <img src="${item.image}" class="card-image" alt="News-image">
//             <div class="image-layer"></div>
//             <div class="card-headline">
//                 <div class="info-box" style="background-color: rgba(203, 0, 0, 1)">
//                     <span>${item[`name-${language}`]}</span>
//                 </div>
//             </div>
//             <div class="card-content-news">
//                 <span>${item[`author-${language}`]} • ${displayDate}</span>
//                 <h3>${item[`title-${language}`]}</h3>
//             </div>
//         </a>
//
//
//     `;
//
//                     newsContainer.innerHTML += card;
//                 });
//
//             } else {
//                 console.error('Error in request:', xhr.statusText);
//             }
//         };
//
//         xhr.send(params);
//     }
//
//     // Optional helper functions
//
//     function formatLocalizedDate(dateString, lang = 'en') {
//         const date = new Date(dateString);
//
//         const armenianMonths = [
//             'հունվարի', 'փետրվարի', 'մարտի', 'ապրիլի', 'մայիսի', 'հունիսի',
//             'հուլիսի', 'օգոստոսի', 'սեպտեմբերի', 'հոկտեմբերի', 'նոյեմբերի', 'դեկտեմբերի'
//         ];
//
//         if (lang === 'am') {
//             const day = date.getDate();
//             const month = armenianMonths[date.getMonth()];
//             const year = date.getFullYear();
//             return `${day} ${month} ${year}`;
//         } else {
//             const locales = {
//                 'en': 'en-US',
//                 'nl': 'nl-NL'
//             };
//             const locale = locales[lang] || 'en-US';
//             const options = {
//                 day: 'numeric',
//                 month: 'long',
//                 year: 'numeric'
//             };
//             return new Intl.DateTimeFormat(locale, options).format(date);
//         }
//     }
//
//     function getDisplayDate(dateString, lang = 'en') {
//         const date = new Date(dateString);
//         const today = new Date();
//         const yesterday = new Date();
//         yesterday.setDate(today.getDate() - 1);
//
//         const labels = {
//             en: {today: 'Today', yesterday: 'Yesterday'},
//             nl: {today: 'Vandaag', yesterday: 'Gisteren'},
//             am: {today: 'Այսօր', yesterday: 'Երեկ'}
//         };
//
//         const label = labels[lang] || labels['en'];
//
//         if (date.toDateString() === today.toDateString()) {
//             return label.today;
//         } else if (date.toDateString() === yesterday.toDateString()) {
//             return label.yesterday;
//         } else {
//             return formatLocalizedDate(dateString, lang);
//         }
//     }
// });


document.addEventListener("DOMContentLoaded", function () {
    const selector = document.querySelector('.sort-selector');
    if (!selector) return; // Exit early if element is missing

    const buttonTextContainer = selector.querySelector('.button-text-container');

    const selectedText = selector.querySelector('.selected');
    const options = selector.querySelectorAll('.sort-option');
    const optionsContainer = selector.querySelector('.sort-options');
    const icon = document.querySelector('.sorted-icon');
    const sortBox = document.querySelector('.sort-box');

    // Toggle dropdown visibility
    buttonTextContainer.addEventListener('click', function () {
        optionsContainer.classList.toggle('show');
        selector.classList.toggle('open');
        icon.classList.toggle('opened');
    });

    // Handle option selection
    options.forEach(option => {
        option.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            updateSelectedOption(this);
            updateURL(value);
            sendAjaxRequest(value);
        });
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (e) {
        if (!selector.contains(e.target)) {
            optionsContainer.classList.remove('show');
            selector.classList.remove('open');
        }
    });

    // Toggle icon rotation
    if (sortBox) {
        sortBox.addEventListener('click', () => {
            icon.classList.toggle('rotated');
        });
    }

    // -----------------------
    // Initialization on load
    // -----------------------
    const urlParams = new URLSearchParams(window.location.search);
    const sortedParam = urlParams.get('data-sorted');
    let matchedOption = null;

    options.forEach(option => {
        if (option.getAttribute('data-value') === sortedParam) {
            matchedOption = option;
        }
    });

    // If no match, fallback to the first option
    if (!matchedOption && options.length > 0) {
        matchedOption = options[0];
    }

    if (matchedOption) {
        updateSelectedOption(matchedOption);
        // If URL had `data-sorted`, trigger request immediately
        if (sortedParam) {
            sendAjaxRequest(sortedParam);
        }
    }

    // -----------------------
    // Helper: Update selected item
    // -----------------------
    function updateSelectedOption(optionEl) {
        const value = optionEl.getAttribute('data-value');
        selectedText.textContent = optionEl.textContent.trim();
        options.forEach(opt => opt.classList.remove('selected-option'));
        optionEl.classList.add('selected-option');
        optionsContainer.classList.remove('show');
        selector.classList.remove('open');
    }

    // -----------------------
    // Helper: Update URL
    // -----------------------
    function updateURL(value) {
        const sortedDir = new URL(window.location.href);
        sortedDir.searchParams.set('data-sorted', value);
        history.pushState(null, '', sortedDir);
    }

    // -----------------------
    // AJAX Request
    // -----------------------
    function sendAjaxRequest(value) {
        let language = document.documentElement.lang || 'en';
        if (language === 'hy') language = 'am';

        const xhr = new XMLHttpRequest();
        let url = '/news-sort';
        let params = '';
        let query = new URLSearchParams(window.location.search).get('search') || '';
        const category = new URLSearchParams(window.location.search).get('category') || '';
        const isRotated = icon?.classList.contains('rotated');

        if (query) {
            params += `query=${encodeURIComponent(query)}&`;
        }

        if (category) {
            params += `data-type=category&data-value=${encodeURIComponent(category)}&`;
        }

        params += `data-sorted=${encodeURIComponent(value)}`;

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                const news = response.news;
                const pagination = response.pagination;

                document.querySelector('.pagination-box').innerHTML = pagination;
                const newsContainer = document.querySelector('.news-load-box');
                newsContainer.innerHTML = '';

                const count = response.count;
                let resultText = '';

                if (language === 'en') {
                    resultText = count === 1 ? '1 result' : `${count} results`;
                } else if (language === 'am') {
                    resultText = `${count} արդյունք`;
                } else {
                    resultText = count === 1 ? '1 resultaat' : `${count} resultaten`;
                }

                document.querySelector('.result-count').innerHTML = resultText;

                news.forEach(item => {
                    const displayDate = getDisplayDate(item.date, language);
                    const card = `
                        <a href="/news-details?id=${item.new_id}" class="card-styles">
<img src="${item.image && item.image.trim() ? item.image : '/public/images/empty-image.png'}" class="card-image" alt="News-image">

                            <div class="image-layer"></div>
                            <div class="card-headline">
                                <div class="info-box" style="background-color: rgba(203, 0, 0, 1)">
                                    <span>${item[`name-${language}`]}</span>
                                </div>
                            </div>
                            <div class="card-content-news">
                                <span>${item[`author-${language}`]} • ${displayDate}</span>
                                <h3>${item[`title-${language}`]}</h3>
                            </div>
                        </a>`;
                    newsContainer.innerHTML += card;
                });
            } else {
                console.error('Error in request:', xhr.statusText);
            }
        };

        xhr.send(params);
    }

    // -----------------------
    // Helpers for Dates
    // -----------------------
    function formatLocalizedDate(dateString, lang = 'en') {
        const date = new Date(dateString);

        const armenianMonths = [
            'հունվարի', 'փետրվարի', 'մարտի', 'ապրիլի', 'մայիսի', 'հունիսի',
            'հուլիսի', 'օգոստոսի', 'սեպտեմբերի', 'հոկտեմբերի', 'նոյեմբերի', 'դեկտեմբերի'
        ];

        if (lang === 'am') {
            const day = date.getDate();
            const month = armenianMonths[date.getMonth()];
            const year = date.getFullYear();
            return `${day} ${month} ${year}`;
        } else {
            const locales = {
                'en': 'en-US',
                'nl': 'nl-NL'
            };
            const locale = locales[lang] || 'en-US';
            const options = {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };
            return new Intl.DateTimeFormat(locale, options).format(date);
        }
    }

    function getDisplayDate(dateString, lang = 'en') {
        const date = new Date(dateString);
        const today = new Date();
        const yesterday = new Date();
        yesterday.setDate(today.getDate() - 1);

        const labels = {
            en: { today: 'Today', yesterday: 'Yesterday' },
            nl: { today: 'Vandaag', yesterday: 'Gisteren' },
            am: { today: 'Այսօր', yesterday: 'Երեկ' }
        };

        const label = labels[lang] || labels['en'];

        if (date.toDateString() === today.toDateString()) {
            return label.today;
        } else if (date.toDateString() === yesterday.toDateString()) {
            return label.yesterday;
        } else {
            return formatLocalizedDate(dateString, lang);
        }
    }
});

// news asc : desc

// custom select option and filter for news and category

// document.addEventListener("DOMContentLoaded", function () {
//     const selectedFilters = {}; // Store all selected filter values here
//
//     document.querySelectorAll('.custom-select').forEach(select => {
//         const selected = select.querySelector('.selected');
//         const options = select.querySelector('.options');
//         const optionItems = options.querySelectorAll('.option');
//         const selectArrow = select.querySelector('.selectArrow');
//
//         const isMultiSelect = select.classList.contains('category-selector-multiple');
//         const isCatalogSelect = select.classList.contains('catalog-sort');
//         const isNewsSelect = select.classList.contains('news-select');
//         const dataType = options.getAttribute('data-type');
//
//         const category = new URLSearchParams(window.location.search).get('category') || '';
//
//         const firstOption = optionItems[0];
//         if (firstOption) {
//             firstOption.classList.remove('selected-option');
//             selected.textContent = firstOption.textContent.trim();
//         }
//
//         const selectedOption = options.querySelector(`[data-value="${category}"]`);
//         if (selectedOption) {
//             selectedOption.classList.remove('selected-option');
//             selectedOption.classList.add('selected-option');
//             selected.textContent = selectedOption.textContent.trim();
//         }
//
//         if (isCatalogSelect) {
//             const params = new URLSearchParams(window.location.search);
//             const filterKeys = ['languages', 'genres', 'types'];
//
//             filterKeys.forEach(key => {
//                 const valueString = params.get(key); // e.g., "2" or "1,3"
//                 const valueArray = valueString ? valueString.split(',') : [];
//
//                 const optionsWrapper = document.querySelector(`.options[data-type="${key}"]`);
//                 if (!optionsWrapper) return;
//
//                 const optionItems = optionsWrapper.querySelectorAll('.option');
//                 const selectedDiv = optionsWrapper.closest('.category-selector').querySelector('.selected');
//
//                 // 🔄 Always clear all selected options first
//                 optionItems.forEach(opt => opt.classList.remove('selected-option'));
//
//                 // ✅ Handle types (single selection)
//                 if (key === 'types') {
//                     if (valueArray.length > 0) {
//                         document.querySelector("[data-type='types']").querySelectorAll(".option").forEach(item => {
//                             item.classList.remove("selected-option");
//                         })
//                         // Remove the first item (if any) and select the new value from the URL
//                         const selectedValue = valueArray[0]; // the single value from URL
//                         const selectedOption = optionsWrapper.querySelector(`.option[data-value="${selectedValue}"]`);
//
//                         // If we found a matching option, add the selected class
//                         if (selectedOption) {
//                             selectedOption.classList.add('selected-option');
//                             selectedDiv.textContent = selectedOption.textContent.trim();
//                         }
//                     }
//                 }
//
//                 // ✅ Handle languages and genres (multi-selection)
//                 else {
//                     const selectedLabels = [];
//
//                     optionItems.forEach(option => {
//                         const val = option.getAttribute('data-value');
//                         if (valueArray.includes(val)) {
//                             option.classList.add('selected-option');
//                             selectedLabels.push(option.textContent.trim());
//                         }
//                     });
//
//                     if (selectedLabels.length > 0) {
//                         selectedDiv.textContent = selectedLabels.join(', ');
//                     } else if (optionItems.length > 0) {
//                         // If no value is in URL, select the first option
//                         optionItems[0].classList.add('selected-option');
//                         selectedDiv.textContent = optionItems[0].textContent.trim();
//                     }
//                 }
//             });
//
//         }
//
//
//         // Toggle dropdown
//         select.addEventListener('click', () => {
//             select.classList.toggle('open');
//             selectArrow.classList.toggle('opened');
//         });
//
//         // Option click behavior
//         optionItems.forEach(option => {
//             option.addEventListener('click', (e) => {
//                 e.stopPropagation();
//
//                 if (isMultiSelect) {
//                     // Multi-select behavior (no AJAX request here)
//                     const selectedCount = options.querySelectorAll('.selected-option').length;
//                     if (option.classList.contains('selected-option') && selectedCount > 1) {
//                         option.classList.remove('selected-option');
//                     } else if (!option.classList.contains('selected-option')) {
//                         option.classList.add('selected-option');
//                     }
//
//                     // Collect selected values
//                     const selectedOptions = [...options.querySelectorAll('.selected-option')];
//                     const selectedValues = selectedOptions.map(opt => opt.getAttribute('data-value'));
//                     const selectedTexts = selectedOptions.map(opt => opt.textContent.trim());
//
//                     // Update display
//                     let displayText = selectedTexts.join(',');
//                     let lastText = displayText.length > 16 ? displayText.slice(0, 16) + ' ...' : displayText;
//                     selected.textContent = lastText || optionItems[0].textContent.trim();
//
//                     // Update filters and send request (only for multi-select)
//                     selectedFilters[dataType] = selectedValues;
//                     updateUrlParam(dataType, selectedValues.join(','));
//                 } else {
//                     // Single select behavior (send AJAX)
//                     optionItems.forEach(opt => opt.classList.remove('selected-option'));
//                     option.classList.add('selected-option');
//
//                     selected.textContent = option.childNodes[0].nodeValue.trim();
//                     select.classList.remove('open');
//
//                     const dataValue = option.getAttribute('data-value');
//                     selectedFilters[dataType] = [dataValue]; // Store single value as array for consistency
//                     updateUrlParam(dataType, dataValue);
//                     // Send AJAX for non-multi-select
//                 }
//
//                 if (isCatalogSelect) {
//                     sendAjaxRequest(selectedFilters, true); // Send all filters
//                 } else {
//                     sendAjaxRequest(selectedFilters, false);
//                 }
//             });
//         });
//
//         // Close dropdown when clicking outside
//         document.addEventListener('click', (e) => {
//             if (!select.contains(e.target)) {
//                 select.classList.remove('open');
//                 selectArrow.classList.remove('opened');
//             }
//         });
//     });
//
//     // Function to update the URL with a query parameter
//     function updateUrlParam(key, value) {
//         const url = new URL(window.location);
//         url.searchParams.set(key, value);
//         window.history.pushState({}, '', url);
//     }
//
//     // Function to send AJAX request with selected filters
//     function sendAjaxRequest(filters, isCatalogSelect) {
//         let language = document.documentElement.lang || 'en'; // Default to 'en' if not set
//
//         if (language === 'hy') {
//             language = 'am';
//         }
//
//         const xhr = new XMLHttpRequest();
//         let url = isCatalogSelect ? '/catalogs-sort' : '/news-sort';
//         let params = '';
//         let query = new URLSearchParams(window.location.search).get('search') || '';
//         let sort = new URLSearchParams(window.location.search).get('data-sorted') || '';
//
//         if (query) {
//             params += `query=${encodeURIComponent(query)}&`;
//         }
//
//         if (isCatalogSelect) {
//             params += Object.entries(filters).flatMap(([type, values]) =>
//                 values.map(val => `filters[${encodeURIComponent(type)}][]=${encodeURIComponent(val)}`)
//             ).join('&');
//         } else {
//             const type = Object.keys(filters)[0];
//             const value = filters[type][0];
//             params += `data-type=${encodeURIComponent(type)}&data-value=${encodeURIComponent(value)}&data-sorted=${encodeURIComponent(sort)}`;
//         }
//
//         xhr.open('POST', url, true);
//         xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//
//         xhr.onload = function () {
//             if (xhr.status === 200) {
//                 const response = JSON.parse(xhr.responseText);
//
//                 if (isCatalogSelect) {
//                     const catalogs = response.catalogs;
//                     const pagination = response.pagination;
//
//                     const inputs = document.querySelectorAll(".search-input");
//
//                     inputs.forEach(input => {
//                         let lang = document.documentElement.lang || 'nl'; // fallback to 'nl' if not set
//                         if (lang === 'hy') lang = 'am'; // normalize 'hy' to 'am'
//
//                         let placeholderText = '';
//
//                         if (lang === 'en') {
//                             placeholderText = `${response.count} results...`;
//                         } else if (lang === 'am') {
//                             placeholderText = `${response.count} արդյունք...`;
//                         } else {
//                             placeholderText = `${response.count} resultaten...`; // default to Dutch
//                         }
//
//                         input.placeholder = placeholderText;
//                     });
//
//
//                     document.querySelector('.catalog-pagination-box').innerHTML = pagination;
//                     const catalogsContainer = document.querySelector('.catalog-load-box');
//                     catalogsContainer.innerHTML = '';
//
//                     const translationMap = {
//                         nl: 'vertaling',
//                         en: 'translation',
//                         am: 'թարգմանություն'
//                         // Add more if needed
//                     };
//
//                     const noResultsMessages = {
//                         nl: '0 resultaat',
//                         en: '0 result',
//                         am: '0 Արդյունք'
//                     };
//
//                     const translationText = translationMap[language] || 'vertaling'; // fallback to Dutch
//
//
//                     if (catalogs.length === 0) {
//                         catalogsContainer.innerHTML = `<p class="no-results">${noResultsMessages[language]}</p>`;
//                     } else {
//                         catalogs.forEach(item => {
//                             const flagImg = item['language'] == 2
//                                 ? '<img src="/public/images/nd-flag.png" alt="Nederlands-flag" class="nederlands-flag">'
//                                 : '<img src="/public/images/armenian-flag.png" alt="Armenian-flag" class="nederlands-flag">';
//
//                             const card = `
// <a href="${item['link']}" class="catalog-card">
//     <div class="container-styles card-content-book">
//         <img src="/public/images/book-img.png" alt="book-image" class="book-image">
//         <div class="book-details-container">
//             <div class="container-styles">
//                 ${flagImg}
//                 <span class="catalog-translation-text">${item[`language-name-${language}`]} ${translationText}</span>
//             </div>
//             <h3 class="catalog-author">${item[`author-${language}`]} • ${item['year']}</h3>
//             <h3 class="catalog-name">${item[`title-${language}`]}</h3>
//             <span class="catalog-reading-type">${item[`type-name-${language}`]}</span>
//         </div>
//     </div>
// </a>
// `;
//                             catalogsContainer.innerHTML += card;
//                         });
//                     }
//                 } else {
//                     const news = response.news;
//                     const pagination = response.pagination;
//
//                     document.querySelector('.pagination-box').innerHTML = pagination;
//                     const newsContainer = document.querySelector('.news-load-box');
//                     newsContainer.innerHTML = '';
//
//                     const count = response.count;
//                     let resultText = '';
//
//                     if (language === 'en') {
//                         resultText = count === 1
//                             ? '1 result'
//                             : `${count} results`;
//                     } else if (language === 'am') {
//                         resultText = `${count} արդյունք`; // Armenian doesn't require plural change
//                     } else {
//                         resultText = count === 1
//                             ? '1 resultaat'
//                             : `${count} resultaten`; // Dutch
//                     }
//                     document.querySelector('.result-count').innerHTML = resultText;
//
//                     function formatLocalizedDate(dateString, lang = 'nl') {
//                         const date = new Date(dateString);
//
//                         // Custom Armenian months
//                         const armenianMonths = [
//                             'հունվարի', 'փետրվարի', 'մարտի', 'ապրիլի', 'մայիսի', 'հունիսի',
//                             'հուլիսի', 'օգոստոսի', 'սեպտեմբերի', 'հոկտեմբերի', 'նոյեմբերի', 'դեկտեմբերի'
//                         ];
//
//                         if (lang === 'am') {
//                             const day = date.getDate(); // No padStart — keeps 1-digit day
//                             const month = armenianMonths[date.getMonth()];
//                             const year = date.getFullYear();
//                             return `${day} ${month} ${year}`;
//                         } else {
//                             const locales = {
//                                 'en': 'en-US',
//                                 'nl': 'nl-NL'
//                             };
//
//                             const locale = locales[lang] || 'en-US';
//                             const options = {
//                                 day: 'numeric',
//                                 month: 'long',
//                                 year: 'numeric'
//                             };
//
//                             return new Intl.DateTimeFormat(locale, options).format(date);
//                         }
//                     }
//
//                     function getDisplayDate(dateString, lang = 'nl') {
//                         const date = new Date(dateString);
//                         const today = new Date();
//                         const yesterday = new Date();
//                         yesterday.setDate(today.getDate() - 1);
//
//                         const labels = {
//                             en: {today: 'Today', yesterday: 'Yesterday'},
//                             nl: {today: 'Vandaag', yesterday: 'Gisteren'},
//                             am: {today: 'Այսօր', yesterday: 'Երեկ'}
//                         };
//
//                         const label = labels[lang] || labels['en'];
//
//                         const isToday = date.toDateString() === today.toDateString();
//                         const isYesterday = date.toDateString() === yesterday.toDateString();
//
//                         if (isToday) {
//                             return label.today;
//                         } else if (isYesterday) {
//                             return label.yesterday;
//                         } else {
//                             return formatLocalizedDate(dateString, lang);
//                         }
//                     }
//
// // Loop through news items
//                     news.forEach(item => {
//                         const displayDate = getDisplayDate(item.date, language); // Use your global `language` variable
//
//                         const card = `
//         <a href="/news-details?id=${item.new_id}" class="card-styles">
//             <img src="${item.image}" class="card-image" alt="News-image">
//             <div class="image-layer"></div>
//             <div class="card-headline">
//                 <div class="info-box" style="background-color: rgba(203, 0, 0, 1)">
//                     <span>${item[`name-${language}`]}</span>
//                 </div>
//             </div>
//             <div class="card-content-news">
//                 <span>${item[`author-${language}`]} • ${displayDate}</span>
//                 <h3>${item[`title-${language}`]}</h3>
//             </div>
//         </a>
//
//
//     `;
//
//                         newsContainer.innerHTML += card;
//                     });
//
//                 }
//             } else {
//                 console.error('Error in request:', xhr.statusText);
//             }
//         };
//
//         xhr.send(params);
//     }
// });


document.addEventListener("DOMContentLoaded", function () {
    const selectedFilters = {}; // Store all selected filter values here

    document.querySelectorAll('.custom-select').forEach(select => {
        const selected = select.querySelector('.selected');
        const options = select.querySelector('.options');
        const optionItems = options.querySelectorAll('.option');
        const selectArrow = select.querySelector('.selectArrow');

        const isMultiSelect = select.classList.contains('category-selector-multiple');
        const isCatalogSelect = select.classList.contains('catalog-sort');
        const isNewsSelect = select.classList.contains('news-select');
        const dataType = options.getAttribute('data-type');

        const category = new URLSearchParams(window.location.search).get('category') || '';

        const firstOption = optionItems[0];
        if (category === '') {
            firstOption.classList.add('selected-option');
            selected.textContent = firstOption.textContent.trim();
        }

        const selectedOption = options.querySelector(`[data-value="${category}"]`);
        if (selectedOption) {
            selectedOption.classList.remove('selected-option');
            selectedOption.classList.add('selected-option');
            selected.textContent = selectedOption.textContent.trim();
        }

        if (isCatalogSelect) {
            const params = new URLSearchParams(window.location.search);
            const filterKeys = ['languages', 'genres', 'types'];

            filterKeys.forEach(key => {
                const value = params.get(key) || ''; // single value only

                const optionsWrapper = document.querySelector(`.options[data-type="${key}"]`);
                if (!optionsWrapper) return;

                const optionItems = optionsWrapper.querySelectorAll('.option');
                const selectedDiv = optionsWrapper.closest('.category-selector').querySelector('.selected');

                // 🔄 Clear all previous selections
                optionItems.forEach(opt => opt.classList.remove('selected-option'));

                let selectedOption = null;

                // ✅ Try to select the value from the URL
                if (value) {
                    selectedOption = optionsWrapper.querySelector(`.option[data-value="${value}"]`);
                }

                // ✅ If not found in URL or not matched, use the first option
                if (!selectedOption && optionItems.length > 0) {
                    selectedOption = optionItems[0];
                }

                // ✅ Apply selection and update display
                if (selectedOption) {
                    selectedOption.classList.add('selected-option');
                    selectedDiv.textContent = selectedOption.textContent.trim();
                }
            });
        }


        // Toggle dropdown
        select.addEventListener('click', () => {
            select.classList.toggle('open');
            selectArrow.classList.toggle('opened');
        });

        // Option click behavior
        optionItems.forEach(option => {
            option.addEventListener('click', (e) => {
                e.stopPropagation();


                // Single select behavior (send AJAX)
                optionItems.forEach(opt => opt.classList.remove('selected-option'));
                option.classList.add('selected-option');

                selected.textContent = option.childNodes[0].nodeValue.trim();
                select.classList.remove('open');

                const dataValue = option.getAttribute('data-value');
                selectedFilters[dataType] = [dataValue]; // Store single value as array for consistency
                updateUrlParam(dataType, dataValue);
                // Send AJAX for non-multi-select

                if (isCatalogSelect) {
                    sendAjaxRequest(selectedFilters, true); // Send all filters
                } else {
                    sendAjaxRequest(selectedFilters, false);
                }
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!select.contains(e.target)) {
                select.classList.remove('open');
                selectArrow.classList.remove('opened');
            }
        });
    });

    // Function to update the URL with a query parameter
    function updateUrlParam(key, value) {
        const url = new URL(window.location);
        url.searchParams.set(key, value);
        window.history.pushState({}, '', url);
    }

    // Function to send AJAX request with selected filters
    function sendAjaxRequest(filters, isCatalogSelect) {
        let language = document.documentElement.lang || 'en'; // Default to 'en' if not set

        if (language === 'hy') {
            language = 'am';
        }

        const xhr = new XMLHttpRequest();
        let url = isCatalogSelect ? '/catalogs-sort' : '/news-sort';
        let params = '';
        let query = new URLSearchParams(window.location.search).get('search') || '';
        let sort = new URLSearchParams(window.location.search).get('data-sorted') || '';

        if (query) {
            params += `query=${encodeURIComponent(query)}&`;
        }

        if (isCatalogSelect) {
            params += Object.entries(filters).flatMap(([type, values]) =>
                values.map(val => `filters[${encodeURIComponent(type)}][]=${encodeURIComponent(val)}`)
            ).join('&');
        } else {
            const type = Object.keys(filters)[0];
            const value = filters[type][0];
            params += `data-type=${encodeURIComponent(type)}&data-value=${encodeURIComponent(value)}&data-sorted=${encodeURIComponent(sort)}`;
        }

        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);

                if (isCatalogSelect) {
                    const catalogs = response.catalogs;
                    const pagination = response.pagination;

                    const inputs = document.querySelectorAll(".search-input");

                    const counts =  document.querySelectorAll('.result-count');


                    counts.forEach(count => {
                        let lang = document.documentElement.lang || 'nl'; // fallback to 'nl' if not set
                        if (lang === 'hy') lang = 'am'; // normalize 'hy' to 'am'

                        let placeholderText = '';

                        if (lang === 'en') {
                            placeholderText = `${response.count} results...`;
                        } else if (lang === 'am') {
                            placeholderText = `${response.count} արդյունք...`;
                        } else {
                            placeholderText = `${response.count} resultaten...`; // default to Dutch
                        }

                        count.innerHTML = placeholderText;
                    });


                    inputs.forEach(input => {
                        let lang = document.documentElement.lang || 'nl'; // fallback to 'nl' if not set
                        if (lang === 'hy') lang = 'am'; // normalize 'hy' to 'am'

                        let placeholderText = '';

                        if (lang === 'en') {
                            placeholderText = `${response.count} results...`;
                        } else if (lang === 'am') {
                            placeholderText = `${response.count} արդյունք...`;
                        } else {
                            placeholderText = `${response.count} resultaten...`; // default to Dutch
                        }

                        input.placeholder = placeholderText;
                    });


                    document.querySelector('.catalog-pagination-box').innerHTML = pagination;
                    const catalogsContainer = document.querySelector('.catalog-load-box');
                    catalogsContainer.innerHTML = ''

                    const noResultsMessages = {
                        nl: '0 resultaat',
                        en: '0 result',
                        am: '0 Արդյունք'
                    };

                    if (catalogs.length === 0) {
                        catalogsContainer.innerHTML = `<p class="no-results">${noResultsMessages[language]}</p>`;
                    } else {
                        catalogs.forEach(item => {
                            const flags = {
                                2: { src: '/public/images/nd-flag.png', alt: 'Nederlands-flag' },
                                3: { src: '/public/images/armenian-flag.png', alt: 'Armenian-flag' },
                                5: { src: '/public/images/usa-flag.png', alt: 'USA-flag' }
                            };

                            const flagData = flags[item['language']];

                            const flagImg = flagData
                                ? `<img src="${flagData.src}" alt="${flagData.alt}" class="nederlands-flag">`
                                : '';

                            const card = `
<a href="/catalog-details?id=${item['id']}" class="catalog-card">
    <div class="container-styles card-content-book">
<!--        <img src="${item['image']}" alt="book-image" class="book-image">-->
<img src="${item.image && item.image.trim() ? item.image : '/public/images/empty-image.png'}" alt="book-image" class="book-image">

        <div class="book-details-container">
            <div class="container-styles">
                ${flagImg}
                <span class="catalog-translation-text">${item[`language-name-${language}`]}</span>
            </div>
        
           
            <div class="catalog-author">
               <div class="author-part">
${item[`author-${language}`]}
</div>  • <div class="category-part">
                 ${item[`genre-name-${language}`]}
                  </div>
                                    </div>
            <h3 class="catalog-name">${item[`title-${language}`]}</h3>
            <span class="catalog-reading-type">${item[`type-name-${language}`]}</span>
        </div>
    </div>
</a>
`;
                            catalogsContainer.innerHTML += card;
                        });
                    }
                } else {
                    const news = response.news;
                    const pagination = response.pagination;

                    document.querySelector('.pagination-box').innerHTML = pagination;
                    const newsContainer = document.querySelector('.news-load-box');
                    newsContainer.innerHTML = '';

                    const count = response.count;
                    let resultText = '';

                    if (language === 'en') {
                        resultText = count === 1
                            ? '1 result'
                            : `${count} results`;
                    } else if (language === 'am') {
                        resultText = `${count} արդյունք`; // Armenian doesn't require plural change
                    } else {
                        resultText = count === 1
                            ? '1 resultaat'
                            : `${count} resultaten`; // Dutch
                    }
                    document.querySelector('.result-count').innerHTML = resultText;

                    function formatLocalizedDate(dateString, lang = 'nl') {
                        const date = new Date(dateString);

                        // Custom Armenian months
                        const armenianMonths = [
                            'հունվարի', 'փետրվարի', 'մարտի', 'ապրիլի', 'մայիսի', 'հունիսի',
                            'հուլիսի', 'օգոստոսի', 'սեպտեմբերի', 'հոկտեմբերի', 'նոյեմբերի', 'դեկտեմբերի'
                        ];

                        if (lang === 'am') {
                            const day = date.getDate(); // No padStart — keeps 1-digit day
                            const month = armenianMonths[date.getMonth()];
                            const year = date.getFullYear();
                            return `${day} ${month} ${year}`;
                        } else {
                            const locales = {
                                'en': 'en-US',
                                'nl': 'nl-NL'
                            };

                            const locale = locales[lang] || 'en-US';
                            const options = {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            };

                            return new Intl.DateTimeFormat(locale, options).format(date);
                        }
                    }

                    function getDisplayDate(dateString, lang = 'nl') {
                        const date = new Date(dateString);
                        const today = new Date();
                        const yesterday = new Date();
                        yesterday.setDate(today.getDate() - 1);

                        const labels = {
                            en: {today: 'Today', yesterday: 'Yesterday'},
                            nl: {today: 'Vandaag', yesterday: 'Gisteren'},
                            am: {today: 'Այսօր', yesterday: 'Երեկ'}
                        };

                        const label = labels[lang] || labels['en'];

                        const isToday = date.toDateString() === today.toDateString();
                        const isYesterday = date.toDateString() === yesterday.toDateString();

                        if (isToday) {
                            return label.today;
                        } else if (isYesterday) {
                            return label.yesterday;
                        } else {
                            return formatLocalizedDate(dateString, lang);
                        }
                    }

// Loop through news items
                    news.forEach(item => {
                        const displayDate = getDisplayDate(item.date, language); // Use your global `language` variable

                        const card = `
        <a href="/news-details?id=${item.new_id}" class="card-styles">
<!--            <img src="${item.image}" class="card-image" alt="News-image">-->
<img src="${item.image && item.image.trim() ? item.image : '/public/images/empty-image.png'}" class="card-image" alt="News-image">

            <div class="image-layer"></div>
            <div class="card-headline">
                <div class="info-box" style="background-color: rgba(203, 0, 0, 1)">
                    <span>${item[`name-${language}`]}</span>
                </div>
            </div>
            <div class="card-content-news">
                <span>${item[`author-${language}`]} • ${displayDate}</span>
                <h3>${item[`title-${language}`]}</h3>
            </div>
        </a>


    `;

                        newsContainer.innerHTML += card;
                    });

                }
            } else {
                console.error('Error in request:', xhr.statusText);
            }
        };

        xhr.send(params);
    }
});


// custom select option and filter for news and category

// catalog search
// document.addEventListener('DOMContentLoaded', function () {
//     const searchInputs = document.querySelectorAll('.catalog-search');
//     let lang = document.documentElement.lang || 'nl';
//     if (lang === 'hy') lang = 'am';
//
//     function handleSearch(searchInput) {
//         const query = searchInput.value.trim();
//
//         // Update URL
//         const newUrl = new URL(window.location.href);
//         if (query === '') {
//             newUrl.searchParams.delete('search');
//         } else {
//             newUrl.searchParams.set('search', query);
//         }
//         history.pushState(null, '', newUrl);
//
//         // Get filters from URL
//         const params = new URLSearchParams(window.location.search);
//         const selectedGenres = params.get('genres') ? params.get('genres').split(',').filter(Boolean) : [];
//         const selectedTypes = params.get('types') ? params.get('types').split(',').filter(Boolean) : [];
//         const selectedLanguages = params.get('languages') ? params.get('languages').split(',').filter(Boolean) : [];
//
//         const catalogsContainer = document.querySelector('.catalog-load-box');
//         catalogsContainer.innerHTML = '';
//
//         const loader = document.querySelector('.loader');
//         if (loader) loader.style.display = 'block';
//
//         // Prepare POST data
//         const bodyData = new URLSearchParams();
//         bodyData.append('query', query);
//         selectedGenres.forEach(val => bodyData.append('filters[genres][]', val));
//         selectedTypes.forEach(val => bodyData.append('filters[types][]', val));
//         selectedLanguages.forEach(val => bodyData.append('filters[languages][]', val));
//
//         // Send AJAX request
//         fetch('/search-catalogs', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/x-www-form-urlencoded'
//             },
//             body: bodyData.toString()
//         })
//             .then(response => response.text())
//             .then(data => {
//                 const parsedData = JSON.parse(data);
//                 const catalogs = parsedData.catalogs;
//                 const pagination = parsedData.pagination;
//
//                 if (catalogs && catalogs.length > 0) {
//                     document.querySelector('.catalog-pagination-box').innerHTML = pagination;
//                 } else {
//                     document.querySelector('.catalog-pagination-box').innerHTML = '';
//                 }
//
//                 const noResultsMessages = {
//                     nl: '0 resultaten',
//                     en: '0 results',
//                     am: '0 Արդյունքներ'
//                 };
//
//                 if (catalogs.length === 0) {
//                     catalogsContainer.innerHTML = `<p class="no-results">${noResultsMessages[lang]}</p>`;
//                 }
//
//                 catalogs.forEach(item => {
//                     const flagImg = item['language'] == 2
//                         ? '<img src="/public/images/nd-flag.png" alt="Nederlands-flag" class="nederlands-flag">'
//                         : '<img src="/public/images/armenian-flag.png" alt="Armenian-flag" class="nederlands-flag">';
//
//                     const card = `
//                         <a href="${item['link']}" class="catalog-card">
//                             <div class="container-styles card-content-book">
//                                 <img src="/public/images/book-img.png" alt="book-image" class="book-image">
//                                 <div class="book-details-container">
//                                     <div class="container-styles">
//                                         ${flagImg}
//                                         <span class="catalog-translation-text">${item[`language-name-${lang}`]}
//                                             ${lang === 'nl' ? 'vertaling' : (lang === 'en' ? 'Translation' : (lang === 'am' ? 'թարգմանություն' : ''))}
//                                         </span>
//                                     </div>
//                                     <h3 class="catalog-author">${item[`author-${lang}`]} • ${item['year']}</h3>
//                                     <h3 class="catalog-name">${item[`title-${lang}`]}</h3>
//                                     <span class="catalog-reading-type">${item[`type-name-${lang}`]}</span>
//                                 </div>
//                             </div>
//                         </a>`;
//                     catalogsContainer.innerHTML += card;
//                 });
//             })
//             .catch(error => {
//                 console.error('AJAX error:', error);
//             })
//             .finally(() => {
//                 if (loader) loader.style.display = 'none';
//             });
//     }
//
//     searchInputs.forEach(function (searchInput) {
//         // 🔥 Only trigger on Enter
//         searchInput.addEventListener('keydown', function (e) {
//             if (e.key === 'Enter') {
//                 e.preventDefault();
//                 handleSearch(searchInput);
//             }
//         });
//
//     });
// });


document.addEventListener('DOMContentLoaded', function () {
    const searchInputs = document.querySelectorAll('.catalog-search');
    let lang = document.documentElement.lang || 'nl';
    if (lang === 'hy') lang = 'am';

    let debounceTimeout;

    function handleSearch(searchInput) {
        const query = searchInput.value.trim();

        // Update URL
        const newUrl = new URL(window.location.href);
        if (query === '') {
            newUrl.searchParams.delete('search');
        } else {
            newUrl.searchParams.set('search', query);
        }
        history.pushState(null, '', newUrl);

        // Get filters from URL
        const params = new URLSearchParams(window.location.search);
        const selectedGenres = params.get('genres') ? params.get('genres').split(',').filter(Boolean) : [];
        const selectedTypes = params.get('types') ? params.get('types').split(',').filter(Boolean) : [];
        const selectedLanguages = params.get('languages') ? params.get('languages').split(',').filter(Boolean) : [];

        const catalogsContainer = document.querySelector('.catalog-load-box');
        catalogsContainer.innerHTML = '';

        const loader = document.querySelector('.loader');
        if (loader) loader.style.display = 'block';

        // Prepare POST data
        const bodyData = new URLSearchParams();
        bodyData.append('query', query);
        selectedGenres.forEach(val => bodyData.append('filters[genres][]', val));
        selectedTypes.forEach(val => bodyData.append('filters[types][]', val));
        selectedLanguages.forEach(val => bodyData.append('filters[languages][]', val));

        // Send AJAX request
        fetch('/search-catalogs', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: bodyData.toString()
        })
            .then(response => response.text())
            .then(data => {



                const parsedData = JSON.parse(data);

                const counts =  document.querySelectorAll('.result-count');


                counts.forEach(count => {
                    let lang = document.documentElement.lang || 'nl'; // fallback to 'nl' if not set
                    if (lang === 'hy') lang = 'am'; // normalize 'hy' to 'am'

                    let placeholderText = '';

                    if (lang === 'en') {
                        placeholderText = `${parsedData.count} results...`;
                    } else if (lang === 'am') {
                        placeholderText = `${parsedData.count} արդյունք...`;
                    } else {
                        placeholderText = `${parsedData.count} resultaten...`; // default to Dutch
                    }

                    count.innerHTML = placeholderText;
                });
                const catalogs = parsedData.catalogs;
                const pagination = parsedData.pagination;

                if (catalogs && catalogs.length > 0) {
                    document.querySelector('.catalog-pagination-box').innerHTML = pagination;
                } else {
                    document.querySelector('.catalog-pagination-box').innerHTML = '';
                }

                const noResultsMessages = {
                    nl: '0 resultaat',
                    en: '0 result',
                    am: '0 Արդյունք'
                };

                if (catalogs.length === 0) {
                    catalogsContainer.innerHTML = `<p class="no-results">${noResultsMessages[lang]}</p>`;
                }

                catalogs.forEach(item => {
                    const flags = {
                        2: { src: '/public/images/nd-flag.png', alt: 'Nederlands-flag' },
                        3: { src: '/public/images/armenian-flag.png', alt: 'Armenian-flag' },
                        5: { src: '/public/images/usa-flag.png', alt: 'USA-flag' }
                    };

                    const flagData = flags[item['language']];
                    const flagImg = flagData
                        ? `<img src="${flagData.src}" alt="${flagData.alt}" class="nederlands-flag">`
                        : '';

                    const card = `
                        <a href="/catalog-details?id=${item['id']}" class="catalog-card">
                            <div class="container-styles card-content-book">
<!--                                <img src="${item['image']}" alt="book-image" class="book-image">-->
<img src="${item.image && item.image.trim() ? item.image : '/public/images/empty-image.png'}" alt="book-image" class="book-image">
                                <div class="book-details-container">
                                    <div class="container-styles">
                                        ${flagImg}
                                        <span class="catalog-translation-text">
                                            ${item[`language-name-${lang}`]}  
                                        </span>
                                    </div>
                                           <div class="catalog-author">
               <div class="author-part">
${item[`author-${lang}`]}
</div>  • <div class="category-part">
                 ${item[`genre-name-${lang}`]}
                  </div>
                                    </div>
                                    <h3 class="catalog-name">${item[`title-${lang}`]}</h3>
                                    <span class="catalog-reading-type">${item[`type-name-${lang}`]}</span>
                                </div>
                            </div>
                        </a>`;
                    catalogsContainer.innerHTML += card;
                });
            })
            .catch(error => {
                console.error('AJAX error:', error);
            })
            .finally(() => {
                if (loader) loader.style.display = 'none';
            });
    }

    searchInputs.forEach(function (searchInput) {
        searchInput.addEventListener('input', function () {
            clearTimeout(debounceTimeout);
            debounceTimeout = setTimeout(() => {
                handleSearch(searchInput);
            }, 300); // delay in ms (adjust as needed)
        });
    });
});

// catalog search

// news search
// document.addEventListener('DOMContentLoaded', function () {
//     const searchInputs = document.querySelectorAll('.news-search');
//     let lang = document.documentElement.lang || 'nl';
//     if (lang === 'hy') lang = 'am';
//
//     searchInputs.forEach(searchInput => {
//         const container = searchInput.closest('.searchbar');
//
//         // Add active class on focus
//         searchInput.addEventListener('focus', () => {
//             if (container) container.classList.add('active');
//         });
//
//         // Remove active class on blur (only visual effect)
//         searchInput.addEventListener('blur', () => {
//             if (container) container.classList.remove('active');
//         });
//
//         // Trigger search ONLY on Enter key
//         searchInput.addEventListener('keydown', (event) => {
//             if (event.key === 'Enter') {
//                 event.preventDefault(); // avoid form submission
//                 const query = searchInput.value.trim();
//                 const category = new URLSearchParams(window.location.search).get('category') || '';
//                 const sort = new URLSearchParams(window.location.search).get('data-sorted') || '';
//
//                 const newUrl = new URL(window.location.href);
//                 if (query === '') {
//                     newUrl.searchParams.delete('search');
//                 } else {
//                     newUrl.searchParams.set('search', query);
//                 }
//                 history.pushState(null, '', newUrl);
//
//                 const loader = document.querySelector('.loader');
//                 if (loader) loader.style.display = 'block'; // Show loader
//
//                 let newsContainer = document.querySelector('.news-load-box');
//                 newsContainer.innerHTML = '';
//
//                 fetch('/search-news', {
//                     method: 'POST',
//                     headers: {
//                         'Content-Type': 'application/x-www-form-urlencoded'
//                     },
//                     body: 'query=' + encodeURIComponent(query) + '&category=' + encodeURIComponent(category) + '&data-sorted=' + encodeURIComponent(sort)
//                 })
//                     .then(response => response.text())
//                     .then(data => {
//                         let parsedData = JSON.parse(data);
//                         let news = parsedData.news;
//                         let pagination = parsedData.pagination;
//                         document.querySelector('.result-target-count').innerText = parsedData.count;
//
//                         function formatLocalizedDate(dateString, lang = 'nl') {
//                             const date = new Date(dateString);
//                             const armenianMonths = [
//                                 'հունվարի', 'փետրվարի', 'մարտի', 'ապրիլի', 'մայիսի', 'հունիսի',
//                                 'հուլիսի', 'օգոստոսի', 'սեպտեմբերի', 'հոկտեմբերի', 'նոյեմբերի', 'դեկտեմբերի'
//                             ];
//
//                             if (lang === 'am') {
//                                 const day = date.getDate();
//                                 const month = armenianMonths[date.getMonth()];
//                                 const year = date.getFullYear();
//                                 return `${day} ${month} ${year}`;
//                             } else {
//                                 const locales = {
//                                     'en': 'en-US',
//                                     'nl': 'nl-NL'
//                                 };
//                                 const locale = locales[lang] || 'en-US';
//                                 const options = {day: 'numeric', month: 'long', year: 'numeric'};
//                                 return new Intl.DateTimeFormat(locale, options).format(date);
//                             }
//                         }
//
//                         function getLocalizedRelativeDate(dateString, lang = 'nl') {
//                             const today = new Date();
//                             const yesterday = new Date();
//                             yesterday.setDate(today.getDate() - 1);
//                             const inputDate = new Date(dateString);
//
//                             const todayStr = today.toDateString();
//                             const yesterdayStr = yesterday.toDateString();
//                             const inputStr = inputDate.toDateString();
//
//                             const labels = {
//                                 en: {today: 'Today', yesterday: 'Yesterday'},
//                                 nl: {today: 'Vandaag', yesterday: 'Gisteren'},
//                                 am: {today: 'Այսօր', yesterday: 'Երեկ'}
//                             };
//                             const label = labels[lang] || labels['en'];
//
//                             if (inputStr === todayStr) return label.today;
//                             else if (inputStr === yesterdayStr) return label.yesterday;
//                             else return formatLocalizedDate(dateString, lang);
//                         }
//
//                         news.forEach(item => {
//                             const displayDate = getLocalizedRelativeDate(item.date, lang);
//                             const card = `
//                                 <a href="/news-details" class="card-styles">
//                                     <img src="${item.image}" class="card-image" alt="News-image">
//                                     <div class="image-layer"></div>
//                                     <div class="card-headline">
//                                         <div class="info-box" style="background-color: rgba(203, 0, 0, 1)">
//                                             <span>${item[`name-${lang}`]}</span>
//                                         </div>
//                                     </div>
//                                     <div class="card-content-news">
//                                         <span>${item[`author-${lang}`]} • ${displayDate}</span>
//                                         <h3>${item[`title-${lang}`]}</h3>
//                                     </div>
//                                 </a>
//                             `;
//                             newsContainer.innerHTML += card;
//                         });
//
//                         document.querySelector('.pagination-box').innerHTML = pagination;
//                     })
//                     .catch(error => {
//                         console.error('AJAX error:', error);
//                     })
//                     .finally(() => {
//                         if (loader) loader.style.display = 'none'; // Hide loader
//                     });
//             }
//         });
//     });
// });


document.addEventListener('DOMContentLoaded', function () {
    const searchInputs = document.querySelectorAll('.news-search');
    let lang = document.documentElement.lang || 'nl';
    if (lang === 'hy') lang = 'am';

    searchInputs.forEach(searchInput => {
        const container = searchInput.closest('.searchbar');

        // Add active class on focus
        searchInput.addEventListener('focus', () => {
            if (container) container.classList.add('active');
        });

        // Remove active class on blur
        searchInput.addEventListener('blur', () => {
            if (container) container.classList.remove('active');
        });

        // Debounce function
        let debounceTimer;
        searchInput.addEventListener('input', () => {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                const query = searchInput.value.trim();
                const category = new URLSearchParams(window.location.search).get('category') || '';
                const sort = new URLSearchParams(window.location.search).get('data-sorted') || '';

                const newUrl = new URL(window.location.href);
                if (query === '') {
                    newUrl.searchParams.delete('search');
                } else {
                    newUrl.searchParams.set('search', query);
                }
                history.replaceState(null, '', newUrl);

                const loader = document.querySelector('.loader');
                if (loader) loader.style.display = 'block';

                const newsContainer = document.querySelector('.news-load-box');
                newsContainer.innerHTML = '';

                fetch('/search-news', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'query=' + encodeURIComponent(query) + '&category=' + encodeURIComponent(category) + '&data-sorted=' + encodeURIComponent(sort)
                })
                    .then(response => response.text())
                    .then(data => {
                        const parsedData = JSON.parse(data);
                        const news = parsedData.news;
                        const pagination = parsedData.pagination;
                        // document.querySelector('.result-target-count').innerText = parsedData.count;

                        const count = parsedData.count;
                        let resultText = '';

                        if (lang === 'en') {
                            resultText = count === 1
                                ? '1 result'
                                : `${count} results`;
                        } else if (lang === 'am') {
                            resultText = `${count} արդյունք`; // Armenian doesn't require plural change
                        } else {
                            resultText = count === 1
                                ? '1 resultaat'
                                : `${count} resultaten`; // Dutch
                        }
                        document.querySelector('.result-count').innerHTML = resultText;


                        function formatLocalizedDate(dateString, lang = 'nl') {
                            const date = new Date(dateString);
                            const armenianMonths = [
                                'հունվարի', 'փետրվարի', 'մարտի', 'ապրիլի', 'մայիսի', 'հունիսի',
                                'հուլիսի', 'օգոստոսի', 'սեպտեմբերի', 'հոկտեմբերի', 'նոյեմբերի', 'դեկտեմբերի'
                            ];
                            if (lang === 'am') {
                                return `${date.getDate()} ${armenianMonths[date.getMonth()]} ${date.getFullYear()}`;
                            } else {
                                const locales = {'en': 'en-US', 'nl': 'nl-NL'};
                                return new Intl.DateTimeFormat(locales[lang] || 'en-US', {
                                    day: 'numeric',
                                    month: 'long',
                                    year: 'numeric'
                                }).format(date);
                            }
                        }

                        function getLocalizedRelativeDate(dateString, lang = 'nl') {
                            const today = new Date();
                            const yesterday = new Date();
                            yesterday.setDate(today.getDate() - 1);
                            const inputDate = new Date(dateString);

                            const todayStr = today.toDateString();
                            const yesterdayStr = yesterday.toDateString();
                            const inputStr = inputDate.toDateString();

                            const labels = {
                                en: {today: 'Today', yesterday: 'Yesterday'},
                                nl: {today: 'Vandaag', yesterday: 'Gisteren'},
                                am: {today: 'Այսօր', yesterday: 'Երեկ'}
                            };
                            const label = labels[lang] || labels['en'];

                            if (inputStr === todayStr) return label.today;
                            else if (inputStr === yesterdayStr) return label.yesterday;
                            else return formatLocalizedDate(dateString, lang);
                        }

                        news.forEach(item => {
                            const displayDate = getLocalizedRelativeDate(item.date, lang);
                            const card = `
                                <a href="/news-details" class="card-styles">
<img src="${item.image && item.image.trim() ? item.image : '/public/images/empty-image.png'}" class="card-image" alt="News-image">

                                    <div class="image-layer"></div>
                                    <div class="card-headline">
                                        <div class="info-box" style="background-color: rgba(203, 0, 0, 1)">
                                            <span>${item[`name-${lang}`]}</span>
                                        </div>
                                    </div>
                                    <div class="card-content-news">
                                        <span>${item[`author-${lang}`]} • ${displayDate}</span>
                                        <h3>${item[`title-${lang}`]}</h3>
                                    </div>
                                </a>
                            `;
                            newsContainer.innerHTML += card;
                        });

                        document.querySelector('.pagination-box').innerHTML = pagination;
                    })
                    .catch(error => {
                        console.error('AJAX error:', error);
                    })
                    .finally(() => {
                        if (loader) loader.style.display = 'none';
                    });
            }, 300); // wait 300ms after typing stops
        });
    });
});

// news search

// mobile filter show and hide
document.addEventListener('DOMContentLoaded', () => {
    let filterBtn = document.querySelector('.mobile-filter');
    let categoryBox = document.querySelector('.category-item-box');
    if (filterBtn) {
        filterBtn.addEventListener('click', () => {
            filterBtn.classList.toggle('blue');
            categoryBox.classList.toggle('mobile-filter-toggle');
        })
    }
});
// mobile filter show and hide

// mobile menu
document.addEventListener("DOMContentLoaded", function () {
    const menuIcon = document.querySelector('.burger-menu-icon');
    const menuContainer = document.querySelector('.mobile-menu-container');
    const menuContainerBox = document.querySelector('.mobile-menu-container-box');

    menuIcon.addEventListener('click', () => {
        const isOpening = !menuIcon.classList.contains('opened');

        if (isOpening) {
            // Opening
            menuIcon.classList.add('opened');
            menuIcon.classList.remove('closed');

            menuContainerBox.classList.add('displayed');
            setTimeout(() => {
                menuContainer.classList.add('showed');
            }, 50);
            document.body.style.overflow = 'hidden';
        } else {
            // Closing
            menuIcon.classList.remove('opened');
            menuIcon.classList.add('closed');

            menuContainer.classList.remove('showed');
            setTimeout(() => {
                menuContainerBox.classList.remove('displayed');
            }, 500);
            document.body.style.overflow = 'auto';
        }
    });
});
// mobile menu

// language dropdown
document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById('languageDropdown');
    const toggle = dropdown.querySelector('.dropdown-toggle');
    const menu = dropdown.querySelector('.dropdown-menu');
    const selected = document.getElementById('selectedLanguage');

    toggle.addEventListener('click', () => {
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    });

    menu.addEventListener('click', (e) => {
        if (e.target.closest('div')) {
            const selectedDiv = e.target.closest('div');
            const img = selectedDiv.querySelector('img').src;
            const text = selectedDiv.textContent.trim();
            selected.innerHTML = `<img src="${img}" alt="${text}">`;
            menu.style.display = 'none';
        }
    });

// Optional: close dropdown if clicking outside
    document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target)) {
            menu.style.display = 'none';
        }
    });
})
// language dropdown