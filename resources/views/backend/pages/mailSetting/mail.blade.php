<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Hello!</h1>
                <p class="card-text">This is a sample email template in Laravel using Bootstrap.</p>
                <p class="card-text">Here are some details:</p>
                <ul class="list-group">
                    <li class="list-group-item">Name: {{ $data['subject'] }}</li>
                    {{ $data['body'] }}
                    {{-- <li class="list-group-item">Email: {{ $email }}</li>
                    <li class="list-group-item">Message: {{ $messageContent }}</li> --}}
                </ul>
                <p class="card-text mt-3">Thank you for using our service.</p>
            </div>
        </div>
    </div>
</body>
</html>
