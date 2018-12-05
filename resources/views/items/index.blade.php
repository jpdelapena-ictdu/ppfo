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
                        <th>ID</th>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $row)
                      <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->type }}</td>
                        <td>{{ $row->category }}</td>
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
                <form action="{{ route('item.store') }}" method="POST">
                    {{ csrf_field() }}
                  <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" class="form-control input-sm" name="description" required>
                    <label for="name">Type:</label>
                    <input type="text" class="form-control input-sm" name="type" required>
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
