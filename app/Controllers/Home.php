<?php

namespace App\Controllers;


class Home extends BaseController
{

    public function home(): string
    {
        $builderNews = $this->db->table('news')
            ->select('news.*, news-category.*, news.id as new_id')
            ->join('news-category', 'news-category.id = news.category', 'left')
            ->orderBy('news.id', 'DESC')
            ->where('status', 1)
            ->limit(1);
        $builderCatalog = $this->db->table('catalogs')
            ->select('
            catalogs.*,
            catalog-genre.name-en AS genre-name-en,
            catalog-genre.name-nl AS genre-name-nl,
            catalog-genre.name-am AS genre-name-am,
            catalog-languages.name-en AS language-name-en,
            catalog-languages.name-nl AS language-name-nl,
            catalog-languages.name-am AS language-name-am,
            catalog-type.name-en AS type-name-en,
            catalog-type.name-nl AS type-name-nl,
            catalog-type.name-am AS type-name-am
        ')
            ->join('catalog-genre', 'catalog-genre.id = catalogs.genre', 'left')
            ->join('catalog-languages', 'catalog-languages.id = catalogs.language', 'left')
            ->join('catalog-type', 'catalog-type.id = catalogs.type', 'left')
            ->orderBy('RAND()')
            ->limit(1);
        $builderAgenda = $this->db->table('agenda')
            ->select('agenda.*, agenda.id as agenda_id,
         months.name-en as month-name-en,
         months.name-nl as month-name-nl,
         months.name-am as month-name-am,
         agenda-category.name-en as category-name-en,
         agenda-category.name-nl as category-name-nl,
         agenda-category.name-am as category-name-am')
            ->join('months', 'months.id = agenda.month', 'left')
            ->join('agenda-category', 'agenda-category.id = agenda.category', 'left')
            ->orderBy('agenda.id', 'DESC')
            ->where('status', 1)
            ->limit(1);

        $builderText = $this->db->table('admin_text_control');

        $data['text'] = $builderText->get()->getRowArray();

        $data['news'] = $builderNews->get()->getRowArray();
        $data['catalogs'] = $builderCatalog->get()->getRowArray();
        $data['agenda'] = $builderAgenda->get()->getRowArray();

        $data['slug'] = 'index';
        $data['header'] = view('/includes/header', ['slug' => $data['slug']]);
        $data['footer'] = view('/includes/footer');
        return view('/pages/home', $data);
    }


    public function index(): string
    {
        $data['slug'] = 'index';
        $data['header'] = view('/includes/header', ['slug' => $data['slug']]);
        $data['footer'] = view('/includes/footer');
        return view('/pages/home', $data);
    }

    public function verhaal(): string
    {
        $data['slug'] = 'verhaal';
        $data['header'] = view('/includes/header', ['slug' => $data['slug']]);
        $data['footer'] = view('/includes/footer');
        return view('/pages/verhaal', $data);
    }


    public function news(): string
    {
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 6;
        $offset = ($page - 1) * $perPage;

        // Get category filter from GET
        $categoryFilter = $this->request->getGet('category');
        $sortFilter = !empty($this->request->getGet('data-sorted')) ? $this->request->getGet('data-sorted') : 'desc';

        $searchFilter = $this->request->getGet('search') ? urldecode($this->request->getGet('search')) : '';

        // Normalize and decide whether to apply filter
        $applyCategoryFilter = $categoryFilter !== null && $categoryFilter !== '' && $categoryFilter != 1;

        // Total count (filtered if needed)
        $countBuilder = $this->db->table('news')->where('status', 1);

        if ($applyCategoryFilter) {
            $countBuilder->where('status', 1)->where('category', $categoryFilter);
        }

        if ($sortFilter) {
            $countBuilder->orderBy('date', $sortFilter);
        }

        if (($searchFilter)) {
            // Check if the search filter contains Armenian or Latin-based characters
            $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $searchFilter);
            $isLatinSearch = preg_match('/[a-zA-Z]/', $searchFilter);

            // Start building the query
            $countBuilder->groupStart();

            // Apply filters based on the detected language
            if ($isArmenianSearch) {
                $countBuilder->orLike('title-am', $searchFilter); // Apply to Armenian column
            }

            if ($isLatinSearch) {
                $countBuilder->orLike('title-nl', $searchFilter); // Apply to Dutch column
                $countBuilder->orLike('title-en', $searchFilter); // Apply to English column
            }

            $countBuilder->groupEnd();
        }

        $totalItems = $countBuilder->countAllResults();

        // News query with pagination
        $builderNews = $this->db->table('news')
            ->select('news.*, news-category.*, news.id as new_id')
            ->join('news-category', 'news-category.id = news.category', 'left')
            ->where('status', 1)
            ->limit($perPage, $offset);

        if ($applyCategoryFilter) {
            $builderNews->where('news.category', $categoryFilter);
        }

        if ($sortFilter) {
            $builderNews->orderBy('date', $sortFilter);
        }

        if (!empty($searchFilter)) {
            // Check if the search filter contains Armenian or Latin-based characters
            $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $searchFilter);
            $isLatinSearch = preg_match('/[a-zA-Z]/', $searchFilter);

            // Start building the query
            $builderNews->groupStart();

            // Apply filters based on the detected language
            if ($isArmenianSearch) {
                $builderNews->orLike('title-am', $searchFilter); // Apply to Armenian column
            }

            if ($isLatinSearch) {
                $builderNews->orLike('title-nl', $searchFilter); // Apply to Dutch column
                $builderNews->orLike('title-en', $searchFilter); // Apply to English column
            }

            $builderNews->groupEnd();
        }

        // Get all categories
        $builderCategory = $this->db->table('news-category');

        // Prepare data
        $data['slug'] = 'news';
        $data['news'] = $builderNews->get()->getResultArray(); // Paginated news
        $data['categories'] = $builderCategory->get()->getResultArray();

        $data['header'] = view('/includes/header', ['slug' => $data['slug']]);
        $data['footer'] = view('/includes/footer');
        $data['count'] = $totalItems;
        $data['pagination'] = view('/includes/pagination', [
            'total' => $totalItems,
            'page' => $page,
            'perPage' => $perPage
        ]);

        return view('/pages/news', $data);
    }

