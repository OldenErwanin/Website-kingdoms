function regForm() {
  var logWindow = document.getElementById('reg-Page');
  if (logWindow.style.display != 'block') {
    logWindow.style.display = 'block';
  } else {
    logWindow.style.display = 'none';
  }
}
$( document ).ready(function regForm2() {
  if (window.location.search.indexOf('regerror') > -1) {
    var logWindow = document.getElementById('reg-Page');
    logWindow.style.display = 'block';
  }
});

function writenewsForm() {
  var writenewsWindow = document.getElementById('writenews-Page');
  if (writenewsWindow.style.display != 'block') {
    writenewsWindow.style.display = 'block';
  } else {
    writenewsWindow.style.display = 'none';
  }
}
function editnewsForm() {
  var editnewsWindow = document.getElementById('editnews-Page');
  if (editnewsWindow.style.display != 'block') {
    editnewsWindow.style.display = 'block';
  } else {
    editnewsWindow.style.display = 'none';
  }
}
function writecommForm() {
  var writecommWindow = document.getElementById('writecomment-Page');
  if (writecommWindow.style.display != 'block') {
    writecommWindow.style.display = 'block';
  } else {
    writecommWindow.style.display = 'none';
  }
}

function newsFeaturedDate() {
  var checkBox = document.getElementById("newsFC");
  // Get the output text
  var date = document.getElementById("newsFD");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    date.style.display = "block";
  } else {
    date.style.display = "none";
  }
}

$(window).load(function(){
  $(".col-3 input").val("");

  $(".input-effect input").focusout(function(){
    if($(this).val() != ""){
      $(this).addClass("has-content");
    }else{
      $(this).removeClass("has-content");
    }
  })
});
