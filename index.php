<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Ajax Assignment</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Web Assignment</a>
        </div>
</nav>
<div class="container">
    <div class="starter-template">
        <h3>Ajax-Crud</h3>
        <p class="lead"></p>
        <button type="button" onclick="NewRecord();" class="btn btn-primary">
            New
        </button>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">list of Persons</div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Occupation</th>
                <th>Age</th>
                <th>City</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            require("classes/connection.php");
            $con = Connection();
            $sql = "SELECT id, name, occupation, age, website, city FROM persons";
            $stmt = $con->prepare($sql);
            $result = $stmt->execute();
            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
            foreach ($rows as $row) {
                ?>
                <tr>
                    <td><?php print($row->id); ?></td>
                    <td><?php print($row->name); ?></td>
                    <td><?php print($row->occupation); ?></td>
                    <td><?php print($row->age); ?></td>
                    <td><?php print($row->city); ?></td>
                    <td><?php print($row->website); ?></td>

                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger">Select</button>
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a onclick="Delete('<?php print($row->id); ?>');">Remove</a></li>
                                <li>
                                    <a onclick="Editor('<?php print($row->id); ?>','<?php print($row->name); ?>','<?php print($row->occupation); ?>','<?php print($row->age); ?>','<?php print($row->city); ?>','<?php print($row->website); ?>');">Update</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add/Update Person</h4>
                </div>
                <form role="form" action="" name="userData" onsubmit="Register(idP,currentAction); return false" >
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>occupation</label>
                            <input name="occupation" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Age</label>
                            <input name="age" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <select class="form-control" id="city" name="city">
                                <option selected>Lahore</option>
                                <option>Islamabad</option>
                                <option>Karachi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="website">Website</label>
                            <input name="website" class="form-control" id="website" required>
                        </div>

                        <!-- <div class="form-group">
                            <label for="avatar">Avatar</label>
                        <input type="file" id="avatar" name="avatar" multiple/>
                        </div> -->

                        <button type="submit" class="btn btn-info btn-lg">
                            Submit
                        </button>

                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-circle" data-dismiss="modal"><i
                                class="fa fa-times"></i>x
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    var currentAction;
    var idP;
    function NewRecord() {
        currentAction = 'N';
        document.userData.name.value = "";
        document.userData.occupation.value = "";
        document.userData.age.value = "";
        document.userData.website.value = "";
        document.userData.city.value = "";
        $('#modal').modal('show');
    }
    function Editor(id, name, occupation, age,city, website) {
        currentAction = 'E';
        idP = id;
        document.userData.name.value = name;
        document.userData.occupation.value = occupation;
        document.userData.age.value = age;
        document.userData.city.value = city;
        document.userData.website.value = website;

        $('#modal').modal('show');
    }

</script>
</body>
</html>
