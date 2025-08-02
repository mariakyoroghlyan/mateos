<?= $header ?>

<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10" id="kt_app_main">
    <div class="card py-lg-15 px-lg-15 min-w-100">
        <div class="d-flex flex-stack flex-wrap mb-5">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <input type="text" data-kt-docs-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Merch">
            </div>
            <!--end::Search-->
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                <!--begin::Add customer-->
                <a href="/admin/add_merch" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-original-title="Add News" data-kt-initialized="1">
                    <i class="ki-duotone ki-plus fs-2"></i> Add Project
                </a>
                <!--end::Add customer-->
            </div>
            <!--end::Toolbar-->
        </div>
        <div class="table-responsive">
            <div id="kt_datatable_zero_configuration_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="table-responsive">
                    <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5 dataTable no-footer" aria-describedby="kt_datatable_zero_configuration_info">
                        <thead>
                        <tr class="fw-bold fs-6 text-gray-800 px-7">

                            <th class="min-w-150px sorting sorting_asc" data-priority="1" tabindex="0" aria-controls="kt_datatable_zero_configuration" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 282.484px;">Title</th>
                            <th class="min-w-150px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration" rowspan="1" colspan="1" aria-label="Small Image: activate to sort column ascending" style="width: 181.797px;">Image</th>
                            <th class="min-w-150px sorting sorting_asc" data-priority="1" tabindex="0" aria-controls="kt_datatable_zero_configuration" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 282.484px;">Information</th>
                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration" rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending" style="width: 151.812px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($merch as $data): ?>
                            <tr class="odd">

                                <td class="sorting_1"><?=$data['title']?></td>
                                <td>
                                    <img src="<?=$data['image_small']?>" width="100px" height="65px" alt="img">
                                </td>
                                <td>
                                    <?= strlen($data['information']) > 15 ? esc(substr($data['information'], 0, 15)) . '...' : esc($data['information']) ?>
                                </td>
                                <td>
                                    <a href="/admin/edit_merch?id=<?= $data['id'] ?>" class="btn btn-sm btn-success">Edit</a>
                                    <a href="/admin/deleteMerch?id=<?= $data['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                        <!-- Additional rows are formatted similarly -->
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="dataTables_length" id="kt_datatable_zero_configuration_length">
                            <label>
                                <select name="kt_datatable_zero_configuration_length" aria-controls="kt_datatable_zero_configuration" class="form-select form-select-sm form-select-solid">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
                        </div>
                        <div class="dataTables_info" id="kt_datatable_zero_configuration_info" role="status" aria-live="polite">Showing 1 to 5 of 5 records</div>
                    </div>
                    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_datatable_zero_configuration_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="kt_datatable_zero_configuration_previous">
                                    <a href="#" aria-controls="kt_datatable_zero_configuration" data-dt-idx="0" tabindex="0" class="page-link">
                                        <i class="previous"></i>
                                    </a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="kt_datatable_zero_configuration" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item next disabled" id="kt_datatable_zero_configuration_next">
                                    <a href="#" aria-controls="kt_datatable_zero_configuration" data-dt-idx="2" tabindex="0" class="page-link">
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
    const $merch = <?= json_encode($merch); ?>;
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentPage = 1, recordsPerPage = 10;
        let filteredProjects = [...$merch];
        const totalProjects = filteredProjects.length;

        function renderTable() {
            const start = (currentPage - 1) * recordsPerPage;
            const end = Math.min(start + recordsPerPage, totalProjects);
            document.querySelector('tbody').innerHTML = filteredProjects.slice(start, end).map(project => `
            <tr>
                <td>${project.title}</td>
                <td><img src="${project.image_small}" width="100px" height="100px" alt="img"></td>
                <td>${project.information.length > 15 ? project.information.substring(0, 15) + '...' : project.information}
                </td>
                <td>
                    <a href="/admin/edit_merch?id=${project.id}" class="btn btn-sm btn-success">Edit</a>
                    <a href="/admin/deleteMerch?id=${project.id}" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>`).join('');
            document.getElementById('kt_datatable_zero_configuration_info').textContent = `Showing ${start + 1} to ${end} of ${totalProjects} records`;
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
            const targetPage = e.target.closest('a').dataset.page;
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
            filteredProjects = $awards_and_media.filter(project => project.title.toLowerCase().includes(query));
            currentPage = 1;
            renderTable();
        });

        renderTable();
    });
</script>


<?= $footer ?>
