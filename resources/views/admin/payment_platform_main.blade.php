@extends('admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Payment Platform</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Payment Platform</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Add, Edit & Remove</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div class="listjs-table" id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="d-flex justify-content-sm-end">
                                        <div class="search-box ms-2">
                                            <input type="text" class="form-control search" placeholder="Search...">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive table-card mt-3 mb-1">
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 50px;">
                                            </th>
                                            <th class="sort" data-sort="customer_name">S.NO</th>
                                            <th class="sort" data-sort="email">Platform Name</th>
                                            <th class="sort" data-sort="phone">Platform Logo</th>
                                            <th class="sort" data-sort="date">Created at</th>
                                            <th class="sort" data-sort="status">Status</th>
                                            <th class="sort" data-sort="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($paymentPlatform as $platform)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td class="customer_name">{{$platform->name}}</td>
                                                <td class="email">
                                                    <img src="{{$platform->get_image()}}" width="100px" height="70px">
                                                </td>
                                                <td class="phone">{{$platform->created_at->format('d-M-Y')}}</td>
                                                <td class="date">{!!$platform->status()!!}</td>
                                                <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#edit_model_{{$platform->id}}">Edit</button>
                                                        </div>
                                                        <div class="remove">
                                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>


                                            <div class="modal fade" id="edit_model_{{$platform->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light p-3">
                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                        </div>
                                                        <form class="tablelist-form" autocomplete="off" action="{{route('admin.update.payment.platform')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                    
                                                                <div class="mb-3">
                                                                    <input type="hidden" name="payment_id" value="{{$platform->id}}">
                                                                    <label for="customername-field" class="form-label">Payment Platform Name</label>
                                                                    <input type="text" id="customername-field" class="form-control" placeholder="Enter Payment Platform Name" required name="name" value="{{$platform->name}}"/>
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="email-field" class="form-label">Payment Platform Image</label>
                                                                    <img src="{{$platform->get_image()}}" width="150px" height="100px"> 
                                                                    <input type="file" id="file-field" class="form-control" name="image"/>
                                                                </div>
                                    
                                                                <div>
                                                                    <label for="status-field" class="form-label">Status</label>
                                                                    <select class="form-control" data-trigger name="status-field" id="status-field" name="active" required>
                                                                        <option value="">Status</option>
                                                                        <option value="1" @if($platform->active == 1) selected @endif >Active</option>
                                                                        <option value="0" @if($platform->active == 0) selected @endif>In active</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success" id="add-btn">Update Payment Platform</button>
                                                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form class="tablelist-form" autocomplete="off" action="{{route('admin.delete.platform')}}" method="post">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                                            </div>
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mt-2 text-center">
                                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                        <h4>Are you Sure ?</h4>
                                                                        <input type="hidden" name="bank_id" value="{{$platform->id}}">
                                                                        <p class="text-muted mx-4 mb-0">Are you Sure You want to Remove this Record ?</p>
                                                                    </div>
                                                                </div>
                                                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="noresult" style="display: none">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                            orders for you search.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev disabled" href="javascrpit:void(0)">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0"></ul>
                                    <a class="page-item pagination-next" href="javascrpit:void(0)">
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>

        <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light p-3">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                    </div>
                    <form class="tablelist-form" autocomplete="off" action="{{route('admin.store.payment.platform')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Payment Platform Name</label>
                                <input type="text" id="customername-field" class="form-control" placeholder="Enter Payment Platform Name" required name="name"/>
                                <div class="invalid-feedback">Please enter a Payment Platform Name.</div>
                            </div>

                            <div class="mb-3">
                                <label for="email-field" class="form-label">Payment Platform Image</label>
                                <input type="file" id="file-field" class="form-control" name="image" required />
                            </div>

                            <div>
                                <label for="status-field" class="form-label">Status</label>
                                <select class="form-control" data-trigger id="active" name="active" required>
                                    <option value="">Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">In active</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" id="add-btn">Add Payment Platform</button>
                                <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        
        <!--end modal -->

    </div>
    <!-- container-fluid -->
</div>
@endsection