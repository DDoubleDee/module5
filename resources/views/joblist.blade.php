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
                    <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="/joblist" class="nav-link active" aria-current="page">Joblist</a></li>
                </ul>
            </header>
        </div>

        <div class="container">

            <ul class="list-group">
                @foreach ($jobs as $job)
                <li class="list-group-item">
                    <table class="table table-bordered">
                        <tr>
                            <th class="table-active" scope="col" colspan="1">
                                Job applications for {{$job["job"]}}:
                                </td>
                        </tr>
                        @foreach ($job["candidates"] as $candidate)
                        <tr>
                            <table class="table table-bordered">
                                <tr>
                                    <th class="table-active" scope="row" colspan="2">
                                        <label for="email" class="form-label">Email address</label>
                                    </th>
                                    <td colspan="4">
                                        {{$candidate->email}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-active" scope="row" colspan="2">
                                        <label for="name" class="form-label">Full name</label>
                                    </th>
                                    <td colspan="4">
                                        {{$candidate->name}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-active" scope="row" colspan="2">
                                        <label for="phone" class="form-label">Phone number</label>
                                    </th>
                                    <td colspan="4">
                                        {{$candidate->phone}}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="table-active" scope="col" colspan="2">
                                        Competences / Levels
                                    </th>
                                    <th class="table-active" scope="col" colspan="4">
                                        Points
                                    </th>
                                </tr>
                                @foreach ($candidate->competences as $competence => $value)
                                <tr class="cal" val-calc="{{$value}}">
                                    <td colspan="2">
                                        {{$competence}}
                                    </td>
                                    <td colspan="4">
                                        {{$value}}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2">
                                        TOTAL
                                    </td>
                                    <td colspan="4" class="calc">
                                    </td>
                                </tr>
                            </table>
                        </tr>
                        @endforeach
                    </table>
                </li>
                @endforeach
            </ul>

        </div>


    </main>


    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet">
</head>

<body>


    <script src="/include/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const calc = document.querySelectorAll(".calc")

        calc.forEach(element => {
            let cur = element.parentElement.previousElementSibling,
                total = 0
            while(cur.classList.contains("cal")){
                total += parseInt(cur.getAttribute("val-calc"))
                cur = cur.previousElementSibling
            }
            element.textContent = "" + total
        });
    </script>
</body>

</html>