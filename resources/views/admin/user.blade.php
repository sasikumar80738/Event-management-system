<!--Design by foolishdeveloper.com-->

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Document</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

*{
	list-style: none;
	text-decoration: none;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: 'Open Sans', sans-serif;
}

body{
	background: #f5f6fa;
}

.wrapper .sidebar{
	background: rgb(5, 68, 104);
	position: fixed;
	top: 0;
	left: 0;
	width: 225px;
	height: 100%;
	padding: 20px 0;
	transition: all 0.5s ease;
}

.wrapper .sidebar .profile{
	margin-bottom: 30px;
	text-align: center;
}

.wrapper .sidebar .profile img{
	display: block;
	width: 100px;
	height: 100px;
    border-radius: 50%;
	margin: 0 auto;
}

.wrapper .sidebar .profile h3{
	color: #ffffff;
	margin: 10px 0 5px;
}

.wrapper .sidebar .profile p{
	color: rgb(206, 240, 253);
	font-size: 14px;
}

.wrapper .sidebar ul li a{
	display: block;
	padding: 13px 30px;
	border-bottom: 1px solid #10558d;
	color: rgb(241, 237, 237);
	font-size: 16px;
	position: relative;
}

.wrapper .sidebar ul li a .icon{
	color: #dee4ec;
	width: 30px;
	display: inline-block;
}

 

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
	color: #0c7db1;

	background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
	color: #0c7db1;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
	display: block;
}

.wrapper .section{
	width: calc(100% - 225px);
	margin-left: 225px;
	transition: all 0.5s ease;
}

.wrapper .section .top_navbar{
	background: rgb(7, 105, 185);
	height: 50px;
	display: flex;
	align-items: center;
	padding: 0 30px;
 
}

.wrapper .section .top_navbar .hamburger a{
	font-size: 28px;
	color: #f4fbff;
}

.wrapper .section .top_navbar .hamburger a:hover{
	color: #a2ecff;
}

 .wrapper .section .container{
	margin: 30px;
	background: #fff;
	padding: 50px;
	line-height: 28px;
}

body.active .wrapper .sidebar{
	left: -225px;
}

body.active .wrapper .section{
	margin-left: 0;
	width: 100%;
}

    </style>
