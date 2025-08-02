<!--HEADER-->
<?= $header ?>
<!--HEADER-->


<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10"
     id="kt_app_main">
	<div class=" flex-column flex-row-fluid" id="kt_app_wrapper">

        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6 padding-left">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Nederlands
                    <img class="flag-img w-30px" src="/public/images/netherlands-flag.png" alt="nl-flag">
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Հայերեն
                    <img class="flag-img w-30px" src="/public/images/armenian-flag.png" alt="arm-flag">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " data-bs-toggle="tab" href="#kt_tab_pane_3">English
                    <img class="flag-img w-30px" src="/public/images/usa-flag.png" alt="us-flag">
                </a>
            </li>

        </ul>


        <!--form start -->
		<form id="editText" method="post" enctype="multipart/form-data">
			<input type="hidden" value="<?=$text['id']?>" name="textId">
            <button class="btn editTextBtn d-flex text-white align-items-center" style="margin-left: auto; background: rgba(65, 29, 11, 1);">
                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                <span class="btn-text">Save</span>
            </button>

			<div class="message"></div>
			<!-- tabs start-->
			<div class="tab-content mt-5 padding-left" id="myTabContent">

                <div class="mb-10">
                    <label for="link" class="form-label mt-7 mb-4">Link</label>
                    <input type="text" id="link" name="link" class="form-control form-control-solid" placeholder="Title" value="<?=$text['link']?>">
                </div>

                <div class="mb-10">
                    <label class=" form-label mt-7 mb-4" for="status">
                        Status
                    </label>
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input cursor-pointer" type="checkbox" id="status" name="status" <?= $text['status'] == 1 ? 'checked' : '' ?>>
                    </div>
                </div>



                <!--tab2 start -->
                <div class="tab-pane fade show show active mt-5" id="kt_tab_pane_1"
                     role="tabpanel">

                    <div class="mb-10">
                        <label for="text" class="form-label mt-7 mb-4">Text Nl</label>
                        <input type="text" id="text" name="text-nl" class="form-control form-control-solid" placeholder="Text" value="<?=$text['text-nl']?>">
                    </div>
                </div>
                <!--tab2 end -->

                <!--tab3 start -->
                <div class="tab-pane fade show  mt-5" id="kt_tab_pane_2"
                     role="tabpanel">

                    <div class="mb-10">
                        <label for="text" class="form-label mt-7 mb-4">Text Am</label>
                        <input type="text" id="text" name="text-am" class="form-control form-control-solid" placeholder="Text" value="<?=$text['text-am']?>">
                    </div>
                </div>
                <!--tab3 end -->

                <!--tab1 start -->
                <div class="tab-pane fade mt-5" id="kt_tab_pane_3"
                     role="tabpanel">

                    <div class="mb-10">
                        <label for="text" class="form-label mt-7 mb-4">Text En</label>
                        <input type="text" id="text" name="text-en" class="form-control form-control-solid" placeholder="Text" value="<?=$text['text-en']?>">
                    </div>

                </div>
                <!--tab1 end -->


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

        $('#editText').on('submit', function (e) {
            e.preventDefault();
            $('.editTextBtn').attr('disabled', 'disabled');

            $.ajax({
                url: '/admin/admin-text-edit-function',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '/admin/admin-text-control';
                        $('.editTextBtn').removeAttr('disabled');
                    } else {
                        $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                        $('.editTextBtn').removeAttr('disabled');
                    }
                },
                error: function () {
                    $('.editTextBtn').removeAttr('disabled');
                    $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                }
            });
        });
    })
</script>

<!--FOOTER-->
<?= $footer ?>
<!--FOOTER-->