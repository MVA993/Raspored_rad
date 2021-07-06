$(document).ready(function(){
    $(document).on('change', '#file', function(){
        var property = document.getElementById("file").files[0];
        var file_name = property.name;
        var file_extension = file_name.split('.').pop().toLowerCase();
        if(jQuery.inArray(file_extension, ['sql','csv']) == -1)
        {
            
            alert("Pogrešan tip fajla!");
        }
        else 
        {
            var form_data = new FormData();
            form_data.append("file", property);
            $.ajax({
                url:"includes/header_includes/upload.php",
                method:"POST",
                data:form_data,
                contentType:false,
                cashe:false,
                processData:false,
                beforeSend:function(){
                    $('#uploaded_file').html("<label class='text-success'>Otpremanje...</label>");
                },
                success:function(data)
                {
                    $('#uploaded_file').html(data);
                } 
            });
        }
    });
});

window.onscroll = function() {myFunction()};
var nav_bar = document.getElementById("nav_bar");
var sticky = nav_bar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    nav_bar.classList.add("sticky")
  } else {
    nav_bar.classList.remove("sticky");
  }
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active_accordion");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
} 