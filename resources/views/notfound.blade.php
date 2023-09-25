<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css" integrity="sha512-siarrzI1u3pCqFG2LEzi87McrBmq6Tp7juVsdmGY1Dr8Saw+ZBAzDzrGwX3vgxX1NkioYNCFOVC0GpDPss10zQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Error</title>
    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: fit-content;
            width: 100%;
            flex-direction: column;
            gap: 20px;
            margin-top: 40px;
        }

        .error-message {
            background-color: #f44336;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 70%;
            animation: pulse 3.5s infinite;
   
        }

        .error-message h4 {
            font-size: 14px;
            margin: 0;
            line-height: 1.4;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }

        button {
          padding: 10px 30px;
          color: white;
          font-weight: bolder;
          background-color: blue;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          transition: background-color 1s ease;
        }

        button:hover {
          background-color: white;
          color: blue;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-message">
            <h4>The route "{{ $lang }}" you are trying to access is not accessible or not available.</h4>
        </div>
        <a href="{{route('landing')}}">
          <button>Go Back</button>
        </a>
       
    </div>
    
    
</body>
</html>