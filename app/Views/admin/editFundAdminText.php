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
        <form id="editFundText" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?=$fund['id']?>" name="editFundId">
            <button class="btn btn-primary editFundTextBtn d-flex" style="margin-left: auto">Save</button>

            <div class="message"></div>
            <!-- tabs start-->
            <div class="tab-content mt-5 padding-left" id="myTabContent">

                <!--end::default input-->

                <!--tab1 start -->
                <div class="tab-pane fade show active mt-5" id="kt_tab_pane_1"
                     role="tabpanel">

                    <div class="mb-10">
                        <label for="text_en" class="form-label mt-7 mb-4">Text</label>
                        <input type="text" id="text_en" name="text_en" class="form-control form-control-solid" placeholder="Title" value="<?=$fund['text_en']?>">
                    </div>

                    <div class="mb-10">
                        <label class="form-label mt-7 mb-4" for="date">Date</label>
                        <input type="text" id="date" name="date_en" class="form-control form-control-solid" placeholder="Date" value="<?=$fund['date_en']?>">
                    </div>

                </div>
                <!--tab1 end -->

                <!--tab1 start -->
                <div class="tab-pane fade show mt-5" id="kt_tab_pane_2" role="tabpanel">

                    <div class="mb-10">
                        <label for="text_am" class="form-label mt-7 mb-4">Text</label>
                        <input type="text" id="text_am" name="text_am" class="form-control form-control-solid" placeholder="Text" value="<?=$fund['text_am']?>">
                    </div>

                    <div class="mb-10">
                        <label class="form-label mt-7 mb-4" for="date_am">Date</label>
                        <input type="text" id="date_am" name="date_am" class="form-control form-control-solid" placeholder="Date" value="<?=$fund['date_am']?>">
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

        $('#editFundText').on('submit', function (e) {
            e.preventDefault();
            $('.editFundTextBtn').attr('disabled', 'disabled');

            $.ajax({
                url: '/admin/fundTextChange',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status === 'success') {
                        window.location.href = '/admin/admin_text_control';
                        $('.editFundTextBtn').removeAttr('disabled');
                    } else {
                        $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                        $('.editHomeTextBtn').removeAttr('disabled');
                    }
                },
                error: function () {
                    $('.editFundTextBtn').removeAttr('disabled');
                    $('<div class="alert alert-danger">' + response.message + '</div>').appendTo('.message');
                }
            });
        });
    })
</script>

<script>

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