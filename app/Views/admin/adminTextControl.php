<?= $header ?>

    <div class="py-lg-10 px-lg-10">

        <h1 class="headline py-lg-10">Tekstcontrole</h1>

        <div class="text-dark bg-secondary h1 py-lg-2 px-lg-10">Homepagina-knop</div>

        <div class=" d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid
	 py-lg-10 "
             id="kt_app_main">

            <div class="card py-lg-15 px-lg-15 min-w-100">
                <div class="table-responsive">
                    <div id="kt_datatable_zero_configuration_wrapper"
                         class="dataTables_wrapper dt-bootstrap4 no-footer">
                        <div class="table-responsive">
                            <table id="kt_datatable_zero_configuration"
                                   class="table table-row-bordered gy-5 dataTable no-footer"
                                   aria-describedby="kt_datatable_zero_configuration_info">
                                <thead>
                                <tr class="fw-bold fs-6 text-gray-800 px-7">
                                    <th class="min-w-125px sorting" tabindex="0"
                                        aria-controls="kt_datatable_zero_configuration"
                                        rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending"
                                        style="width: 151.812px;">Tekst
                                    </th>
                                    <th class="min-w-125px sorting" tabindex="0"
                                        aria-controls="kt_datatable_zero_configuration"
                                        rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending"
                                        style="width: 151.812px;">Link
                                    </th>
                                    <th class="min-w-125px sorting" tabindex="0"
                                        aria-controls="kt_datatable_zero_configuration"
                                        rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending"
                                        style="width: 151.812px;">Status
                                    </th>
                                    <th class="min-w-125px sorting" tabindex="0"
                                        aria-controls="kt_datatable_zero_configuration"
                                        rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
                                        style="width: 151.922px;">Actie
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach ($texts as $text) { ?>
                                    <tr class="even">
                                        <td class="sorting_1">
											<?= $text['text-en'] ?>
                                        </td>
                                        <td>
											<?= $text['link'] ?>
                                        </td>
                                        <td>
                                            <div class="badge <?= $text['status'] == 1 ? 'badge-success' : 'badge-danger' ?> ">
                                                <?= $text['status'] == 1 ? 'active' : 'inactive' ?>
                                            </div>                                        </td>
                                        <td class="d-flex">
                                            <a href="/admin/admin-text-edit?id=<?= $text['id'] ?>"
                                               class="btn btn-sm d-flex align-items-center justify-content-center me-2"
                                               style="border: 1px solid rgba(65, 29, 11, 1);  width: min-content">Bewerking
                                                <i class="fa-solid fa-pen ms-2 text-black"></i>
                                            </a>
<!--                                            <a href="/admin/text-delete-function?id=--><?php //= $text['id'] ?><!--"-->
<!--                                               class="btn btn-sm d-flex align-items-center justify-content-center"-->
<!--                                               style="border: 1px solid rgba(65, 29, 11, 1); width: min-content">Delete-->
<!--                                                <i class="fa-solid fa-trash ms-2 text-black"></i>-->
<!--                                            </a>-->
                                        </td>

                                    </tr>

								<?php }
								?>
                                <!-- Additional rows are formatted similarly -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


<?= $footer ?>