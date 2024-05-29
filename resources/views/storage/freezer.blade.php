@extends('layouts.admin')
@section('title', 'Freezers')
@section('content')

     <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Sorage/</span> Freezer</h4>
<button type="button" class="mb-3 btn btn-label-success" data-id="698" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditFreezer"><span class="tf-icons bx bx-plus me-1"> Add Freezer</span></button>
<!-- Basic Layout -->
<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Available Freezers</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class=" table border-top">
    <thead>
        <tr>
            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" tabindex="0"></th>
            <th>Name</th>
            <th>Location</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($freezer as $freezer)
        <tr class="odd">
            
            <td class="sorting_1">
                <div class="d-flex justify-content-start align-items-center user-name">
                    <div class="avatar-wrapper">
                        <div class="avatar avatar-sm me-3">
                            <span class="avatar-initial rounded-circle bg-label-info">{{$freezer->id}}</span>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <a href="#" class="text-body text-truncate">
                            <span class="fw-medium">{{$freezer->name}}</span>
                        </a>
                    </div>
                </div>
            </td>
            <td>
                <span class="user-email">{{$freezer->location}}</span>
            </td>
            <td class="text-center">
                <i class="bx fs-4 bx-shield-x text-danger"></i>
            </td>
            <td>
                <div class="d-inline-block text-nowrap">
                    <button class="btn btn-sm btn-icon edit-record" data-id="696" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditFreezer">
                        <i class="bx bx-edit"></i>
                    </button>
                    <button class="btn btn-sm btn-icon delete-record" data-id="696">
                        <i class="bx bx-trash"></i>
                    </button>
                    <button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end m-0">
                        <a href="#" class="dropdown-item">View</a>
                        <a href="javascript:;" class="dropdown-item">Suspend</a>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
       
    </tbody>
</table>

</div>


  <!-- Offcanvas to add new user -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditFreezer" aria-labelledby="offcanvasAddFreezerLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddFreezerLabel" class="offcanvas-title">Add Freezer</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new-user pt-0" id="addNewUserForm" action="{{ route('freezer.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="add-user-fullname">Name</label>
        <input type="text" class="form-control" id="add-user-fullname" placeholder="frez101" name="name" aria-label="frez101" required />
    </div>
    <div class="mb-3">
        <label class="form-label" for="add-user-email">Location</label>
        <input type="text" id="add-user-email" class="form-control" placeholder="freezer room1" aria-label="freezer room1" name="location" required />
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