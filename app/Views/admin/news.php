<?= $header ?>


<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10"
     id="kt_app_main">
    <div class="card py-lg-15 px-lg-15 min-w-100">

        <h1 class="mb-5">Nieuws artikelen</h1>

        <div class="d-flex flex-stack flex-wrap mb-5">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <input type="text" data-kt-docs-table-filter="search"
                       class="form-control form-control-solid w-250px ps-15" placeholder="Zoek artikel">
            </div>
            <!--end::Search-->
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                <!--begin::Add customer-->
                <a href="/admin/admin-news-add" class="btn" style="background: rgba(65, 29, 11, 1); color: white"
                   data-bs-toggle="tooltip"
                   data-bs-original-title="Add News" data-kt-initialized="1">
                    <i class="ki-duotone ki-plus fs-2 text-white"></i> Voeg toe
                </a>
                <!--end::Add customer-->
            </div>
            <!--end::Toolbar-->
        </div>
        <div class="table-responsive">
            <div id="kt_datatable_zero_configuration_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table id="kt_datatable_zero_configuration"
                           class="table table-row-bordered gy-5 dataTable no-footer"
                           aria-describedby="kt_datatable_zero_configuration_info">
                        <thead>
                        <tr class="fw-bold fs-6 text-gray-800 px-7">
                            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
                                rowspan="1" colspan="1" aria-label="Small Image: activate to sort column ascending"
                                style="width: 181.797px;">Title Nl
                            </th>
                            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
                                rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending"
                                style="width: 181.797px;">Afbeelding
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
                                rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending"
                                style="width: 151.812px;">Description Nl
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
                                rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending"
                                style="width: 151.812px;">Omschrijving Nl
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
                                rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending"
                                style="width: 151.812px;">Status
                            </th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
                                rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
                                style="width: 151.922px;">Actie
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($news as $new) { ?>
                            <tr class="even">
                                <td class="sorting_1">
                                    <?= $new['title-nl'] ?>
                                </td>
                                <td>
                                    <img src="<?php echo isset($new['image']) && !empty($new['image']) ? $new['image'] : '/assets/media/svg/files/blank-image.svg'; ?>"
                                         width="70px" height="70px" alt="img" style="object-fit: cover">
                                </td>
                                <td>
                                    <?= strlen($new['desc-nl']) > 20 ? substr($new['desc-nl'], 0, 20) . '...' : $new['desc-nl'] ?>
                                </td>
                                <td><?= $new['date'] ?></td>
                                <td>
                                    <div class="badge <?= $new['status'] == 1 ? 'badge-success' : 'badge-danger' ?> ">
                                        <?= $new['status'] == 1 ? 'active' : 'inactive' ?>
                                    </div>
                                </td>
                                <td class="d-flex">
                                    <a href="/admin/admin-news-edit?id=<?= $new['id'] ?>"
                                       class="btn btn-sm d-flex align-items-center justify-content-center me-2"
                                       style="border: 1px solid rgba(65, 29, 11, 1);  width: min-content">Bewerking
                                        <i class="fa-solid fa-pen ms-2 text-black"></i>
                                    </a>
                                    <a href="/admin/news-delete-function?id=<?= $new['id'] ?>"
                                       class="btn btn-sm d-flex align-items-center justify-content-center"
                                       style="border: 1px solid rgba(65, 29, 11, 1); width: min-content">Verwijderen
                                        <i class="fa-solid fa-trash ms-2 text-black"></i>
                                    </a>
                                </td>
                            </tr>

                        <?php }
                        ?>
                        <!-- Additional rows are formatted similarly -->
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="dataTables_length" id="kt_datatable_zero_configuration_length">
                            <label>
                                <select name="kt_datatable_zero_configuration_length"
                                        aria-controls="kt_datatable_zero_configuration"
                                        class="form-select form-select-sm form-select-solid">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>
                        <div class="dataTables_info" id="kt_datatable_zero_configuration_info" role="status"
                             aria-live="polite">Showing 1 to 5 of 5 records
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers"
                             id="kt_datatable_zero_configuration_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled"
                                    id="kt_datatable_zero_configuration_previous">
                                    <a href="#" aria-controls="kt_datatable_zero_configuration" data-dt-idx="0"
                                       tabindex="0" class="page-link">
                                        <i class="previous"></i>
                                    </a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="kt_datatable_zero_configuration" data-dt-idx="1"
                                       tabindex="0" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item next disabled"
                                    id="kt_datatable_zero_configuration_next">
                                    <a href="#" aria-controls="kt_datatable_zero_configuration" data-dt-idx="2"
                                       tabindex="0" class="page-link">
                                        <i class="next"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const projects = [
        <?php foreach ($news as $project): ?>
        {
            id: <?= $project['id']; ?>,
            title_nl: "<?= addslashes($project['title-nl']); ?>",
            image: "<?= $project['image']; ?>",
            desc_nl: "<?= addslashes($project['desc-nl']); ?>",
            date: "<?= $project['date']; ?>",
            status: <?= $project['status']; ?>,
        },
        <?php endforeach; ?>
    ];
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentPage = 1, recordsPerPage = 10;
        let filteredProjects = [...projects];
        const totalProjects = filteredProjects.length;

        function renderTable() {
            const start = (currentPage - 1) * recordsPerPage;
            const end = Math.min(start + recordsPerPage, totalProjects);
            document.querySelector('tbody').innerHTML = filteredProjects.slice(start, end).map(project => `
            <tr>
                <td class="sorting_1">${project.title_nl}</td>

<td><img src="${project.image && project.image !== '' ? project.image : '/assets/media/svg/files/blank-image.svg'}" width="100px" height="100px" alt="img" style="object-fit: cover"></td>
                <td>${project.desc_nl.length > 100 ? project.desc_nl.substring(0, 100) + '...' : project.desc_nl}</td>
                <td>${project.date}</td>
                <td>
                    <div class="${project.status == 1 ? 'badge badge-success' : 'badge badge-danger'}">
                        ${project.status ? 'Active' : 'Inactive'}
                    </div>
                </td>
                <td class="d-flex">
               <a href="/admin/admin-news-edit?id=${project.id}"
                                      class="btn btn-sm d-flex align-items-center justify-content-center me-2" style="border: 1px solid rgba(65, 29, 11, 1);  width: min-content">Bewerking
                                        <i class="fa-solid fa-pen ms-2 text-black"></i>
                                    </a>
                                    <a href="/admin/news-delete-function?id=${project.id}" class="btn btn-sm d-flex align-items-center justify-content-center" style="border: 1px solid rgba(65, 29, 11, 1); width: min-content">Verwijderen
                                        <i class="fa-solid fa-trash ms-2 text-black"></i>
                                   </a>
                </td>
            </tr>`).join('');
            document.getElementById('kt_datatable_zero_configuration_info').textContent = `${start + 1} tot ${end} van ${totalProjects} weergegeven`;
            updatePagination(Math.ceil(totalProjects / recordsPerPage));
        }

        function updatePagination(totalPages) {
            const container = document.querySelector('.pagination');
            container.innerHTML = `
            <li class="paginate_button page-item previous ${currentPage === 1 ? 'disabled' : ''}">
                <a href="#" data-page="prev" class="page-link"><i class="previous"></i></a>
            </li>`;
            for (let i = 1; i <= totalPages; i++) {
                container.innerHTML += `
                <li class="paginate_button page-item ${i === currentPage ? 'active' : ''}">
                    <a href="#" data-page="${i}" class="page-link">${i}</a>
                </li>`;
            }
            container.innerHTML += `
            <li class="paginate_button page-item next ${currentPage === totalPages ? 'disabled' : ''}">
                <a href="#" data-page="next" class="page-link"><i class="next"></i></a>
            </li>`;
        }

        document.querySelector('.pagination').addEventListener('click', function (e) {
            e.preventDefault();
            let targetPage = e.target.closest('a').dataset.page;
            const totalPages = Math.ceil(totalProjects / recordsPerPage);
            if (targetPage === 'prev' && currentPage > 1) {
                currentPage--;
            } else if (targetPage === 'next' && currentPage < totalPages) {
                currentPage++;
            } else if (!isNaN(targetPage)) {
                currentPage = parseInt(targetPage);
            }
            renderTable();
        });

        document.querySelector('select[name="kt_datatable_zero_configuration_length"]').addEventListener('change', function (e) {
            recordsPerPage = parseInt(e.target.value);
            currentPage = 1;
            renderTable();
        });

        document.querySelector('input[data-kt-docs-table-filter="search"]').addEventListener('input', function (e) {
            const query = e.target.value.toLowerCase();
            filteredProjects = projects.filter(project => project.title_nl.toLowerCase().includes(query));
            currentPage = 1;
            renderTable();
            console.log(filteredProjects);
        });

        renderTable();
    });
</script>


<?= $footer ?>
