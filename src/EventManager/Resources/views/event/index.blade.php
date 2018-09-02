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
                    <div class="card-header">Event Manager</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div id="dncalendar-container"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelTitleId">Add Event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('event.store') }}" method="post" role="form" id="add_Event">
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
                            <input type="date" name="date" id="date" class="form-control" placeholder="yyyy-mm-dd"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="note">Note</label>
                            <textarea class="form-control" name="note" id="note" rows="3" required></textarea>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"
                            onclick="document.getElementById('add_Event').submit();">Add Event
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('event.modals.view')
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('js/dncalendar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/event-manager.js') }}"></script>
@endsection
