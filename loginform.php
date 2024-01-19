<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form is submitted
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Retrieve form data
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Perform database connection
        $conn = new mysqli("localhost", "root", "", "service_venue");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use prepared statements to prevent SQL injection
        $stmt_personal = $conn->prepare("SELECT * FROM personal_signup WHERE email = ? AND password = ?");
        $stmt_personal->bind_param("ss", $email, $password);

        // Execute the first query
        $stmt_personal->execute();

        // Get the result
        $result_personal = $stmt_personal->get_result();

        // Close the result set and statement
        $stmt_personal->close();

        // Use prepared statements for the second query
        $stmt_professional = $conn->prepare("SELECT * FROM professional_signup WHERE email = ? AND password = ?");
        $stmt_professional->bind_param("ss", $email, $password);

        // Execute the second query
        $stmt_professional->execute();

        // Get the result
        $result_professional = $stmt_professional->get_result();

        // Close the result set and statement
        $stmt_professional->close();

        // Check if login is successful in either table
        if ($result_personal->num_rows > 0 || $result_professional->num_rows > 0) {
            echo "Login successful";
            // You can redirect the user to another page or perform additional actions after successful login
        } else {
            echo "Invalid email or password";
        }

        // Close the connection
        $conn->close();
    } else {
        echo "Invalid form submission";
    }
}
?>
