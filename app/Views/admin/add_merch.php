<!--HEADER-->
<?= $header ?>
<!--HEADER-->

<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10"
     id="kt_app_main">

    <div class="card min-w-100 py-lg-15 px-lg-15">
        <!-- begin::Form-->

        <form method="post" enctype="multipart/form-data" id="add_merch">

            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6 w-100 py-2 d-flex justify-content-end" role="tablist">
                <li class="ml-auto">
                    <button class="btn btn-primary addProjectBtn" type="submit">Save</button>
                </li>
            </ul>

            <div class="message">

            </div>

            <div class="mb-10">
                <label for="title" class=" form-label mt-7 mb-4"> Main Small Image </label>
                <!--begin::Image uploader group-->
                <div class="input-group mb-5">
                    <div>
                        <!--begin::Image input-->
                        <div class=" form-label mt-7">Image size(533 x 756px)</div>
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
                                <input type="file" name="image_small" accept=".png, .jpg, .jpeg">
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
                <label for="title" class=" form-label mt-7 mb-4"> Main Large Image </label>
                <!--begin::Image uploader group-->
                <div class="input-group mb-5">
                    <div>
                        <!--begin::Image input-->
                        <div class=" form-label mt-7">Image size(1537 x 820px)</div>
                        <div class="image-input image-input-empty mt-2" data-kt-image-input="true">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px"
                                 id="slide_frame"></div>
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
                                <input type="file" name="image_large" accept=".png, .jpg, .jpeg">
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
                <input type="text" id="name" name="title" class="form-control form-control-solid" placeholder="Title">
            </div>

            <!--begin::Textarea description-->
            <div class="light">
                <label class="form-label required" for="information">Information</label>
                <textarea id="information" class="form-control min-h-125px" aria-label="With textarea"
                          name="information"></textarea>
            </div>
            <!--end::Textarea description-->

            <div class="mb-10 mt-14 mb-4 d-flex justify-content-between align-items-center">
                <label for="reports_title_1" class="required form-label"
                       style="font-size:2.05rem">
                    Style Images
                </label>
            </div>

            <div class="d-flex gap-2 mt-14">
                <select class="form-select" data-control="select2" data-placeholder="Add image and choose style"
                        name="image_category"
                        id="image_category">
                    <option value="" disabled selected>Select style</option>
                    <option value="1">style 1</option>
                    <option value="2">style 2</option>
                    <option value="3">style 3</option>
                </select>
                <button class="btn btn-primary addImage" type="button">Add</button>
            </div>

            <div class="appendImages d-flex gap-2 flex-column">

            </div>

        </form>

    </div>

    <!--end::Form-->

</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {

        $(document).on('click', '.remove-row', function () {
            $(this).closest('.delete_line').remove();
        });
    })
</script>

<script>
    $(document).ready(function () {

        $('.addImage').click(function () {

            if($('#image_category').val() !== null) {
                var selectedStyle = $('#image_category').val();
                let timestamp = Date.now();
                let arr = {
                    'style1': {
                        'img1': '1840 x 517px',
                    },
                    'style2': {
                        'img1': '1220 x 517px',
                        'img2': '600 x 517px',
                    },
                    'style3': {
                        'img1': '600 x 517px',
                        'img2': '600 x 517px',
                        'img3': '600 x 517px',
                    }
                };

                function getImageUploaderHtml(uniqueId, index, size) {
                    return `
            <div class="input-group mb-5 ">
                <div>
                    <!--begin::Image input-->
                    <div class="form-label mt-7">
                        Image size (${size}) <!-- Dynamically set the size here -->
                    </div>
                    <div class="image-input image-input-empty mt-2" data-kt-image-input="true">
                        <!--begin::Image preview wrapper-->
                        <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" ></div>
                        <!--end::Image preview wrapper-->

                        <!--begin::Edit button-->
                        <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                               data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                               aria-label="Upload image" data-bs-original-title="Upload image" data-kt-initialized="1">
                            <i class="ki-duotone ki-pencil fs-6">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <!--begin::Inputs-->
                            <input type="file" name="${uniqueId}[images][${index}]" accept=".png, .jpg, .jpeg">
                            <input type="hidden" name="${uniqueId}[style]" value="${selectedStyle}">
                            <!--end::Inputs-->
                        </label>
                        <!--end::Edit button-->

                        <!--begin::Cancel button-->
                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                              data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                              aria-label="Cancel image" data-bs-original-title="Cancel image" data-kt-initialized="1">
                            <i class="ki-outline ki-cross fs-3"></i>
                        </span>
                        <!--end::Cancel button-->

                        <!--begin::Remove button-->
                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                              data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                              aria-label="Remove image" data-bs-original-title="Remove image" data-kt-initialized="1">
                            <i class="ki-outline ki-cross fs-3"></i>
                        </span>
                        <!--end::Remove button-->
                    </div>
                    <!--end::Image input-->
                </div>
            </div>

        `;
                }

                $(document).on('change', 'input[type="file"]', function (e) {
                    let reader = new FileReader();
                    let previewWrapper = $(this).closest('.image-input').find('.image-input-wrapper');

                    reader.onload = function (e) {
                        previewWrapper.css('background-image', 'url(' + e.target.result + ')');
                    };

                    reader.readAsDataURL(this.files[0]);
                });

                $(document).on('click', '.remove-row', function () {
                    $(this).closest('.delete_line').remove();
                });

                let lastIndex = $('.appendImages .input-group').toArray()
                    .reverse().find(inputGroup => $(inputGroup).find('input[type="file"]').length > 0);

                let startIndex = lastIndex ? parseInt($(lastIndex).find('input[type="file"]').attr('name').match(/\[(\d+)\]$/)[1]) + 1 : 1;

                const uploadsHtml = Array.from({length: Number(selectedStyle)}, (_, i) => {
                    const styleKey = `style${selectedStyle}`;
                    const imgKey = `img${i + 1}`;
                    const size = arr[styleKey] && arr[styleKey][imgKey] ? arr[styleKey][imgKey] : 'Default size';
                    return getImageUploaderHtml(`style_images[${timestamp}]`, i + 1, size);
                }).join('');

                $('.appendImages').append(
                    `
                        <div class="d-flex delete_line w-100 align-items-center" style="border-bottom: 1px solid #dee2e6 !important">
                            ${uploadsHtml}
                            <div class="remove-row">
                                <span class="btn btn-danger remove-row" >x</span>
                             </div>
                        </div>

                       `
                );
            } else {
                alert('Please select image category');
                return false;
            }
        })
    });

</script>


<script>
    $(document).ready(function () {

        $('#add_merch').on('submit', function (e) {
            e.preventDefault();
            $('.addProjectBtn').attr('disabled', 'disabled');

            $.ajax({
                url: '/admin/addMerch',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '/admin/merch_list';
                        $('.addProjectBtn').removeAttr('disabled');
                    } else {
                        $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                        $('.addProjectBtn').removeAttr('disabled');
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