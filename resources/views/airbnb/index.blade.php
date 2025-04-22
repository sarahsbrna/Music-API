<!DOCTYPE html>
<html>
<head>
    <title>Airbnb Listings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            padding: 20px;
            margin: 0;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .error {
            color: red;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .listing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            overflow: hidden;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .card h3 {
            margin: 15px;
            font-size: 18px;
            color: #333;
        }

        .card p {
            margin: 0 15px 15px;
            font-size: 14px;
            color: #666;
        }

        @media (max-width: 600px) {
            .card h3 {
                font-size: 16px;
            }
            .card p {
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Airbnb Categories</h1>

        @if(isset($listings['error']))
            <div class="error">
                {{ $listings['error'] }}
            </div>
        @elseif(!empty($listings['data']))
            <div class="listing-grid">
                @foreach($listings['data'] as $item)
                    <div class="card">
                        <img src="{{ $item['picture'] ?? 'https://via.placeholder.com/150' }}" alt="{{ $item['name'] ?? 'No name' }}">
                        <h3>{{ $item['name'] ?? 'No name' }}</h3>
                        <p>{{ $item['title'] ?? '' }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p>No data found.</p>
        @endif
    </div>
</body>
</html>
