$(document).ready(function () {
  $("#save-user").on("click", function (e) {
    e.preventDefault();

    // Collecting form data
    const formData = new FormData();

    // Get all inputs
    const matric_no = $("#matric_no").val();
    const surname = $("#surname").val();
    const first_name = $("#first_name").val();
    const other_name = $("#other_name").val();
    const faculty = $("#faculty").val();
    const department = $("#department").val();
    const course = $("#course").val();
    const current_level = $("#current_level").val();
    const mode_of_entry = $("#mode_of_entry").val();
    const first_grade = $("#first_grade").val();
    const second_grade = $("#second_grade").val();
    const total_course = $("#total_course").val();
    const total_grade = $("#total_grade").val();
    const gpa = $("#gpa").val();
    const remark = $("#remark").val();
    const result_type = $("#result_type").val();
    const academic_session = $("#academic_session").val();

    // Validate all fields
    if (
      !matric_no ||
      !surname ||
      !first_name ||
      !faculty ||
      !department ||
      !current_level ||
      !mode_of_entry ||
      !first_grade ||
      !second_grade ||
      !total_course ||
      !total_grade ||
      !gpa ||
      !remark ||
      !result_type ||
      !academic_session
    ) {
      alert("Please fill out all fields.");
      return;
    }

    // Check if an image is selected
    const file = $("#imageInput")[0].files[0];
    if (!file) {
      alert("Please upload an image.");
      return;
    }

    // Append all data to FormData
    formData.append("matric_no", matric_no);
    formData.append("surname", surname);
    formData.append("first_name", first_name);
    formData.append("other_name", other_name);
    formData.append("faculty", faculty);
    formData.append("department", department);
    formData.append("course", course);
    formData.append("current_level", current_level);
    formData.append("mode_of_entry", mode_of_entry);
    formData.append("first_grade", first_grade);
    formData.append("second_grade", second_grade);
    formData.append("total_course", total_course);
    formData.append("total_grade", total_grade);
    formData.append("gpa", gpa);
    formData.append("remark", remark);
    formData.append("result_type", result_type);
    formData.append("academic_session", academic_session);
    formData.append("image", file);

    // Submit data via AJAX
    $.ajax({
      url: "../factory/web2.php?route=saveUser",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        try {
          const result = JSON.parse(response);
          console.log(result)
          if (result.success) {
            alert(`User saved successfully! File path: ${result.filePath}`);
          } else {
            alert(`Error: ${result.error}`);
          }
        } catch (err) {
          alert("Invalid JSON response from the server.");
          console.log(err);
        }
      },
      error: function (xhr, status, error) {
        alert(`An error occurred: ${xhr.responseText || error}`);
      },
    });
  });
});
