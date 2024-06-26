@extends('layouts.admin')
@section('title', 'Embalments')
@section('content')

     <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
                  <div class="container-xxl flex-grow-1 container-p-y">
            
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Storage/</span> Embalments</h4>
<button type="button" class="mb-3 btn btn-label-success" data-id="698" data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditEmbalments"><span class="tf-icons bx bx-plus me-1"> Add Embalments</span></button>
<!-- Basic Layout -->
<!-- Users List Table -->
<div class="card">
  <div class="card-header">
    <h5 class="card-title mb-0">Available Embalmentss</h5>
  </div>
  <div class="card-datatable table-responsive">
    <table class=" table border-top">
    <thead>
        <tr>
            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1" style="width: 0px; display: none;" tabindex="0"></th>
            <th>Name</th>
            <th>Location</th>
            <th>Capacity</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
   @foreach($embalment as $embalment)
<tr class="odd">
    <td class="sorting_1">
        <div class="d-flex justify-content-start align-items-center user-name">
            <div class="avatar-wrapper">
                <div class="avatar avatar-sm me-3">
                    <span class="avatar-initial rounded-circle bg-label-info">{{$embalment->id}}</span>
                </div>
            </div>
            <div class="d-flex flex-column">
                <a href="#" class="text-body text-truncate">
                    <span class="fw-medium">{{$embalment->name}}</span>
                </a>
            </div>
        </div>
    </td>
    <td>
        <span class="user-email">{{$embalment->location}}</span>
    </td>
    <td>
        <span class="user-email">{{$embalment->capacity}}</span>
    </td>
    <td class="text-center">
    @if($embalment->status == 'available')
            <i class="bx fs-4 bx-check-circle text-success"> Available</i>
        @elseif($embalment->status == 'in-use')
            <i class="bx fs-4 bx-x-circle text-warning"> Full</i>
        @else
            <i class="bx fs-4 bx-wrench text-danger"> Closed</i>
        @endif
    </td>
    <td>
        <div class="d-inline-block text-nowrap">
            <button class="btn btn-sm btn-icon edit-record" data-id="{{$embalment->id}}" data-bs-toggle="offcanvas" data-bs-target="#offcanvasUpdateEmbalments{{$embalment->id}}">
                <i class="bx bx-edit"></i>
            </button>
            <button class="btn btn-sm btn-icon delete-record" data-id="{{$embalment->id}}">
                <i class="bx bx-trash"></i>
            </button>
        </div>
    </td>
</tr>

<!-- Offcanvas to update embalment -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasUpdateEmbalments{{$embalment->id}}" aria-labelledby="offcanvasUpdateEmbalmentsLabel{{$embalment->id}}">
    <div class="offcanvas-header">
        <h5 id="offcanvasUpdateEmbalmentsLabel{{$embalment->id}}" class="offcanvas-title">Update Embalments</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
        <form class="add-new-user pt-0" id="addNewUserForm{{$embalment->id}}" action="{{ route('embalment.update', $embalment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname{{$embalment->id}}">Name</label>
                <input type="text" class="form-control" id="add-user-fullname{{$embalment->id}}" value="{{$embalment->name}}" placeholder="embalm101" name="name" aria-label="embalm101" required />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email{{$embalment->id}}">Location</label>
                <input type="text" id="add-user-email{{$embalment->id}}" class="form-control" value="{{$embalment->location}}" placeholder="embalment room1" aria-label="embalment room1" name="location" required />
                <div class="mb-3">
        <label class="form-label" for="capacity">Capacity</label>
        <input type="number" id="capacity" class="form-control" placeholder="number of corpse" value="{{$embalment->capacity}}" aria-label="12" name="capacity" required />
    </div>
            </div>
            <div class="mb-3 ">
                                    <label for="status{{$embalment->id}}" class="form-label">Stutus</label>
                                    <select id="status{{$embalment->id}}" name="status" class=" form-select" required>
                                        <option value="">Select</option>
                                        <option value="available" {{  $embalment->status == 'available' ? 'selected' : '' }}>Available</option>
                                        <option value="in-use" {{ $embalment->status == 'in-use' ? 'selected' : '' }}>Full</option>
                                        <option value="maintenance" {{  $embalment->status == 'maintenance' ? 'selected' : '' }}>Closed</option>
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
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditEmbalments" aria-labelledby="offcanvasAddEmbalmentsLabel">
    <div class="offcanvas-header">
      <h5 id="offcanvasAddEmbalmentsLabel" class="offcanvas-title">Add Embalments</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0">
      <form class="add-new-user pt-0" id="addNewUserForm" action="{{ route('embalment.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label" for="add-user-fullname">Name</label>
        <input type="text" class="form-control" id="add-user-fullname" placeholder="embalm101" name="name" aria-label="embalm101" required />
    </div>
    <div class="mb-3">
        <label class="form-label" for="add-user-email">Location</label>
        <input type="text" id="add-user-email" class="form-control" placeholder="embalment room1" aria-label="embalment room1" name="location" required />
    </div>
    <div class="mb-3">
        <label class="form-label" for="capacity">Capacity</label>
        <input type="number" id="capacity" class="form-control" placeholder="number of corpses" aria-label="12" name="capacity" required />
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