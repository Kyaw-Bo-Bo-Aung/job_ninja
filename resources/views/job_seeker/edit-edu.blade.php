@extends('layouts.job_seeker.master')
@section('title', 'Resume profile')

@section('content')
    <h3>Edit Education info</h3>
    <form action="{{ route('profile.education-info-update', $education_detail->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif
        <div class="edu_card_wrapper">
            <div class="card mb-3">
                <div class="card-body edu_card">
                    <div class="row">
                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="certificate_degree_name">Certificate/Degree
                                    Name</label>
                                <input class="form-control  @error('certificate_degree_name') is-invalid @enderror"
                                    type=" text" id="certificate_degree_name" name="certificate_degree_name"
                                    value="{{ $education_detail->certificate_degree_name }}" required autocomplete="off">
                                @error('certificate_degree_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="institute_university_name">Institute/University
                                    Name</label> 
                                <input class="form-control @error('institute_university_name') is-invalid @enderror"
                                    type="text" id="institute_university_name" name="institute_university_name"
                                    value="{{ $education_detail->institute_university_name }}" required autocomplete="off">
                                @error('institute_university_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="starting_date">Starting Date</label>
                                <span class="text-muted">(mm/dd/yyyy)</span>
                                <input class="form-control  @error('starting_date') is-invalid @enderror" type="date"
                                    id="starting_date" name="starting_date" value="{{ $education_detail->starting_date->toDateString() }}" required
                                    autocomplete="off">
                                @error('starting_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="completion_date">Completion Date</label>
                                <span class="text-muted">(mm/dd/yyyy)</span>
                                <input class="form-control  @error('completion_date') is-invalid @enderror" type="date"
                                    id="completion_date" name="completion_date" value="{{ $education_detail->completion_date->toDateString() }}"
                                    required autocomplete="off">
                                @error('completion_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="my-4 text-end">
            <button class="btn btn-success">Update</button>
        </div>
    </form>

@endsection