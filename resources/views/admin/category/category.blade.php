@extends('admin.admin_layouts')

@section('admin_content')


<div class="sl-mainpanel">

	<div class="sl-pagebody">
		<div class="sl-page-title">
			<h5>Category Table</h5>
			<p align="right">
				<a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modaldemo3">Add Category</a>
			</p>
		</div><!-- sl-page-title -->

		<div class="card pd-20 pd-sm-40">

			<div class="table-wrapper">
				<table id="datatable1" class="table display responsive nowrap">
					<thead>
						
						<tr>
							<th class="wd-15p">ID</th>
							<th class="wd-15p">Category Name</th>
							<th class="wd-20p">Action</th>
						</tr>
						
					</thead>
					<tbody>
						@foreach($category as $key=>$row)
						<tr>
							<td>{{ $key +1 }}</td>
							<td>{{ $row->category_name }}</td>
							<td>
								<a href="{{ route('edit.category', $row->id) }} " class="btn btn-sm btn-info">Edit</a>
								<a href="{{ route('destroy.category', $row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
							</td>
						</tr>
						@endforeach
						</tbody>
					</table>
				</div><!-- table-wrapper -->
			</div><!-- card -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

			<!--Add Category LARGE MODAL -->
			<div id="modaldemo3" class="modal fade">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content tx-size-sm">
						<div class="modal-header pd-x-20">
							<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" action="{{ route('store.category') }}">
							@csrf
							<div class="modal-body pd-20"> 
								<div class="form-group">
									<label for="exampleInputEmail1">Category Name</label>
									<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="category" name="category_name">

								</div>

							</div><!-- modal-body -->
							<div class="modal-footer">
								<button type="submit" class="btn btn-info pd-x-20">Sumbit</button>
								<button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div><!-- modal-dialog -->
			</div><!-- modal -->

			<!--Edit Category LARGE MODAL -->
			<div id="modaldemo2" class="modal fade">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content tx-size-sm">
						<div class="modal-header pd-x-20">
							<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Edit Category</h6>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form method="post" action="">
							@csrf
							<div class="modal-body pd-20"> 
								<div class="form-group">
									<label for="exampleInputEmail1">Category Name</label>
									<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="" name="category_name">

								</div>

							</div><!-- modal-body -->
							<div class="modal-footer">
								<button type="submit" class="btn btn-info pd-x-20">Sumbit</button>
								<button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div><!-- modal-dialog -->
			</div><!-- modal -->
			@endsection