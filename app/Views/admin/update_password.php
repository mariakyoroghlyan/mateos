<?=$header?>
<style>
    .password-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        padding: 2rem;
    }

    .password-card {
        width: 100%;
        max-width: 500px;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        background: #fff;
    }

    .password-card h1 {
        font-size: 2rem;
        font-weight: 600;
    }

    .form-group label {
        font-weight: 500;
    }
</style>

<div class="password-container">
    <div class="password-card p-4">
        <h1 class="mb-4">Update Password</h1>

        <?php if (session()->getFlashdata('error')) { ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php } ?>

        <form action="/admin/admin-update-password-function" method="POST">
            <div class="form-group mb-3">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control mt-5" name="verify_new_password" id="new_password" placeholder="Enter new password" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 mt-3" style="background: rgba(65, 29, 11, 1); color: white">Save Password</button>
        </form>
    </div>
</div>

<?=$footer?>
