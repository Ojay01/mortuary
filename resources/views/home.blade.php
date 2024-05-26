@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            
<div class="row g-4 mb-4">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Staffs</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">7</h3>
              <small class="text-success">(100%)</small>
            </div>
            <small>Total Staffs</small>
          </div>
          <span class="badge bg-label-primary rounded p-2">
            <i class="bx bx-user bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Verified Users</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">0</h3>
              <small class="text-success">(+95%)</small>
            </div>
            <small>Recent analytics </small>
          </div>
          <span class="badge bg-label-success rounded p-2">
            <i class="bx bx-user-check bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Duplicate Users</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">0</h3>
              <small class="text-success">(0%)</small>
            </div>
            <small>Recent analytics</small>
          </div>
          <span class="badge bg-label-danger rounded p-2">
            <i class="bx bx-group bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Verification Pending</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">7</h3>
              <small class="text-danger">(+6%)</small>
            </div>
            <small>Recent analytics</small>
          </div>
          <span class="badge bg-label-warning rounded p-2">
            <i class="bx bx-user-voice bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Search Filter</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-users table border-top">
        <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Email</th>
                <th>Verified</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Emily Davis</td>
                <td>emily.davis@example.com</td>
                <td class="text-center dtr-hidden"><i class="bx fs-4 bx-shield-x text-danger"></i></td>
                <td class="dtr-hidden">

                <div class="d-inline-block text-nowrap">
                <button class="btn btn-sm btn-icon edit-record" data-id="696" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><i class="bx bx-edit"></i></button>
                <button class="btn btn-sm btn-icon delete-record" data-id="696"><i class="bx bx-trash"></i></button>
                <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu dropdown-menu-end m-0" style=""><a href="#" class="dropdown-item">View</a><a href="javascript:;" class="dropdown-item">Suspend</a></div></div>

                </td>
            </tr>
            
        </tbody>
    </table>
</div>

  <!-- Offcanvas to add new user -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new-user pt-0" id="addNewUserForm">
        <input type="hidden" name="id" id="user_id">
        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">Full Name</label>
          <input type="text" class="form-control" id="add-user-fullname" placeholder="John Doe" name="name" aria-label="John Doe" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-email">Email</label>
          <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-contact">Contact</label>
          <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="userContact" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="add-user-company">Company</label>
          <input type="text" id="add-user-company" name="company" class="form-control" placeholder="Web Developer" aria-label="jdoe1" />
        </div>
        <div class="mb-3">
          <label class="form-label" for="country">Country</label>
          <select id="country" class="select2 form-select">
            <option value="">Select</option>
            <option value="Australia">Australia</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="Belarus">Belarus</option>
            <option value="Brazil">Brazil</option>
            <option value="Canada">Canada</option>
            <option value="China">China</option>
            <option value="France">France</option>
            <option value="Germany">Germany</option>
            <option value="India">India</option>
            <option value="Indonesia">Indonesia</option>
            <option value="Israel">Israel</option>
            <option value="Italy">Italy</option>
            <option value="Japan">Japan</option>
            <option value="Korea">Korea, Republic of</option>
            <option value="Mexico">Mexico</option>
            <option value="Philippines">Philippines</option>
            <option value="Russia">Russian Federation</option>
            <option value="South Africa">South Africa</option>
            <option value="Thailand">Thailand</option>
            <option value="Turkey">Turkey</option>
            <option value="Ukraine">Ukraine</option>
            <option value="United Arab Emirates">United Arab Emirates</option>
            <option value="United Kingdom">United Kingdom</option>
            <option value="United States">United States</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label" for="user-role">User Role</label>
          <select id="user-role" class="form-select">
            <option value="subscriber">Subscriber</option>
            <option value="editor">Editor</option>
            <option value="maintainer">Maintainer</option>
            <option value="author">Author</option>
            <option value="admin">Admin</option>
          </select>
        </div>
        <div class="mb-4">
          <label class="form-label" for="user-plan">Select Plan</label>
          <select id="user-plan" class="form-select">
            <option value="basic">Basic</option>
            <option value="enterprise">Enterprise</option>
            <option value="company">Company</option>
            <option value="team">Team</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
      </form>
    </div>
  </div>
</div>

          </div>
          <!-- / Content -->

          <!-- Footer -->
                    <!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
    <div class="mb-2 mb-md-0">
      © <script>document.write(new Date().getFullYear())</script>
      , made with ❤️ by <a href="https://ameneacademy.com/" target="_blank" class="footer-link fw-medium">Kelly Kingston</a>
    </div>
    
  </div>
</footer>
<!--/ Footer-->
                    <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>
@endsection