    function NewsSortFunction()
    {
        $type = $this->request->getPost('data-type');
        $value = $this->request->getPost('data-value');
        $sorted = !empty($this->request->getPost('data-sorted')) ? $this->request->getPost('data-sorted') : 'desc';

        $text = $this->request->getPost('query');
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 6;
        $offset = ($page - 1) * $perPage;

        // ✅ Total count with filter
        $countBuilder = $this->db->table('news')->where('status', 1);
        if ($value && $value != 1) {
            $countBuilder->like('category', $value);
        }

        if (!empty($text)) {
            $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $text);
            $isLatinSearch = preg_match('/[a-zA-Z]/', $text);

            $countBuilder->groupStart();

            if ($isArmenianSearch) {
                $countBuilder->orLike('title-am', $text);
            }

            if ($isLatinSearch) {
                $countBuilder->orLike('title-en', $text)
                    ->orLike('title-nl', $text);
            }

            $countBuilder->groupEnd();
        }

        if ($sorted) {
            $countBuilder->orderBy('date', $sorted);
        }


        $totalItems = $countBuilder->countAllResults();

        // ✅ News query with filter and pagination
        $builderNews = $this->db->table('news')
            ->select('news.*, news-category.*, news.id as new_id')
            ->join('news-category', 'news-category.id = news.category', 'left')
            ->where('status', 1)
            ->limit($perPage, $offset);

        if ($value && $value != 1) {
            $builderNews->like('news.category', $value);
        }

        if ($sorted) {
            $builderNews->orderBy('date', $sorted);
        }

        if (!empty($text)) {
            $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $text);
            $isLatinSearch = preg_match('/[a-zA-Z]/', $text);

            $builderNews->groupStart();

            if ($isArmenianSearch) {
                $builderNews->orLike('title-am', $text);
            }

            if ($isLatinSearch) {
                $builderNews->orLike('title-en', $text)
                    ->orLike('title-nl', $text);
            }

