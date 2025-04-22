<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Tracks</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #fd95cb, #ffa5b9);
            padding: 40px;
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #ffffffdd;
            backdrop-filter: blur(4px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
        }

        input[type="text"] {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-size: 16px;
        }

        button {
            padding: 12px 24px;
            background-color: #ffa5b9;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ffa5b9;
        }

        .tracks {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .track {
            background-color: #ffffff;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease;
        }

        .track:hover {
            transform: translateY(-5px);
        }

        .track-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #222;
        }

        .track-playcount {
            font-size: 14px;
            color: #666;
        }

        @media (max-width: 600px) {
            form {
                flex-direction: column;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Top Tracks for "{{ $artist }}"</h1>

        <form method="GET" action="/">
            <input type="text" name="artist" placeholder="Enter artist name" value="{{ $artist }}">
            <button type="submit">Search</button>
        </form>

        <div class="tracks">
            @if (!empty($tracks))
                @foreach ($tracks as $track)
                    <div class="track">
                        <div class="track-title">{{ $track['name'] }}</div>
                        <div class="track-playcount">Playcount: {{ $track['playcount'] }}</div>
                    </div>
                @endforeach
            @else
                <p>No tracks found.</p>
            @endif
        </div>
    </div>
</body>
</html>
