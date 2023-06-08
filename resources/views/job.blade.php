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

            <form action="/job/{{$job->id}}/submit" method="POST">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <th class="table-active" scope="col" colspan="6">
                            Job application for {{$job->job}}
                            </td>
                    </tr>
                    <tr>
                        <th class="table-active" scope="row" colspan="2">
                            <label for="email" class="form-label">Email address</label>
                        </th>
                        <td colspan="4">
                            <input type="email" class="form-control" autocomplete="email" name="email" id="email"
                                required>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active" scope="row" colspan="2">
                            <label for="name" class="form-label">Full name</label>
                        </th>
                        <td colspan="4">
                            <input type="text" class="form-control" autocomplete="name" name="name" id="name" required>
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active" scope="row" colspan="2">
                            <label for="phone" class="form-label">Phone number</label>
                        </th>
                        <td colspan="4">
                            <input type="text" class="form-control" autocomplete="mobile" name="phone" id="phone">
                        </td>
                    </tr>
                    <tr>
                        <th class="table-active" scope="col" colspan="2">
                            Competences / Levels
                        </th>
                        @foreach ($levels as $level)
                        <th class="text-center table-active" scope="col" colspan="1">
                            {{$level->level}}
                        </th>
                        @endforeach
                    </tr>
                    @foreach ($competences as $competence)
                    <tr>
                        <td colspan="2">
                            {{$competence->competence}}
                        </td>
                        @foreach ($levels as $level)
                        <td class="text-center" onclick="event.target.children[0].click()" colspan="1">
                            <input class="form-check-input" type="radio" name="competence_{{$competence->id}}"
                                value="{{$level->id}}" required>
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="6">
                            <input class="form-control" type="submit" value="Submit">
                        </td>
                    </tr>
                </table>
            </form>

        </div>


    </main>


    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
</head>

<body>


    <script src="/include/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>