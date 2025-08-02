<?php
// Capture the 'category' value from the query string
$category = isset($category) ? $category : $_GET['category'] ?? ''; // Get the category or set an empty string if not available
$sort = isset($sort) ? $sort : $_GET['data-sorted'] ?? ''; // Get the category or set an empty string if not available
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Get the page value, default to 1 if not set
$perPage = (int)($perPage ?? 6); // default to 6 if not set
$total = (int)($total ?? 1); // ensure $total is defined
$search = isset($search) ? $search : ($_GET['search'] ?? ''); // Capture search value
$totalPages = ceil($total / $perPage);
$currentPage = max(1, (int)$page);

?>

<div class="pagination">
    <!-- Prev Arrow -->
    <?php if ($total >= 1) : ?>
            <a href="?page=<?= $currentPage - 1 ?>&category=<?= urlencode($category) ?>&search=<?= urlencode($search) ?>&data-sorted=<?= urlencode($sort) ?>" class="arrow-prev <?= $currentPage <= 1 ? 'pagination-disabled' : '' ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="10" viewBox="0 0 16 10" fill="none">
                    <path d="M15 5L1 5M1 5L5 1M1 5L5 9" stroke="white" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </a>
    <?php endif ?>

    <!-- Page Numbers -->
    <?php
    $showEllipsis = function () {
        echo '<div class="pagination-split"><img src="/public/icons/pagination-split.svg" alt="..."></div>';
    };

    $pageLink = function ($i) use ($currentPage, $category, $search, $sort) {
        $active = $i == $currentPage ? 'active' : '';
        echo "<a href='?page=$i&category=" . urlencode($category) . "&search=" . urlencode($search) . "&data-sorted=" . urlencode($sort) . "' class='pagination-number $active'>$i</a>";
    };


    if ($totalPages <= 4) {
        for ($i = 1; $i <= $totalPages; $i++) $pageLink($i);
    } else {
        // Always show pages 1, 2, 3
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
    <?php if ($total >= 1) : ?>

            <a href="?page=<?= $currentPage + 1 ?>&category=<?= urlencode($category) ?>&search=<?= urlencode($search) ?>&data-sorted=<?= urlencode($sort) ?>" class="arrow-next <?= $currentPage >= $totalPages ? 'pagination-disabled' : '' ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="10" viewBox="0 0 16 10" fill="none">
                    <path d="M1 5H15M15 5L11 9M15 5L11 1" stroke="white" stroke-width="2" stroke-linecap="round"
                          stroke-linejoin="round"/>
                </svg>
            </a>

    <?php endif ?>
</div>


