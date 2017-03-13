<?php
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meno = test_input($_POST["meno"]);
    $email = test_input($_POST["email"]);
    $text = test_input($_POST["text"]);

    $sql = "INSERT INTO odkazy (meno, email, text) VALUES ('$meno', '$email', '$text')";

    if ($conn->query($sql) === TRUE) {
        echo "správa bola odoslanáˇ";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>


<div class="wrap">
    <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group">
            <label for="meno">Meno</label>
            <input type="text" class="form-control" name="meno" placeholder="zadaj meno" />
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="zadaj email" />
        </div>
        <textarea class="form-control" rows="3" name="text"></textarea>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">odoslať</button>
            </div>
        </div>

    </form>
</div>
<?php include 'footer.php'; ?>