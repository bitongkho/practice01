<?php
include 'Connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button with Bootstrap Modal</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Include DataTables CSS -->
    <link href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="content.css">
</head>

<body>
    

    <h2>Applicant Information</h2>
    <div class="container mt-5">
        <!-- Button to trigger the modal -->
       
        <button type="button" class="btn btn-primary" id="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Add applicant
        </button>
        <table id="myTable" class="table"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>FullName</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
           while ($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>$row[id]</td>
            <td>{$row['fullName']}</td>
            <td>{$row['age']}</td>
            <td>{$row['address']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['contact']}</td>
            <td>{$row['infoCreated']}</td>
            <td>
            <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#editmodal' data-id='{$row['id']}'>Edit</button>
            <a class='btn btn-danger' href='delete_applicant.php?id=$row[id]'>Delete</a>
            </td>
          </tr>";
}

                ?>
            </tbody>    
        </table>
    </div>
    <!-- modal for ADD APPLICANT -->
    <form method="post" action="Connection.php">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Applicant</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="FullName" name="fullName" value="" required>
                        <label for="">Age</label>
                        <input type="number" class="form-control" placeholder="Age" name="age" value="" required>
                        <label for="">Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="address" value="" required>
                        <label for="">Gender :</label>
                        <input type="radio" value="Male" id="male" name="gender" value="<?php echo $gender;?>">male
                        <input type="radio" value="Female" id="female" name="gender" value="<?php echo $gender;?>">female<br>
                        <label for="">Contact #</label>
                        <input type="number" class="form-control" placeholder="09XXXXXXXXX" name=contact value="" required>
                        <label for="">Date Created</label>
                        <input type="date" class="form-control" name="infoCreated" value="" required>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
   

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editmodalLabel">Edit Applicant</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Create a form for editing -->
                <form method="post" action="edit_applicant.php">
                    <input type="hidden" name="id" id="applicantIdToEdit">

                    <label for="editFullName">Name</label>
                    <input type="text" class="form-control" id="editFullName" name="fullName" required>

                    <label for="editAge">Age</label>
                    <input type="number" class="form-control" id="editAge" name="age" required>

                    <label for="editAddress">Address</label>
                    <input type="text" class="form-control" id="editAddress" name="address" required>

                    <label for="editGender">Gender:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="editMale" value="Male">
                        <label class="form-check-label" for="editMale">Male</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="editFemale" value="Female">
                        <label class="form-check-label" for="editFemale">Female</label>
                    </div>

                    <label for="editContact">Contact #</label>
                    <input type="number" class="form-control" id="editContact" name="contact" required>

                    <label for="editInfoCreated">Date Created</label>
                    <input type="date" class="form-control" id="editInfoCreated" name="infoCreated" required>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="edit">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Include jQuery before DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- Include DataTables JavaScript -->
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Include Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <script>
       $(document).ready(function(){
            $('#myTable').DataTable();
       });  
    </script>   
</body>
</html>
