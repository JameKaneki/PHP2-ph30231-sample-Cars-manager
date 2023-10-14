<h1>Editing {{$name}}</h1>
<form action="index.php?url=newCar" method="POST">
    <input type="hidden" name="id" value="{{$id}}"/>
    <div>
        <label>
            Name
        </label>
        <input type="text" name="name" value="{{$name}}"/>
    </div>
    <div>
        <label>
            Price
        </label>
        <input type="text" name="price" value="{{$price}}"/>
    </div>
    <span>{{$error}}</span>
    <div class="actions">
        <input type="submit" name="editCar"/>
    </div>
</form>