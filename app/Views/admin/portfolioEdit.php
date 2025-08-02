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
		<form id="portfolioEdit" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?=$portfolio['id']?>" name="portfolioId">
			<button class="btn btn-primary editPortfolioBtn d-flex" style="margin-left: auto">Save</button>

			<div class="message"></div>
			<!-- tabs start-->
			<div class="tab-content mt-5 padding-left" id="myTabContent">

				<!--main fixed-->
				<div class="mb-10">
					<label for="cost" class="form-label mt-7 mb-4">Cost $</label>
					<input type="number" step="0.01" id="text" name="cost" class="form-control form-control-solid" placeholder="Cost" value="<?=$portfolio['cost']?>">

				</div>


                <!--begin::Image uploader group-->
                <div class="input-group mb-10">
                    <div>
                        <!--begin::Image input-->
                        <div class=" form-label mt-7">Image</div>
                        <div class="image-input image-input-empty mt-2" data-kt-image-input="true">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" id="frame" style="background-image: url('<?=$portfolio['image']?>')"></div>
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
                                <input type="hidden" name="image_old" value="<?=$portfolio['image']?>">
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
                            <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" id="frame2" style="background-image: url('<?=$portfolio['logo_image']?>')"></div>
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
                                <input type="hidden" name="logo_image_old" value="<?=$portfolio['logo_image']?>">
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

					<div class="mb-10 d-flex align-items-center">
						<label class=" form-label d-flex" for="category" style="margin-right: 1.5rem; margin-bottom: unset">
							Category
						</label>
						<input type="text" id="category" name="category_en" class="form-control form-control-solid" placeholder="Category" value="<?=$portfolio['category_en']?>">
					</div>

					<div class="mb-10">
						<label for="company" class="form-label mt-7 mb-4">Company</label>
						<input type="text" id="company" name="company_en" class="form-control form-control-solid" placeholder="Company" value="<?=$portfolio['company_en']?>">
					</div>

					<div class="mb-10">
						<label class="form-label mt-7 mb-4" for="status">Status</label>
						<input type="text" id="status" name="status_en" class="form-control form-control-solid" placeholder="Status" value="<?=$portfolio['status_en']?>">
					</div>

					<div class="mb-10">
						<label class="form-label mt-7 mb-4" for="text">Text</label>
                        <textarea name="text_en" id="kt_docs_ckeditor_classic"><?=$portfolio['text_en']?></textarea>
					</div>

				</div>
				<!--tab1 end -->

				<!--tab2 start -->
				<div class="tab-pane fade mt-5" id="kt_tab_pane_2" role="tabpanel">
					<div class="mb-10 d-flex align-items-center">
						<label class=" form-label d-flex" for="category" style="margin-right: 1.5rem; margin-bottom: unset">
							Category
						</label>
						<input type="text" id="category" name="category_am" class="form-control form-control-solid" placeholder="Category" value="<?=$portfolio['category_am']?>">
					</div>

					<div class="mb-10">
						<label for="company" class="form-label mt-7 mb-4">Company</label>
						<input type="text" id="company" name="company_am" class="form-control form-control-solid" placeholder="Company" value="<?=$portfolio['company_am']?>">
					</div>

					<div class="mb-10">
						<label class="form-label mt-7 mb-4" for="status">Status</label>
						<input type="text" id="status" name="status_am" class="form-control form-control-solid" placeholder="Status" value="<?=$portfolio['status_am']?>">
					</div>


                    <div class="mb-10">
                        <label class="form-label mt-7 mb-4" for="text">Text</label>
                        <textarea name="text_am" id="kt_docs_ckeditor_classic"><?=$portfolio['text_am']?></textarea>
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

        $('#portfolioEdit').on('submit', function (e) {
            e.preventDefault();
            $('.editPortfolioBtn').attr('disabled', 'disabled');

            $.ajax({
                url: '/admin/portfolioEdit',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '/admin/portfolio';
                        $('.addPortfolioBtn').removeAttr('disabled');
                    } else {
                        $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                        $('.addPortfolioBtn').removeAttr('disabled');
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


    $("#kt_daterangepicker_3").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format("YYYY"),12)
        }, function(start, end, label) {
            var years = moment().diff(start, "years");
        }
    );

</script>


<!--FOOTER-->
<?= $footer ?>
<!--FOOTER-->