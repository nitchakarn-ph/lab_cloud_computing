<?php
    require "config/connection.php";
    
    if(isset($_GET['stdID'])){
        $id = $_GET['stdID'];
        $sql = "SELECT * FROM students WHERE stdID = '$id' ";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($res);
    }

    if(isset($_POST['btn-update'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $deptID = $_POST['deptID'];
        $stdID = $_POST['stdID'];
        $update = "UPDATE students SET fname='$fname', lname='$lname',deptID='$deptID' WHERE stdID = '$stdID' ";
        $up = mysqli_query($conn, $update);
        if(!isset($sql)){
            die ("Error $sql" .mysqli_connect_error());
        }else{
            
            header("location: index.php");
            
        }
    }
?>
<script>
function update(){
    var x;
    if(confirm("ต้องการแก้ไขข้อมูลใช่หรือไม่") == true){
        x= "update";
 }
}
</script>
<?php include "templates/header.php";?>
<h2>Edit student</h2>


<form method="POST" >
    <input type="hidden" name="stdID" id="stdID" value="<?php echo $row["stdID"];?>"><br>
        <label for="firstname">First Name</label>
    <input type="text" name="fname" id="fname" value="<?php echo $row['fname'];?>"><br>
        <label for="lastname">Last Name</label>
    <input type="text" name="lname" id="lname" value="<?php echo $row['lname'];?>"><br>
        <label for="deptID">Departments:</label>

    <select name="deptID">
    <?php
    
    $res2 = mysqli_query($conn, "SELECT * FROM department");
    while($row2 = mysqli_fetch_array($res2)) {
        echo "<option value='".$row2['deptID']."'>".$row2['deptName']."</option>";
    } ?>

    </select>
    <br>


    <button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button>
</form>

<?php
 $fname = $_POST['firstname'];
 $lname = $_POST['lastname'];
 $stdID = $_POST['studentID'];
 $deptID = $_POST['deptID'];
?>
<a href="index.php">Back to HOME</a>
</div>
<?php include "templates/footer.php";?>
