<!-- Modal -->
<div class="modal fade" id="teacherProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Your Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- create account form -->
                    <form method="post" id="teacherAccountCreate">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Teacher ID</label>
                            <input type="number" name="teacher_id" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Your ID">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Teacher Name</label>
                            <input type="text" name="teacher_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Your Name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Teacher Phone</label>
                            <input type="tel" name="teacher_phone" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Your Phone">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Teacher Email</label>
                            <input type="email" name="teacher_email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter Your Email">
                        </div>
                        <label class="form-check-label mb-2" for="gender">Select Your Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="M">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="O">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="createAccount" form="teacherAccountCreate" value="createAccount"
                        class="btn btn-primary">Create Account</button>
                </div>
            </div>
        </div>
    </div>