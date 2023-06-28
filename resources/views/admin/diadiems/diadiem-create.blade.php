@extends('layouts.app')

@section('title', 'Thêm địa điểm')

@section('header')
    @parent
    <a href="{{route('diadiems.index');}}">Địa điểm</a>
    <li class="breadcrumb-item active">Thêm địa điểm</li>
@endsection

@section('content')
    <form method="post" action="{{route('diadiems.store')}}">
        @csrf
        
        <div class="card mb-3">
            <div class="card-header">
            <i class="fa fa-table"></i> Thêm địa điểm </div>
            <div class="card-body">
            <div class="table-responsive">
                <table>
                    <tbody>
                        <tr>
                            <td>Loại tour: </td>
                            <td>
                                <div class="input input-group-sm mb-3">
                                    <input name="diadiem" value="{{old('diadiem')}}" class="form-control" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td> <p class="text-danger">@if($errors->has('diadiem')) {{$errors->first('diadiem')}} @endif</p></td>
                        </tr>

                        <tr>
                            <td><button id="btn-submit" type="submit" class="btn btn-primary">Thêm</button></td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
            </div>
        </div>
        <!-- /tables-->
        </div>
        <!-- /container-fluid-->
        </div>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
        </a>
    </form>
    <style>

        table {
            border-collapse: separate;
            border-spacing:0 10px;
        }
    </style>
@endsection
