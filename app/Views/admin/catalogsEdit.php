<!--HEADER-->
<?= $header ?>
<!--HEADER-->

<style>
    input:disabled {
        background-color: #f5f5f5;
        cursor: not-allowed;
    }
</style>

<?php
$current_language_id = $catalog['language'];
$current_genre_id = $catalog['genre'];
$current_type_id = $catalog['type'];
$existing_pdf  = $catalog['pdf'];
$existing_link  = $catalog['link'];
?>



<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10"
     id="kt_app_main">
    <div class=" flex-column flex-row-fluid" id="kt_app_wrapper">
        <h1 class="mb-5">Catalogus bewerken</h1>

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
        <form id="catalogEdit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="catalogId" value="<?=$catalog['id']?>">
            <button class="btn editCatalogBtn d-flex text-white align-items-center" style="margin-left: auto; background: rgba(65, 29, 11, 1);">
                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                <span class="btn-text">Save</span>
            </button>


            <div class="message"></div>
            <!-- tabs start-->
            <div class="tab-content mt-5 padding-left" id="myTabContent">

                <!--main fixed-->
<!--                <div class="mb-10">-->
<!--                    <label for="date" class=" form-label mt-7 mb-4">Date</label>-->
<!--                    <input type="date" id="date" name="date" class="form-control form-control-solid" placeholder="Date" value="--><?php //=$catalog['date']?><!--">-->
<!--                </div>-->

                <div class="mb-10">
                    <label for="year" class=" form-label mt-7 mb-4">Publication year *</label>
                    <input type="number" id="year" name="year" class="form-control form-control-solid" placeholder="Year" value="<?=$catalog['year']?>" required>
                </div>



                <label for="image" class=" form-label mt-7 mb-4">Image</label>

                <!--begin::Image uploader group-->
                <div class="input-group mb-10">
                    <div>
                        <!--begin::Image input-->
                        <div class="image-input image-input-empty mt-2" data-kt-image-input="true">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" id="frame" style="background-image: url('<?= empty($catalog['image']) ? '/assets/media/svg/files/blank-image.svg' : $catalog['image']?>')"></div>
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
                                <input type="hidden" name="image_old" value="<?=$catalog['image']?> ">
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

                <div class="hiddenItem">
                    <label for="pdf" class="form-label mt-7 mb-4">PDF</label>

                    <div class="input-group mb-10">
                        <div>
                            <!--begin::PDF input-->
                            <div class="image-input mt-2" data-kt-image-input="true">
                                <!--begin::PDF preview icon wrapper-->
                                <div class="image-input-wrapper d-flex align-items-center justify-content-center w-125px h-125px bg-light border rounded">
                                    <i class="ki-duotone ki-file fs-1 text-danger"></i>
                                </div>
                                <!--end::PDF preview icon wrapper-->

                                <!--begin::File name display-->
                                <div class="mt-2">
                    <span id="pdf-name" class="text-gray-600 fs-8 fst-italic">
                        <?= !empty($catalog['pdf']) ? basename($catalog['pdf']) : 'No PDF selected' ?>
                    </span>
                                </div>
                                <!--end::File name display-->

                                <!--begin::Edit button-->
                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow mt-2"
                                       data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                       aria-label="Upload PDF" data-bs-original-title="Upload PDF">
                                    <i class="ki-duotone ki-pencil fs-6">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                    <input type="file" name="pdf" accept=".pdf" onchange="showPDFName(this)">
                                    <input type="hidden" name="pdf_old" value="<?= $catalog['pdf'] ?>">
                                </label>
                                <!--end::Edit button-->

                                <!--begin::Cancel button-->
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                      data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                      aria-label="Cancel PDF" data-bs-original-title="Cancel PDF" onclick="clearPDF()">
                    <i class="ki-outline ki-cross fs-3"></i>
                </span>
                                <!--end::Cancel button-->

                                <!--begin::Remove button-->
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                      data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                      aria-label="Remove PDF" data-bs-original-title="Remove PDF" onclick="clearPDF()">
                    <i class="ki-outline ki-cross fs-3"></i>
                </span>
                                <!--end::Remove button-->
                            </div>
                            <!--end::PDF input-->
                        </div>
                    </div>
                </div>

                <label for="language" class=" form-label mt-7 mb-4">Publication place *</label>
                <select class="form-select mb-10" name="language" data-control="select2" data-placeholder="Select a Language">
                    <?php foreach ($languages as $lang) { ?>
                        <option value="<?=$lang['id']?>" <?= $lang['id'] == $current_language_id ? 'selected' : '' ?>>
                            <?=$lang['name-en']?>
                        </option>
                    <?php } ?>
                </select>

                <label for="genre" class=" form-label mt-7 mb-4">Genre *</label>
                <select class="form-select mb-10" name="genre" data-control="select2" data-placeholder="Select a Genre">
                    <?php
                    foreach ($genres as $genre) {?>
                        <option value="<?=$genre['id']?>" <?= $genre['id'] == $current_genre_id ? 'selected' : '' ?>> <?=$genre['name-en']?></option>
                    <?php }
                    ?>
                </select>

                <label for="date" class=" form-label mt-7 mb-4" >Type *</label>
                <select class="form-select mb-10" name="type" id="typeSelect" data-control="select2" data-placeholder="Select a Type">
                    <?php
                    foreach ($types as $type) {?>
                        <option value="<?=$type['id']?>" <?= $type['id'] == $current_type_id ? 'selected' : '' ?>> <?=$type['name-en']?></option>
                    <?php }
                    ?>
                </select>

                <div class="mb-10 hiddenItem">
                    <label for="link" class=" form-label mt-7 mb-4 ">Link</label>
                    <input type="text" id="link" name="link" class="form-control form-control-solid" placeholder="Link" value="<?=$catalog['link']?>" >
                </div>
                <!--main fixed-->

                <!--end::default input-->



                <!--tab2 start -->
                <div class="tab-pane fade show active mt-5" id="kt_tab_pane_1" role="tabpanel">
                    <div class="mb-10">
                        <label for="title" class=" form-label mt-7 mb-4">Title Nl *</label>
                        <input type="text" id="title" name="title-nl" class="form-control form-control-solid" placeholder="Title" value="<?=$catalog['title-nl']?>" >
                    </div>

                    <div class="mb-10">
                        <label for="author" class="form-label mt-7 mb-4">Author Nl *</label>
                        <input type="text" id="author" name="author-nl" class="form-control form-control-solid" placeholder="Author" value="<?=$catalog['author-nl']?>" >
                    </div>

                    <div class="py-5 d-flex flex-column gap-5" data-bs-theme="light">
                        <label for="author" class="form-label mt-7 mb-4">Description NL </label>

                        <textarea name="desc-nl" id="kt_docs_ckeditor_classic"><?=$catalog['desc-nl']?></textarea>
                    </div>

                </div>
                <!--tab2 end -->

                <!--tab3 start -->
                <div class="tab-pane fade mt-5" id="kt_tab_pane_2" role="tabpanel">
                    <div class="mb-10">
                        <label for="title" class=" form-label mt-7 mb-4">Title Am *</label>
                        <input type="text" id="title" name="title-am" class="form-control form-control-solid" placeholder="Title" value="<?=$catalog['title-am']?>">
                    </div>

                    <div class="mb-10">
                        <label for="author" class="form-label mt-7 mb-4">Author Am *</label>
                        <input type="text" id="author" name="author-am" class="form-control form-control-solid" placeholder="Author" value="<?=$catalog['author-am']?>">
                    </div>

                    <div class="py-5 d-flex flex-column gap-5" data-bs-theme="light">
                        <label for="author" class="form-label mt-7 mb-4">Description Am</label>

                        <textarea name="desc-am" id="kt_docs_ckeditor_classic"><?=$catalog['desc-am']?></textarea>
                    </div>

                </div>
                <!--tab3 end -->

                <!--tab1 start -->
                <div class="tab-pane fade mt-5" id="kt_tab_pane_3"
                     role="tabpanel">

                    <div class="mb-10">
                        <label for="title" class=" form-label mt-7 mb-4">Title En *</label>
                        <input type="text" id="title" name="title-en" class="form-control form-control-solid" placeholder="Title" value="<?=$catalog['title-en']?>">
                    </div>

                    <div class="mb-10">
                        <label for="author" class="form-label mt-7 mb-4">Author En *</label>
                        <input type="text" id="author" name="author-en" class="form-control form-control-solid" placeholder="Author" value="<?=$catalog['author-en']?>">
                    </div>

                    <div class="py-5 d-flex flex-column gap-5" data-bs-theme="light">
                        <label for="author" class="form-label mt-7 mb-4">Description En</label>

                        <textarea name="desc-en" id="kt_docs_ckeditor_classic"><?=$catalog['desc-en']?></textarea>
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

