<?php
// Capture query parameters with safe defaults
$languages = isset($languages) ? $languages : ($_GET['languages'] ?? []);
$types = isset($types) ? $types : ($_GET['types'] ?? []);
$genres = isset($genres) ? $genres : ($_GET['genres'] ?? []);
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = (int) ($perPage ?? 6);
$total = (int) ($total ?? 1);
$search = isset($search) ? $search : ($_GET['search'] ?? '');
$genres = isset($genres) ? implode(',', (array) $genres) : '';
$languages = isset($languages) ? implode(',', (array) $languages) : '';

$totalPages = ceil($total / $perPage);
$currentPage = max(1, (int) $page);

// Build query string for filters
$queryParams = [
    'languages' => $languages,
    'types' => $types,
    'genres' => $genres
];
if (!empty($search)) {
    $queryParams['search'] = $search;
}
$filterQuery = http_build_query($queryParams);
?>

<div class="pagination">
    <!-- Prev Arrow -->
    <?php if ($total >= 1): ?>
            <a href="?page=<?= $currentPage - 1 ?>&<?= $filterQuery ?>" class="arrow-prev <?= $currentPage <= 1 ? 'pagination-disabled' : '' ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="10" viewBox="0 0 16 10" fill="none">
                    <path d="M15 5L1 5M1 5L5 1M1 5L5 9" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
    <?php endif; ?>

    <!-- Page Numbers -->
    <?php
    $showEllipsis = function () {
        echo '<div class="pagination-split"><img src="/public/icons/pagination-split.svg" alt="..."></div>';
    };

    $pageLink = function ($i) use ($currentPage, $filterQuery) {
        $active = $i == $currentPage ? 'active' : '';
        echo "<a href='?page=$i&$filterQuery' class='pagination-number $active'>$i</a>";
    };

    if ($totalPages <= 4) {
        for ($i = 1; $i <= $totalPages; $i++) $pageLink($i);
    } else {
        $pageLink(1);
        if ($totalPages >= 2) $pageLink(2);
        if ($totalPages >= 3) $pageLink(3);

        if ($totalPages > 4) {
            $showEllipsis();
            $pageLink($totalPages);
        }
    }
    ?>

    <!-- Next Arrow -->
    <?php if ($total >= 1): ?>
            <a href="?page=<?= $currentPage + 1 ?>&<?= $filterQuery ?>" class="arrow-next <?= $currentPage >= $totalPages ? 'pagination-disabled' : '' ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="10" viewBox="0 0 16 10" fill="none">
                    <path d="M1 5H15M15 5L11 9M15 5L11 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
    <?php endif; ?>
</div>
