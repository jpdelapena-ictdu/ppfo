@extends('layouts.app')

@section('content')
<div class="container">
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Rooms</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> --}}
                        <li class="breadcrumb-item active" aria-current="page">Rooms</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg-8">
        <div class="well">
            <div class="card-body border-bottom">
                <h4 class="card-title"><i class="fas fa-list"></i> List</h4>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered" id="indextable">
                    <thead>
                      <tr>
                        <th>Building</th>
                        <th>Room</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Working</th>
                        <th>Not Working</th>
                        <th>For Repair</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($inventories as $row)
                      <tr>
                        <td>{{ $row->building->bldg_name }}</td>
                        <td>{{ $row->room->room }}</td>
                        <td>{{ $row->item->description }}</td>
                        <td>{{ $row->quantity }}</td>
                        <td>{{ $row->working }}</td>
                        <td>{{ $row->not_working }}</td>
                        <td>{{ $row->for_repair }}</td>
                        <td><button data-toggle="modal" data-target="#course{{$row->id}}Modal" class="btn btn-sm btn-cyan"><i class="fas fa-edit"></i> Edit</button></td>
                      </tr>

                    <!-- Modal -->
                    {{-- <div class="modal fade" id="course{{$row->id}}Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-edit"></i> Edit Item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form id="edit_form{{$row->id}}" method="POST" action="{{ route('item.update', $row->id) }}">
                              <div class="form-group">
                                <label for="name">Supervisor:</label>
                                  <input type="text" class="form-control input-sm" name="supervisor" value="{{ $row->supervisor }}" required>
                                  <input type="hidden" class="form-control input-sm" name="room" value="{{ $row->room }}">
                                  <input type="hidden" class="form-control input-sm" name="shortname" value="{{ $row->shortname }}">
                                  <input type="hidden" class="form-control input-sm" name="building" value="{{ $row->building }}">
                  
                              </div>
                            {{ method_field('PUT') }}
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" form="edit_form{{$row->id}}" type="button" class="btn btn-sm btn-cyan">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div> --}}

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="well">
            <div class="card-body border-bottom">
                <h4 class="card-title"><i class="fas fa-plus"></i> Add Item</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('inventory.store') }}" method="POST">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <label for="building">Building</label>
                    <select name="building" class="form-control input-sm">
                      @foreach($buildings as $row)
                        <option value="{{ $row->id }}">{{ $row->bldg_name }}</option>
                      @endforeach
                    <label for="room">Room</label>
                    <select name="room" class="form-control input-sm">
                      @foreach($rooms as $row)
                        <option value="{{ $row->id }}">{{ $row->bldg_name }}</option>
                      @endforeach
                    <label for="name">Category</label>
                    <input type="text" class="form-control input-sm" name="category" required>
                  </div>
                  <button type="submit" class="btn btn-cyan btn-sm">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
