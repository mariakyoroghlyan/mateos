<!--HEADER-->
<?= $header ?>
<!--HEADER-->

<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10"
     id="kt_app_main">

    <div class="card min-w-100 py-lg-15 px-lg-15">
        <!-- begin::Form-->

        <form method="post" enctype="multipart/form-data" id="add_awards_and_media">
            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6 w-100 py-2 d-flex justify-content-end" role="tablist">
                <li class="ml-auto">
                    <button class="btn btn-primary addAwardAndMediaBtn" type="submit">Save</button>
                </li>
            </ul>


            <div class="message">

            </div>

            <input type="hidden" name="award_and_media_id" value="<?= $award_and_media['id'] ?>" >


            <div class="mb-10">
                <label for="title" class="required form-label mt-7 mb-4">Image </label>
                <!--begin::Image uploader group-->
                <div class="input-group mb-5">
                    <div>
                        <!--begin::Image input-->
                        <div class=" form-label mt-7">Image size(1537 x 820px)</div>
                        <div class="image-input image-input-empty mt-2" data-kt-image-input="true" >
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" id="frame" style="background-image: url('<?= $award_and_media['image'] ?>')"></div>
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
                                <input type="hidden" name="old_image" value="<?= $award_and_media['image']?> ">
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
            </div>


            <div class="mb-10">
                <label for="title" class=" form-label mt-7 mb-4">Title</label>
                <input type="text" id="name" name="title" class="form-control form-control-solid" placeholder="Title" value="<?= $award_and_media['title'] ?>">
            </div>

            <div class="mb-10">
                <label for="year" class=" form-label mt-7 mb-4">Year</label>
                <input type="number" id="year" name="year" class="form-control form-control-solid"
                       placeholder="year" value="<?= $award_and_media['year'] ?>">
            </div>


            <!--begin::Input title-->
            <div class="mb-10">
                <label class=" form-label mt-7 mb-4" for="show_with_image">
                    Show with image
                </label>
                <div class="form-check form-switch form-check-custom form-check-solid">
                    <input class="form-check-input cursor-pointer" type="checkbox" id="show_with_image"
                           name="show_with_image" <?= $award_and_media['show_with_image'] == '1' ? 'checked' : '' ?> />
                </div>
            </div>
            <!--end::Input title-->

            <div class="mb-10 ">
                <label class="required form-label mt-7 mb-4" for="category">
                    Category
                </label>
                <select class="form-select" data-control="select2" data-placeholder="Select an option" name="category"
                        id="category">
                    <option value="" disabled selected>Select your option</option>
                    <option value="1" <?php if ($award_and_media['category'] == 1) echo 'selected'; ?>>awards
                    </option>
                    <option value="2" <?php if ($award_and_media['category'] == 2) echo 'selected'; ?>>media</option>
                </select>
            </div>

            <div class="mb-10 ">
                <label class="required form-label mt-7 mb-4" for="category">
                    Link
                </label>
                <div class="d-flex gap-2 delete_line">
                    <div class="w-100">
                        <label for="link_name" class=" form-label mt-7 mb-4">
                            Link name
                        </label>
                        <input type="text" id="link_name" name="link_name" class="form-control form-control-solid" placeholder="Link name" value="<?= $award_and_media['link_name'] ?>">
                    </div>
                    <div class="w-100">
                        <label for="link" class=" form-label mt-7 mb-4">
                            Link
                        </label>
                        <input type="text" id="link" name="link" class="form-control form-control-solid" placeholder="link" value="<?= $award_and_media['link'] ?>">
                    </div>

                    <div class="remove-row" style="align-self: end" >
                        <span class="btn btn-danger remove-row" >x</span>
                    </div>
                </div>
            </div>


        </form>

    </div>

    <!--end::Form-->

</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {

        $('#add_awards_and_media').on('submit', function (e) {
            e.preventDefault();
            $('.addAwardAndMediaBtn').attr('disabled', 'disabled');

            $.ajax({
                url: '/admin/editAwardAndMedia',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '/admin/awards_list';

                        $('.addAwardAndMediaBtn').removeAttr('disabled');

                    } else {
                        $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                        $('.addAwardAndMediaBtn').removeAttr('disabled');
                    }
                },
                error: function () {
                    $('<div class="alert alert-danger"></div>').appendTo('.col-md-12.mb-4');
                }
            });
        });
    })
</script>

<!--FOOTER-->
<?= $footer ?>
<!--FOOTER-->