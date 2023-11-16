@extends('layouts.portfolio')

@section('content')

<div class="container container-body">


    <div class="row bg-full padding-row-profile" id="profile-section">

        <div class="col-12">
            <dic class="row">
                <div class="col-12 col-sm-4">
                    <div class="card padding-profile">
                        <div class="col-12 text-center">
                            <img class="rounded-circle img-main" src="https://wtanil.xyz/storage/asset/profilepic.jpg">
                        </div>
                        <div class="col-12 text-center">
                            <span class="font-profile-name">WILLIAM TANIL</span>
                            <br>
                            <span class="font-profile-desc">Software Developer </span>
                        </div>
                        
                    </div>
                </div>

                <div class="col-12 col-sm-8">
                    <h1 class="text-center">Hello there!</h1><!-- General Kenobi! -->
                    
                    <p class="card-text indent">
                        I'm William from Indonesia. After a solid career break, I'm thrilled to dive back into the coding and software development scene.
                    </p>
                    <p class="card-text indent">
                        My focus is on iOS development, from making things look good on the iPhone screen to figuring out how everything fits together.Beyond iOS, I've explored Android, Unity, and websites, and played around with creative tools like Blender and GIMP. This portfolio is my showcase of the diverse skills I've picked up.
                    </p>
                    <p class="card-text indent">
                        From crafting lines of code to sipping on endless cups of coffee, let's roll up our sleeves and dive into this fresh chapter together. Exciting times ahead!
                    </p>

                </div>
            </dic>
            <dic class="row">
                <div class="col-12 text-center">
                    <hr style="background-color: #DDDFDC;">
                    <a href="https://twitter.com/wtanil_dev" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/twitter-logo.svg" class="social-icon"></a>

                    <a href="https://gitlab.com/wtanil" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/gitlab-logo-700.svg" class="social-icon-lg"></a>

                    <a href="https://github.com/wtanil" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/github-mark-white.svg" class="social-icon"></a>

                    <a href="https://youtube.com" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/youtube-white.svg" class="social-icon-lg"></a>

                </div>
            </dic>
        </div>
    </div>

    <div class="row padding-row" id="project-section">
        <div class="col">
            <h3>Projects</h3>
        </div>
    </div>


    @if ($projects->isNotEmpty())
    @foreach ($projects as $project)
    <div class="row padding-card">
            <div class="col-4 text-center">
                @if ($project->thumbnail_id != null)
                <a href="{{ route('home.show', ['id' => $project->id]) }}"><img class="rounded img-project-thumb" src="{{$project->thumbnail->low_res_url}}"></a>
                @endif
            </div>
            <div class="col-8">
                <h4>{{ $project->name }}</h4>
                <p>{!! nl2br(e($project->description)) !!} </p>
            </div>
    </div>

    @endforeach
    @endif
    


{{--
    @if ($projects->isNotEmpty())
    @foreach ($projects as $project)

    <div class="row">
        <div class="col-12">
            <div class="card my-0 border-0">
                <div class="card-body">

                    <h5 class="card-title font-weight-bold"><a href="{{ route('home.show', ['id' => $project->id]) }}" >{{ $project->name }}</a></h5>

                    <div class="row">
                        @if ($project->thumbnail_id != null)
                        <div class="col-2 col-md-1">
                            <div class="img-thumb-small-container">
                                <a href="{{ route('home.show', ['id' => $project->id]) }}"><img class="rounded img-fluid " src="{{$project->thumbnail->low_res_url}}"></a>
                            </div>
                        </div>
                        @endif

                        <div class="col-10 col-md-11">
                            @if ($project->tags != null)
                            <h6 class="mb-2 text-muted">
                                @foreach ($project->tags->sortBy('priority') as $tag)
                                <span class="badge badge-pill text-dark font-weight-light" style="background-color:#{{ $tag->color }};">{{ $tag->name }}</span>
                                @endforeach
                            </h6>
                            @endif

                            @if ($project->links != null)
                            <div>
                                {!! html_entity_decode($project->links) !!}
                            </div>
                            @endif

                            <!--
                            <span class="badge" style="background-color: ;">
                                <a href="https://dev.wtanil.xyz"><img src="https://www.wtanil.xyz/storage/asset/appstore-badge-black.svg" class="link-badge"></a>
                            </span>
                            <span class="badge" style="background-color: ;">
                                <a href="https://dev.wtanil.xyz"><img src="https://www.wtanil.xyz/storage/asset/gitlab-badge-withgraytext.svg" class="link-badge"></a>
                            </span>
                        -->


                            <p class="card-text">{!! nl2br(e($project->getShortdescription())) !!} 
                                @if (strlen($project->description) > 150)
                                <a href="{{ route('home.show', ['id' => $project->id]) }}">more</a>
                                @endif
                            </p>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
    --}}

    {{--
    @endforeach
    @endif
    --}}

    <row>
        <div class="col-12 text-center">
            <a href="https://twitter.com/wtanil_dev" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/twitter-logo.svg" class="social-icon"></a>

            <a href="https://gitlab.com/wtanil" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/gitlab-logo-700.svg" class="social-icon-lg"></a>

            <a href="https://github.com/wtanil" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/github-mark-white.svg" class="social-icon"></a>

            <a href="https://youtube.com" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/youtube-white.svg" class="social-icon-lg"></a>
            <hr style="background-color: #DDDFDC;">
        </div>
        <div class="col-12 text-center">
            <p>Copyright {{ date('Y') }} | Designed and built by William Tanil</p>
        </div>
    </row>


</div>

@endsection
