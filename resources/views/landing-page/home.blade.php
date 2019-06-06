<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/djo_1Ss_icon.ico') }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>Keluarga Djoikromo</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('landing-page.partials.nav')

        <!-- Main Jumbotron -->
        <div class="jumbotron">
          <div class="container">
            <img src="images/hero.svg" alt="Hero">
            <h1><b>Pohon Keluarga</b></h1>
            <h1><span>Mbah Djoikromo</span></h1>
          </div>
        </div>
        <!-- End Jumbotron!! -->

        <!-- Cari Start -->
        <section id="cari" class="container-fluid pad-7r bg-light-green">
            <div class="row" style="padding-bottom: 5rem;">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <h2 class="text-center">Cari Anggota Keluarga</h2>
                    <hr>
                    <br>
                    {{ Form::open(['method' => 'get','class' => '']) }}
                    <div class="input-group">
                        {{ Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => trans('app.search_your_family_placeholder')]) }}
                        <span class="input-group-btn">
                            {{ Form::submit(trans('app.search'), ['class' => 'btn btn-default']) }}
                            {{ link_to_route('page.index', 'Reset', [], ['class' => 'btn btn-default']) }}
                        </span>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>

            @if (request('q'))
            <br>
            {{ $users->appends(Request::except('page'))->render() }}
            @foreach ($users->chunk(4) as $chunkedUser)
            <div class="container">
                <div class="row">
                    @foreach ($chunkedUser as $user)
                    <div class="col-xs-6 col-sm-4 col-md-3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ userPhoto($user, ['style' => 'width:100%;max-width:300px']) }}
                            </div>
                            <div class="panel-body">
                                <h3 class="panel-title">{{ $user->profileLink() }} ({{ $user->gender }})</h3>
                                <div>{{ trans('user.nickname') }} : {{ $user->nickname }}</div>
                                <hr style="margin: 5px 0;">
                                <div>{{ trans('user.father') }} : {{ $user->father_id ? $user->father->name : '' }}</div>
                                <div>{{ trans('user.mother') }} : {{ $user->mother_id ? $user->mother->name : '' }}</div>
                            </div>
                            <div class="panel-footer">
                                {{ link_to_route('users.show', trans('app.show_profile'), [$user->id], ['class' => 'btn btn-default btn-xs']) }}
                                {{ link_to_route('users.chart', trans('app.show_family_chart'), [$user->id], ['class' => 'btn btn-default btn-xs']) }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            {{ $users->appends(Request::except('page'))->render() }}
            @endif
            
            @if (request('q'))
            <div class="container">
                <small class="text-center">{!! trans('app.user_found', ['total' => $users->total(), 'keyword' => request('q')]) !!}</small>
            </div>
            @endif

        </section>
        <!-- Cari End-->

        <!-- Keturunan Start -->
        <section id="keturunan" class="container text-center pad-7r">
            <h2>Anak Keturunan</h2>
            <hr>
            <br>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-4 col-md-offset-2">
                  <div class="thumbnail">
                    <img src="images/icon_user_0.png" alt="profile">
                    <div class="caption">
                      <h4><a href="users/a0120c62-12ad-4089-b68d-324318d9e7ef">Djoikromo</a></h4>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-4">
                  <div class="thumbnail">
                    <img src="images/icon_user_0.png" alt="profile">
                    <div class="caption">
                      <h4><a href="users/b14de34e-4b46-4cdb-ab33-072333dfffc7">Simah</a></h4>
                    </div>
                  </div>   
                </div>
            </div>

            <div class="row seven-cols hidden-sm hidden-xs">
                <div class="col-md-1">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/23d9be09-9ea9-4680-b536-8e885aa74d49">Jainem</a></h4>
                      </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/f21250f8-16d9-45ff-a344-0703f15669b2">Jainah</a></h4>
                      </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/c1974373-9017-4aac-8a89-fc73f70d0d2c">Sainem</a></h4>
                      </div>
                    </div> 
                </div>
                <div class="col-md-1">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/e783de8e-c948-4484-bcf1-478b87c83508">Saliman</a></h4>
                      </div>
                    </div> 
                </div>
                <div class="col-md-1">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/79b7078d-f783-404a-ad15-e9da2dc14ddf">Sukarno</a></h4>
                      </div>
                    </div> 
                </div>
                <div class="col-md-1">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/fc547dbb-1114-4f9e-91a9-ed9c8456ea04">Sukarmo</a></h4>
                      </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/5ba4f7e6-ca45-407e-906d-4af51a96b846">Kasiman</a></h4>
                      </div>
                    </div> 
                </div>
            </div>

            <div class="row visible-xs visible-sm">
                <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/23d9be09-9ea9-4680-b536-8e885aa74d49">Jainem</a></h4>
                      </div>
                    </div>
                </div>
                <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/f21250f8-16d9-45ff-a344-0703f15669b2">Jainah</a></h4>
                      </div>
                    </div>
                </div>
                <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/c1974373-9017-4aac-8a89-fc73f70d0d2c">Sainem</a></h4>
                      </div>
                    </div> 
                </div>
                <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/e783de8e-c948-4484-bcf1-478b87c83508">Saliman</a></h4>
                      </div>
                    </div> 
                </div>
                <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/79b7078d-f783-404a-ad15-e9da2dc14ddf">Sukarno</a></h4>
                      </div>
                    </div> 
                </div>
                <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/fc547dbb-1114-4f9e-91a9-ed9c8456ea04">Sukarmo</a></h4>
                      </div>
                    </div>
                </div>
                <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0">
                    <div class="thumbnail">
                      <img src="images/icon_user_0.png" alt="profile">
                      <div class="caption">
                        <h4><a href="users/5ba4f7e6-ca45-407e-906d-4af51a96b846">Kasiman</a></h4>
                      </div>
                    </div> 
                </div>
            </div>
        </section>
        <!-- Keturunan End -->
        
        <!-- Arisan Start -->
        <section id="arisan" class="container-fluid pad-7r bg-light-green">
          <h2 class="text-center">Arisan</h2>
          <hr>
          <br>
          <div class="container event">
              <div class="item">
                <div id="timeline">
                  <div>
                    <section class="year">
                      <h3>2013</h3>
                      <section>
                        <h4>Juni</h4>
                        <ul>
                          <li><b>Mbah Saliman</b></li>
                          <li>Keluarga ...</li>
                          <li>Acara di rumah ..., Desa Dukuh Bendo</li>
                        </ul>
                      </section>
                    </section>
                    <section class="year">
                      <h3>2014</h3>
                      <section>
                        <h4>Juni</h4>
                        <ul>
                          <li><b>Mbah Sukarno</b></li>
                          <li>Keluarga Pak Susilo</li>
                          <li>Acara di rumah Pak Susilo, Desa Dukuh Bendo</li>
                        </ul>
                      </section>
                    </section>
                    <section class="year">
                      <h3>2015</h3>
                      <section>
                        <h4>Juni</h4>
                        <ul>
                          <li><b>Mbah Sukarmo</b></li>
                          <li>Keluarga ...</li>
                          <li>Acara di rumah ..., Desa Dukuh Bendo</li>
                        </ul>
                      </section>
                    </section>
                    <section class="year">
                      <h3>2016</h3>
                      <section>
                        <h4>Juni</h4>
                        <ul>
                          <li><b>Mbah Kasiman</b></li>
                          <li>Keluarga Bu Erni</li>
                          <li>Acara di rumah Bu Erni, Desa Dukuh Bendo</li>
                        </ul>
                      </section>
                    </section>
                    <section class="year">
                      <h3>2017</h3>
                      <section>
                        <h4>Juni</h4>
                        <ul>
                          <li><b>Mbah Jainem</b></li>
                          <li>Keluarga ...</li>
                          <li>Acara di rumah Bu Sri, Desa Dukuh Bendo</li>
                        </ul>
                      </section>
                    </section>
                    <section class="year">
                      <h3>2018</h3>
                      <section>
                        <h4>Juni</h4>
                        <ul>
                          <li><b>Mbah Jainah</b></li>
                          <li>Keluarga ...</li>
                          <li>Acara di rumah ..., Desa Dukuh Bendo</li>
                        </ul>
                      </section>
                    </section>
                    <section class="year">
                      <h3>2019</h3>
                      <section>
                        <h4>Jum'at, 7 Juni</h4>
                        <ul>
                          <li><b>Mbah Sainem</b></li>
                          <li>Keluarga Pak Saikun</li>
                          <li>Acara di rumah Bu Ami, Desa Dukuh Bendo</li>
                        </ul>
                      </section>
                    </section>
                  </div>
                </div>
              </div>
          </div>
        </section>
        <!-- Arisan End -->

        <!-- Anggota Start -->
        <section id="anggota" class="container pad-7r">
            <h2 class="text-center">Anggota</h2>
            <hr>
            <br>
            <div class="row">
                @foreach ($randomUsers as $user)
                    <div class="col-xs-6 col-sm-4 col-md-2">
                        <div class="thumbnail">
                        {{ userPhoto($user, ['style' => 'width:100%;']) }}
                            <div class="caption"><a href="users/{{ $user->id }}">{{ $user->name }}</a></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!-- Anggota End -->
        
        <!-- Footer Start -->
        <section class="container pad-3r">
            <h5 class="text-center">© 2019 <b>Djoikromo.id</b> - Made with <span style="color: #e25555;">&hearts;</span> in Magetan</h5>
        </section>
        <!-- Footer End -->

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var timeline = document.querySelector('.item');
        timeline.scrollTop = timeline.scrollHeight - timeline.clientHeight;
    </script>
</body>
</html>
