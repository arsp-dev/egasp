@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <ul class="nav justify-content-center">
        <!-- <li class="nav-item">
            <a class="nav-link" href="/encode">Encode New Isolate</a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link" href="/isolates">Show All Isolates</a>
        </li>
        </ul>
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    @if (\Session::has('info'))
                    <div class="alert alert-primary alert-dismissible d-flex align-items-center" role="alert">
                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
                        <div>
                          
                            {!! \Session::get('info') !!}
                      
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endif
                </div>

                <div class="card-body">
                <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Accession #</th>
                <th>Patient ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($isolates as $isolate)
          <tr>
            <td><a href="/isolates/{{$isolate->id}}">{{ $isolate->accession_no }}</a> </td>
            <td>{{ $isolate->site_isolate()->exists() ? $isolate->site_isolate->patient_id : '---' }}</td>
            <td>{{ $isolate->site_isolate()->exists() ? $isolate->site_isolate->patient_first_name : '---' }}</td>
            <td>{{ $isolate->site_isolate()->exists() ? $isolate->site_isolate->patient_middle_name : '---' }}</td>
            <td>{{ $isolate->site_isolate()->exists() ? $isolate->site_isolate->patient_last_name : '---' }}</td>
        </tr>
          @endforeach
          


        </tbody>
        <tfoot>
            <tr>
                <th>Accession #</th>
                <th>Patient ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
            </tr>
        </tfoot>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create New Isolate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
      <form  action="/isolates" method="POST">
        @csrf
        <div class="row">
        <div class="form-group">
      <label for="accession_no">Accession #</label>
      <input name="accession_no" type="text" class="form-control" id="accession_no" placeholder="Accession #" required>
    </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Create</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $(document).ready(function () {
        @hasanyrole('Super-Admin|admin')
        $(document).ready(function () {
            $('#example').DataTable();
        });
    @else
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                text: 'Add new Isolate',
                className: 'btn btn-outline-primary',
                action: function ( e, dt, node, config ) {
                    $('#staticBackdrop').modal("show");
                }

            }
        ]
    } );
    @endhasanyrole
      
});
</script>
@endsection
