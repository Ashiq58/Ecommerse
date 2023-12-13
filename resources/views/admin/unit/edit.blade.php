@extends('admin.master')
@section('body')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Unit</h4>
                        </div>
                        <div class="card-body">
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            <form action="{{ route('unit.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                                <div class="form-group row ">
                                    <label for="name" class="col-sm-4 form-label text-right">Unit Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" id="name" value="{{ $unit->name }}"
                                            class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <label for="" class="col-sm-4 form-label">Unit Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $unit->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right">Unit Status</label>
                                    <div class="col-sm-8">
                                        <label for="Publishhed"><input id="Publishhed" type="radio" name="status"
                                                {{ $unit->status == 1 ? 'checked' : '' }} value="1">
                                            Publishhed</label>
                                        <label for="Unpublished"><input id="Unpublished" type="radio" name="status"
                                                {{ $unit->status == 0 ? 'checked' : '' }} value="0">
                                            Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right"></label>
                                    <div class="col-sm-8">
                                        <button class="btn btn-outline-success" type="submit">Update Unit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
