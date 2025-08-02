<!--HEADER-->
<?= $header ?>
<!--HEADER-->

<!---->
<?php
//    print_r($project['show']);
//    exit();
//?>
<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10"
     id="kt_app_main">

    <div class="card min-w-100 py-lg-15 px-lg-15">
        <!-- begin::Form-->

        <form method="post" enctype="multipart/form-data" id="edit_projects">
            <input type="hidden" name="id" value="<?=$project['id']?>">
            <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6 w-100 py-2 d-flex justify-content-end" role="tablist">
                <li class="ml-auto">
                    <button class="btn btn-primary editProjectBtn" type="submit">Save</button>
                </li>
            </ul>

            <div class="mb-10">
                <label for="reports_title_1" class=" form-label mt-7 mb-4" style="font-size:2.05rem">
                    Main info
                </label>
            </div>

            <div class="message">

            </div>

            <div class="mb-10">
                <label for="title" class=" form-label mt-7 mb-4">General Image</label>
                <!--begin::Image uploader group-->
                <div class="input-group mb-5">
                <div>
                    <!--begin::Image input-->
                    <div class=" form-label mt-7">Image size(1537 x 820px)</div>
                    <div class="image-input image-input-empty mt-2" data-kt-image-input="true">
                        <!--begin::Image preview wrapper-->
                        <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" id="frame"
                             style="background-image: url('<?= $project['image'] ?>')"></div>
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
                            <input type="file" name="image" accept=".png, .jpg, .jpeg">
                            <input type="hidden" name="image" value="<?=$project['image']?>">

                            <!--<input type="hidden" name="imageHidden">-->
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
                <!--end::Image uploader group-->
            </div>

            <div class="mb-10">
                <label for="title" class=" form-label mt-7 mb-4">Slide Image</label>
                <!--begin::Image uploader group-->
                <div class="input-group mb-5">
                    <div>
                        <!--begin::Image input-->
                        <div class=" form-label mt-7">Image size(1840 x 974px)</div>
                        <div class="image-input image-input-empty mt-2" data-kt-image-input="true">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" id="slide_frame"
                                 style="background-image: url('<?= $project['slide_image'] ?>')"></div>
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
                                <input type="file" name="slide_image" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="slide_image" value="<?=$project['slide_image']?>">

                                <!--<input type="hidden" name="imageHidden">-->
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
                <!--end::Image uploader group-->
            </div>

            <div class="mb-10">
                <label for="title" class=" form-label mt-7 mb-4">Title</label>
                <input type="text" id="name" name="title" class="form-control form-control-solid" placeholder="Title"
                       value="<?= $project['title'] ?>">
            </div>

            <div class="mb-10">
                <label for="location" class=" form-label mt-7 mb-4">Location</label>
                <input type="text" id="location" name="location" class="form-control form-control-solid"
                       placeholder="Location" value="<?= $project['location'] ?>">
            </div>

            <div class="mb-10">
                <label for="date" class=" form-label mt-7 mb-4">Date</label>
                <input type="date" id="date myDate" name="date" class="form-control form-control-solid"
                       placeholder="Date" value="<?= $project['date'] ?>">
            </div>

            <div class="mb-10">
                <label for="square" class=" form-label mt-7 mb-4">Square</label>
                <input type="number" step="0.01" id="square" name="square" class="form-control form-control-solid"
                       placeholder="Square" value="<?= $project['square'] ?>">
            </div>

            <!--begin::Input title-->
            <div class="mb-10">
                <label class=" form-label mt-7 mb-4" for="show">
                    Show in slider
                </label>
                <div class="form-check form-switch form-check-custom form-check-solid">
                    <input class="form-check-input cursor-pointer" type="checkbox" id="show"
                           name="show" <?= $project['show'] == '1' ? 'checked' : '' ?> />
                </div>
            </div>
            <!--end::Input title-->

            <div class="mb-10 ">
                <label class="required form-label mt-7 mb-4" for="category">
                    Category
                </label>
                <select class="form-select" data-control="select2" data-placeholder="Select an option" name="category"
                        id="category">
                    <option value="1" <?php if ($project['category'] == 1) echo 'selected'; ?>>Restaurants and Bars
                    </option>
                    <option value="2" <?php if ($project['category'] == 2) echo 'selected'; ?>>Hotels & Spa</option>
                    <option value="3" <?php if ($project['category'] == 3) echo 'selected'; ?>>Architecture</option>
                    <option value="4" <?php if ($project['category'] == 4) echo 'selected'; ?>>Furniture & Light
                    </option>
                    <option value="5" <?php if ($project['category'] == 5) echo 'selected'; ?>>Retail</option>
                </select>
            </div>

            <!--begin::Textarea description-->
            <div class="light">
                <label class="form-label required" for="information">Information</label>
                <textarea id="information" class="form-control min-h-125px" aria-label="With textarea" name="information"><?= $project['information'] ?></textarea>
            </div>
            <!--end::Textarea description-->

            <!-- start team-->
            <div class="mb-10 mt-14 mb-4 d-flex justify-content-start">
                <label for="reports_title_1" class="required form-label d-flex justify-content-start"
                       style="font-size:2.05rem">
                    Team
                </label>
            </div>

            <div class="appendTeam d-flex gap-2 flex-column">
                <?php
                $team = json_decode($project['team'], true);
                foreach ($team as $id => $item): ?>
                    <div class="mb-2">
                        <label for="location" class=" form-label mt-7 mb-4">Position</label>
                        <input type="text" id="location" name="team[<?= $id ?>][position]"
                               class="form-control form-control-solid" placeholder="Location"
                               value="<?= htmlspecialchars($item['position'], ENT_QUOTES) ?>">
                    </div>

                    <div class="mb-4">
                        <label for="location" class=" form-label mt-7 mb-4">Full name</label>
                        <input type="text" id="location" name="team[<?= $id ?>][fullname]"
                               class="form-control form-control-solid" placeholder="Location"
                               value="<?= htmlspecialchars($item['fullname'], ENT_QUOTES) ?>">
                    </div>
                <?php
                endforeach;
                ?>
            </div>
            <!-- end team -->

            <hr>

            <!-- start materials-->
            <div class="mb-10 mt-14 mb-4 d-flex justify-content-start">
                <label for="reports_title_1" class="required form-label"
                       style="font-size:2.05rem">
                    Materials
                </label>
            </div>

            <div class="appendMaterials d-flex gap-2 flex-column">
                <?php
                $material = json_decode($project['material'], true);
                foreach ($material as $id => $item):
                    ?>
                    <div class="mb-2">
                        <label for="material[<?= $id ?>][collection_name]" class=" form-label mt-7 mb-4">Name</label>
                        <input type="text" id="material[<?= $id ?>][collection_name]" name="material[<?= $id ?>][collection_name]"
                               class="form-control form-control-solid" placeholder="Name"
                               value="<?= htmlspecialchars($item['collection_name'], ENT_QUOTES) ?>">
                    </div>

                    <div class="mb-4">
                        <label for="material[<?= $id ?>][value]" class="form-label mt-7 mb-4">Information</label>
                        <input type="text" id="material[<?= $id ?>][value]" name="material[<?= $id ?>][value]"
                               class="form-control form-control-solid" placeholder="Information"
                               value="<?= htmlspecialchars($item['value'], ENT_QUOTES) ?>">
                    </div>
                <?php
                endforeach;
                ?>
            </div>
            <!-- end materials-->
            <hr>

            <!--start publications-->

            <div class="mb-10 mt-14 mb-4 d-flex justify-content-start">
                <label for="reports_title_1" class="required form-label"
                       style="font-size:2.05rem">
                    Publications
                </label>
            </div>

            <div class="appendPublications d-flex gap-2 flex-column">
                <?php
                $publication = json_decode($project['publication'], true);
                foreach ($publication as $id => $item): ?>
                    <div class="mb-2">
                        <label for="publication[<?= $id ?>][name]" class=" form-label mt-7 mb-4">Name</label>
                        <input type="text" id="publication[<?= $id ?>][name]" name="publication[<?= $id ?>][name]"
                               class="form-control form-control-solid" placeholder="Name"
                               value="<?= htmlspecialchars($item['name'], ENT_QUOTES) ?>">
                    </div>

                    <div class="mb-4">
                        <label for="publication[<?= $id ?>][link]" class=" form-label mt-7 mb-4">Link</label>
                        <input type="text" id="publication[<?= $id ?>][link]" name="publication[<?= $id ?>][link]"
                               class="form-control form-control-solid" placeholder="Link"
                               value="<?= htmlspecialchars($item['link'], ENT_QUOTES) ?>">
                    </div>
                <?php
                endforeach;
                ?>
            </div>

            <!-- end publications-->
            <hr>

            <div class="appendImages d-flex gap-2 flex-column mt-14">

                <label for="reports_title_1" class="required form-label" style="font-size:2.05rem">
                    Style images
                </label>

                <?php
                $style_images = $project['style_images'];
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
                    <div class="style_image_container d-flex gap-4 flex-wrap">

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

        $('#edit_projects').on('submit', function (e) {
            e.preventDefault();
            $('.editProjectBtn').attr('disabled', 'disabled');

            $.ajax({
                url: '/admin/editProjects',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '/admin/projects_list';
                        $('.editProjectBtn').removeAttr('disabled');
                    } else {
                        $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                        $('.editProjectBtn').removeAttr('disabled');
                    }
                },
                error: function () {
                    $('<div class="alert alert-danger"></div>').appendTo('.col-md-12.mb-4');
                }
            });
        });
    })
</script>


<script>
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('myDate').value = today;
</script>
<script>
    $(document).on('change', 'input[type="file"]', function (e) {
        let reader = new FileReader();
        let previewWrapper = $(this).closest('.image-input').find('.image-input-wrapper');

        reader.onload = function (e) {
            previewWrapper.css('background-image', 'url(' + e.target.result + ')');
        };

        reader.readAsDataURL(this.files[0]);
    });
</script>

<!--FOOTER-->
<?= $footer ?>
<!--FOOTER-->
