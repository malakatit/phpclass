<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marathon Master - Add Race</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Add Race</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Race Details</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="/marathon/public/add_race" method="post">

                                <div class="form-group">
                                    <label for="race_name">Race Name</label>
                                    <input type="text" class="form-control" id="race_name" name="race_name" placeholder="e.g. Badger State Marathon">
                                </div>

                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="race_location" name="race_location" placeholder="City, State or full address">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="race_description" name="race_description" rows="5" placeholder="Describe the race — course, terrain, difficulty..."></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="race_date">Race Date & Time</label>
                                            <input type="datetime-local" class="form-control" id="race_date" name="race_date">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Save Race</button>
                                <button type="reset" class="btn btn-default">Reset Race</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>