<!doctype html>
<html lang="en">
  <head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <h1>Tabel Master Item</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <p>Search Item:</p>
	<form action="masteritem/search" method="GET">
		<input type="text" name="search" placeholder="Item Name" value="{{ old('search') }}">
		<input type="submit" value="search">
		<table class ="table">
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Stock</th>
			
			
		</tr>
		@if (count($items) == 0)
                        <tr>
                            <td colspan="6" align="center" style="color: gray; background-color: white"> <i>Data
                                    kosong</i> </td>
                        </tr>
                    @endif
		@foreach($items as $d=>$item)
		<tr>
			<td>{{ $d+$items->firstitem() }}</td>
			<td>{{ $item->item_name }}</td>
			<td>{{ $item->stock }}</td>
			
			<td>
				{{-- <a href="/edit/{{ $item->id_master_item }}">Update</a>
				<a  href="/delete/{{ $item->id_master_item }}" onclick="return confirm('Move data to trash?')">Delete</a>
				 --}}
                
				<a class="btn btn-primary" href="masteritem/edit/{{ $item->id }}" 
					role="button"><i class="fa fa-edit"> </i></a>
				<a class="btn btn-primary" href="masteritem/delete/{{ $item->id}}" 
					onclick="return confirm('Move data to trash?')" role="button"><i class="fa fa-remove"> </i></a>
                
			</td>
			
		</tr>
		@endforeach
		{{ $items ->links()  }}
	</table>
	<button style="margin-right: 300px;width: 100px;background-color: rgba(1, 204, 21, 0.829);font-size: 14px;height: 35px;padding: 0px;"><a href="masteritem/create">Add</a></button>
	
  </body>
</html>