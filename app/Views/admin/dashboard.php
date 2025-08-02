<?=$header?>

<style>

    .dashboard {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .card-container {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .card {
        background-color: black;
        color: white;
        padding: 20px;
        border-radius: 10px;
        width: 200px;
        text-align: center;
        transition: transform 0.3s;
        text-decoration: none;
    }

    .card-link {
        color: white;
        text-decoration: none;
    }

    .card-title {
        font-size: 18px;
        color: white;
    }

    .card:hover {
        transform: translateY(-5px);
    }



</style>

<div class="dashboard">
    <div class="card-container">
        <div class="card" data-page="merch_list">
            <a href="/admin/merch_list" class="card-link">
                <span class="card-title">Merch</span>
            </a>
        </div>
        <div class="card" data-page="awards_list">
            <a href="/admin/awards_list" class="card-link">
                <span class="card-title">Awards and Media</span>
            </a>
        </div>
        <div class="card" data-page="projects_list">
            <a href="/admin/projects_list" class="card-link">
                <span class="card-title">Projects</span>
            </a>
        </div>
        <div class="card" data-page="gallery">
            <a href="/admin/gallery" class="card-link">
                <span class="card-title">Gallery</span>
            </a>
        </div>
    </div>
</div>


<?=$footer?>