            $builderNews->groupEnd();
        }


        $newsItems = $builderNews->get()->getResultArray();

        $paginationHTML = view('/includes/pagination', [
            'total' => $totalItems,
            'page' => $page,
            'perPage' => $perPage,
            'category' => $value,
            'sort' => $sorted,
            'search' => $text
        ]);

        return $this->response->setJSON([
            'news' => $newsItems,
            'count' => $totalItems,
            'pagination' => $paginationHTML
        ]);
    }

    public function news_details(): string
    {
        $id = $this->request->getGet('id');
        $builder = $this->db->table('news')
            ->select('news.*, news-category.*')
            ->join('news-category', 'news-category.id = news.category', 'left');
        $news = $builder->where('news.id', $id)->get()->getRowArray();
        $data = [];
        $data['slug'] = 'news_details';
        $data['news'] = $news; // Pass news data to view
        $data['header'] = view('/includes/header', ['slug' => $data['slug']]);
        $data['footer'] = view('/includes/footer');

        return view('/pages/news-details', $data);
    }


    public function catalogs(): string
    {
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 6;
        $offset = ($page - 1) * $perPage;

        // Parse filters from GET and explode into arrays
        $typesGet = $this->request->getGet('types');
        $typesFilter = !empty($typesGet) ? (is_array($typesGet) ? $typesGet : explode(',', $typesGet)) : [1];
        $languagesFilter = $this->request->getGet('languages') ? explode(',', $this->request->getGet('languages')) : [1];
        $genresFilter = $this->request->getGet('genres') ? explode(',', $this->request->getGet('genres')) : [1];
        $searchFilter = $this->request->getGet('search') ? urldecode($this->request->getGet('search')) : '';

        // Count query with filters
        $countBuilder = $this->db->table('catalogs');


        if (!empty($languagesFilter) && $languagesFilter[0] != 1) {
            $countBuilder->whereIn('language', $languagesFilter); // Use whereIn for array
        }
        if (!empty($genresFilter) && $genresFilter[0] != 1) {
            $countBuilder->whereIn('genre', $genresFilter); // Use whereIn for array
        }

        if (!empty($typesFilter) && $typesFilter[0] != 1) {
            $countBuilder->whereIn('type', $typesFilter); // Use whereIn for array
        }

        if (!empty($searchFilter)) {
            // Check if the search filter contains Armenian characters
            $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $searchFilter);

            // Check if the search filter contains Dutch (or Latin-based) characters
            $isDutchSearch = preg_match('/[a-zA-Z]/', $searchFilter);

            // Check if the search filter contains English characters (same regex as Dutch, since it's Latin-based)
            $isEnglishSearch = preg_match('/[a-zA-Z]/', $searchFilter);

            // Start building the query with search logic
            $countBuilder->groupStart();

            // Apply filters based on the detected language
            if ($isArmenianSearch) {
                $countBuilder->orLike('title-am', $searchFilter); // Apply to Armenian column
            }

            if ($isDutchSearch) {
                $countBuilder->orLike('title-nl', $searchFilter); // Apply to Dutch column
            }

            if ($isEnglishSearch) {
                $countBuilder->orLike('title-en', $searchFilter); // Apply to English column
            }

            $countBuilder->groupEnd();
        }

        $totalItems = $countBuilder->countAllResults();

        // Main query
        $builder = $this->db->table('catalogs')
            ->select('
        catalogs.*,
        catalog-genre.name-en AS genre-name-en,
        catalog-genre.name-nl AS genre-name-nl,
        catalog-genre.name-am AS genre-name-am,
        catalog-languages.name-en AS language-name-en,
        catalog-languages.name-nl AS language-name-nl,
        catalog-languages.name-am AS language-name-am,
        catalog-type.name-en AS type-name-en,
        catalog-type.name-nl AS type-name-nl,
        catalog-type.name-am AS type-name-am
    ')
            ->join('catalog-genre', 'catalog-genre.id = catalogs.genre', 'left')
            ->join('catalog-languages', 'catalog-languages.id = catalogs.language', 'left')
            ->join('catalog-type', 'catalog-type.id = catalogs.type', 'left')
            ->orderBy('catalogs.id', 'DESC')
            ->limit($perPage, $offset);

        // Apply the filters here


        if (!empty($languagesFilter) && $languagesFilter[0] != 1) {
            $builder->whereIn('language', $languagesFilter); // Fixed to use whereIn
        }
        if (!empty($genresFilter) && $genresFilter[0] != 1) {
            $builder->whereIn('genre', $genresFilter); // Fixed to use whereIn
        }

        if (!empty($typesFilter) && $typesFilter[0] != 1) {
            $builder->whereIn('type', $typesFilter); // Use whereIn for array
        }

        if (!empty($searchFilter)) {
            // Check if the search filter contains Armenian characters
            $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $searchFilter);

            // Check if the search filter contains Dutch (or Latin-based) characters
            $isDutchSearch = preg_match('/[a-zA-Z]/', $searchFilter);

            // Check if the search filter contains English characters (same regex as Dutch, since it's Latin-based)
            $isEnglishSearch = preg_match('/[a-zA-Z]/', $searchFilter);

            // Start building the query with search logic
            $builder->groupStart();

            if ($isArmenianSearch) {
                $builder->orLike('title-am', $searchFilter); // Apply to Armenian column
            }

            if ($isDutchSearch) {
                $builder->orLike('title-nl', $searchFilter); // Apply to Dutch column
            }

            if ($isEnglishSearch) {
                $builder->orLike('title-en', $searchFilter); // Apply to English column
            }

            $builder->groupEnd();
        }

        // Fetch data
        $data['catalogs'] = $builder->get()->getResultArray();
        $data['languages'] = $this->db->table('catalog-languages')->get()->getResultArray();
        $data['genres'] = $this->db->table('catalog-genre')->get()->getResultArray();
        $data['types'] = $this->db->table('catalog-type')->get()->getResultArray();

        // Page components
        $data['slug'] = 'catalogs';
        $data['header'] = view('/includes/header', ['slug' => $data['slug']]);
        $data['footer'] = view('/includes/footer');
        $data['count'] = $totalItems;
        $data['pagination'] = view('/includes/pagination2', [
            'total' => $totalItems,
            'page' => $page,
            'perPage' => $perPage
        ]);

        return view('/pages/catalogs', $data);
    }


    public function catalog_details(): string
    {
        $id = $this->request->getGet('id');
        $builder = $this->db->table('catalogs')
            ->select('
        catalogs.*,
        catalog-genre.name-en AS genre-name-en,
        catalog-genre.name-nl AS genre-name-nl,
        catalog-genre.name-am AS genre-name-am,
        catalog-languages.name-en AS language-name-en,
        catalog-languages.name-nl AS language-name-nl,
        catalog-languages.name-am AS language-name-am,
        catalog-type.name-en AS type-name-en,
        catalog-type.name-nl AS type-name-nl,
        catalog-type.name-am AS type-name-am')
            ->join('catalog-genre', 'catalog-genre.id = catalogs.genre', 'left')
            ->join('catalog-languages', 'catalog-languages.id = catalogs.language', 'left')
            ->join('catalog-type', 'catalog-type.id = catalogs.type', 'left');

        $catalogs = $builder->where('catalogs.id', $id)->get()->getRowArray();
        $data = [];
        $data['slug'] = 'catalog_details';
        $data['catalog'] = $catalogs; // Pass news data to view
        $data['header'] = view('/includes/header', ['slug' => $data['slug']]);
        $data['footer'] = view('/includes/footer');

        return view('/pages/catalog-details', $data);
    }


//    public function CatalogSortFunction()
//    {
//        $filters = $this->request->getPost('filters'); // Expecting filters['languages'], filters['genres'], filters['types']
//
//        $page = (int)($this->request->getGet('page') ?? 1);
//        $perPage = 6;
//        $offset = ($page - 1) * $perPage;
//
//        // Initialize query builders
//        $countBuilder = $this->db->table('catalogs');
//        $builderCatalogs = $this->db->table('catalogs')
//            ->select('
//            catalogs.*,
//            catalog-genre.name-en AS genre-name-en,
//            catalog-genre.name-nl AS genre-name-nl,
//            catalog-genre.name-am AS genre-name-am,
//            catalog-languages.name-en AS language-name-en,
//            catalog-languages.name-nl AS language-name-nl,
//            catalog-languages.name-am AS language-name-am,
//            catalog-type.name-en AS type-name-en,
//            catalog-type.name-nl AS type-name-nl,
//            catalog-type.name-am AS type-name-am
//        ')
//            ->join('catalog-genre', 'catalog-genre.id = catalogs.genre', 'left')
//            ->join('catalog-languages', 'catalog-languages.id = catalogs.language', 'left')
//            ->join('catalog-type', 'catalog-type.id = catalogs.type', 'left')
//            ->orderBy('catalogs.id', 'DESC')
//            ->limit($perPage, $offset);
//
//        $filters['languages'] = empty($filters['languages']) ? [1] : $filters['languages'];
//        $filters['genres'] = empty($filters['genres']) ? [1] : $filters['genres'];
//        $filters['types'] = empty($filters['types']) ? [1] : $filters['types'];
//        // Apply filters if provided
//        if (!empty($filters)) {
//            if (!empty($filters['languages'])) {
//                $countBuilder->whereIn('language', $filters['languages']);
//                $builderCatalogs->whereIn('catalogs.language', $filters['languages']);
//            }
//
//            if (!empty($filters['genres'])) {
//                $countBuilder->whereIn('genre', $filters['genres']);
//                $builderCatalogs->whereIn('catalogs.genre', $filters['genres']);
//            }
//
//            if (!empty($filters['types'])) {
//                $countBuilder->whereIn('type', $filters['types']);
//                $builderCatalogs->whereIn('catalogs.type', $filters['types']);
//            }
//        }
//
//        // Count filtered results
//        $totalItems = $countBuilder->countAllResults();
//
//        // Fetch filtered catalogs
//        $catalogItems = $builderCatalogs->get()->getResultArray();
//
//        // Generate pagination
//        $paginationHTML = view('/includes/pagination2', [
//            'total' => $totalItems,
//            'page' => $page,
//            'perPage' => $perPage,
//            'types' => $filters['types'] ?? [],
//            'languages' => $filters['languages'] ?? [],
//            'genres' => $filters['genres'] ?? []
//        ]);
//
//        // Return response
//        return $this->response->setJSON([
//            'catalogs' => $catalogItems,
//            'count' => $totalItems,
//            'pagination' => $paginationHTML
//        ]);
//    }


    public function CatalogSortFunction()
    {
        $filters = $this->request->getPost('filters');
        $page = (int)($this->request->getGet('page') ?? 1);
        $text = trim($this->request->getPost('query'));
        $perPage = 6;
        $offset = ($page - 1) * $perPage;

        // Initialize query builders
        $countBuilder = $this->db->table('catalogs');
        $builderCatalogs = $this->db->table('catalogs')
            ->select('
            catalogs.*,
            catalog-genre.name-en AS genre-name-en,
            catalog-genre.name-nl AS genre-name-nl,
            catalog-genre.name-am AS genre-name-am,
            catalog-languages.name-en AS language-name-en,
            catalog-languages.name-nl AS language-name-nl,
            catalog-languages.name-am AS language-name-am,
            catalog-type.name-en AS type-name-en,
            catalog-type.name-nl AS type-name-nl,
            catalog-type.name-am AS type-name-am
        ')
            ->join('catalog-genre', 'catalog-genre.id = catalogs.genre', 'left')
            ->join('catalog-languages', 'catalog-languages.id = catalogs.language', 'left')
            ->join('catalog-type', 'catalog-type.id = catalogs.type', 'left')
            ->orderBy('catalogs.id', 'ASC')
            ->limit($perPage, $offset);

        // Set default filters
        $filters['languages'] = empty($filters['languages']) ? [1] : $filters['languages'];
        $filters['genres'] = empty($filters['genres']) ? [1] : $filters['genres'];
        $filters['types'] = empty($filters['types']) ? [1] : $filters['types'];

        if (!empty($text)) {
            $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $text);
            $isLatinSearch = preg_match('/[a-zA-Z]/', $text);

            // Catalog title + category search
            $countBuilder->groupStart();
            $builderCatalogs->groupStart();

            if ($isArmenianSearch) {
                $countBuilder
                    ->like('title-am', $text);

                $builderCatalogs
                    ->like('title-am', $text);
            }

            if ($isLatinSearch) {
                $countBuilder
                    ->orLike('title-en', $text)
                    ->orLike('title-nl', $text);

                $builderCatalogs
                    ->orLike('title-en', $text)
                    ->orLike('title-nl', $text);
            }

            $countBuilder->groupEnd();
            $builderCatalogs->groupEnd();
        }

        // Apply filters

        if (!empty($filters['languages']) && $filters['languages'][0] != 1) {
            $countBuilder->whereIn('language', $filters['languages']);
            $builderCatalogs->whereIn('language', $filters['languages']);
        }
        if (!empty($filters['genres']) && $filters['genres'][0] != 1) {
            $countBuilder->whereIn('genre', $filters['genres']);
            $builderCatalogs->whereIn('genre', $filters['genres']);
        }

        if (!empty($filters['types']) && $filters['types'][0] != 1) {
            $countBuilder->whereIn('type', $filters['types']);
            $builderCatalogs->whereIn('type', $filters['types']);
        }


        // Count filtered results
        $totalItems = $countBuilder
            ->join('catalog-genre', 'catalog-genre.id = catalogs.genre', 'left')
            ->join('catalog-languages', 'catalog-languages.id = catalogs.language', 'left')
            ->join('catalog-type', 'catalog-type.id = catalogs.type', 'left')
            ->countAllResults();

        // Fetch filtered catalogs
        $catalogItems = $builderCatalogs->get()->getResultArray();

        // Generate pagination
        $paginationHTML = view('/includes/pagination2', [
            'total' => $totalItems,
            'page' => $page,
            'perPage' => $perPage,
            'search' => $text,
            'types' => $filters['types'] ?? [],
            'languages' => $filters['languages'] ?? [],
            'genres' => $filters['genres'] ?? []
        ]);

        // Return response
        return $this->response->setJSON([
            'catalogs' => $catalogItems,
            'count' => $totalItems,
            'pagination' => $paginationHTML
        ]);
    }



//    public function searchCatalogs()
//    {
//        $page = (int)($this->request->getGet('page') ?? 1);
//        $perPage = 6;
//        $offset = ($page - 1) * $perPage;
//        $text = trim($this->request->getPost('query')); // Trim and get search text
//        $filters = $this->request->getPost('filters'); // Expecting filters['languages'], filters['genres'], filters['types']
//
//
//
//        if (!empty($filters)) {
//            if (!empty($filters['languages'])) {
//                $countBuilder->whereIn('language', $filters['languages']);
//                $builderCatalogs->whereIn('catalogs.language', $filters['languages']);
//            }
//
//            if (!empty($filters['genres'])) {
//                $countBuilder->whereIn('genre', $filters['genres']);
//                $builderCatalogs->whereIn('catalogs.genre', $filters['genres']);
//            }
//
//            if (!empty($filters['types'])) {
//                $countBuilder->whereIn('type', $filters['types']);
//                $builderCatalogs->whereIn('catalogs.type', $filters['types']);
//            }
//        }
//
//
//        if (empty($text)) {
//            return $this->response->setJSON([
//                'news' => [],
//                'count' => 0,
//                'pagination' => ''
//            ]);
//        }
//        // Check if the search text contains Armenian characters
//        $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $text);
//
//        // Check if the search text contains Dutch or English characters (Latin characters)
//        $isLatinSearch = preg_match('/[a-zA-Z]/', $text);
//
//        // Total count query
//        $countBuilder = $this->db->table('catalogs');
//        $countBuilder->groupStart();
//
//        if ($isArmenianSearch) {
//            $countBuilder->orLike('title-am', $text); // Search Armenian column if text contains Armenian characters
//        }
//
//        if ($isLatinSearch) {
//            $countBuilder->orLike('title-en', $text); // Search English column if text contains Latin characters
//            $countBuilder->orLike('title-nl', $text); // Search Dutch column if text contains Latin characters
//        }
//
//        $countBuilder->groupEnd();
//        $totalItems = $countBuilder->countAllResults(false);
//
//        // Main query
//        $builder = $this->db->table('catalogs')
//            ->select('catalogs.*,
//            `catalog-genre`.`name-en` AS `genre-name-en`,
//            `catalog-genre`.`name-nl` AS `genre-name-nl`,
//            `catalog-genre`.`name-am` AS `genre-name-am`,
//            `catalog-languages`.`name-en` AS `language-name-en`,
//            `catalog-languages`.`name-nl` AS `language-name-nl`,
//            `catalog-languages`.`name-am` AS `language-name-am`,
//            `catalog-type`.`name-en` AS `type_name-en`,
//            `catalog-type`.`name-nl` AS `type-name-nl`,
//            `catalog-type`.`name-am` AS `type-name-am`')
//            ->join('`catalog-genre`', '`catalog-genre`.`id` = catalogs.genre', 'left')
//            ->join('`catalog-languages`', '`catalog-languages`.`id` = catalogs.language', 'left')
//            ->join('`catalog-type`', '`catalog-type`.`id` = catalogs.type', 'left')
//            ->orderBy('catalogs.id', 'DESC')
//            ->groupStart();
//
//        if ($isArmenianSearch) {
//            $builder->orLike('title-am', $text); // Search Armenian column if text contains Armenian characters
//        }
//
//        if ($isLatinSearch) {
//            $builder->orLike('title-en', $text); // Search English column if text contains Latin characters
//            $builder->orLike('title-nl', $text); // Search Dutch column if text contains Latin characters
//        }
//
//        $builder->groupEnd()
//            ->limit($perPage, $offset);
//
//        $result = $builder->get()->getResultArray();
//
//        $paginationHTML = view('/includes/pagination2', [
//            'total' => $totalItems,
//            'page' => $page,
//            'perPage' => $perPage,
//            'search' => $text
//        ]);
//
//        return $this->response->setJSON([
//            'catalogs' => $result,
//            'count' => $totalItems,
//            'pagination' => $paginationHTML
//        ]);
//    }

    public function searchCatalogs()
    {
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 6;
        $offset = ($page - 1) * $perPage;

        $text = trim($this->request->getPost('query') ?? '');
        $filters = $this->request->getPost('filters'); // ['languages' => [], 'genres' => [], 'types' => []]

        $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $text);
        $isLatinSearch = preg_match('/[a-zA-Z]/', $text);

        // Prepare reusable filtering logic
        $applyFilters = function ($builder) use ($filters, $text, $isArmenianSearch, $isLatinSearch) {

            if (!empty($text)) {
                $builder->groupStart();
                if ($isArmenianSearch) {
                    $builder->orLike('title-am', $text);
                }
                if ($isLatinSearch) {
                    $builder->orLike('title-en', $text);
                    $builder->orLike('title-nl', $text);
                }
                $builder->groupEnd();
            }

            if (!empty($filters['languages']) && $filters['languages'][0] != 1) {
                $builder->whereIn('language', $filters['languages']);
            }
            if (!empty($filters['genres']) && $filters['genres'][0] != 1) {
                $builder->whereIn('genre', $filters['genres']);
            }

            if (!empty($filters['types']) && $filters['types'][0] != 1) {
                $builder->whereIn('type', $filters['types']);
            }
//            if (!empty($filters['languages'])) {
//                $builder->whereIn('language', $filters['languages']);
//            }
//            if (!empty($filters['genres'])) {
//                $builder->whereIn('genre', $filters['genres']);
//            }
//            if (!empty($filters['types']) && $filters['types'][0] != 1) {
//                $builder->whereIn('type', $filters['types']);
//            }

        };

        // --- COUNT QUERY ---
        $countBuilder = $this->db->table('catalogs');
        $applyFilters($countBuilder);
        $totalItems = $countBuilder->countAllResults();

        // --- MAIN DATA QUERY ---
        $builder = $this->db->table('catalogs')
            ->select('catalogs.*,
            `catalog-genre`.`name-en` AS `genre-name-en`,
            `catalog-genre`.`name-nl` AS `genre-name-nl`,
            `catalog-genre`.`name-am` AS `genre-name-am`,
            `catalog-languages`.`name-en` AS `language-name-en`,
            `catalog-languages`.`name-nl` AS `language-name-nl`,
            `catalog-languages`.`name-am` AS `language-name-am`,
            `catalog-type`.`name-en` AS `type-name-en`,
            `catalog-type`.`name-nl` AS `type-name-nl`,
            `catalog-type`.`name-am` AS `type-name-am`')
            ->join('catalog-genre', 'catalog-genre.id = catalogs.genre', 'left')
            ->join('catalog-languages', 'catalog-languages.id = catalogs.language', 'left')
            ->join('catalog-type', 'catalog-type.id = catalogs.type', 'left')
            ->orderBy('catalogs.id', 'DESC')
            ->limit($perPage, $offset);

        $applyFilters($builder);
        $result = $builder->get()->getResultArray();

        $paginationHTML = view('/includes/pagination2', [
            'total' => $totalItems,
            'page' => $page,
            'perPage' => $perPage,
            'search' => $text,
            'types' => $filters['types'] ?? [],
            'languages' => $filters['languages'] ?? [],
            'genres' => $filters['genres'] ?? []
        ]);

        return $this->response->setJSON([
            'catalogs' => $result,
            'count' => $totalItems,
            'pagination' => $paginationHTML
        ]);
    }


//    public function searchAgenda()
//    {
//        $page = (int)($this->request->getGet('page') ?? 1);
//        $perPage = 6;
//        $offset = ($page - 1) * $perPage;
//        $text = trim($this->request->getPost('query')); // Trim and get search text
//
//        if (empty($text)) {
//            return $this->response->setJSON([
//                'agenda' => [],
//                'count' => 0,
//                'pagination' => ''
//            ]);
//        }
//
//        // Check if the search text contains Armenian characters
//        $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $text);
//
//        // Check if the search text contains Dutch or English characters (Latin characters)
//        $isLatinSearch = preg_match('/[a-zA-Z]/', $text);
//
//        // Total count query
//        $countBuilder = $this->db->table('agenda')->where('status', 1);
//        $countBuilder->groupStart();
//
//        if ($isArmenianSearch) {
//            $countBuilder->orLike('title-am', $text); // Search Armenian column if text contains Armenian characters
//        }
//
//        if ($isLatinSearch) {
//            $countBuilder->orLike('title-en', $text); // Search English column if text contains Latin characters
//            $countBuilder->orLike('title-nl', $text); // Search Dutch column if text contains Latin characters
//        }
//
//        $countBuilder->groupEnd();
//        $totalItems = $countBuilder->countAllResults(false);
//
//        // Main query
//        $builder = $this->db->table('agenda')
//            ->select('agenda.*, agenda.id as agenda_id,
//            months.name-en as month-name-en,
//            months.name-nl as month-name-nl,
//            months.name-am as month-name-am,
//            agenda-category.name-en as category-name-en,
//            agenda-category.name-nl as category-name-nl,
//            agenda-category.name-am as category-name-am')
//            ->join('months', 'months.id = agenda.month', 'left')
//            ->join('agenda-category', 'agenda-category.id = agenda.category', 'left')
//            ->orderBy('months.id', 'ASC')
//            ->orderBy('agenda.date', 'DESC')
//            ->where('status', 1)
//            ->groupStart();
//
//        if ($isArmenianSearch) {
//            $builder->orLike('title-am', $text); // Search Armenian column if text contains Armenian characters
//        }
//
//        if ($isLatinSearch) {
//            $builder->orLike('title-en', $text); // Search English column if text contains Latin characters
//            $builder->orLike('title-nl', $text); // Search Dutch column if text contains Latin characters
//        }
//
//        $builder->groupEnd()
//            ->limit($perPage, $offset);
//
//        $result = $builder->get()->getResultArray();
//
//        return $this->response->setJSON([
//            'agenda' => $result,
//            'count' => $totalItems,
//        ]);
//    }


    public function searchAgenda()
    {
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 6;
        $offset = ($page - 1) * $perPage;
        $text = trim($this->request->getPost('query')); // Trim and get search text

        // Check if the search text contains Armenian characters
        $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $text);

        // Check if the search text contains Dutch or English characters (Latin characters)
        $isLatinSearch = preg_match('/[a-zA-Z]/', $text);

        // Total count query
        $countBuilder = $this->db->table('agenda')->where('status', 1);

        if (!empty($text)) {
            $countBuilder->groupStart();

            if ($isArmenianSearch) {
                $countBuilder->orLike('title-am', $text);
            }

            if ($isLatinSearch) {
                $countBuilder->orLike('title-en', $text);
                $countBuilder->orLike('title-nl', $text);
            }

            $countBuilder->groupEnd();
        }

        $totalItems = $countBuilder->countAllResults(false);

        // Main query
        $builder = $this->db->table('agenda')
            ->select('agenda.*, agenda.id as agenda_id, 
            months.name-en as month-name-en,
            months.name-nl as month-name-nl,
            months.name-am as month-name-am,
            agenda-category.name-en as category-name-en,
            agenda-category.name-nl as category-name-nl,
            agenda-category.name-am as category-name-am')
            ->join('months', 'months.id = agenda.month', 'left')
            ->join('agenda-category', 'agenda-category.id = agenda.category', 'left')
            ->orderBy('months.id', 'ASC')
            ->orderBy('agenda.date', 'DESC')
            ->where('status', 1);

        if (!empty($text)) {
            $builder->groupStart();

            if ($isArmenianSearch) {
                $builder->orLike('title-am', $text);
            }

            if ($isLatinSearch) {
                $builder->orLike('title-en', $text);
                $builder->orLike('title-nl', $text);
            }

            $builder->groupEnd();
        }

        $builder->limit($perPage, $offset);

        $result = $builder->get()->getResultArray();

        return $this->response->setJSON([
            'agenda' => $result,
            'count' => $totalItems,
        ]);
    }



//    public function searchNews()
//    {
//        // Get the current page number from the request, default to 1 if not provided
//        $page = (int)($this->request->getGet('page') ?? 1);
//        $perPage = 6; // Set the number of items per page
//        $offset = ($page - 1) * $perPage; // Calculate the offset for pagination
//        $text = trim($this->request->getPost('query')); // Trim and get search text
//        $category = trim($this->request->getPost('category')); // Trim and get search text
//
//        if (empty($text)) {
//            return $this->response->setJSON([
//                'news' => [],
//                'count' => 0,
//                'pagination' => ''
//            ]);
//        }
//
//        // Check if the search text contains Armenian characters
//        $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $text);
//
//        // Check if the search text contains Latin (English/Dutch) characters
//        $isLatinSearch = preg_match('/[a-zA-Z]/', $text);
//
//        // Count query to get total results (pagination count)
//        $countBuilder = $this->db->table('news');
//        $countBuilder->join('news-category', 'news-category.id = news.category', 'left');
//        $countBuilder->groupStart();
//
//        // Apply filters based on detected language
//        if ($isArmenianSearch) {
//            $countBuilder->orLike('title-am', $text); // Search in Armenian title column
//        }
//
//        if ($isLatinSearch) {
//            $countBuilder->orLike('title-en', $text); // Search in English title column
//            $countBuilder->orLike('title-nl', $text); // Search in Dutch title column
//        }
//
//        $countBuilder->groupEnd();
//        $totalItems = $countBuilder->countAllResults(); // Get the total number of results
//
//        // Main query to fetch results for the current page
//        $builder = $this->db->table('news')
//            ->select('news.*, news-category.*, news.id as new_id')
//            ->join('news-category', 'news-category.id = news.category', 'left')
//            ->orderBy('news.id', 'DESC')
//            ->groupStart();
//
//        // Apply filters based on detected language for the main query
//        if ($isArmenianSearch) {
//            $builder->orLike('title-am', $text); // Search in Armenian title column
//        }
//
//        if ($isLatinSearch) {
//            $builder->orLike('title-en', $text); // Search in English title column
//            $builder->orLike('title-nl', $text); // Search in Dutch title column
//        }
//
//        $builder->groupEnd()
//            ->limit($perPage, $offset); // Limit results based on pagination
//
//        $result = $builder->get()->getResultArray(); // Fetch the search results
//
//        // Generate the pagination HTML view
//        $paginationHTML = view('/includes/pagination', [
//            'total' => $totalItems,
//            'page' => $page,
//            'perPage' => $perPage,
//            'search' => $text
//        ]);
//
//        // Return the search results, total count, and pagination HTML as a JSON response
//        return $this->response->setJSON([
//            'news' => $result,
//            'count' => $totalItems,
//            'pagination' => $paginationHTML
//        ]);
//    }


    public function searchNews()
    {
        // Get the current page number from the request, default to 1 if not provided
        $page = (int)($this->request->getGet('page') ?? 1);
        $perPage = 6; // Set the number of items per page
        $offset = ($page - 1) * $perPage; // Calculate the offset for pagination

        $text = trim($this->request->getPost('query')); // Trim and get search text
        $category = trim($this->request->getPost('category')); // Trim and get selected category

        $sorted = !empty($this->request->getPost('data-sorted')) ? $this->request->getPost('data-sorted') : 'desc';

        // Count query to get total results (for pagination)
        $countBuilder = $this->db->table('news');
        $countBuilder->join('news-category', 'news-category.id = news.category', 'left');

        // Always filter by category if provided
        if (!empty($category) && $category != 1) {
            $countBuilder->where('news.category', $category);
        }

        if (!empty($sorted)) {
            $countBuilder->orderBy('news.date', $sorted);
        }

        // Apply search text filters only if provided
        if (!empty($text)) {
            $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $text);
            $isLatinSearch = preg_match('/[a-zA-Z]/', $text);

            $countBuilder->groupStart();

            if ($isArmenianSearch) {
                $countBuilder->orLike('title-am', $text);
            }

            if ($isLatinSearch) {
                $countBuilder->orLike('title-en', $text)
                    ->orLike('title-nl', $text);
            }

            $countBuilder->groupEnd();
        }

        $totalItems = $countBuilder->countAllResults(); // Get total number of matching items

        // Main query to fetch current page results
        $builder = $this->db->table('news')
            ->select('news.*, news-category.*, news.id as new_id')
            ->join('news-category', 'news-category.id = news.category', 'left')
            ->limit($perPage, $offset);

        // Filter by category if set
        if (!empty($category) && $category != 1) {
            $builder->where('news.category', $category);
        }

        if (!empty($sorted)) {
            $builder->orderBy('news.date', $sorted);
        }

        // Apply search filters if text exists
        if (!empty($text)) {
            $isArmenianSearch = preg_match('/[\x{0530}-\x{058F}]/u', $text);
            $isLatinSearch = preg_match('/[a-zA-Z]/', $text);

            $builder->groupStart();

            if ($isArmenianSearch) {
                $builder->orLike('title-am', $text);
            }

            if ($isLatinSearch) {
                $builder->orLike('title-en', $text)
                    ->orLike('title-nl', $text);
            }

            $builder->groupEnd();
        }

        $result = $builder->get()->getResultArray(); // Fetch the search results

        // Generate the pagination HTML
        $paginationHTML = view('/includes/pagination', [
            'total' => $totalItems,
            'page' => $page,
            'perPage' => $perPage,
            'search' => $text,
            'category' => $category,
            'sort' => $sorted
        ]);

        // Return JSON response
        return $this->response->setJSON([
            'news' => $result,
            'count' => $totalItems,
            'pagination' => $paginationHTML
        ]);
    }


    public function agenda(): string
    {
        // Fetch data
        $builder = $this->db->table('agenda')
            ->select('agenda.*, agenda.id as agenda_id,
            months.name-en as month-name-en,
            months.name-nl as month-name-nl,
            months.name-am as month-name-am,
            agenda-category.name-en as category-name-en,
            agenda-category.name-nl as category-name-nl,
            agenda-category.name-am as category-name-am')
            ->join('months', 'months.id = agenda.month', 'left')
            ->join('agenda-category', 'agenda-category.id = agenda.category', 'left')
            ->where('agenda.status', 1);

        $data['agendas'] = $builder
            ->orderBy('months.id', 'ASC')
            ->orderBy('agenda.date', 'DESC')
            ->get()
            ->getResultArray();

        // Build a separate count query
        $countBuilder = $this->db->table('agenda')
            ->join('months', 'months.id = agenda.month', 'left')
            ->join('agenda-category', 'agenda-category.id = agenda.category', 'left')
            ->where('agenda.status', 1);

        $data['count'] = $countBuilder->countAllResults();

        // View data
        $data['slug'] = 'agenda';
        $data['header'] = view('/includes/header', ['slug' => $data['slug']]);
        $data['footer'] = view('/includes/footer');

        return view('/pages/agenda', $data);
    }

    public function agenda_details(): string
    {
        $id = $this->request->getGet('id');
        $builder = $this->db->table('agenda')
            ->select('agenda.*, agenda-category.*')
            ->join('agenda-category', 'agenda-category.id = agenda.category', 'left');
        $agenda = $builder->where('agenda.id', $id)->get()->getRowArray();
        $data = [];
        $data['agenda'] = $agenda; // Pass news data to view
        $data['slug'] = 'agenda_details';
        $data['header'] = view('/includes/header', ['slug' => $data['slug']]);
        $data['footer'] = view('/includes/footer');
        return view('/pages/agenda-details', $data);
    }

    public function contact(): string
    {
        $data['slug'] = 'contact';
        $data['header'] = view('/includes/header', ['slug' => $data['slug']]);
        $data['footer'] = view('/includes/footer');
        return view('/pages/contact', $data);
    }


    public function excelToDb()
    {

    }

}
