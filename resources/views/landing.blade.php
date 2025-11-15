<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tirta Amerta Wedding Organizer</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#1f2937', // Dark Gray / Black
                        accent: '#fbbf24', // Amber/Gold for premium feel
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLMD/cdw+EaYlSYGSSx5w+L+oK+4yF2rD6YF3Y8A+qB9tXm0KqV5V+B8t7/QyYQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <nav class="absolute top-0 left-0 w-full flex items-center justify-between px-8 py-5 z-50">
        <h2 class="text-2xl font-bold text-white drop-shadow">Tirta Amerta</h2>

        <a href="/admin/login"
            class="px-5 py-2 bg-white/90 text-gray-900 font-semibold rounded-full shadow hover:bg-white transition">
            Admin Login
        </a>
    </nav>

    <style>
        html {
            scroll-behavior: smooth;
        }
        /* Tambahkan CSS untuk animasi saat item muncul (perlu JS untuk memicu di produksi, tapi ini kerangkanya) */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="font-sans text-gray-900 bg-white">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1 // Mulai animasi saat 10% elemen terlihat
            });

            document.querySelectorAll('.animate-on-scroll').forEach(element => {
                observer.observe(element);
            });

            // Perbarui URL scroll button di Hero Section
            const heroButton = document.querySelector('.hero-scroll-btn');
            if (heroButton) {
                heroButton.href = '#about'; // Mengarahkan ke bagian About
            }
        });
    </script>

    <section id="hero" class="relative h-screen flex items-center justify-center bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1508672019048-805c876b67e2?q=80&w=1920&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-gray-900/60"></div>
        <div class="relative text-center text-white px-6 animate-on-scroll">
            <h1 class="text-5xl md:text-7xl font-bold drop-shadow-lg">Tirta Amerta</h1>
            <p class="text-xl mt-4 font-light">Wedding Organizer • Elegant • Timeless • Premium</p>
        </div>
    </section>


    <section id="about" class="py-24 bg-gray-50 text-center">
        <h2 class="text-4xl font-bold mb-4 animate-on-scroll">Mengapa Memilih Kami?</h2>
        <p class="max-w-3xl mx-auto text-gray-600 text-lg mb-16 animate-on-scroll">
            Kami adalah mitra perencanaan Anda, memastikan setiap detail dieksekusi dengan presisi dan sentuhan keanggunan.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 max-w-7xl mx-auto px-6">

            <div class="relative group h-full animate-on-scroll">
                <div class="absolute inset-0 translate-x-3 translate-y-3 bg-gray-900 rounded-xl opacity-20 group-hover:opacity-10 transition duration-500"></div>
                <div class="relative p-8 bg-white border-4 border-gray-900 rounded-xl shadow-xl h-full
                            transform transition duration-300 ease-in-out group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-2xl">
                    <i class="fas fa-handshake text-5xl text-accent mb-4"></i>
                    <h3 class="font-extrabold text-2xl mb-2 text-primary">Tim Berpengalaman</h3>
                    <p class="text-gray-600">Dukungan tim berpengalaman yang siap mengelola seluruh logistik acara Anda tanpa cela.</p>
                </div>
            </div>

            <div class="relative group h-full animate-on-scroll">
                <div class="absolute inset-0 translate-x-3 translate-y-3 bg-gray-900 rounded-xl opacity-20 group-hover:opacity-10 transition duration-500"></div>
                <div class="relative p-8 bg-white border-4 border-gray-900 rounded-xl shadow-xl h-full
                            transform transition duration-300 ease-in-out group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-2xl">
                    <i class="fas fa-gem text-5xl text-accent mb-4"></i>
                    <h3 class="font-extrabold text-2xl mb-2 text-primary">Konsep Eksklusif</h3>
                    <p class="text-gray-600">Kami merancang tema pernikahan yang unik, elegan, dan 100% merefleksikan kepribadian Anda.</p>
                </div>
            </div>

            <div class="relative group h-full animate-on-scroll">
                <div class="absolute inset-0 translate-x-3 translate-y-3 bg-gray-900 rounded-xl opacity-20 group-hover:opacity-10 transition duration-500"></div>
                <div class="relative p-8 bg-white border-4 border-gray-900 rounded-xl shadow-xl h-full
                            transform transition duration-300 ease-in-out group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-2xl">
                    <i class="fas fa-file-invoice-dollar text-5xl text-accent mb-4"></i>
                    <h3 class="font-extrabold text-2xl mb-2 text-primary">Harga Transparan</h3>
                    <p class="text-gray-600">Komitmen harga yang jujur tanpa biaya tersembunyi, fokus pada nilai terbaik untuk investasi Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="team" class="py-24 bg-gray-50">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-primary animate-on-scroll">Kenali Tim Inti Kami</h2>
            <p class="max-w-3xl mx-auto text-gray-600 mt-3 animate-on-scroll">Profesional yang berdedikasi untuk kesuksesan hari istimewa Anda.</p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 px-6">

            <div class="relative group animate-on-scroll">
                <div class="absolute inset-0 bg-gray-700 border-2 border-accent/70 rounded-xl translate-x-2 translate-y-2 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-300"></div>

                <div class="relative p-6 bg-white border-2 border-gray-900 rounded-xl h-full text-center transition duration-300 group-hover:-translate-x-2 group-hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734b584?q=80&w=300&auto=format" class="w-24 h-24 mx-auto rounded-full object-cover mb-4 border-4 border-accent" alt="Foto Risa">
                    <h3 class="font-bold text-xl text-primary">Risa Adelia</h3>
                    <p class="text-accent font-semibold mb-3">Creative Director</p>
                    <p class="text-sm text-gray-600">Ahli dalam merancang konsep visual yang elegan dan tak lekang oleh waktu.</p>
                    <div class="mt-4 space-x-3 text-gray-500">
                         <a href="#" class="hover:text-accent transition"><i class="fab fa-instagram"></i></a>
                         <a href="#" class="hover:text-accent transition"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="relative group animate-on-scroll" style="transition-delay: 100ms;">
                <div class="absolute inset-0 bg-gray-700 border-2 border-accent/70 rounded-xl translate-x-2 translate-y-2 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-300"></div>

                <div class="relative p-6 bg-white border-2 border-gray-900 rounded-xl h-full text-center transition duration-300 group-hover:-translate-x-2 group-hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?q=80&w=300&auto=format" class="w-24 h-24 mx-auto rounded-full object-cover mb-4 border-4 border-accent" alt="Foto Budi">
                    <h3 class="font-bold text-xl text-primary">Budi Santoso</h3>
                    <p class="text-accent font-semibold mb-3">Lead Event Organizer</p>
                    <p class="text-sm text-gray-600">Bertanggung jawab penuh atas eksekusi lapangan yang mulus dan tanpa hambatan.</p>
                    <div class="mt-4 space-x-3 text-gray-500">
                         <a href="#" class="hover:text-accent transition"><i class="fab fa-instagram"></i></a>
                         <a href="#" class="hover:text-accent transition"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="relative group animate-on-scroll" style="transition-delay: 200ms;">
                <div class="absolute inset-0 bg-gray-700 border-2 border-accent/70 rounded-xl translate-x-2 translate-y-2 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-300"></div>

                <div class="relative p-6 bg-white border-2 border-gray-900 rounded-xl h-full text-center transition duration-300 group-hover:-translate-x-2 group-hover:-translate-y-2">
                    <img src="https://images.unsplash.com/photo-1557862921-37829c790f19?q=80&w=300&auto=format" class="w-24 h-24 mx-auto rounded-full object-cover mb-4 border-4 border-accent" alt="Foto Johan">
                    <h3 class="font-bold text-xl text-primary">Johan Wijaya</h3>
                    <p class="text-accent font-semibold mb-3">Vendor & Finance Manager</p>
                    <p class="text-sm text-gray-600">Memastikan semua vendor bekerja sesuai *budget* dan standar kualitas premium.</p>
                    <div class="mt-4 space-x-3 text-gray-500">
                         <a href="#" class="hover:text-accent transition"><i class="fab fa-instagram"></i></a>
                         <a href="#" class="hover:text-accent transition"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>

             <div class="relative group h-full animate-on-scroll" style="transition-delay: 300ms;">
                <div class="absolute inset-0 translate-x-3 translate-y-3 bg-gray-900 rounded-xl opacity-20 group-hover:opacity-10 transition duration-500"></div>

                <div class="relative p-8 bg-white border-4 border-gray-900 rounded-xl shadow-xl h-full
                            transform transition duration-300 ease-in-out group-hover:-translate-x-1 group-hover:-translate-y-1 group-hover:shadow-2xl text-center">
                    <i class="fas fa-headset text-5xl text-accent mb-4"></i>
                    <h3 class="font-extrabold text-2xl mb-2 text-primary">Konsultasi Gratis</h3>
                    <p class="text-gray-600 mb-4">Belum yakin? Jadwalkan sesi konsultasi 1-on-1 dengan wedding planner kami.</p>
                    <a href="#contact" class="text-accent font-bold hover:text-primary transition underline">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>


    <section id="services" class="py-24 bg-gray-900">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-white animate-on-scroll">Pilihan Paket Layanan</h2>
            <p class="text-gray-400 mt-3 animate-on-scroll">Tiga tingkatan layanan untuk setiap kebutuhan dan skala acara.</p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-6">

            <div class="relative group animate-on-scroll">
                <div class="absolute inset-0 bg-gray-700 border-2 border-accent/70 rounded-xl translate-x-2 translate-y-2 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-300"></div>
                <div class="relative p-8 bg-white border-2 border-gray-900 rounded-xl h-full transition duration-300 group-hover:-translate-x-2 group-hover:-translate-y-2">
                    <h3 class="text-3xl font-extrabold mb-3 text-primary">Paket Silver</h3>
                    <p class="text-gray-500 mb-6 font-semibold uppercase tracking-wider">Mulai dari Rp 5 Juta</p>
                    <p class="text-gray-700 mb-8">Solusi cepat dan efisien untuk pernikahan *intimate* dengan tim pendampingan di hari-H.</p>
                    <ul class="text-left space-y-3 mb-10 text-gray-700">
                        <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-3 text-lg"></i> Pendampingan H-1 & Hari-H</li>
                        <li class="flex items-start"><i class="fas fa-check-circle text-green-500 mt-1 mr-3 text-lg"></i> Koordinasi 5-7 Vendor Utama</li>
                    </ul>
                    <a href="#" class="block w-full text-center px-6 py-3 bg-gray-900 text-white font-bold rounded-lg hover:bg-accent hover:text-gray-900 transition duration-300">
                        Pesan Paket Silver
                    </a>
                </div>
            </div>

            <div class="relative group animate-on-scroll">
                <div class="absolute inset-0 bg-accent border-2 border-accent rounded-xl translate-x-2 translate-y-2 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-300"></div>
                <div class="relative p-8 bg-gray-100 border-2 border-gray-900 rounded-xl h-full transition duration-300 group-hover:-translate-x-2 group-hover:-translate-y-2">
                    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-full px-5 py-1 bg-accent text-gray-900 font-bold rounded-t-lg text-sm uppercase">Populer</div>
                    <h3 class="text-3xl font-extrabold mb-3 text-primary">Paket Gold</h3>
                    <p class="text-accent mb-6 font-extrabold uppercase tracking-wider">Mulai dari Rp 15 Juta</p>
                    <p class="text-gray-700 mb-8">Layanan *Full Service* dengan manajer khusus, meliputi perencanaan A-Z dan dekorasi premium.</p>
                     <ul class="text-left space-y-3 mb-10 text-gray-700">
                        <li class="flex items-start font-semibold"><i class="fas fa-star text-accent mt-1 mr-3 text-lg"></i> Manajer Event Khusus</li>
                        <li class="flex items-start"><i class="fas fa-star text-accent mt-1 mr-3 text-lg"></i> Koordinasi SEMUA Vendor</li>
                    </ul>
                    <a href="#" class="block w-full text-center px-6 py-3 bg-accent text-gray-900 font-extrabold rounded-lg hover:bg-amber-400 transition duration-300">
                        Pilih Paket Gold
                    </a>
                </div>
            </div>

            <div class="relative group animate-on-scroll">
                <div class="absolute inset-0 bg-gray-700 border-2 border-accent/70 rounded-xl translate-x-2 translate-y-2 group-hover:translate-x-0 group-hover:translate-y-0 transition duration-300"></div>
                <div class="relative p-8 bg-white border-2 border-gray-900 rounded-xl h-full transition duration-300 group-hover:-translate-x-2 group-hover:-translate-y-2">
                    <h3 class="text-3xl font-extrabold mb-3 text-primary">Paket Diamond</h3>
                    <p class="text-gray-500 mb-6 font-semibold uppercase tracking-wider">Mulai dari Rp 30 Juta</p>
                    <p class="text-gray-700 mb-8">Pengalaman pernikahan termewah dan paling eksklusif, perencanaan lengkap selama 6 bulan.</p>
                     <ul class="text-left space-y-3 mb-10 text-gray-700">
                        <li class="flex items-start"><i class="fas fa-crown text-purple-600 mt-1 mr-3 text-lg"></i> Perencanaan 6 Bulan Penuh</li>
                        <li class="flex items-start"><i class="fas fa-crown text-purple-600 mt-1 mr-3 text-lg"></i> Desain Tema Kustom 3D</li>
                    </ul>
                    <a href="#" class="block w-full text-center px-6 py-3 bg-gray-900 text-white font-bold rounded-lg hover:bg-accent hover:text-gray-900 transition duration-300">
                        Pesan Paket Diamond
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="testimony" class="py-24 bg-white">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-primary animate-on-scroll">Kata Mereka yang Sudah Berbahagia</h2>
            <p class="max-w-3xl mx-auto text-gray-600 mt-3 animate-on-scroll">Dengarkan kisah dari pasangan-pasangan yang sukses kami dampingi.</p>
        </div>

        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 px-6">

            <div class="relative group animate-on-scroll">
                <div class="absolute inset-0 bg-gray-200 border-2 border-gray-900 rounded-xl translate-x-3 translate-y-3 group-hover:translate-x-1 group-hover:translate-y-1 transition duration-300"></div>

                <div class="relative p-8 bg-gray-50 border-2 border-gray-900 rounded-xl h-full transition duration-300 group-hover:-translate-x-2 group-hover:-translate-y-2">
                    <i class="fas fa-quote-left text-2xl text-accent mb-4"></i>
                    <p class="text-lg italic text-gray-700 mb-6">"Tirta Amerta benar-benar mengubah mimpi pernikahan kami menjadi kenyataan. Detailnya sangat diperhatikan, dan timnya super profesional. Kami hanya perlu menikmati hari itu!"</p>
                    <div class="flex items-center">
                        <img src="https://images.unsplash.com/photo-1517404215738-15263e9f9178?w=80&auto=format" class="w-12 h-12 rounded-full mr-4 object-cover border-2 border-accent" alt="Pasangan Klien">
                        <div>
                            <p class="font-bold text-primary">Rizky & Amanda</p>
                            <p class="text-sm text-gray-500">Klien Paket Diamond 2024</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative group animate-on-scroll">
                <div class="absolute inset-0 bg-gray-200 border-2 border-gray-900 rounded-xl translate-x-3 translate-y-3 group-hover:translate-x-1 group-hover:translate-y-1 transition duration-300"></div>

                <div class="relative p-8 bg-gray-50 border-2 border-gray-900 rounded-xl h-full transition duration-300 group-hover:-translate-x-2 group-hover:-translate-y-2">
                    <i class="fas fa-quote-left text-2xl text-accent mb-4"></i>
                    <p class="text-lg italic text-gray-700 mb-6">"Awalnya khawatir dengan *budget*, tapi Paket Gold memberikan yang terbaik. Dekorasi indah, koordinasi sempurna. Kami sangat puas dengan layanan Tirta Amerta!"</p>
                    <div class="flex items-center">
                        <img src="https://images.unsplash.com/photo-1549480100-a61642142e97?w=80&auto=format" class="w-12 h-12 rounded-full mr-4 object-cover border-2 border-accent" alt="Pasangan Klien">
                        <div>
                            <p class="font-bold text-primary">Bima & Tania</p>
                            <p class="text-sm text-gray-500">Klien Paket Gold 2024</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="contact" class="py-24 bg-gray-900">
        <div class="max-w-4xl mx-auto text-center px-6 animate-on-scroll">
            <h2 class="text-5xl font-extrabold text-white mb-6">Siap Mewujudkan Impian Anda?</h2>
            <p class="text-gray-400 text-xl mb-10">Hubungi kami hari ini untuk konsultasi gratis dan mulailah perjalanan perencanaan pernikahan tak terlupakan Anda.</p>

            <a href="https://wa.me/nomorwhatsappanda" target="_blank" class="relative inline-block px-12 py-5 text-xl font-extrabold text-gray-900 uppercase bg-accent rounded-lg shadow-xl overflow-hidden
                transform transition-all duration-300 ease-out hover:scale-[1.05] active:translate-y-1 active:shadow-none">

                <span class="absolute inset-0 border-4 border-gray-900 rounded-lg transform translate-x-1.5 translate-y-1.5 transition duration-300 group-hover:translate-x-0 group-hover:translate-y-0"></span>

                <span class="relative z-10 block">
                    <i class="fab fa-whatsapp mr-3"></i> Kontak via WhatsApp
                </span>
            </a>

            <p class="text-gray-500 mt-8 text-sm">Respons cepat, layanan profesional.</p>
        </div>
    </section>


     <footer class="py-10 bg-gray-900 text-center text-white">
        <h4 class="text-xl font-semibold">Tirta Amerta Wedding Organizer</h4>
        <p class="text-gray-400 mt-2">Mewujudkan pernikahan impian Anda dengan sempurna.</p>
        <p class="text-gray-500 mt-4 text-sm">© 2025 Tirta Amerta. All Rights Reserved.</p>
    </footer>
</body>
</html>