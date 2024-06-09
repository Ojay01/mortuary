@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<script src="https://unpkg.com/html5-qrcode/minified/html5-qrcode.min.js"></script>

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
              <h3 class="mb-0 me-2"> {{$staff}} </h3>
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
            <span>Enrol Corpses</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{$corpse}} </h3>
              <small class="text-success"> </small>
            </div>
            <small>Total Corpses </small>
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
            <span>Pending Payments</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{$paidCorpse}} </h3>
              <small class="text-success"> </small>
            </div>
            <small>No of unpaid Corpse</small>
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
            <span>Autopsy Corpses</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{$autopsyCorpse}} </h3>
              <small class="text-danger"> </small>
            </div>
            <small>Currently in autopsy</small>
          </div>
          <span class="badge bg-label-warning rounded p-2">
            <i class="bx bx-user-voice bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row g-3 mb-4">
  <div class="col-sm-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Total Revenue</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{ number_format($totalBill, 2) }} &#8355;</h3>
              <small class="text-success"> </small>
            </div>
            <small>Total Income made</small>
          </div>
          <span class="badge bg-label-success rounded p-2">
            <i class="bx bx-wallet bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Total Owning</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{number_format($totalOwing, 2)}} &#8355;</h3>
              <small class="text-success"> </small>
            </div>
            <small>Awaiting Payments </small>
          </div>
          <span class="badge bg-label-warning rounded p-2">
            <i class="bx bx-loader bx-spin bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-4">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span>Missing Corpses</span>
            <div class="d-flex align-items-end mt-2">
              <h3 class="mb-0 me-2">{{$missingCorpse}}</h3>
              <small class="text-success"> </small>
            </div>
            <small>Total Missing Corpses</small>
          </div>
          <span class="badge bg-label-danger rounded p-2">
            <i class="bx bx-error bx-flashing bx-sm"></i>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Latest Corpse</h5>
  </div>
  <div class="card-datatable table-responsive">
     <table class=" table border-top">
    <thead>
        <tr>
            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" tabindex="0"></th>
            <th>Name</th>
            <th>Location</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Removal Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
   @foreach($recentCorpse as $corspse)
<tr class="odd">
    <td class="sorting_1">
        <div class="d-flex justify-content-start align-items-center user-name">
            <div class="avatar-wrapper">
                <div class="avatar avatar-sm me-3">
                    <span class="avatar-initial rounded-circle bg-label-info">{{$corspse->id}}</span>
                </div>
            </div>
            <div class="d-flex flex-column">
            <a href="{{ route('corpseProfile', $corspse->qr_code) }}" class="text-body text-truncate">
                <span class="fw-medium">{{ $corspse->name }}</span>
            </a>
            <span class="fw-medium text-muted">{{ $corspse->qr_code }}</span>
        </div>

        </div>
    </td>
     <td>
                        <span class="user-email">
                            @if($corspse->freezer_id)
                                {{ $corspse->freezer->name }}
                            @elseif($corspse->embalment_id)
                                {{ $corspse->embalmment->name }}
                            @else
                                N/A
                            @endif
                        </span>
                    </td>
    <td>
        <span class="user-email">{{$corspse->relative_number}}</span>
    </td>
    <td class="text-center">
    @if($corspse->status == 'available')
            <i class="bx fs-4 bx-check-circle text-success"> Available</i>
        @elseif($corspse->status == 'autopsy')
            <i class="bx fs-4 bx-x-circle text-warning"> In Autopsy</i>
        @elseif($corspse->status == 'removed')
            <i class="bx fs-4 bx-trash text-info"> Removed</i>
        @else
            <i class="bx fs-4 bx-error text-danger"> Missing</i>
        @endif
    </td>
    <td>
        <span class="user-email">{{$corspse->removal_date}}</span>
    </td>
    <td>
        <div class="d-inline-block text-nowrap">
            <button class="btn btn-sm btn-icon edit-record" data-id="{{$corspse->id}}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdateCorspse{{$corspse->id}}">
                <i class="bx bx-edit"></i>
            </button>
            <button class="btn btn-sm btn-icon delete-record" data-id="{{$corspse->id}}">
                <i class="bx bx-trash"></i>
            </button>
        </div>
    </td>
</tr>

<!-- Offcanvas to update corspse -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdateCorspse{{$corspse->id}}" aria-labelledby="offcanvasUpdateCorspseLabel{{$corspse->id}}">
    <div class="offcanvas-header">
        <h5 id="offcanvasUpdateCorspseLabel{{$corspse->id}}" class="offcanvas-title">Update Corspse</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm{{$corspse->id}}" action="#" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname{{$corspse->id}}">Name</label>
                <input type="text" class="form-control" id="add-user-fullname{{$corspse->id}}" value="{{$corspse->name}}" placeholder="embalm101" name="name" aria-label="embalm101" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email{{$corspse->id}}">Location</label>
               @php
    $storageName = 'N/A';
    if ($corspse->freezer_id) {
        $storageName = $corspse->freezer->name;
    } elseif ($corspse->embalment_id) {
        $storageName = $corspse->embalmment->name;
    }
@endphp

<input type="text" id="add-user-email{{ $corspse->id }}" class="form-control" value="{{ $storageName }}" placeholder="corpse room1" aria-label="corpse room1" name="location" required />

                <div class="mb-3">
        <label class="form-label" for="capacity">Contact</label>
        <input type="relative_number" id="capacity" class="form-control" placeholder="Relative phone number" value="{{$corspse->relative_number}}" aria-label="12" name="relative_number" required />
    </div>
            </div>
            <div class="mb-3 ">
                                    <label for="status{{$corspse->id}}" class="form-label">Stutus</label>
                                    <select id="status{{$corspse->id}}" name="status" class=" form-select" required>
                                        <option value="" disabled>Select</option>
                                        <option value="available" {{  $corspse->status == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="autopsy" {{ $corspse->status == 'autopsy' ? 'selected' : '' }}>Autopsy</option>
                                        <option value="removed" {{ $corspse->status == 'removed' ? 'selected' : '' }}>Removed</option>
                                        <option value="missing" {{  $corspse->status == 'missing' ? 'selected' : '' }}>Missing</option>
                                    </select>
                                </div>
            <button type="button" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
    </div>
</div>
@endforeach

       
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
@include('footer')
<!--/ Footer-->
                    <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>
@endsection
