<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marathon Master - Manage Runners</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php
        echo view('include/header');
        echo view('include/menu');
        ?>
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Runners</h1>
                </div>
            </div>

            <!-- Select Race -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label>Select Race</label>
                        <select class="form-control" id="raceSelect">
                            <option value="">-- Select a Race --</option>
                            <?php foreach ($races as $race): ?>
                                <option value="<?= $race['raceID'] ?>">
                                    <?= $race['raceName'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Results Table -->
            <div class="row">
                <div class="col-lg-12">

                    <div id="resultsSection" style="display:none;">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Runner Name</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody id="resultsBody"></tbody>
                        </table>
                    </div>

                    <p id="noResults" style="display:none;">No runners registered for this race.</p>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- jQuery first, then Bootstrap, then our script -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
    var allRunners = <?= json_encode($runners) ?>;

    $('#raceSelect').change(function() {
        var raceId = $(this).val();

        if (!raceId) {
            $('#resultsSection').hide();
            $('#noResults').hide();
            return;
        }

        var filtered = allRunners.filter(function(r) {
            return r.raceID == raceId;
        });

        if (filtered.length === 0) {
            $('#resultsSection').hide();
            $('#noResults').show();
            return;
        }

        $('#resultsBody').empty();

        $.each(filtered, function(i, runner) {
            $('#resultsBody').append(
                '<tr>' +
                '<td>' + (i + 1) + '</td>' +
                '<td>' + runner.memberName + '</td>' +
                '<td>' + runner.memberEmail + '</td>' +
                '</tr>'
            );
        });

        $('#resultsSection').show();
        $('#noResults').hide();
    });
</script>

</body>
</html>