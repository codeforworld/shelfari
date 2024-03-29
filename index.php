<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Shelfari</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top" xmlns="http://www.w3.org/1999/html">
    <div class="navbar-inner">
        <div class="container">
			
            <a class="brand" href="#">Shelfari</a>
			

            <div class="nav-collapse">
                <ul class="nav">
				<a href="#/new" class="btn btn-small btn-primary">Add Book</a>
			    </ul>
			</div>
		</div>
	</div>
</div>

<div class="container">

<section class="head">

	<input class="search-query pull-right" name="searchText" type="text" id="searchText" placeholder="Search books"/>

</section>

<div class="page"></div>
</div>




<script type="text/template" id="book-list-template">
	<div class="text">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Name</th><th>Author</th><th>Status</th><th></th>
				</tr>
			</thead>
			<tbody>
				<% if(books.length == 0) {%>
					<tr>
                       <td>No results matched</td>
					   <td></td>
					   <td></td>
						</tr>
				<% } %>
				<% _.each(books, function(book) { %>
					<tr>
						<td><%= book.get('name') %></td>
						<td><%= book.get('author') %></td>
						<td><%= book.get('status') %></td>
						<td><a class="btn" href="#/edit/<%= book.id %>">Edit</a></td>		
					</tr>
				<% }); %>
			</tbody>
		</table>
	</div>
</script>


<script type="text/template" id="edit-user-template">
    <form class="edit-book-form">
		<legend><%= book ? 'Edit' : 'New' %> Book</legend>
        <label>Name</label>
        <input name="name" type="text" value="<%= book ? book.get('name') : '' %>" />
        <label>Author</label>
        <input name="author" type="text" value="<%= book ? book.get('author') : '' %>" />
        <label>Status</label>
		<select name="status">
		<option>Unread</option>
		<option>Read</option>
		</select>
        <hr />
		<button type="submit" class="btn"><%= book ? 'Update' : 'Create' %></button>
		<% if(book) { %>
        <input type="hidden" name="id" value="<%= book.id %>" />
		<button data-user-id="<%= book.id %>" class="btn btn-danger delete">Delete</button>
       <% }; %>
	   
    </form>
  </script>

<script src="lib/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="lib/underscore-min.js" type="text/javascript"></script>
<script src="lib/backbone-min.js"></script>
<script src="js/app.js"></script>


</body>
</html>