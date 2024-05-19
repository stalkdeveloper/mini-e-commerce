@extends('admin.include.main')
@section('title', 'Dashboard')
@section('content')
<div class="pcoded-content">
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Dashboard Analytics</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- table card-1 start -->
        <div class="col-md-12 col-xl-4">
            <!-- widget primary card start -->
            <div class="card flat-card widget-primary-card">
                <div class="row-table">
                    <div class="col-sm-3 card-body">
                        User
                    </div>
                    <div class="col-sm-9">
                        {{-- <h4>{{$user}}</h4> --}}
                    </div>
                </div>
            </div>
            <!-- widget primary card end -->
        </div>
        <!-- table card-1 end -->
        <!-- table card-2 start -->
        <div class="col-md-12 col-xl-4">
            <!-- widget-success-card start -->
            <div class="card flat-card widget-purple-card">
                <div class="row-table">
                    <div class="col-sm-4 card-body">
                        Product
                    </div>
                    <div class="col-sm-8">
                        {{-- <h4>{{$product}}</h4> --}}
                    </div>
                </div>
            </div>
            <!-- widget-success-card end -->
        </div>
        <!-- table card-2 end -->
        <!-- Widget primary-success card start -->
        <div class="col-md-12 col-xl-4">
            <div class="card flat-card widget-primary-card">
                <div class="row-table">
                    <div class="col-sm-8 card-body">
                        This Page Categories
                    </div>
                    <div class="col-sm-4">
                        {{-- <h4>{{count($category)}}</h4> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Widget primary-success card end -->

        <!-- prject ,team member start -->
        <div class="col-xl-12 col-md-12">
            <div class="card table-card">
                <div class="card-header">
                    <h5>Category</h5>
                </div>
                <div class="card-body p-0">
                    {{-- <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Author</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($category))
                                    @if(is_array($category) || is_object($category))
                                        @foreach ($category->chunk(20) as $cate)
                                            @forelse ($cate as $count=>$item)
                                                <tr>
                                                    <td>{{$count+1}}</td> 
                                                    <td>{{$item->title}}</td>
                                                    <td style="white-space: inherit;">{{$item->description ?? 'N/A'}}</td>
                                                    <td>
                                                        {{$item->users->name ?? 'N/A'}}
                                                    </td>
                                                    <td>
                                                        @if($data->can_read == '1' || Auth::user()->usertype == 'admin')
                                                            <a href="{{route('getViewCategoryDetails', $item->id)}}" class="btn btn-primary btn-sm" role="button" aria-pressed="true">View</a>
                                                        @endif
                                                        @if($data->can_update == '1' || Auth::user()->usertype == 'admin')
                                                            <a href="{{route('getViewCategory', $item->id)}}" class="btn btn-success btn-sm" role="button" aria-pressed="true">Edit</a>
                                                        @endif
                                                        @if($data->can_delete == '1' || Auth::user()->usertype == 'admin')
                                                            <a href="{{route('getDeleteCategory', $item->id)}}" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Delete</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>
                                                        No Data Found!
                                                    </td>
                                                </tr>
                                            @endforelse
                                        @endforeach
                                    @endif
                                @endif
                            </tbody>
                        </table>
                        {{$category->appends(['filter'=>'categorries', $category->currentPage()])->links()}}
                    </div> --}}
                </div>
            </div>
        </div>
        <!-- Latest Customers end -->
    </div>
    <!-- [ Main Content ] end -->
</div>
@endsection