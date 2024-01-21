<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Options</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .button-container {
            display: flex;
            margin-bottom: 20px;
        }

        .signup-button {
            background-color: #007bff;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 150px;
            margin-right: 10px;
        }

        .signup-button.personal {
            background-color: #28a745;
        }

        .signup-container {
            display: none;
            flex-direction: column;
            align-items: center;
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            box-sizing: border-box;
        }

        .columns-container {
            display: flex;
            width: 100%;
        }

        .column {
            flex: 1;
            padding: 30px;
            box-sizing: border-box;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            color: #555;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <button class="signup-button professional" onclick="switchSignup('professional')">Professional Signup</button>
        <button class="signup-button personal" onclick="switchSignup('personal')">Personal Signup</button>
    </div>

    <form id="signupForm" method="POST" action="signup.php">
        <input type="hidden" name="signupType" id="signupType" value="professional">

        <div class="signup-container" id="professionalSignup">
            <h2>Professional Signup</h2>

            <div class="columns-container">
                <div class="column">
                    <!-- Professional Signup Form Fields -->
                    <label for="profName">Name:</label>
                    <input type="text" id="profName" name="name" required>

                    <label for="profPhone">Phone Number:</label>
                    <input type="tel" id="profPhone" name="phone" pattern="[0-9]{11}" required>

                    <label for="profEmail">Email:</label>
                    <input type="email" id="profEmail" name="email" required>

                    <label for="profAddress">Address:</label>
                    <input type="text" id="profAddress" name="address" required>
                </div>

                <div class="column">
                    <!-- Professional Signup Form Fields -->
                    <label for="workType">Work Type:</label>
                    <select id="workType" name="workType" required>
                        <option value="" selected disabled>Select Work Type</option>
                        <option value="1">Plumbing</option>
                        <option value="2">Gasline Repair</option>
                        <option value="3">Electrical</option>
                    </select>

                    <label for="profPassword">Password:</label>
                    <input type="password" id="profPassword" name="password" required>

                    <label for="profConfirmPassword">Confirm Password:</label>
                    <input type="password" id="profConfirmPassword" name="confirmPassword" required>
                </div>
            </div>
            <button type="submit">Sign Up</button>
        </div>
    </form>

    <form id="personalSignupForm" method="POST" action="signup.php">
        <input type="hidden" name="signupType" id="signupType" value="personal">

        <div class="signup-container" id="personalSignup">
            <h2>Personal Signup</h2>

            <div class="columns-container">
                <div class="column">
                    <!-- Personal Signup Form Fields -->
                    <label for="personalName">Name:</label>
                    <input type="text" id="personalName" name="name" required>

                    <label for="personalPhone">Phone Number:</label>
                    <input type="tel" id="personalPhone" name="phone" pattern="[0-9]{11}" required>

                    <label for="personalEmail">Email:</label>
                    <input type="email" id="personalEmail" name="email" required>

                    <label for="personalAddress">Address:</label>
                    <input type="text" id="personalAddress" name="address" required>
                </div>

                <div class="column">
                    <!-- Personal Signup Form Fields -->
                    <label for="personalPassword">Password:</label>
                    <input type="password" id="personalPassword" name="password" required>

                    <label for="personalConfirmPassword">Confirm Password:</label>
                    <input type="password" id="personalConfirmPassword" name="confirmPassword" required>
                </div>
            </div>
            <button type="submit">Sign Up</button>
        </div>
    </form>

    <script>
        function switchSignup(option) {
            document.getElementById('signupType').value = option;

            if (option === 'professional') {
                document.getElementById('professionalSignup').style.display = 'flex';
                document.getElementById('personalSignup').style.display = 'none';
            } else if (option === 'personal') {
                document.getElementById('professionalSignup').style.display = 'none';
                document.getElementById('personalSignup').style.display = 'flex';
            }
        }
    </script>
</body>
</html>
