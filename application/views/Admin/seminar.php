<!DOCTYPE html>
<html lang="en">
<head>
<title>Matrix Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="\parish\assets\HTML\css/bootstrap.min.css" />
<link rel="stylesheet" href="\parish\assets\HTML\css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="\parish\assets\HTML\css/uniform.css" />
<link rel="stylesheet" href="\parish\assets\HTML\css/select2.css" />
<link rel="stylesheet" href="\parish\assets\HTML\css/matrix-style.css" />
<link rel="stylesheet" href="\parish\assets\HTML\css/matrix-media.css" />
<link href="\parish\assets\HTML\font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>


<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


<style type="text/css">
    body {
        color: #404E67;
        
    font-family: 'Open Sans', sans-serif;
  }
  .table-wrapper {
    width: 700px;
    margin: 30px auto;
        background: #fff;
        padding: 20px;  
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
    }
  .table-title .add-new i {
    margin-right: 4px;
  }
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
    cursor: pointer;
        display: inline-block;
        margin: 0 5px;
    min-width: 24px;
    }    
  table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
  table.table td a.add i {
        font-size: 24px;
      margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
  table.table .form-control.error {
    border-color: #f50000;
  }
  table.table td .add {
    display: none;
  }
</style>
<script type="text/javascript">

$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
  var actions = $("table td:last-child").html();
  // Append table with add row form on add new button click
    $(".add-new").click(function(){
    $(this).attr("disabled", "disabled");
    var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +

      '<td>' + actions + '</td>' +
        '</tr>';
      $("table").append(row);   
    $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
  // Add row on add button click
  $(document).on("click", ".add", function(){
    var empty = false;
    var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
      if(!$(this).val()){
        $(this).addClass("error");
        empty = true;
      } else{
                $(this).removeClass("error");
            }
    });
    $(this).parents("tr").find(".error").first().focus();
    if(!empty){
      input.each(function(){
        $(this).parent("td").html($(this).val());
      });     
      $(this).parents("tr").find(".add, .edit").toggle();
      $(".add-new").removeAttr("disabled");
    }   
    });
  // Edit row on edit button click
  $(document).on("click", ".edit", function(){    
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
      $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
    });   
    $(this).parents("tr").find(".add, .edit").toggle();
    $(".add-new").attr("disabled", "disabled");
    });
  // Delete row on delete button click
  $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
    $(".add-new").removeAttr("disabled");
    });
});
</script>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.php ">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome User</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
        <li class="divider"></li>
        <li><a href="login.html"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>

<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch--> 

<!--sidebar-menu-->

<div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-th"></i>Tables</a>
  <ul>
    <li><a href="#"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li><a href="#"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
    <li><a href="#"><i class="icon icon-inbox"></i> <span>Bible Readings</span></a> </li>
    <li><a href="#"><i class="icon icon-th"></i> <span>Data</span></a></li>
    <li><a href="#"><i class="icon icon-fullscreen"></i> <span>Events</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Tables</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="announcements">Announcements</a></li>
        <li ><a href="schedule">Schedule</a></li>
        <li class="active"><a href="seminar.php">Seminar</a></li>
        <li><a href="tithes.php">Tithes</a></li>
        <li><a href="user.php">User</a></li>
      </ul>
    </li>
    <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
    <li><a href="interface.html"><i class="icon icon-pencil"></i> <span></span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
      <ul>
        <li><a href="index2.html">Dashboard2</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="chat.html">Chat option</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="error403.html">Error 403</a></li>
        <li><a href="error404.html">Error 404</a></li>
        <li><a href="error405.html">Error 405</a></li>
        <li><a href="error500.html">Error 500</a></li>
      </ul>
    </li>
  </ul>
</div>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Tables</a> </div>
    <h1>Tables</h1>
  </div>
   <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="col-sm-8"> <span class="icon"></span><h5 style="margin-left: 5px">Schedule</h5>
          </div>
          <!--<div class="widget-content nopadding">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button>
                    </div>-->
                </div>
            </div>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Seminar ID</th>
                  <th>Seminar Name</th>
                  <th>Seminar Detailes</th>
                  <th>Seminar Time</th>
                  <th>Seminar Start Date</th>
                  <th>Seminar End Date</th>
                  <th>Seminar Status</th>
                  <th><button type="button" style="font-size: 10px"class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></th>
                </tr>
              </thead>
                <tbody>
                    <tr>
                        <td>
              <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                            <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                         
                </tbody>
            </table>





<script src="\parish\assets\HTML\js/jquery.min.js"></script> 
<script src="\parish\assets\HTML\js/jquery.ui.custom.js"></script> 
<script src="\parish\assets\HTML\js/bootstrap.min.js"></script> 
<script src="\parish\assets\HTML\js/jquery.uniform.js"></script> 
<script src="\parish\assets\HTML\js/select2.min.js"></script> 
<script src="\parish\assets\HTML\js/jquery.dataTables.min.js"></script> 
<script src="\parish\assets\HTML\js/matrix.js"></script> 
<script src="\parish\assets\HTML\js/matrix.tables.js"></script>
</body>
</html>
