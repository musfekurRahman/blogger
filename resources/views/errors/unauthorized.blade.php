<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized Access</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center pt-20">
<div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full text-center">
    <h2 class="text-2xl font-semibold text-red-600">403 - Unauthorized Access</h2>
    <p class="mt-4 text-gray-700">You do not have permission to view this page.</p>
    <div class="mt-6">
        <a href="{{ url('/') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Go to Home
        </a>
    </div>
</div>
</body>
</html>
