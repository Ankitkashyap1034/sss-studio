@extends('admin.layouts.master')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Offers</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Offers</li>
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
                                        <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
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
                                            <th class="sort" data-sort="">S.NO</th>
                                            <th class="sort" data-sort="email">Offer Bank</th>
                                            <th class="sort" data-sort="phone">offer Payment Partner</th>
                                            <th class="sort" data-sort="date">Created at</th>
                                            <th class="sort" data-sort="status">Status</th>
                                            <th class="sort" data-sort="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @foreach ($offers as $offer)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td class="">{{$offer->bank->name}}</td>
                                                <td class="email">
                                                    {{$offer->payment_platform->name}}
                                                </td>
                                                <td class="phone">{{$offer->created_at->format('d-M-Y')}}</td>
                                                <td class="date">{!!$offer->status()!!}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <div class="edit">
                                                            <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#edit_model_{{$offer->id}}">Edit</button>
                                                        </div>
                                                        <div class="remove">
                                                            <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal_{{$offer->id}}">Remove</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>


                                            <div class="modal fade" id="edit_model_{{$offer->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-light p-3">
                                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                                        </div>
                                                        <form class="tablelist-form" autocomplete="off" action="{{route('admin.update.offer')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="hidden" name="offer_id" value="{{$offer->id}}">
                                                                <div class="mb-3">
                                                                    <label for="customername-field" class="form-label">Amount</label>
                                                                    <input class="form-control" required name="min_amount" type="number" placeholder="Enter the amount for offer" value="{{$offer->min_amount}}">
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <input type="hidden" name="bank_id" value="{{$offer->id}}">
                                                                    <label for="customername-field" class="form-label">Bank Name</label>
                                                                    <select class="form-control" data-trigger id="bank-name" name="bank_id" required>
                                                                        @foreach ($banks as $bank)
                                                                            <option value="{{$bank->id}}" @if($offer->bank_id == $bank->id) selected  @endif>{{$bank->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                    
                                                                <div class="mb-3">
                                                                    <label for="email-field" class="form-label">Payment Platform Name</label>
                                                                    <select class="form-control" data-trigger id="payment-platform-name" name="payment_platform_id" required>
                                                                        @foreach ($paymentPlatforms as $payment)
                                                                            <option value="{{$payment->id}}" @if($offer->payment_platform_id == $payment->id) selected  @endif>{{$payment->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                    
                                                                <div>
                                                                    <label for="status-field" class="form-label">Offer Details</label>
                                                                    <textarea class="form-control" name="description" id="" cols="30" rows="10" value="{{$offer->description}}">{{$offer->description}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="hstack gap-2 justify-content-end">
                                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success" id="add-btn">Update offer</button>
                                                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="modal fade zoomIn" id="deleteRecordModal_{{$offer->id}}" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form class="tablelist-form" autocomplete="off" action="{{route('admin.delete.offer')}}" method="post">
                                                            <div class="modal-header">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                                            </div>
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="mt-2 text-center">
                                                                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                        <h4>Are you Sure ?</h4>
                                                                        <input type="hidden" name="offer_id" value="{{$offer->id}}">
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
                    <form class="tablelist-form" autocomplete="off" action="{{route('admin.store.offer')}}" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Amount</label>
                                <input class="form-control" required name="min_amount" type="number" placeholder="Enter the amount for offer">
                            </div>

                            <div class="mb-3">
                                <label for="customername-field" class="form-label">Bank Name</label>
                                <select class="form-control" data-trigger id="bank-name" name="bank_id" required>
                                    @foreach ($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="email-field" class="form-label">Payment Platform Name</label>
                                <select class="form-control" data-trigger id="payment-platform-name" name="payment_platform_id" required>
                                    @foreach ($paymentPlatforms as $payment)
                                        <option value="{{$payment->id}}">{{$payment->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="status-field" class="form-label">Offer Details</label>
                                <textarea name="description" class="form-control" id="" cols="30" rows="10" value=""></textarea>
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
                                <button type="submit" class="btn btn-success" id="add-btn">Add Offer</button>
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