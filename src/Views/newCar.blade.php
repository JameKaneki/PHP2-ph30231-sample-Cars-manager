<form action="index.php?url=newCar" method="POST">
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
        <input type="submit" name="newCar"/>
    </div>
</form>