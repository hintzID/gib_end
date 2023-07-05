<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ahlan wa Sahlan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Styles -->
    <style>

    </style>


</head>

<body
    style="background-image: url('{{ asset('image/home2.png') }}'); background-size: cover; background-position: center top -110px;"
    class="flex flex-nowrap">
    <div class="w-full md:w-1/2 flex justify-center items-center h-screen">
        <div class="text-center md:text-left px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-green-800" id="typing-effect"></h1>
            <p class="text-green-500 mt-4">Bergabunglah dengan gerakan ini untuk memberikan bantuan kepada mereka yang
                membutuhkan. Bersama-sama, kita dapat meringankan beban mereka, memberikan harapan, dan membuat
                perbedaan dalam kehidupan mereka. Mari berbagi kasih dan kepedulian, dan menjadi sumber inspirasi bagi
                orang lain. Setiap tindakan kebaikan memiliki dampak yang besar, jadi mari kita bergandengan tangan
                untuk menciptakan perubahan positif dalam dunia ini.</p>
        </div>
    </div>

    <div class="w-full md:w-1/2 flex justify-center items-center h-screen">
        <div class="text-center md:text-right px-10 mb-20">
            <h3 class="text-4xl md:text-5xl font-bold text-green-600 mb-8">Klik disini untuk memulai langkah anda ke
                surga</h3>

            <form class="mt-8">
                <div class="space-x-4">

                    @auth
                        <a href="{{ route('home') }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Home</a>
                    @endauth

                    @guest
                        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"
                            title="Klik untuk masuk">Log in</a>

                        @if (App\Models\User::count() === 0)
                            <a href="{{ route('register') }}"
                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded"
                                title="Hanya admin yang boleh masuk">Register</a>
                        @endif

                    @endguest

                </div>
            </form>

        </div>
    </div>



    <!-- Type.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeit/7.0.4/typeit.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- Custom Script -->
    <script>
        const sentences = ["Selamat datang di Gerakan Infaq Beras", "Ahlan wa Sahlan Calon Penghuni Surga"];
        let index = 0;

        function typeSentence() {
            const typingEffect = new TypeIt("#typing-effect", {
                strings: sentences[index],
                speed: 75,
                waitUntilVisible: true,
                afterComplete: function() {
                    setTimeout(() => {
                        index = (index + 1) % sentences
                            .length; // Mengubah indeks untuk mengganti kalimat
                        typingEffect.reset(); // Mereset efek pengetikan
                        typeSentence(); // Memulai pengetikan kalimat berikutnya
                    }, 3000); // Jeda 3 detik sebelum kalimat pertama muncul kembali
                }
            }).go();
        }

        typeSentence();
    </script>

</body>

</html>
