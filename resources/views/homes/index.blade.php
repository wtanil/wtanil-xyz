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
                    <h1 class="text-center text-color-white">Hello there!</h1><!-- General Kenobi! -->
                    
                    <p class="indent text-color-white">
                        I'm William from Indonesia. After a solid career break, I'm thrilled to dive back into the coding and software development scene.
                    </p>
                    <p class="indent text-color-white">
                        My focus is on iOS development. This could be anything from making things look good on the iPhone screen to figuring out how everything fits together behind the scenes. Beyond iOS, I've explored Android, Unity, and websites, and played around with creative tools like Blender, GIMP, and SketchUp. This portfolio is my showcase of the diverse skills I've picked up.
                    </p>
                    <p class="indent text-color-white">
                        From crafting lines of code to sipping on endless cups of coffee, let's roll up our sleeves and dive into this fresh chapter together. Exciting times ahead!
                    </p>
                    <p class="indent text-color-white">
                        Also, let's meet during the iOS Dev Happy Hour event on <a href="https://www.iosdevhappyhour.com/" target="_blank">www.iosdevhappyhour.com</a>.
                    </p>

                </div>
            </dic>
            <dic class="row">
                <div class="col-12 text-center">
                    <hr style="background-color: #DDDFDC;">
                    <a href="https://twitter.com/wtanil_dev" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/twitter-logo.svg" class="social-icon"></a>

                    <a href="https://gitlab.com/wtanil" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/gitlab-logo-700.svg" class="social-icon-lg"></a>

                    <a href="https://github.com/wtanil" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/github-mark-white.svg" class="social-icon"></a>

                    <a href="https://youtube.com" class="disabled-link" target="_blank"><img src="https://www.wtanil.xyz/storage/asset/youtube-white.svg" class="social-icon-lg"></a>

                </div>
            </dic>
        </div>
    </div>

    <div class="row padding-row" id="project-section">
        <div class="col">
            <h2>Projects</h2>
        </div>
    </div>


    @if ($projects->isNotEmpty())
    @foreach ($projects as $project)
    <div class="row padding-card">
        <div class="col-12">
            <h4>{{ $project->name }}</h4>
        </div>
        <div class="col-12 col-sm-4 text-center">
            @if ($project->thumbnail_id != null)
            <a href="{{$project->thumbnail->high_res_url}}" target="_blank"><img class="rounded img-project-thumb" src="{{ $project->thumbnail->low_res_url }}"></a>
            @endif
        </div>
        <div class="col-12 col-sm-8">
            <p>{!! nl2br(e($project->blurb)) !!} </p>
            
            <div>
                <span class="badge"><a class="btn btn-success btn-sm" href="{{ route('home.show', ['id' => $project->id]) }}" role="button">Learn more</a></span>
                @if ($project->links != null)
                {!! html_entity_decode($project->links) !!}
                @endif
            </div>
            

        </div>

    </div>

    @endforeach
    @endif


</div>

@endsection
