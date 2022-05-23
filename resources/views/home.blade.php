@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Input Your Temparature') }}</div>

                <div class="card-body">
                    <div id="form1">
                    <form method="POST" action="{{ route('capture') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Temparature') }}</label>

                            <div class="col-md-6">
                                <input id="temp" type="text" class="form-control @error('temp') is-invalid @enderror" name="temp" value="{{ old('temp') }}" required autocomplete="temp" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                              <script>
                                  setTimeout(function() {
                                  $('.alert').fadeOut('slow');}, 4000);
                              </script>
                              @if(session()->has('message'))
                              <br>
                              <div id="successdiv" class="alert alert-success">
                                  {{ session()->get('message') }}
                              </div>
                              @elseif(session()->has('error_message'))
                              <br>
                              <div id="successdiv" class="alert alert-danger">
                                  {{ session()->get('error_message') }}
                              </div>
                              @endif

                              @if($errors->any())
                              <h4>{{$errors->first()}}</h4>
                              @endif

                        </div>
                    <!-- Report parameters-->
                    <div id="dateDialog" style="width:30%;height:30%;background-color:#F4FFEF;display:none">

                    <form method="POST" action="{{ route('report') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Week Ending?') }}</label>

                            <div class="col-md-6">
                                <input id="end_date" type="date" class="form-control @error('temp') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" required autocomplete="end_date" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="hide">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>

                      <!--<input type="date" name="end_date" id="end_date"/>-->
                      <!--<input type="Submit" value="Submit" id="hide" class="btn btn-primary"/>-->
                    </form>

                  </div>
                  <script type="text/JavaScript">
                      (function() {
                        var dialog = document.getElementById('dateDialog');
                        var form1 = document.getElementById('form1');
                        document.getElementById('report').onclick = function() {
                            form1.style.display = 'none';
                            dialog.style.display = 'inline';
                        };
                        document.getElementById('hide').onclick = function() {
                            form1.style.display = 'none';
                            dialog.close();
                        };
                      })();
                    </script>
                  </div>
            </div>
        </div>
    </div>

</div>
@endsection
