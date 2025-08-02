<!--HEADER-->
<?= $header ?>
<!--HEADER-->

<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10"
     id="kt_app_main">

    <div class="card min-w-100 py-lg-15 px-lg-15">
        <!-- begin::Form-->

        <form method="post" enctype="multipart/form-data" id="edit_merch">

            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6 w-100 py-2 d-flex justify-content-end" role="tablist">
                <li class="ml-auto">
                    <button class="btn btn-primary addProjectBtn" type="submit">Save</button>
                </li>
            </ul>

            <div class="message">

            </div>

            <input type="hidden" name="merch_id" value="<?= $merch['id'] ?>" >


            <div class="mb-10">
                <label for="title" class=" form-label mt-7 mb-4"> Main Small Image </label>
                <!--begin::Image uploader group-->
                <div class="input-group mb-5">
                    <div>
                        <!--begin::Image input-->
                        <div class=" form-label mt-7">Image size(533 x 756px)</div>
                        <div class="image-input image-input-empty mt-2" data-kt-image-input="true">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" id="frame"  style="background-image: url('<?= $merch['image_small'] ?>')"></div>
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
                                <input type="hidden" name="old_small_image" accept=".png, .jpg, .jpeg" value="
                                <?=$merch['image_small'] ?>">
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
                                 id="slide_frame"  style="background-image: url('<?= $merch['image_large'] ?>')"></div>
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
                                <input type="hidden" name="old_large_image" accept=".png, .jpg, .jpeg" value="
                                <?=$merch['image_large'] ?>">
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
                <input type="text" id="name" name="title" class="form-control form-control-solid" placeholder="Title" value="<?=$merch['title']?>">
            </div>

            <!--begin::Textarea description-->
            <div class="light">
                <label class="form-label required" for="information">Information</label>
                <textarea id="information" class="form-control min-h-125px" aria-label="With textarea"
                          name="information"><?=$merch['information']?></textarea>
            </div>
            <!--end::Textarea description-->

            <div class="appendImages d-flex gap-2 flex-column mt-14">

                <label for="reports_title_1" class="required form-label" style="font-size:2.05rem">
                    Style images
                </label>

                <?php
                $style_images = $merch['style_images'];
                $style_image = json_decode($style_images, true);

                $arr = [
                    '1' => [
                        'img1' => '1840 x 517px',
                    ],
                    '2' => [
                        'img1' => '1220 x 517px',
                        'img2' => '600 x 517px',
                    ],
                    '3' => [
                        'img1' => '600 x 517px',
                        'img2' => '600 x 517px',
                        'img3' => '600 x 517px',
                    ]
                ];
                $uniqueIdCounter = 1;
                foreach ($style_image as $index => $styleEntry) {
                    $currentStyle = $styleEntry['style'];
                    $uniqueIdCounter++;
                    $timestamp = time();
                    $styleImages = $styleEntry['style_images'];
                    ?>


                    <span class="">Style Images: <?= htmlspecialchars($currentStyle) ?></span>
                    <div class="style_image_container d-flex gap-4 flex-wrap ">

                        <?php foreach ($styleImages as $imageIndex => $imagePath): ?>
                            <?php
                            $imageLabel = $arr[$currentStyle]['img' . $imageIndex] ?? '';
                            ?>

                            <!--begin::Image uploader group-->
                            <div class="input-group mb-5 w-auto">
                                <div>
                                    <!--begin::Image input-->
                                    <div class="form-label mt-7">
                                        <?= htmlspecialchars($imageLabel) ?>
                                    </div>
                                    <div class="image-input image-input-empty mt-2" data-kt-image-input="true">
                                        <!--begin::Image preview wrapper-->
                                        <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px"
                                             style="background-image: url('<?= htmlspecialchars($imagePath) ?>')">
                                        </div>
                                        <!--end::Image preview wrapper-->

                                        <!--begin::Edit button-->
                                        <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                               data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                               data-bs-dismiss="click"
                                               aria-label="Upload image" data-bs-original-title="Upload image"
                                               data-kt-initialized="1">
                                            <i class="ki-duotone ki-pencil fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                            </i>
                                            <!--begin::Inputs-->
                                            <input type="file"
                                                   name="style_images[<?=$timestamp?><?=$uniqueIdCounter?>][images][<?= $imageIndex ?>]"
                                                   accept=".png, .jpg, .jpeg">
                                            <input type="hidden" value="<?= htmlspecialchars($imagePath) ?>"
                                                   name="style_images[<?=$timestamp?><?=$uniqueIdCounter?>][images][old][<?= $imageIndex ?>]">
                                            <input type="hidden" name="style_images[<?=$timestamp?><?=$uniqueIdCounter?>][style]"
                                                   value="<?= htmlspecialchars($currentStyle) ?>">
                                            <!--end::Inputs-->
                                        </label>
                                        <!--end::Edit button-->

                                        <!--begin::Cancel button-->
                                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                              data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                              data-bs-dismiss="click"
                                              aria-label="Cancel image" data-bs-original-title="Cancel image"
                                              data-kt-initialized="1">
                        <i class="ki-outline ki-cross fs-3"></i>
                    </span>
                                        <!--end::Cancel button-->

                                        <!--begin::Remove button-->
                                        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                              data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                              data-bs-dismiss="click"
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

                        <?php endforeach; ?>
                    </div>

                <?php } ?>

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

        $('#edit_merch').on('submit', function (e) {
            e.preventDefault();
            $('.addProjectBtn').attr('disabled', 'disabled');

            $.ajax({
                url: '/admin/editMerch',
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