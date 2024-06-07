@extends('layouts.admin')
@section('title', 'All Staff')
@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Staff /</span> All
        </h4>
        

<!-- Basic Layout -->
<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Available staffss</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class=" table border-top">
    <thead>
        <tr>
            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" tabindex="0"></th>
            <th>Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Region</th>
            <th>Country</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
   @foreach($staffs as $staffs)
<tr class="odd">
    <td class="sorting_1">
        <div class="d-flex justify-content-start align-items-center user-name">
            <div class="avatar-wrapper">
                <div class="avatar avatar-sm me-3">
                    <span class="avatar-initial rounded-circle bg-label-info">{{$staffs->id}}</span>
                </div>
            </div>
            <div class="d-flex flex-column">
            <a href="{{ route('corpseProfile', $staffs->id) }}" class="text-body text-truncate">
                <span class="fw-medium">{{ $staffs->name }}</span>
            </a>
            <span class="fw-medium text-muted">{{ $staffs->email }}</span>
        </div>

        </div>
    </td>
     <td>
                        <span class="user-email">
                                {{ $staffs->address }}
                        </span>
                    </td>
    <td>
        <span class="user-email">{{$staffs->phoneNumber}}</span>
    </td>
    <td class="text-center">
                                {{ $staffs->region }}    
    </td>
    <td>
        <span class="user-email">{{$staffs->country}}</span>
    </td>
    <td>
        <div class="d-inline-block text-nowrap">
            <button class="btn btn-sm btn-icon edit-record" data-id="{{$staffs->id}}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdatestaffs{{$staffs->id}}">
                <i class="bx bx-edit"></i>
            </button>
            <button class="btn btn-sm btn-icon delete-record" data-id="{{$staffs->id}}">
                <i class="bx bx-trash"></i>
            </button>
        </div>
    </td>
</tr>

<!-- Offcanvas to update staffs -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdatestaffs{{$staffs->id}}" aria-labelledby="offcanvasUpdatestaffsLabel{{$staffs->id}}">
    <div class="offcanvas-header">
        <h5 id="offcanvasUpdatestaffsLabel{{$staffs->id}}" class="offcanvas-title">Update staffs</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm{{$staffs->id}}" action="{{ route('staffs.update', $staffs) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname{{$staffs->id}}">Name</label>
                <input type="text" class="form-control" id="add-user-fullname{{$staffs->id}}" value="{{$staffs->name}}" placeholder="embalm101" name="name" aria-label="embalm101" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email{{$staffs->id}}">Address</label>

<input type="text" id="add-user-email{{ $staffs->id }}" class="form-control" value="{{ $staffs->address }}" placeholder="corpse room1" aria-label="corpse room1" name="address" required />

                <div class="mb-3">
        <label class="form-label" for="capacity">Contact</label>
        <input type="number" id="capacity" class="form-control" placeholder=" phone number" value="{{$staffs->phoneNumber}}" aria-label="12" name="phoneNumber" required />
    </div>
                <div class="mb-3">
        <label class="form-label" for="capacity">Email</label>
        <input type="email" id="capacity" class="form-control" placeholder=" Email" value="{{$staffs->email}}" aria-label="12" name="email" required />
    </div>
            </div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
            <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
        </form>
    </div>
</div>
@endforeach

       
    </tbody>
</table>

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
      <!-- / Layout page -->
    </div>

        <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
    <!--/ Layout Content -->




@endsection
