@extends('layouts.job_seeker.master')
@section('title', 'Resume Experience')

@section('content')
    <h3>Working Experience</h3>
    <form action="{{ route('profile.experience-info-store') }}" method="POST">
        @csrf
        <div class="exp_card_wrapper">
            <div class="card mb-3">
                <div class="card-body exp_card">
                    <div class="row">
                        <div class="col-12 col-md-4 my-2">
                            <div class="form-group">
                                <label class="text-muted text-bold" for="job_title">Job Title</label>
                                <input class="form-control  @error('job_title') is-invalid @enderror" type=" text"
                                    id="job_title" name="job_title[]" value="{{ old('job_title') }}" required
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
                                    id="company_name" name="company_name[]" value="{{ old('company_name') }}" required
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
                                    id="job_location" name="job_location[]" value="{{ old('job_location') }}" required
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
                                    id="start_date" name="start_date[]" value="{{ old('start_date') }}" required
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
                                    id="end_date" name="end_date[]" value="{{ old('end_date') }}" required
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
                                    id="description" name="description[]" autocomplete="off" rows="5" required>
                                                        {{ old('description') }}
                                                    </textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn btn-primary add_exp_btn">Add more</button>

        <div class="my-4 text-end">
            <button class="btn btn-success">Continue</button>
        </div>
    </form>

@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            let num = 1;
            $('.add_exp_btn').on('click', (e) => {
                e.preventDefault();
                let field = `
                <div class="card my-5">
                    <div class="card-body exp_card">
                        <div class="exp_card_del_btn bg-danger d-inline-block px-2 rounded text-white">X</div>
                        <div class="row">
                            <div class="col-12 col-md-4 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="job_title_${num}">Job Title</label>
                                    <input class="form-control  @error('job_title') is-invalid @enderror" type="text"
                                        id="job_title_${num}" name="job_title[]" value="{{ old('job_title') }}" required
                                        autocomplete="off">
                                    @error('job_title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-4 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="company_name_${num}">Company Name</label>
                                    <input class="form-control @error('company_name') is-invalid @enderror" type="text"
                                        id="company_name_${num}" name="company_name[]" value="{{ old('company_name') }}" required
                                        autocomplete="off">
                                    @error('company_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-4 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="job_location_${num}">Job Location</label>
                                    <input class="form-control  @error('job_location') is-invalid @enderror" type="text"
                                        id="job_location_${num}" name="job_location[]" value="{{ old('job_location') }}" required
                                        autocomplete="off">
                                    @error('job_location')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="start_date_${num}">Start Date</label>
                                    <input class="form-control  @error('start_date') is-invalid @enderror" type="date"
                                        id="start_date_${num}" name="start_date[]" value="{{ old('start_date') }}" required
                                        autocomplete="off">
                                    @error('start_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="end_date_${num}">End Date</label>
                                    <input class="form-control  @error('end_date') is-invalid @enderror" type="date"
                                        id="end_date_${num}" name="end_date[]" value="{{ old('end_date') }}" required
                                        autocomplete="off">
                                    @error('end_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 my-2">
                                <div class="form-group">
                                    <label class="text-muted text-bold" for="description_${num}">Description</label>
                                    <textarea class="form-control  @error('description') is-invalid @enderror" type="text"
                                        id="description_${num}" name="description[]" autocomplete="off" rows="5" required>
                                                    {{ old('description') }}
                                                </textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                `;
                $('.exp_card_wrapper').append(field);
                num++;
            })

            $(document).on('click', '.exp_card_del_btn', (e) => {
                e.preventDefault();
                e.target.closest('.card').remove();
            })

        })
    </script>
@endsection
