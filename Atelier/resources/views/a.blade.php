<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test POST Request</title>
</head>
<body>
    <h1>Test POST Request</h1>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        
        <label for="role">Role:</label><br>
        <input type="number" id="role" name="role"><br>
        
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
