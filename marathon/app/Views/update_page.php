<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marathon Master - Update</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                    <h1 class="page-header">Update Race</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-dashboard"></i> <a href="index.html">Dashboard</a></li>
                        <li class="active"><i class="fa fa-edit"></i> Update Race</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Race Details</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="/marathon/public/edit_race" method="post">

                                <div class="form-group">
                                    <label for="race_name">Race Name</label>
                                    <input type="text" class="form-control" id="race_name" name="race_name" value="<?=$race[0]['raceName']?>">
                                </div>

                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="race_location" name="race_location" value="<?=$race[0]['raceLocation']?>">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="race_description" name="race_description" rows="5" value="<?=$race[0]['raceDescription']?>"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="race_date">Race Date & Time</label>
                                            <input type="datetime-local" class="form-control" id="race_date" name="race_date" value="<?=$race[0]['raceDateTime']?>">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" id="txtID" name="txtID" value="<?=$race[0]['raceID']?>">

                                <button type="submit" class="btn btn-default">Update Race</button>
                                <button type="reset" class="btn btn-default">Reset Race</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>