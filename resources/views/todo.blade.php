<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Todo Planning</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-light">
<div class="container">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    @foreach ($tasks as $task)
                        <th scope="col"> -</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <th scope="row">{{$task['period']}}</th>
                        @foreach ($task['developers'] as $key =>$developer)
                            <td>
                                <div class="card col-md-12 my-2 p-1 border-warning">
                                    <h5 class="card-header p-0 m-0"> {{$key }}</h5>
                                    <div class="card-body p-0">
                                        <div>
                                            <span class="col-12">totalTask:{{ @$developer['info']['totalTask'] }} </span>
                                            <span class="col-12">totalHour:{{ @$developer['info']['totalHour'] }} </span>
                                        </div>
                                    </div>
                                </div>
                                @foreach (@$developer['planning'] as $plan)

                                    <div class="card border-info col-md-12 my-2 p-1">
                                        <h5 class="card-header p-0 m-0"> {{ $plan['name'] }}</h5>
                                        <div class="card-body p-0">
                                            <div>
                                                <span class="col-12">Level: {{ $plan['level'] }}x</span>
                                                <span class="col-12">Duration: {{ $plan['estimated_duration'] }}</span>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
