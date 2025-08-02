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
		<form id="editHomeText" method="post" enctype="multipart/form-data">
			<input type="hidden" value="<?=$home['id']?>" name="editHomeId">
			<button class="btn btn-primary editHomeTextBtn d-flex" style="margin-left: auto">Save</button>

			<div class="message"></div>
			<!-- tabs start-->
			<div class="tab-content mt-5 padding-left" id="myTabContent">

				<!--tab1 start -->
				<div class="tab-pane fade show active mt-5" id="kt_tab_pane_1"
				     role="tabpanel">

					<div class="mb-10">
						<label for="company" class="form-label mt-7 mb-4">Title</label>
						<input type="text" id="company" name="title_en" class="form-control form-control-solid" placeholder="Title" value="<?=$home['title_en']?>">
					</div>

                    <div class="mb-10">
                        <label for="text_en" class="form-label mt-7 mb-4">Text</label>
                        <input type="text" id="text_en" name="text_en" class="form-control form-control-solid" placeholder="Title" value="<?=$home['text_en']?>">
                    </div>

					<div class="mb-10">
						<label class="form-label mt-7 mb-4" for="additional_text_en">Additional Text</label>
						<input type="text" id="additional_text_en" name="additional_text_en" class="form-control form-control-solid" placeholder="Additional_text" value="<?=$home['additional_text_en']?>">
					</div>

                    <div class="mb-10">
                        <label for="number_en" class="form-label mt-7 mb-4">Number</label>
                        <input type="text" step="0.01" id="number_en" name="number_en" class="form-control form-control-solid" placeholder="Number" value="<?=$home['number_en']?>">
                    </div>

				</div>
				<!--tab1 end -->

                <!--tab2 start -->
                <div class="tab-pane fade show  mt-5" id="kt_tab_pane_2"
                     role="tabpanel">

                    <div class="mb-10">
                        <label for="company" class="form-label mt-7 mb-4">Title</label>
                        <input type="text" id="company" name="title_am" class="form-control form-control-solid" placeholder="Title" value="<?=$home['title_am']?>">
                    </div>

                    <div class="mb-10">
                        <label for="text_en" class="form-label mt-7 mb-4">Text</label>
                        <input type="text" id="text_en" name="text_am" class="form-control form-control-solid" placeholder="Title" value="<?=$home['text_am']?>">
                    </div>

                    <div class="mb-10">
                        <label class="form-label mt-7 mb-4" for="additional_text_en">Additional Text</label>
                        <input type="text" id="additional_text_am" name="additional_text_am" class="form-control form-control-solid" placeholder="Additional_text" value="<?=$home['additional_text_am']?>">
                    </div>

                    <div class="mb-10">
                        <label for="number_am" class="form-label mt-7 mb-4">Number</label>
                        <input type="text" step="0.01" id="number_am" name="number_am" class="form-control form-control-solid" placeholder="Number" value="<?=$home['number_am']?>">
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

        $('#editHomeText').on('submit', function (e) {
            e.preventDefault();
            $('.editHomeTextBtn').attr('disabled', 'disabled');

            $.ajax({
                url: '/admin/homeTextChange',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '/admin/admin_text_control';
                        $('.editHomeTextBtn').removeAttr('disabled');
                    } else {
                        $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                        $('.editHomeTextBtn').removeAttr('disabled');
                    }
                },
                error: function () {
                    $('.editHomeTextBtn').removeAttr('disabled');
                    $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                }
            });
        });
    })
</script>

<!--FOOTER-->
<?= $footer ?>
<!--FOOTER-->