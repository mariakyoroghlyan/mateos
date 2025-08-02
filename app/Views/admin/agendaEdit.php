<!--HEADER-->
<?= $header ?>
<!--HEADER-->

<?php
$current_category_id = $agenda['category'];
$current_month_id = $agenda['month'];
?>

<div class="container-fluid d-flex flex-column flex-lg-row app-main flex-column flex-row-fluid py-lg-10 px-lg-10"
     id="kt_app_main">
    <div class=" flex-column flex-row-fluid" id="kt_app_wrapper">
        <h1 class="mb-5">Agenda bewerken</h1>

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
        <form id="agendaEdit" method="post" enctype="multipart/form-data">
            <input type="hidden" name="agendaId" value="<?=$agenda['id']?>">
            <button class="btn editAgendaBtn d-flex text-white align-items-center" style="margin-left: auto; background: rgba(65, 29, 11, 1);">
                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true"></span>
                <span class="btn-text">Save</span>
            </button>

            <div class="message"></div>
            <!-- tabs start-->
            <div class="tab-content mt-5 padding-left" id="myTabContent">

                <!--main fixed-->
                <div class="mb-10">
                    <label for="date" class=" form-label mt-7 mb-4">Date *</label>
                    <input type="date" id="date" name="date" class="form-control form-control-solid" placeholder="Title" value="<?=$agenda['date']?>">
                </div>

                <div class="mb-10">
                    <label for="time" class=" form-label mt-7 mb-4">Time *</label>
                    <input type="time" id="date" name="time" class="form-control form-control-solid" placeholder="Time" value="<?=$agenda['time']?>">
                </div>
                
                <!--begin::Image uploader group-->
                <div class="input-group mb-10">
                    <div>
                        <!--begin::Image input-->
                        <div class="image-input image-input-empty mt-2" data-kt-image-input="true">
                            <!--begin::Image preview wrapper-->
                            <div class="image-input-wrapper img-image-input-wrapper w-125px h-125px" id="frame" style="background-image: url('<?= empty($agenda['image']) ? '/assets/media/svg/files/blank-image.svg' : $agenda['image']?>')"></div>
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
                                <input type="hidden" name="image_old" value="<?=$agenda['image']?>">
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

