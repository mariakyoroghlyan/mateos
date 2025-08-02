<!--HEADER-->
<?= $header ?>
<!--HEADER-->

<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10"
     id="kt_app_main">
	<div class=" flex-column flex-row-fluid" id="kt_app_wrapper">

		<ul class="nav nav-tabs nav-line-tabs mb-5 fs-6 padding-left">
			<li class="nav-item">
				<a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Eng
					<img class="flag-img w-30px" src="/assets/media/icons/united-states.png" alt="us-flag">
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " data-bs-toggle="tab" href="#kt_tab_pane_2">Arm
					<img class="flag-img w-30px" src="/assets/media/icons/armenian-flag.png" alt="arm-flag">
				</a>
			</li>

		</ul>

		<!--form start -->
		<form id="teamAdd" method="post" enctype="multipart/form-data">

			<button class="btn btn-primary addTeamBtn d-flex" style="margin-left: auto">Save</button>

			<div class="message"></div>
			<!-- tabs start-->
			<div class="tab-content mt-5 padding-left" id="myTabContent">

				<!--main fixed-->

				<!--begin::Image uploader group-->
				<div class="input-group mb-10">
					<div>
						<!--begin::Image input-->
						<div class=" form-label mt-7">Image</div>
						<div class="image-input image-input-empty mt-2" data-kt-image-input="true">
							<!--begin::Image preview wrapper-->
							<div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" id="frame"></div>
							<!--end::Image preview wrapper-->

							<!--begin::Edit button-->
							<label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
							       data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
							       aria-label="Upload image" data-bs-original-title="Upload image"
							       data-kt-initialized="1">
								<i class="ki-duotone ki-pencil fs-6">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
								<!--begin::Inputs-->
								<input type="file" name="image" accept=".png, .jpg, .jpeg">
								<!--end::Inputs-->
							</label>
							<!--end::Edit button-->

							<!--begin::Cancel button-->
							<span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
							      data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
							      aria-label="Cancel image" data-bs-original-title="Cancel image"
							      data-kt-initialized="1">
                            <i class="ki-outline ki-cross fs-3"></i>
                        </span>
							<!--end::Cancel button-->

							<!--begin::Remove button-->
							<span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
							      data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
							      aria-label="Remove image" data-bs-original-title="Remove image"
							      data-kt-initialized="1">
                            <i class="ki-outline ki-cross fs-3"></i>
                          </span>
							<!--end::Remove button-->
						</div>
						<!--end::Image input-->
					</div>
				</div>
				<!--end::Image uploader group-->

                <!--begin::Logo Image uploader group-->
                <div class="input-group mb-10">
                    <div>
                        <!--begin::Image input-->
                        <div class="form-label mt-7">Logo Image</div>
                        <div class="image-input image-input-empty mt-2" data-kt-image-input="true">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" id="frame2"></div>
                            <!--end::Image preview wrapper-->

                            <!--begin::Edit button-->
                            <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                   data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                   aria-label="Upload image" data-bs-original-title="Upload image"
                                   data-kt-initialized="1">
                                <i class="ki-duotone ki-pencil fs-6">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--begin::Inputs-->
                                <input type="file" name="logo_image" accept=".png, .jpg, .jpeg">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit button-->

                            <!--begin::Cancel button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                  data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                  aria-label="Cancel image" data-bs-original-title="Cancel image"
                                  data-kt-initialized="1">
                            <i class="ki-outline ki-cross fs-3"></i>
                        </span>
                            <!--end::Cancel button-->

                            <!--begin::Remove button-->
                            <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                  data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                  aria-label="Remove image" data-bs-original-title="Remove image"
                                  data-kt-initialized="1">
                            <i class="ki-outline ki-cross fs-3"></i>
                          </span>
                            <!--end::Remove button-->
                        </div>
                        <!--end::Image input-->
                    </div>
                </div>
                <!--end::Logo Image uploader group-->

				<!--main fixed-->

				<!--end::default input-->

				<!--tab1 start -->
				<div class="tab-pane fade show active mt-5" id="kt_tab_pane_1"
				     role="tabpanel">

                    <div class="mb-10">
                        <label for="title" class=" form-label mt-7 mb-4">Name and Surname</label>
                        <input type="text" id="title" name="title_en" class="form-control form-control-solid" placeholder="Name and Surname">
                    </div>

					<div class="mb-10">
						<label for="role" class="form-label mt-7 mb-4">Role</label>
						<input type="text" id="role" name="role_en" class="form-control form-control-solid" placeholder="Role">
					</div>

					<div class="mb-10">
						<label class="form-label mt-7 mb-4" for="location_en">Location</label>
						<input type="text" id="location_en" name="location_en" class="form-control form-control-solid" placeholder="Location">
					</div>

					<div class="mb-10">
						<label class="form-label mt-7 mb-4" for="info">Information</label>
                        <textarea name="info_en" id="kt_docs_ckeditor_classic"></textarea>
					</div>

				</div>
				<!--tab1 end -->

				<!--tab2 start -->
				<div class="tab-pane fade mt-5" id="kt_tab_pane_2" role="tabpanel">
                    <div class="mb-10">
                        <label for="title" class=" form-label mt-7 mb-4">Name and Surname</label>
                        <input type="text" id="title" name="title_am" class="form-control form-control-solid" placeholder="Name and Surname">
                    </div>

                    <div class="mb-10">
                        <label for="role" class="form-label mt-7 mb-4">Role</label>
                        <input type="text" id="role" name="role_am" class="form-control form-control-solid" placeholder="Role">
                    </div>

                    <div class="mb-10">
                        <label class="form-label mt-7 mb-4" for="location_en">Location</label>
                        <input type="text" id="location_en" name="location_am" class="form-control form-control-solid" placeholder="Location">
                    </div>

					<div class="mb-10">
						<label class="form-label mt-7 mb-4" for="info">Information</label>

                        <textarea name="info_am" id="kt_docs_ckeditor_classic"></textarea>
                    </div>
				</div>
				<!--tab2 end -->

			</div>
			<!-- tabs end -->


		</form>

		<!--form end -->

	</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>


<script>
    $(document).ready(function () {

        $('#teamAdd').on('submit', function (e) {
            e.preventDefault();
            $('.addTeamBtn').attr('disabled', 'disabled');

            $.ajax({
                url: '/admin/teamAdd',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '/admin/team';
                        $('.addTeamBtn').removeAttr('disabled');
                    } else {
                        $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                        $('.addTeamBtn').removeAttr('disabled');
                    }
                },
                error: function () {
                    $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                }
            });
        });
    })
</script>

<script>
    //  text editor
    document.querySelectorAll('#kt_docs_ckeditor_classic').forEach(function (element) {
        ClassicEditor.create(element)
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>


<!--FOOTER-->
<?= $footer ?>
<!--FOOTER-->