$(document).ready(function () {
  $("#login_btn").on("click", function (e) {
    e.preventDefault();
    let username = $("#username").val().toLowerCase();
    let password = $("#password").val();
    console.log(username, password);

    if (username.length > 0 && password.length > 0) {
      $.ajax({
        type: "POST",
        url: "../factory/web.php?route=LoginUser",
        data: {
          username,
          password,
        },
        cache: false,
        dataType: "json",
        success: function (res) {
          if (res.status == 200) {
            alert("Login successful");
            window.location.href = res.url;
          } else {
            alert(res.message);
          }
        },
        error: function (err) {
          console.log("Error ==> ", err);
          window.location.reload();
        },
      });
    } else {
      alert("error");
    }
  });
});
