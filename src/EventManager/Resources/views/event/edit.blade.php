@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dncalendar-skin.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit event for {{ $event->date }}</div>
                    <div class="card-body">
                        <form action="{{ route('event.update', $event->date) }}" method="post" role="form" id="add_Event">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="type">Event Type</label>
                                <select class="form-control" name="type" id="type" required>
                                    <option value="assessment">Assessment</option>
                                    <option value="school">School</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" value="{{ $event->date }}" class="form-control" placeholder="yyyy-mm-dd"
                                       required>
                            </div>

                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" name="note" id="note" rows="3" required>{{ $event->note }}</textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <a href="#" onclick="destroy.call(this);" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-success">
                                            Update event
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        function destroy() {
            let del = confirm('Are you sure you want to delete {{ $event->note }}');
            if (del)
                document.location.href = "{{ route('event.delete', $event->date) }}";
        }
    </script>
@endsection
