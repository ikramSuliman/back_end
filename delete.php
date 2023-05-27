<?php
include('db.php');


    // $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the ID of the user to be deleted
    $userId = $_GET['id'];

    // // Prepare the SQL statement
    // $sql = "DELETE FROM users WHERE id = :id";


    $sql = "DELETE FROM users WHERE id='" . $_GET["id"] . "'";
    $result=mysqli_query($con, $sql);
    if ($result) {
        echo "<script >alert('Record Deleted Successfully');</script>";
        header('Location:manage.php');
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
    mysqli_close($con);

//     // Check if any rows are affected
//     if ($stmt->num_rows() > 0) {
//         echo "User with ID $userId has been deleted successfully.";
//     } else {
//         echo "No user found with ID $userId.";
//     }
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }
?>