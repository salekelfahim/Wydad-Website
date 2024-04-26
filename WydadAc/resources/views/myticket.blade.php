<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wydad Ticket</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
        }
        .ticket {
            border: 4px solid #ce1126;
            border-radius: 10px;
            padding: 30px;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #ce1126;
            margin-bottom: 20px;
            text-align: center;
        }
        p {
            color: #333;
            margin: 10px 0;
        }
        .category {
            font-weight: bold;
            color: #ce1126;
        }
        .price {
            font-style: italic;
            color: #4caf50;
        }
        .date {
            color: #555;
        }
        .barcode {
            margin-top: 30px;
            text-align: center;
        }
        .barcode img {
            width: 80%;
            max-width: 300px;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <h1>Wydad Game Ticket</h1>
        <p>This is your ticket for the {{ $title }} game. Be there to support your team!</p>
        <p class="category">Category: {{ $category }}</p>
        <p class="price">Price: {{ $price }}</p>
        <p class="date">Date: {{ $date }}</p>
    </div>
</body>
</html>
