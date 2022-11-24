
<div class="col-xl-12">
        <h5 style="text-align: center;">View All Comments</h5>
        <table class="table table-hover table-bordered" style="background-color: pink;">
            <tr>
                <thead>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Full Names</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Suggestion</th>
                    <th>Status</th>
                    <!-- <th>Commmodity Photos</th> -->
                    <th>Approve</th>
                    <th>UnApprove</th>
                    <th>Delete</th>
                </thead>
                
            </tr>
            
            <tbody>
                

                
<?php

$query = "SELECT * FROM comments";
$allCommodities=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($allCommodities)){
    $commentId=$row['comment_id'];
    $fullNames=$row['full_names'];
    $username=$row['username'];
    $phone=$row['phone'];
    $comment=$row['comment'];
    $email=$row['email'];
    $status=$row['comment_status'];
    // $comentPhotos=$row['coment_photos'];

    echo "<tr>";
    echo "<td>$commentId</td>";
    echo "<td>$username</td>";
    echo "<td>$fullNames</td>";
    echo "<td>$email</td>";
    echo "<td>$phone</td>";
    echo "<td>$comment</td>";
    echo "<td>$status</td>";
    echo "<td><a href='comments.php?approve=$commentId'>Approve</a></td>";
    echo "<td><a href='comments.php?unApprove=$commentId'>UnApprove</a></td>";
    // echo "<td>$comentPhotos</td>";
    echo "<td><a href='comments.php?delete_id=$commentId' >Delete</a></td>";
    echo "</tr>";
}
// Approve Comment
if(isset($_GET['approve'])){
    $approveId=$_GET['approve'];
    $query="UPDATE comments SET comment_status='Approved' WHERE comment_id=$approveId";
    $approveComment=mysqli_query($connect,$query);
    header("Location:./comments.php");
}
// UnApprove Comment
if(isset($_GET['unApprove'])){
    $unApproveId=$_GET['unApprove'];
    $query="UPDATE comments SET comment_status='unApproved' WHERE comment_id=$unApproveId";
    $approveComment=mysqli_query($connect,$query); 
      header("Location:./comments.php");
}

// Delete Comment
if(isset($_GET['delete_id'])){
    $deleteId=$_GET['delete_id'];
    $query="DELETE FROM comments WHERE comment_id = $deleteId";
    $query=mysqli_query($connect,$query);
    header("Location:./comments.php");
}

?>

                
                
            </tbody>
        </table>
</div>