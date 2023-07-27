@extends('layouts.AdminLayout')
@section('content')
    @if ($messSuccess = Session::get('msg'))
        <div class="alert alert-success show" role="alert">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
            <strong style="text-align: center;">{{ $messSuccess }}</strong>
        </div>
    @endif <br>
    @error('msg')
            <div class="alert alert-danger text-center">{{$massage}} </div>
    @enderror
    <h3 style="color:rgb(207, 28, 28); border-bottom:1px solid #000;">Create Category</h3> <br>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('category.save_dog_name') }}" method="post">
                <input type="text" placeholder="Enter Dog Name" class="form-control " name="dog_names">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('dog_name')
                <span style="color:red;">{{$message}}</span>
                @enderror
                
                @csrf
            </form>

            <form action="{{ route('category.save_breed') }}" method="post">
                <input type="text" placeholder="Enter Breed" class="form-control " name="breed">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('breed')
                <span style="color:red;">{{$message}}</span>
                @enderror
                @csrf
            </form>

            <form action="{{ route('category.save_national') }}" method="post">
                <input type="text" placeholder="Etner National" class="form-control" name="national">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('national')
                <span style="color:red;">{{$message}}</span>
                @enderror
                @csrf
            </form>

            <form action="{{ route('category.save_group') }}" method="post">
                <input type="text" placeholder="Enter Group" class="form-control" name="groupp">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('groupp')
                <span style="color:red;">{{$message}}</span>
                @enderror
                @csrf
            </form>

            <form action="{{ route('category.save_activity_lv') }}" method="post">
                <input type="text" placeholder="Enter Activity" class="form-control" name="activity_lv">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('activity_lv')
                <span style="color:red;">{{$message}}</span>
                @enderror
                @csrf
            </form>

            <form action="{{ route('category.save_barking_lv') }}" method="post">
                <input type="text" placeholder="Enter Barking" class="form-control" name="barking_lv">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('barking_lv')
                <span style="color:red;">{{$message}}</span>
                @enderror
                @csrf
            </form>
        </div>
        {{-- chia doi --}}
        <div class="col-md-6">
            <form action="{{ route('category.save_characteristic') }}" method="post">
                <input type="text" placeholder="Enter Characteristics" class="form-control" name="characteristics">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('characteristics')
                <span style="color:red;">{{$message}}</span>
                @enderror
                @csrf
            </form>

            <form action="{{ route('category.save_coat_type') }}" method="post">
                <input type="text" placeholder="Enter Coat Type" class="form-control" name="coat_type">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('coat_type')
                <span style="color:red;">{{$message}}</span>
                @enderror
                @csrf
            </form>

            <form action="{{ route('category.save_shedding') }} " method="post">
                <input type="text" placeholder="Enter Shedding" class="form-control" name="shedding">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('shedding')
                <span style="color:red;">{{$message}}</span>
                @enderror
                @csrf
            </form>

            <form action="{{ route('category.save_size') }} " method="post">
                <input type="text" placeholder="Enter Size" class="form-control" name="size">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('size')
                <span style="color:red;">{{$message}}</span>
                @enderror
                @csrf
            </form>

            <form action="{{ route('category.save_trainability') }}" method="post">
                <input type="text" placeholder="Enter Trainability" class="form-control" name="trainability">
                <button type="submit" class="btn btn-primary">Add Category</button>
                @error('trainability')
                <span style="color:red;">{{$message}}</span>
                @enderror
                @csrf
            </form>
        </div>
    </div>
    {{-- end! --}}
    <a href="{{route('show_detail_category')}}" class="btn btn-warning">Go to list category</a>
@endsection
