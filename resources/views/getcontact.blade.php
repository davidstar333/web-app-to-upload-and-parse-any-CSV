@extends('layouts.app')
@section('styles')

@endsection

@section('content')
<section class="probootstrap-section" data-section="working-area">
    <div class="container">
        @csrf
        <input type="hidden" id="_page" value="main_process" />
        <input type="hidden" id="_base_url" value="{{asset('/')}}" />
        <div class="row justify-content-center text-center mb100" style="padding: 0 10px;">
        <div class="col-md-12 probootstrap-section-heading">
                <div class="form-group color">
                    <h3 class="text-left mytext-dark-blue underline">2. Get contact information</h3>
                    <div class="spinner-border text-primary center" id="dbStore-spinner"></div>
                </div>
                <div class="alert alert-danger text-center" id="exceeded-alert" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <p>The number of rows you requested exceeds the number of rows you can process.</p>
                </div>
                <div class="col-md-12 hide" id="get-contact-info">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-xs-12">
                            <form action="{{ route('processor') }}" method="POST" class="probootstrap-form pt0" id="process-form">
                                @csrf
                                <div class="mb20" id="file_info"></div>
                                
                                <div class="right">
                                    <button type="button" id="process-cancel-btn" class="btn btn-lg btn-danger signup-btn mb20">
                                        <span class="btn-label"><i class="fas fa-trash-alt"></i></span>&nbsp;&nbsp;Cancel
                                    </button>
                                    <button type="submit" id="process-btn" class="btn btn-lg btn-primary signup-btn mb20">
                                        <span class="btn-label"><i class="fa fa-upload"></i></span>&nbsp;&nbsp;Process
                                    </button>
                                    <button type="button" id="tostep2-btn" class="btn btn-lg btn-success signup-btn mb20 hide">
                                        <span class="btn-label"><i class="fa fa-upload"></i></span>&nbsp;&nbsp;Continue
                                    </button>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <h4 class="mytext-dark-blue underline">You selected a file. File info is following :</h4>
                            <div class="file-info">
                                <div class="row">
                                    <div class="col-xs-6 text-left">Number of files:</div>
                                    <div class="col-xs-6 text-left number_files"></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 text-left">Total rows:</div>
                                    <div class="col-xs-6 text-left total_rows"></div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 text-left">Processable rows:</div>
                                    <div class="col-xs-6 text-left processable"></div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <h4 class="mytext-dark-blue underline">If you want to process more rows than your current membership plan, upgrade now!</h4>
                            <a href={{ route('package') }} id="upgrade-membership-btn" class="btn btn-lg btn-primary btn-block signup-btn mb20">
                                <span class="btn-label">Upgrade membership
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-md-12 hide" id="processing">
                    <h4 class="text-center underline">Processing ...</h4>
                    <h6 class="text-center"> - You will receive the notification of completion on your or given email address. - </h6>
                </div>
                <div class="col-md-12 hide" id="completed">
                    <h4 class="text-center underline">- Process is completed -</h4>
                    <div class="row justify-content-center">
                        <div class="col-md-6" id="completed_list"></div>
                    </div>
                </div>
        </div>
        </div>
    </div>

    <div class="modal fade" id="process-modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-center mytext-dark-blue">Your request is being processed!</h4>
                </div>
                <div class="modal-body">
                    <br />
                    <p class="text-center mb10">Your process will be completed within approx <b id="mins"></b> minutes.</p>
                    <p class="text-center mb10">Email upon completion will be sent to : <b>{{Auth::user()->email}}</b></p>
                    <br />
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-7 col-xs-12">
                            <a href="{{ route('working_area') }}" type="button" class="btn btn-primary">UPLOAD ANOTHER FILE</a>
                        </div>
                        <div class="col-sm-5 col-xs-12">
                            <a href="{{ route('user.dashboard') }}" type="button" class="btn btn-default">DASHBOARD</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@section('scripts')
    <script src="{{asset('bower_components/resumablejs/resumable.js')}}" type="application/javascript"></script>
    <script src="{{asset('assets/js/upload.js')}}"></script>
@endsection