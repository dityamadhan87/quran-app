<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex h-screen">
    <div class="flex-1 flex items-center justify-center bg-slate-300">
    </div>
    <div class="flex-1 flex flex-col gap-2 items-center justify-between">
        <div class="pt-10">
            <h1>Fitrah Mind</h1>
        </div>
        <form class="flex flex-col gap-4 h-96 w-64">
            <div class="flex flex-col gap-1">
                <label>Name</label>
                <input type="text" placeholder="Name" required>
            </div>
            <div class="flex flex-col gap-1">
                <label>Email</label>
                <input type="email" placeholder="Email" required>
            </div>
            <div class="flex flex-col gap-1">
                <label>Password</label>
                <input type="password" placeholder="Password" required>
            </div>
            <div class="flex flex-col gap-1">
                <label>Confirm Password</label>
                <input type="password" placeholder="Confirm Password" required>
            </div>
            <button type="submit">Register</button>
        </form>
        <div class="pb-10">
            <a href="{{ route('login.page') }}">
                <h1>I Have Account</h1>
            </a>
        </div>
    </div>
</body>

</html>