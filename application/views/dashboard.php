<div class="mt-2 ms-2 me-2 mb-2 back-shade p-3 rounded-3">
    <p class="h3">Hi <?php echo $firstname; ?></p>
    <p class="h5" >Welcome to Employee Well</p>
</div>

<div class="mt-2 ms-2 me-2 mb-2 back-shade p-3 rounded-3">
    <div class="row mt-5 mb-3">
        <div class="col-1"></div>
        <div class="col-10">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user->username; ?></td>
                            <td><?php echo $user->firstname; ?></td>
                            <td><?php echo $user->lastname; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td>
                                <!-- Edit user model -->
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edituser<?php echo $user->id; ?>">
                                    Edit User
                                </button>

                                <div class="modal fade" id="edituser<?php echo $user->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- Form to edit user -->
                                            <form action="<?php echo base_url('DashboardController/edit_user'); ?>" id="editUserForm<?php echo $user->id; ?>" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                                                    <label class="form-label mt-1" for="">Username</label>
                                                    <input class="form-control mt-1 mb-1" name="username" type="text" value="<?php echo $user->username; ?>">
                                                    <label class="form-label mt-1" for="">Firstname</label>
                                                    <input class="form-control mt-1 mb-1" name="firstname" type="text" value="<?php echo $user->firstname; ?>">
                                                    <label class="form-label mt-1" for="">Lastname</label>
                                                    <input class="form-control mt-1 mb-1" name="lastname" type="text" value="<?php echo $user->lastname; ?>">
                                                    <label class="form-label mt-1" for="">Email</label>
                                                    <input class="form-control mt-1 mb-1" name="email" type="text" value="<?php echo $user->email; ?>">
                                                    <label class="form-label mt-1" for="">Password</label>
                                                    <input class="form-control mt-1 mb-1" name="password" type="text" value="<?php echo $user->password; ?>">
                                                    <!-- Form to edit user -->
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="save" class="btn btn-success">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit user model -->


                                <!-- Delete user model -->
                                <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#deleteuser<?php echo $user->id; ?>">
                                    Delete User
                                </button>

                                <div class="modal fade" id="deleteuser<?php echo $user->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <!-- Form to delete user -->
                                            <form action="<?php echo base_url('DashboardController/delete_user'); ?>" id="deleteuserform<?php echo $user->id; ?>" method="post">
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="<?php echo $user->id; ?>">
                                                    <p>Are You Sure want to delete <?php echo $user->firstname." ".$user->lastname; ?></p>
                                                   
                                            <!-- Form to delete user -->
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                    <button type="submit" name="save" class="btn btn-danger">Yes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete user model -->


                                <script>
                                    $(document).ready(function() {
                                        $('#deleteuserform<?php echo $user->id; ?>').on('submit', function(event) {
                                            event.preventDefault();

                                            var formData = $(this).serialize();

                                            $.ajax({
                                                url: $(this).attr('action'),
                                                type: 'POST',
                                                data: formData,
                                                success: function(response) {
                                                    $('#result').html(response);
                                                    $('#deleteuser<?php echo $user->id; ?>').modal('hide');
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(xhr.responseText);
                                                }
                                            });
                                        });
                                    });


                                    $(document).ready(function() {
                                        $('#editUserForm<?php echo $user->id; ?>').on('submit', function(event) {
                                            event.preventDefault();

                                            var formData = $(this).serialize();

                                            $.ajax({
                                                url: $(this).attr('action'),
                                                type: 'POST',
                                                data: formData,
                                                success: function(response) {
                                                    $('#result').html(response);
                                                    $('#edituser<?php echo $user->id; ?>').modal('hide');
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(xhr.responseText);
                                                }
                                            });
                                        });
                                    });
                                </script>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <div id="result"></div>
    </div>
    <div class="col-3"></div>
</div>