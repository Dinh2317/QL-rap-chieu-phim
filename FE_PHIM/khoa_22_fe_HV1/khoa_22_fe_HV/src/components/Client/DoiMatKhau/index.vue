<template>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <i class="fas fa-lock fa-2x text-primary mb-2"></i>
                            <h4 class="card-title">Change Password</h4>
                            <p class="text-muted">Please enter your current password and choose a new one</p>
                        </div>

                        <!-- Current Password -->
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Enter current password"
                                    required>
                                <button type="button" class="btn btn-outline-secondary password-toggle">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- New Password -->
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">New Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword" placeholder="Enter new password" required>
                                <button type="button" class="btn btn-outline-secondary password-toggle">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="confirmPassword" class="form-label">Confirm New Password</label>
                            <div class="input-group ">
                                <input type="password" class="form-control" id="confirmPassword"
                                    placeholder="Confirm new password" required>
                                <button type="button" class="btn btn-outline-secondary password-toggle">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Password Requirements -->
                        <div class="mb-4">
                            <small class="text-muted">
                                <strong>Password requirements:</strong>
                                <ul class="mt-1 mb-0 ps-3">
                                    <li>At least 8 characters</li>
                                    <li>One uppercase letter </li>
                                    <li>One lowercase letter </li>
                                    <li>One number</li>
                                    <li>One special character</li>
                                </ul>
                            </small>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary"> Change Password </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {

}
</script>
<style></style>