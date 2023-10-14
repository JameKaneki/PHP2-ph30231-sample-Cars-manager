<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>{{$title}}</h1>
<table>
  <thead>
  <tr>
    <th>id</th>
    <th>Car Name</th>
    <th>Price</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  @foreach($cars as $car)
    <tr>
      <td>{{$car['id']}}</td>
      <td>{{$car['name']}}</td>
      <td>{{$car['price']}}</td>
      <td>
        <div class="actions">
          <button><a href="index.php?url=editCar&id={{$car['id']}}">Edit</a></button>
{{--          <button><a href="index.php?url=deleteCar&id={{$car['id']}}">Delete</a></button>--}}
          <button onClick="confirmDelete('{{$car['name']}}',{{$car['id']}})" type="button">Delete</button>
        </div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
<div>
  <button><a href="index.php?url=newCar">Add Car</a></button>
</div>
</body>
</html>
<script>
  const  confirmDelete  = (name,id) => {
    const result = confirm(`Are you sure remove this ${name}`)
    if(result) {
      location.href = (`index.php?url=deleteCar&id=${id}`)
    }
  }
</script>