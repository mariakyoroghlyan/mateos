<?= $header ?>


<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10"
     id="kt_app_main">
	<div class="card py-lg-15 px-lg-15 min-w-100">
		<div class="d-flex flex-stack flex-wrap mb-5">
			<!--begin::Search-->
			<!--			<div class="d-flex align-items-center position-relative my-1">-->
			<!--				<i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">-->
			<!--					<span class="path1"></span>-->
			<!--					<span class="path2"></span>-->
			<!--				</i>-->
			<!--				<input type="text" data-kt-docs-table-filter="search"-->
			<!--				       class="form-control form-control-solid w-250px ps-15" placeholder="Search Portfolios">-->
			<!--			</div>-->
			<!--end::Search-->
			<!--begin::Toolbar-->
			<div class="d-flex justify-content-end" style="margin-left: auto" data-kt-docs-table-toolbar="base">
				<!--begin::Add customer-->
				<a href="/admin/team_add" class="btn btn-primary" data-bs-toggle="tooltip"
				   data-bs-original-title="Add News" data-kt-initialized="1">
					<i class="ki-duotone ki-plus fs-2"></i> Add Member
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
							    style="width: 181.797px;"> Title
							</th>
							<th class="min-w-150px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
							    rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending"
							    style="width: 181.797px;">Image
							</th>
							<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
							    rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending"
							    style="width: 151.812px;">Logo image
							</th>
							<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
							    rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending"
							    style="width: 151.812px;"> Role
							</th>
							<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
							    rowspan="1" colspan="1" aria-label="Type: activate to sort column ascending"
							    style="width: 151.812px;"> Location
							</th>
							<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
							    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending"
							    style="width: 151.812px;"> Information
							</th>
							<th class="min-w-125px sorting" tabindex="0" aria-controls="kt_datatable_zero_configuration"
							    rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending"
							    style="width: 151.922px;">Action
							</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($team as $member) { ?>
							<tr class="even">

								<td class="sorting_1">
									<?= $member['title_en'] ?>
                                </td>
								<td>
									<img src="<?php echo isset($member['image']) && !empty($member['image']) ? $member['image'] : '/assets/media/svg/files/blank-image.svg'; ?>"
									     width="70px" height="70px" alt="img" style="object-fit: cover">
								</td>
								<td>
									<img src="<?php echo isset($member['logo_image']) && !empty($member['logo_image']) ? $member['logo_image'] : '/assets/media/svg/files/blank-image.svg'; ?>"
									     width="70px" height="70px" alt="img" style="object-fit: cover">
								</td>
								<td><?= $member['role_en'] ?></td>
								<td><?= $member['location_en'] ?></td>
                                <td>
									<?= strlen($member['info_en']) > 20 ? substr($member['info_en'], 0, 20) . '...' : $member['info_en'] ?>
                                </td>
								<td>
									<a href="/admin/team_edit?id=<?=$member['id']?>" class="btn btn-sm btn-success">Edit</a>
									<a href="/admin/teamDelete?id=<?=$member['id']?>" class="btn btn-sm btn-danger">Delete</a>
								</td>
							</tr>

						<?php }
						?>
						<!-- Additional rows are formatted similarly -->
						</tbody>
					</table>
				</div>
				<!--				<div class="row">-->
				<!--					<div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">-->
				<!--						<div class="dataTables_length" id="kt_datatable_zero_configuration_length">-->
				<!--							<label>-->
				<!--								<select name="kt_datatable_zero_configuration_length"-->
				<!--								        aria-controls="kt_datatable_zero_configuration"-->
				<!--								        class="form-select form-select-sm form-select-solid">-->
				<!--									<option value="10">10</option>-->
				<!--									<option value="25">25</option>-->
				<!--									<option value="50">50</option>-->
				<!--									<option value="100">100</option>-->
				<!--								</select>-->
				<!--							</label>-->
				<!--						</div>-->
				<!--						<div class="dataTables_info" id="kt_datatable_zero_configuration_info" role="status"-->
				<!--						     aria-live="polite">Showing 1 to 5 of 5 records-->
				<!--						</div>-->
				<!--					</div>-->
				<!--					<div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">-->
				<!--						<div class="dataTables_paginate paging_simple_numbers"-->
				<!--						     id="kt_datatable_zero_configuration_paginate">-->
				<!--							<ul class="pagination">-->
				<!--								<li class="paginate_button page-item previous disabled"-->
				<!--								    id="kt_datatable_zero_configuration_previous">-->
				<!--									<a href="#" aria-controls="kt_datatable_zero_configuration" data-dt-idx="0"-->
				<!--									   tabindex="0" class="page-link">-->
				<!--										<i class="previous"></i>-->
				<!--									</a>-->
				<!--								</li>-->
				<!--								<li class="paginate_button page-item active">-->
				<!--									<a href="#" aria-controls="kt_datatable_zero_configuration" data-dt-idx="1"-->
				<!--									   tabindex="0" class="page-link">1</a>-->
				<!--								</li>-->
				<!--								<li class="paginate_button page-item next disabled"-->
				<!--								    id="kt_datatable_zero_configuration_next">-->
				<!--									<a href="#" aria-controls="kt_datatable_zero_configuration" data-dt-idx="2"-->
				<!--									   tabindex="0" class="page-link">-->
				<!--										<i class="next"></i>-->
				<!--									</a>-->
				<!--								</li>-->
				<!--							</ul>-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</div>-->
			</div>
		</div>
	</div>
</div>

<?= $footer ?>
