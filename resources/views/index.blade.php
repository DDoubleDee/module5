<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MODULE 5</title>

    <!-- Bootstrap core CSS -->
    <link href="/include/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- start of header -->

    <main>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <span class="fs-4">MODULE 5</span>
                </a>

                <ul class="nav nav-pills">
                    <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="/joblist" class="nav-link">Joblist</a></li>
                </ul>
            </header>
        </div>

        <div class="container">

            <ul class="list-group">
                @foreach ($jobs as $job)
                <li class="list-group-item"><a class="text-dark text-decoration-none" href="/job/{{$job->id}}">{{$job->job}}</a></li>
                @endforeach
            </ul>

        </div>


    </main>


    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
</head>

<body>


    <script src="/include/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>