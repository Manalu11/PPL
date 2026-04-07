<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            background: linear-gradient(-45deg, #87CEEB, #6ec6ff, #b3e5fc, #4fc3f7);
            background-size: 400% 400%;
            animation: gradientMove 10s ease infinite;

        }


        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #87CEEB, #6ec6ff, #b3e5fc, #4fc3f7);
            background-size: 400% 400%;
            animation: gradientMove 10s ease infinite;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .text-bawah {
            margin-top: 30px;
            text-align: center;
            color: black;
        }

        .text-bawah h2 {
            margin-bottom: 10px;
            font-size: 28px;
        }

        .text-bawah p {
            font-size: 16px;
        }



        .swiper {
            width: auto;
            height: auto;
        }

        .swiper-wrapper {
            display: flex;
            align-items: center;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            max-width: 90%;
            height: auto;
            display: block;
            border-radius: 20px;
            /* ini bikin sudut melengkung */
        }

        @keyframes gradientMove {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>

</head>

<body>

    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <img src="{{ asset('images/banner1.jpg') }}" alt="">
            </div>

            <div class="swiper-slide">
                <img src="{{ asset('images/banner2.jpg') }}" alt="">
            </div>

            <div class="swiper-slide">
                <img src="{{ asset('images/banner3.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/banner4.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/banner5.jpg') }}" alt="">
            </div>

        </div>
        <div class="text-bawah">
            <h2>Selamat Datang di Website kami</h2>
            <p>Temukan produk terbaik dengan kualitas premium ✨</p>

        </div>

    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            allowTouchMove: false
        });
    </script>
    <script>
        document.body.addEventListener("click", function() {
            window.location.href = "{{ route('login') }}";
        });
    </script>


</body>

</html>