<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="assets/js/node_modules/jquery/dist/jquery.min.js"></script>
</head>

<body>

    <!-- Student Registration Form -->
    <form class="regform" id="regForm" method="post">
        <h1>Register Student</h1>

        <!-- Student Entry Section -->
        <fieldset>
            <legend>Student Entry:</legend>
            <p><input type="text" placeholder="Matric No..." name="matric_no" id="matric_no" required></p>
            <p><input type="text" placeholder="Surname..." name="surname" id="surname" required></p>
            <p><input type="text" placeholder="First Name..." name="first_name" id="first_name" required></p>
            <p><input type="text" placeholder="Other Name..." name="other_name" id="other_name"></p>
            <p><input type="text" placeholder="Faculty..." name="faculty" id="faculty" required></p>
            <p><input type="text" placeholder="Department..." name="department" id="department" required></p>
            <p><input type="text" placeholder="Course..." name="course" id="course" required></p>

            <!-- Dropdown for Current Level -->
            <label for="current_level">Current Level:</label>
            <select id="current_level" name="current_level" required>
                <option value="">-- Select Level --</option>
                <option>ND I FT</option>
                <option>ND II FT</option>
                <option>HND I FT</option>
                <option>HND II FT</option>
                <option>ND I PT</option>
                <option>ND II PT</option>
                <option>HND I PT</option>
                <option>HND II PT</option>
            </select>

            <!-- Dropdown for Mode of Entry -->
            <label for="mode_of_entry">Mode of Entry:</label>
            <select id="mode_of_entry" name="mode_of_entry" required>
                <option value="">-- Select Mode of Entry --</option>
                <option>ND I FULL-TIME</option>
                <option>ND II FULL-TIME</option>
                <option>HND I FULL-TIME</option>
                <option>HND II FULL-TIME</option>
                <option>ND I PART-TIME</option>
                <option>ND II PART-TIME</option>
                <option>HND I PART-TIME</option>
                <option>HND II PART-TIME</option>
            </select>
        </fieldset>

        <!-- Result Entry Section -->
        <fieldset>
            <legend>Result Entry:</legend>
            <!-- <p><input type="text" placeholder="Matric No..." name="result_matric_no" id="result_matric_no" required></p> -->
            <p><input type="text" placeholder="First Semester Grade Point..." name="first_grade" id="first_grade" required></p>
            <p><input type="text" placeholder="Second Semester Grade Point..." name="second_grade" id="second_grade" required></p>
            <p><input type="text" placeholder="Total Course..." name="total_course" id="total_course" required></p>
            <p><input type="text" placeholder="Total Grade Point..." name="total_grade" id="total_grade" required></p>
            <p><input type="text" placeholder="GPA..." name="gpa" id="gpa" required></p>
            <p><input type="text" placeholder="Remark..." name="remark" id="remark"></p>

            <!-- Dropdown for Result Type -->
            <label for="result_type">Result Type:</label>
            <select id="result_type" name="result_type" required>
                <option value="">-- Select Result Type --</option>
                <option>Final Year Result</option>
                <option>Sessional</option>
            </select>

            <!-- Dropdown for Academic Session -->
            <label for="academic_session">Academic Session:</label>
            <select id="academic_session" name="academic_session" required>
                <option value="">-- Select Academic Session --</option>
                <option>2024/2025</option>
                <option>2023/2024</option>
                <option>2022/2023</option>
                <option>2021/2020</option>
                <option>2019/2020</option>
                <option>2018/2019</option>
                <option>2017/2018</option>
                <option>2016/2017</option>
                <option>2015/2016</option>
                <option>2014/2015</option>
                <option>2013/2014</option>
                <option>2012/2013</option>
                <option>2011/2012</option>
                <option>2010/2011</option>
                <option>2009/2010</option>
                <option>2008/2009</option>
            </select>
        </fieldset>

        <!-- Passport Upload Section -->
        <fieldset>
            <legend>Passport Upload:</legend>
            <label for="imageInput">Select Passport:</label>
            <input type="file" id="imageInput" name="image" accept="image/*" required>
        </fieldset>

        <!-- Submit Button -->
        <button type="submit" id="save-user">Submit</button>
    </form>

    <div id="statusMessage"></div>

    <script src="add.js"></script>

</body>

</html>