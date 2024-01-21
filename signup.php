<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form is submitted
    if (isset($_POST['signupType']) && isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {

        // Retrieve form data
        $signupType = $_POST['signupType'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        // Validate form data
        if (empty($name) || empty($phone) || empty($email) || empty($address) || empty($password) || empty($confirmPassword)) {
            echo "Please fill in all the fields.";
        } else {
            // Perform signup based on type
            if ($signupType === 'professional' && isset($_POST['workType'])) {
                $workType = $_POST['workType'];

                // Perform database connection
                $conn = new mysqli("localhost", "root", "", "service_venue");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert data into the professional table
                $sql = "INSERT INTO professional_signup (name, phone, email, address, work_type, password) VALUES ('$name', '$phone', '$email', '$address', '$workType', '$password')";

                if ($conn->query($sql) === TRUE) {
                    echo "Professional Signup Successful";
                    // Redirect to login page after 1 second
                    echo '<script>
                            setTimeout(function(){
                                window.location.href = "login.php";
                            }, 1000); // 1 second delay
                          </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            } elseif ($signupType === 'personal') {
                // Perform database connection
                $conn = new mysqli("localhost", "root", "", "service_venue");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Insert data into the personal table
                $sql = "INSERT INTO personal_signup (name, phone, email, address, password) VALUES ('$name', '$phone', '$email', '$address', '$password')";

                if ($conn->query($sql) === TRUE) {
                    echo "Personal Signup Successful";
                    // Redirect to login page after 1 second
                    echo '<script>
                            setTimeout(function(){
                                window.location.href = "login.php";
                            }, 1000); // 1 second delay
                          </script>';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
            } else {
                echo "Invalid signup type.";
            }
        }
    } else {
        echo "Invalid form submission.";
    }
}
?>
