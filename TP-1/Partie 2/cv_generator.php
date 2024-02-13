<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Form</title>
</head>
<body>
    <form action="generate_cv.php" method="post">
        <h2>General Info</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" required><br>

        <h2>Work Experience</h2>
        <label for="company">Company:</label>
        <input type="text" id="company" name="company" required><br>

        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required><br>

        <label for="work_description">Description:</label>
        <textarea id="work_description" name="work_description" required></textarea><br>

        <h2>Education</h2>
        <label for="school">School:</label>
        <input type="text" id="school" name="school" required><br>

        <label for="degree">Degree:</label>
        <input type="text" id="degree" name="degree" required><br>

        <label for="edu_description">Description:</label>
        <textarea id="edu_description" name="edu_description" required></textarea><br>

        <h2>Skills</h2>
        <label for="skills">Skills:</label>
        <textarea id="skills" name="skills" required></textarea><br>

        <input type="submit" value="Generate CV">
    </form>
</body>
</html>