<!--                <label for="date" class=" form-label mt-7 mb-4">Agenda Category</label>-->
<!--                <select class="form-select mb-10" name="category" data-control="select2" data-placeholder="Select a Language">-->
<!--                    --><?php
//                    foreach ($agenda_category as $category) {?>
<!--                        <option value="--><?php //=$category['id']?><!--" --><?php //= $category['id'] == $current_category_id ? 'selected' : '' ?><?php //=$category['name-en']?><!--</option>-->
<!--                    --><?php //}
//                    ?>
<!--                </select>-->

                <label for="month" class=" form-label mt-7 mb-4">Agenda Months</label>

                <select class="form-select mb-10" name="month" data-control="select2" data-placeholder="Select a Month">
                    <?php
                    foreach ($months as $month) {?>
                        <option value="<?=$month['id']?>" <?=$month['id'] == $current_month_id ? 'selected' : ''?>> <?=$month['name-en']?></option>
                    <?php }
                    ?>
                </select>

                <div class="mb-10">
                    <label class=" form-label mt-7 mb-4" for="status">
                        Status
                    </label>
                    <div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input cursor-pointer" type="checkbox" id="status" name="status" <?= $agenda['status'] == 1 ? 'checked' : '' ?>>
                    </div>
                </div>
                <!--main fixed-->

                <!--end::default input-->
                <!--tab2 start -->
                <div class="tab-pane fade show active mt-5" id="kt_tab_pane_1" role="tabpanel">
                    <div class="mb-10">
                        <label for="title" class=" form-label mt-7 mb-4">Title Nl *</label>
                        <input type="text" id="title" name="title-nl" class="form-control form-control-solid" placeholder="Title" value="<?=$agenda['title-nl']?>">
                    </div>

                    <!--text editor start-->
                    <div class="py-5 d-flex flex-column gap-5" data-bs-theme="light">

                        <span class="text-dark">Description Nl *</span>

                        <textarea name="desc-nl" id="kt_docs_ckeditor_classic"><?=$agenda['desc-nl']?></textarea>

                    </div>

                </div>
                <!--tab2 end -->

                <!--tab1 start -->
                <div class="tab-pane fade mt-5" id="kt_tab_pane_3"
                     role="tabpanel">

                    <div class="mb-10">
                        <label for="title" class=" form-label mt-7 mb-4">Title En *</label>
                        <input type="text" id="title" name="title-en" class="form-control form-control-solid" placeholder="Title" value="<?=$agenda['title-en']?>">
                    </div>

                    <!--text editor start-->
                    <div class="py-5 d-flex flex-column gap-5" data-bs-theme="light">

                        <span class="text-dark">Description En *</span>

                        <textarea name="desc-en" id="kt_docs_ckeditor_classic"><?=$agenda['desc-en']?></textarea>

                    </div>
                    <!--text editor end-->

                </div>
                <!--tab1 end -->

                <!--tab3 start -->
                <div class="tab-pane fade mt-5" id="kt_tab_pane_2" role="tabpanel">
                    <div class="mb-10">
                        <label for="title" class=" form-label mt-7 mb-4">Title Am *</label>
                        <input type="text" id="title" name="title-am" class="form-control form-control-solid" placeholder="Title" value="<?=$agenda['title-am']?>">
                    </div>

                    <!--text editor start-->
                    <div class="py-5 d-flex flex-column gap-5" data-bs-theme="light">

                        <span class="text-dark">Description Am *</span>

                        <textarea name="desc-am" id="kt_docs_ckeditor_classic"><?=$agenda['desc-am']?></textarea>

                    </div>

                </div>
                <!--tab3 end -->

            </div>
            <!-- tabs end -->


        </form>

        <!--form end -->

    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="/assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js"></script>


<script>
    // $(document).ready(function () {
    //     $('#agendaEdit').on('submit', function (e) {
    //         e.preventDefault();
    //         $('.editAgendaBtn').attr('disabled', 'disabled');
    //
    //         $.ajax({
    //             url: '/admin/agenda-edit-function',
    //             type: 'POST',
    //             data: new FormData(this),
    //             processData: false,
    //             contentType: false,
    //             success: function (response) {
    //                 if (response.status === 'success') {
    //                     window.location.href = '/admin/admin-agenda';
    //                     $('.editAgendaBtn').removeAttr('disabled');
    //                 } else {
    //                     $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
    //                     $('.editAgendaBtn').removeAttr('disabled');
    //                 }
    //             },
    //             error: function () {
    //                 $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
    //             }
    //         });
    //     });
    // })

    $(document).ready(function () {
        $('#agendaEdit').on('submit', function (e) {
            e.preventDefault();

            const $button = $('.editAgendaBtn');
            const $spinner = $button.find('.spinner-border');
            const $btnText = $button.find('.btn-text');

            $button.attr('disabled', 'disabled');
            $spinner.removeClass('d-none'); // Show spinner
            $btnText.text('Saving...');     // Change text

            $.ajax({
                url: '/admin/agenda-edit-function',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '/admin/admin-agenda';
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
                $spinner.addClass('d-none');
                $btnText.text('Save');
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

<script>
    $(document).ready(function() {
        $('#date').on('change', function() {
            var selectedDate = new Date($(this).val());
            var selectedMonth = selectedDate.getMonth() + 1; // 0-based, so +1 for correct month number

            $("select[name='month'] option").each(function() {
                if (parseInt($(this).val()) === selectedMonth) {
                    $(this).prop('selected', true);
                    $("select[name='month']").trigger('change'); // for Select2 UI update
                    return false; // stop the loop
                }
            });
        });
    });
</script>


<!--FOOTER-->
<?= $footer ?>
<!--FOOTER-->