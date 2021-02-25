<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "heroku_07c44eac08d0ae1";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$first_name = "";
$last_name = "";
$salary = "";
$title = "";
$emp_no = "";
$gender = "";
$birth_date = "";
$hire_date = "";
$dept_no = "";


if (isset($_POST['cmd']) && $_POST['cmd'] == 'update') {
  $emp_no = $_POST['emp_no'];
  $sql = "SELECT * FROM employees WHERE emp_no = '{$emp_no}'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $counter = 0;
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];

    $salary = $row['salary'];
    $gender = $row['gender'];
    $birth_date = $row['birth_date'];
    $hire_date = $row['hire_date'];
    $title = $row['title'];
    // $dept_no = $row['dept_no'];
  }
  if (mysqli_num_rows($result) > 0) {
    $counter = 0;
    $emp_no = $row['emp_no'];
  }
}

$sql = "SELECT * FROM employees LIMIT 20";
$result = mysqli_query($conn, $sql);
?>
<table>
  <tr>
    <td>
      <?php
      if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $counter = 0;
        while ($row = mysqli_fetch_assoc($result)) {
          $emp_no = $row['emp_no'];
          echo "<form action=\"{$_SERVER['PHP_SELF']}\" method=\"POST\" id=\"form{$emp_no}\">";
          echo "<input type='hidden' name='cmd' value='update' />";
          echo "<input type='hidden' name='emp_no' value='{$emp_no}'/>";
          echo "<input type='submit' value='Update' />";
          echo " [{$emp_no}]:  - {$row['first_name']} {$row['last_name']}  ";
          echo "";
          echo "</form>"; 
          $counter++;
        }
        echo "$counter results";
      } else {
        echo "0 results";
      }

// working now as you can see right  you can also update now
      ?>
    </td>
    <td valign="top">
      <h3>Update Employee</h3>
      <form action= "updatefinale.php" method="post">
        <input type="hidden" name="cmd" value="add" />
        <table>
         

          <tr>
            <th>Employee ID</th>
            <td><input type="text" name="emp_no" value="<?php echo $emp_no; ?>"></td>
          </tr>
          <tr>
            <th>First Name</th>
            <td><input type="text" name="first_name" value="<?php echo $first_name; ?>"></td>
          </tr>
          <tr>
            <th>Last Name</th>
            <td><input type="text" name="last_name" value="<?php echo $last_name; ?>"></td>
          </tr>
          <tr>
            <th>Salary</th>
            <td><input type="text" name="salary"  value="<?php echo $salary; ?>"></td>
          </tr>
          <tr>
            <th>Job Title</th>
            <td><input type="text" name="title"  value="<?php echo $title; ?>"></td>
          </tr>
          <tr>
            <th>Birth Date</th>
            <td><input type="date" name="birth_date"  value="<?php echo $birth_date; ?>"></td>
          </tr>
          <tr>
            <th>Hire Date</th>
            <td><input type="date" name="hire_date" value="<?php echo $hire_date; ?>"></td>
          </tr>
          <tr>
            <th>Gender</th>
            <td>
              <input type="radio" name="gender" value="M">Male<br />
              <input type="radio" name="gender" value="F">Female<br />
            </td>
          </tr>
        </table>
        <input type="submit" value="Update" />
      </form>
    </td>
  </tr>
</table>

<?php
mysqli_close($conn);

/* TODO Assignment Task 
- Populate gender
- Update employee's department.
*/
?>