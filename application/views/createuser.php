<div class="row ms-2 me-2 mt-2 mt mb-2 back-shade rounded-3">
    <!-- <form class="py-3" action="" method="post" onsubmit="return false" id="createUserForm">   -->
    <form class="py-3" action="<?php echo base_url('CreateUserController/create_user'); ?>" method="post" id="createUserForm">
        <p class="h3 mt-2">Create account</p>
        <label class="form-label mt-3" for="">Enter Username</label>
        <input class="form-control w-50" type="text" name="username" id="" placeholder="Enter Username" required>

        <label class="form-label mt-3" for="">Enter firstname</label>
        <input class="form-control w-50" type="text" name="firstname" id="" placeholder="Enter firstname" required>

        <label class="form-label mt-3" for="">Enter lastname</label>
        <input class="form-control w-50" type="text" name="lastname" id="" placeholder="Enter lastname" required>

        <label class="form-label mt-3" for="">Enter email</label>
        <input class="form-control w-50" type="text" name="email" id="" placeholder="Enter email" required>

        <label class="form-label mt-3" for="">Create password</label>
        <input class="form-control w-50" type="password" name="password" id="" placeholder="Create Password" required>

        <label class="form-label mt-3" for="">Confirm password</label>
        <input class="form-control w-50" type="text" name="cnfpassword" id="" placeholder="Confirm Password" required>

        <input class="btn btn-success mt-3" type="submit" name="createuser" id="createuser" value="Create Account">
    </form>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div id="result"></div>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#createUserForm').on('submit', function(event) {
            event.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    $('#result').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>