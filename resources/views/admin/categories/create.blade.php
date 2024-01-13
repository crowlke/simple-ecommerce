<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create </title>
</head>
<body>

    <form action="{{ route('category.store')}}" method="post" >
        @csrf

        <input type="text" name="name" class="name" placeholder="Category Name"> 
        <input type="text" name="description" class="description" placeholder="Description"> 
            
        <button type="submit">Submit </button>
    </form>
    
</body>
</html>