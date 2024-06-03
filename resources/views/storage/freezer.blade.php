@extends('layouts.admin')
@section('title', 'Freezers')
@section('content')

     <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Storage/</span> Freezer</h4>
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
    @if($freezer->status == 'active')
            <i class="bx fs-4 bx-check-circle text-success"> Free</i>
        @elseif($freezer->status == 'inactive')
            <i class="bx fs-4 bx-x-circle text-warning"> Occupied</i>
        @else
            <i class="bx fs-4 bx-wrench text-danger"> Maintenance</i>
        @endif
    </td>
    <td>
        <div class="d-inline-block text-nowrap">
            <button class="btn btn-sm btn-icon edit-record" data-id="{{$freezer->id}}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdateFreezer{{$freezer->id}}">
                <i class="bx bx-edit"></i>
            </button>
            <button class="btn btn-sm btn-icon delete-record" data-id="{{$freezer->id}}">
                <i class="bx bx-trash"></i>
            </button>
        </div>
    </td>
</tr>

<!-- Offcanvas to update freezer -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdateFreezer{{$freezer->id}}" aria-labelledby="offcanvasUpdateFreezerLabel{{$freezer->id}}">
    <div class="offcanvas-header">
        <h5 id="offcanvasUpdateFreezerLabel{{$freezer->id}}" class="offcanvas-title">Update Freezer</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm{{$freezer->id}}" action="{{ route('freezers.update', $freezer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname{{$freezer->id}}">Name</label>
                <input type="text" class="form-control" id="add-user-fullname{{$freezer->id}}" value="{{$freezer->name}}" placeholder="frez101" name="name" aria-label="frez101" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email{{$freezer->id}}">Location</label>
                <input type="text" id="add-user-email{{$freezer->id}}" class="form-control" value="{{$freezer->location}}" placeholder="freezer room1" aria-label="freezer room1" name="location" required />
            </div>
            <div class="mb-3 ">
                                    <label for="status{{$freezer->id}}" class="form-label">Stutus</label>
                                    <select id="status{{$freezer->id}}" name="status" class=" form-select" required>
                                        <option value="">Select</option>
                                        <option value="active" {{  $freezer->status == 'active' ? 'selected' : '' }}>Free</option>
                                        <option value="inactive" {{ $freezer->status == 'inactive' ? 'selected' : '' }}>Occupied</option>
                                        <option value="maintenance" {{  $freezer->status == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                                    </select>
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