<?php if (!empty($existing_pdf)): ?>
    <script>
        $(document).ready(function () {
            $('input[name="link"]').prop('disabled', true);
        });
    </script>
<?php elseif (!empty($existing_link)): ?>
    <script>
        $(document).ready(function () {
            $('input[type="file"][name="pdf"]').prop('disabled', true);
        });
    </script>
<?php endif; ?>

<?php if ($current_type_id == 3): ?>
    <script>
        $(document).ready(function () {
            $('.hiddenItem').css('display', 'none');
        });
    </script>
<?php endif; ?>


<script>
    $(document).ready(function () {
        // Assuming you initialized select2 like this somewhere:
        $('#typeSelect').select2();

        $('#typeSelect').on('change', function () {
            const selectedValue = $(this).val();
            const linkInput = $('.hiddenItem');
            console.log(selectedValue)
            if (selectedValue === '3') { // Replace '3' with the actual ID for "Only in the library"
                linkInput.css('display', 'none')
            } else {
                linkInput.css('display', 'block')
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        const $pdfInput = $('input[type="file"][name="pdf"]');
        const $linkInput = $('input[name="link"]');

        // Disable the other field if one is already filled (edit mode)
        if ($pdfInput[0].files.length > 0 || $pdfInput.closest('.image-input').hasClass('image-input-changed')) {
            $linkInput.prop('disabled', true);
        }

        if ($linkInput.val().trim() !== '') {
            $pdfInput.prop('disabled', true);
        }

        // When selecting a PDF
        $pdfInput.on('change', function () {
            if (this.files.length > 0) {
                $linkInput.prop('disabled', true).val('');
            } else {
                $linkInput.prop('disabled', false);
            }
        });

        // When typing a link
        $linkInput.on('input', function () {
            if ($(this).val().trim() !== '') {
                $pdfInput.prop('disabled', true).val('');
            } else {
                $pdfInput.prop('disabled', false);
            }
        });

        // When removing PDF via custom remove button
        $('[data-kt-image-input-action="remove"]').on('click', function () {
            setTimeout(function () {
                $pdfInput.val('');
                $linkInput.prop('disabled', false);
            }, 100);
        });
    });
</script>


<script>
    function showPDFName(input) {
        const fileNameSpan = document.getElementById('pdf-name');
        if (input.files && input.files[0]) {
            fileNameSpan.textContent = input.files[0].name;
        } else {
            fileNameSpan.textContent = 'No PDF selected';
        }
    }

    function clearPDF() {
        const input = document.querySelector('input[name="pdf"]');
        const fileNameSpan = document.getElementById('pdf-name');
        input.value = '';
        fileNameSpan.textContent = 'No PDF selected';
    }
</script>

<script>
    $(document).ready(function () {
        $('#catalogEdit').on('submit', function (e) {
            e.preventDefault();

            const $button = $('.editCatalogBtn');
            const $spinner = $button.find('.spinner-border');
            const $btnText = $button.find('.btn-text');

            $button.attr('disabled', 'disabled');
            $spinner.removeClass('d-none');
            $btnText.text('Saving...');

            $.ajax({
                url: '/admin/catalog-edit-function',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '/admin/admin-catalogs';
                    } else {
                        $('.message').html('<div class="alert alert-danger">' + response.message + '</div>');
                        resetButton();
                    }
                },
                error: function () {
                    $('.message').html('<div class="alert alert-danger">An error occurred.</div>');
                    resetButton();
                }
            });

            function resetButton() {
                $button.removeAttr('disabled');
                $spinner.addClass('d-none');    // Hide spinner
                $btnText.text('Save');         // Reset text
            }
        });
    });

</script>

<script>
    //  text editor
    document.querySelectorAll('#kt_docs_ckeditor_classic').forEach(function (element) {
        ClassicEditor
            .create(element, {
                removePlugins: ['MediaEmbed', 'Table', 'TableToolbar', 'InsertTable']
            })
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