</head>
<body>
   <!-- add form  -->
   <div class="modal" id="addItemModal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id='add-crud'>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">User name:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">  
                            <label for="description">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

						<div class="form-group">
                            <label for="title">Password:</label>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                            
                        <div class="form-group">
                            <label for="status">User type</label>
                            <div class="form-check">
                                <input type="radio" id="admin" name="usertype" value="admin" class="form-check-input">
                                <label for="active" class="form-check-label">Admin</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="user" name="usertype" value="user" class="form-check-input">
                                <label for="inactive" class="form-check-label">User</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>
	<!-- end add form -->

	<!-- edit model -->
    <div class="modal" id="editmodel" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id='add-crud'>
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Item</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">User name:</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Email:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                            
                        <div class="form-group">
                            <label for="status">User type</label>
                            <div class="form-check">
                                <input type="radio" id="admin" name="usertype" value="admin" class="form-check-input">
                                <label for="active" class="form-check-label">admin</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="user" name="usertype" value="user" class="form-check-input">
                                <label for="inactive" class="form-check-label">User</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>

	<!-- end of edit form -->

    <div class="wrapper">
       <div class="section">
		<div class="top_navbar">
			<div class="hamburger">
				<a href="#">
					<i class="fas fa-bars"></i>
				</a>
			</div>
		</div>
		<div class="container">

        <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Adminn Dashboard') }}
        </h2>

    </x-slot>
	
	<div class='container'>
		
	<button id="addItemButton" class="btn btn-primary" style="width: 150px; height: 50px;">
		Add Customer</button><br><br>

	<table class="table table-bordered" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background-color: #f2f2f2;">
							<th style="border: 1px solid #ddd; padding: 8px;">S.No</th>
                                <th style="border: 1px solid #ddd; padding: 8px;">Name</th>
                                <th style="border: 1px solid #ddd; padding: 8px;">Email</th>
                                <th style="border: 1px solid #ddd; padding: 8px;">Usertype</th>
                                <th style="border: 1px solid #ddd; padding: 8px;">Edit</th>
                                <th style="border: 1px solid #ddd; padding: 8px;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                <tr>
								<td style="border: 1px solid #ddd; padding: 8px;">{{ $item->id }}</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->name }}</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->email }}</td>
                                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $item->usertype }}</td>

									<td><button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editmodel" data-itemm-idd="{{ $item->id }}">Edit</button></td>

									<td><a href="{{ route('delete', $item->id) }}" class="btn btn-danger delete-btn" data-item-id="{{ $item->id }}">Delete</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                  
	
	</div>
	</x-app-layout>
		</div>

		
	</div>
        <div class="sidebar">
            <div class="profile">
                <img src="https://1.bp.blogspot.com/-vhmWFWO2r8U/YLjr2A57toI/AAAAAAAACO4/0GBonlEZPmAiQW4uvkCTm5LvlJVd_-l_wCNcBGAsYHQ/s16000/team-1-2.jpg" alt="profile_picture">
                <h3>Sasi</h3>
                <p>Developer</p>
            </div>
            <ul>

				<li>
                    <a href="{{ route('admindashboard') }}" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item"> Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user.index') }}" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('event.index') }}">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">Events</span>
                    </a>
                </li>
                
            </ul>
        </div>
        
    </div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<script>
		 $(document).ready(function () {
        $('#addItemButton').click(function () {
            $('#addItemModal').modal('show');
        });

        $('#add-crud').submit(function (e) {
            e.preventDefault();
            var formData = $(this).serialize();
            // var token = localStorage.getItem('authToken');

            $.ajax({
                type: 'POST',
                url: '{{ route("store") }}',
                data: formData,
                // headers: {
                //             Authorization: 'Bearer ' + token
                          

                //         },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Added!',
                        text: 'The item has been Added successfully.',
                        showConfirmButton: false,
                        timer: 6000
                    });
                    $('#addItemModal').modal('hide');

                    window.location.href = '{{ route("user.index") }}';

                    
                },
                error: function (error) {

                    if (error.status === 401) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Unauthorized!',
                        text: 'You are not authorized to perform this action.',
                        showConfirmButton: false,
                        timer: 6000
                    });
                }
              
                else{
                    var errors = error.responseJSON.errors;

                $('.modal-body .error-message').remove();

                $.each(errors, function(field, messages) {
                    var errorMessage = '<div class="error-message" style="color: red;">' + messages.join('<br>') + '</div>'; 
                    $('[name="' + field + '"]').after(errorMessage);
                });

                }
                  
                }
            });
        });

		
        $(document).on('click', '.edit-btn', function () {
            // var token = localStorage.getItem('authToken');
            var itemId = $(this).data('itemm-idd');
            $.ajax({
                type: 'GET',
                url: '{{ route("edit", ":id") }}'.replace(':id', itemId),
                dataType: 'json',
                // headers: {
                //             Authorization: 'Bearer ' + token
                //         },
                success: function (response) {
                    $('#editmodel').modal('show');
                    $('#editmodel').find('[name="name"]').val(response.itemm.name);
                    $('#editmodel').find('[name="email"]').val(response.itemm.email);
                    
                    if (response.itemm.usertype === 'admin') {
                        $('#editmodel').find('#admin').prop('checked', true);
                    } else {
                        $('#editmodel').find('#user').prop('checked', true);
                    }
                    $('#editmodel').data('itemId', itemId);
                },
                error: function (error) {
                    console.log(error);
                    $('#editmodel').modal('hide');
                    Swal.fire({
                    icon: 'error',
                    title: 'Unauthorized!',
                    text: 'You are not authorized to perform this action.',
                    showConfirmButton: false,
                    timer: 6000
                });

                }
            });
        });

		
        $('#editmodel').on('submit', 'form', function(e) {
            e.preventDefault();
            var itemId = $('#editmodel').data('itemId'); 
            e.preventDefault();
            var formData = $(this).serialize();
            // var token = localStorage.getItem('authToken');

            $.ajax({
                type: 'POST',
                url: '{{ route("update", ":id") }}'.replace(':id', itemId),            
                data: formData,
                // headers: {
                //             Authorization: 'Bearer ' + token
                //         },
                success: function(response) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: 'The item has been Updated successfully.',
                        showConfirmButton: false,
                        timer: 6000
                    });
                    window.location.href = '{{ route("user.index") }}';
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                    Swal.fire({
                    icon: 'error',
                    title: 'Unauthorized!',
                    text: 'You are not authorized to perform this action.',
                    showConfirmButton: false,
                    timer: 6000
                });
                }
            });
        });
	});

	</script>
</body>

</html>