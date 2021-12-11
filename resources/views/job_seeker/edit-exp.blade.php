@extends('layouts.job_seeker.master')
@section('title', 'Resume Experience')

@section('content')
    <h3>Edit Working Experience</h3>
    <form action="{{ route('profile.experience-info-update', $experience_detail->id) }}" method="POST">
        @csrf
        <div class="exp_card_wrapper">
            <div class="card mb-3">
                <div class="card-body exp_card">
                    <div class="row">
                        <div class="col-12 col-md-4 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="job_title">Job Title</label>
                                <input class="form-control  @error('job_title') is-invalid @enderror" type=" text"
                                    id="job_title" name="job_title" value="{{ $experience_detail->job_title }}" required
                                    autocomplete="off">
                                @error('job_title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-4 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="company_name">Company Name</label>
                                <input class="form-control @error('company_name') is-invalid @enderror" type="text"
                                    id="company_name" name="company_name" value="{{ $experience_detail->company_name }}" required
                                    autocomplete="off">
                                @error('company_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-4 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="job_location">Job Location</label>
                                <input class="form-control  @error('job_location') is-invalid @enderror" type="text"
                                    id="job_location" name="job_location" value="{{ $experience_detail->job_location }}" required
                                    autocomplete="off">
                                @error('job_location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="start_date">Start Date</label>
                                <input class="form-control  @error('start_date') is-invalid @enderror" type="date"
                                    id="start_date" name="start_date" value="{{ $experience_detail->start_date->toDateString() }}" required
                                    autocomplete="off">
                                @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="end_date">End Date</label>
                                <input class="form-control  @error('end_date') is-invalid @enderror" type="date"
                                    id="end_date" name="end_date" value="{{ $experience_detail->end_date->toDateString() }}" required
                                    autocomplete="off">
                                @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="description">Description</label>
                                <textarea class="form-control  @error('description') is-invalid @enderror" type="text"
                                    id="description" name="description" autocomplete="off" rows="5" required>{{ $experience_detail->description }}</textarea>
                                @error('description')
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