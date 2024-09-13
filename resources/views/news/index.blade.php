<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        body, html {
            height: 100%;
        }

        .media img, .media video {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body class="">
    <div class="container mt-5">

        <h1 class="text-center">News</h1>
        <div class="row">
            @foreach($news as $new)
            <div class="col-md-4 mb-4">
                <div class="card border">
                    <div class="card-body">
                        <h2 class="card-title">{{ $new->title }}</h2>
                        <p class="card-text">{{ $new->story }}</p>
                        <div class="media">
                            @php $extension = explode('.', $new->image); @endphp
                            @if($extension[1] == 'mp4')
                                <video controls autoplay>
                                    <source src="{{ $path.'/'.$new->image }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                            @else
                                <img src="{{ $path.'/'.$new->image }}" class="img-fluid"/>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</body>
</html>
