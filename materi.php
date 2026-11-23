<?php
/**
 * Lahan Basah Hijau - Modul Pembelajaran Interaktif
 * Kurikulum Merdeka IPAS Kelas V SD - Bab 3: Harmoni dalam Ekosistem & Bab 4: Siklus Air
 * Diperkaya dengan contoh kontekstual Lahan Basah Kalimantan Selatan
 */

function renderMaterialIcon(string $icon, string $class = 'ui-2d-thumb'): string
{
    return '<i class="bi bi-leaf-fill fs-3 text-success" aria-hidden="true"></i>';
}

function renderLabThumbnail(string $src, string $alt, string $class = 'lab-choice-image'): string
{
    return '<img src="' . htmlspecialchars($src) . '" alt="' . htmlspecialchars($alt) . '" class="' . htmlspecialchars($class) . '" loading="lazy">';
}

// Data Modul Pembelajaran
$modules = [
    1 => [
        'id' => 1,
        'badge' => 'Modul 1',
        'icon' => '🌱',
        'title' => 'Mengenal Ekosistem Lahan Basah',
        'subtitle' => 'Menjelajahi Kehidupan di Rawa, Sungai, dan Hutan Gambut Kalimantan',
        'readTime' => '8 Menit Eksplorasi',
        'color' => '#059669',
        'goals' => [
            'Memahami pengertian ekosistem sebagai hubungan timbal balik antara makhluk hidup dan lingkungannya.',
            'Membedakan komponen biotik (makhluk hidup) dan abiotik (benda tak hidup) di lahan basah.',
            'Mengenal tingkatan organisasi: individu, populasi, komunitas, dan habitat.',
            'Mengidentifikasi karakteristik unik lahan basah Kalimantan Selatan (rawa gambut dan pasang surut).'
        ],
        'coreConcept' => [
            'title' => 'Apa itu Ekosistem Lahan Basah?',
            'desc' => 'Bayangkan kamu sedang naik perahu jukung di sungai Kalimantan Selatan. Di sekitarmu ada air yang tenang, pohon rambai yang rindang, burung bangau yang berdiri diam mencari ikan, dan hangatnya sinar matahari pagi. Semua hal itu saling berhubungan membentuk satu kesatuan yang disebut <strong>Ekosistem</strong>!',
            'quote' => 'Ekosistem adalah hubungan timbal balik yang saling mempengaruhi antara makhluk hidup (biotik) dengan lingkungan tak hidupnya (abiotik).'
        ],
        'cards' => [
            [
                'icon' => '🐸',
                'title' => 'Komponen Biotik (Hidup)',
                'desc' => 'Semua makhluk bernyawa yang tinggal di lahan basah: Tumbuhan (teratai, eceng gondok, purun), Hewan (ikan gabus/haruan, katak, bekantan, bangau), dan Mikroorganisme (bakteri dan jamur pengurai).'
            ],
            [
                'icon' => '💧',
                'title' => 'Komponen Abiotik (Tak Hidup)',
                'desc' => 'Benda-benda tak hidup yang sangat dibutuhkan makhluk hidup untuk bertahan: Air rawa/sungai, tanah gambut yang kaya humus, sinar matahari untuk fotosintesis, udara/oksigen, suhu, dan kelembapan.'
            ],
            [
                'icon' => '🐒',
                'title' => 'Tingkatan Makhluk Hidup',
                'desc' => '<strong>Individu:</strong> 1 ekor Bekantan.<br><strong>Populasi:</strong> Sekelompok Bekantan di satu pohon.<br><strong>Komunitas:</strong> Kumpulan populasi bekantan, ikan seluang, dan pohon rambai di rawa.<br><strong>Habitat:</strong> Tempat alami mereka hidup.'
            ],
            [
                'icon' => '🚣',
                'title' => 'Keunikan Lahan Basah Kalsel',
                'desc' => 'Kalimantan Selatan terkenal dengan "Kota Seribu Sungai". Lahan basah di sini terdiri dari <em>rawa monoton</em> (selalu tergenang air), <em>rawa pasang surut</em>, dan <em>hutan rawa gambut</em> yang mampu menyimpan air dalam jumlah raksasa bagai spons alami!'
            ]
        ],
        'spotlight' => [
            'title' => 'Satwa & Tumbuhan Khas Lahan Basah Kalsel',
            'items' => [
                ['icon' => '🐒', 'name' => 'Bekantan (Nasalis larvatus)', 'role' => 'Satwa Maskot Kalsel', 'info' => 'Monyet unik berhidung panjang dan berbulu kemerahan yang hidup di hutan mangrove dan pohon rambai tepi sungai.'],
                ['icon' => '🐟', 'name' => 'Ikan Haruan (Gabus)', 'role' => 'Ikan Asli Perairan Rawa', 'info' => 'Ikan predator air tawar tangguh khas Banjar yang kaya albumin untuk menyembuhkan luka dan menjaga kebugaran tubuh.'],
                ['icon' => '🌾', 'name' => 'Tanaman Purun Danau', 'role' => 'Tumbuhan Rawa Serbaguna', 'info' => 'Tumbuhan rumput air yang tumbuh subur di rawa gambut, dimanfaatkan masyarakat Amuntai untuk anyaman ramah lingkungan.'],
                ['icon' => '🪷', 'name' => 'Bunga Teratai Merah', 'role' => 'Produsen Cantik di Air', 'info' => 'Daunnya yang lebar mengapung di permukaan air rawa menjadi tempat berteduh ikan kecil dan katak rawa.']
            ]
        ],
        'interactiveType' => 'biotik_abiotik_sort',
        'quiz' => [
            'question' => 'Jika di sebuah rawa terdapat sinar matahari, air rawa, tanah gambut, dan 5 ekor ikan haruan, manakah yang termasuk komponen biotik?',
            'options' => [
                ['text' => 'Air rawa dan tanah gambut', 'correct' => false],
                ['text' => '5 ekor ikan haruan', 'correct' => true],
                ['text' => 'Sinar matahari dan air rawa', 'correct' => false],
                ['text' => 'Semuanya adalah komponen abiotik', 'correct' => false]
            ],
            'explanation' => 'Tepat sekali! Komponen biotik adalah makhluk hidup (seperti ikan haruan), sedangkan air, tanah, dan sinar matahari adalah komponen abiotik.'
        ],
        'summary' => [
            'Ekosistem tersusun dari dua komponen utama: Biotik (makhluk hidup) dan Abiotik (benda tak hidup).',
            'Urutan tingkatan kehidupan: Individu ➔ Populasi ➔ Komunitas ➔ Ekosistem.',
            'Lahan basah Kalimantan Selatan meliputi rawa pasang surut, rawa lebak, dan rawa gambut yang sangat kaya keanekaragaman hayati.'
        ]
    ],

    2 => [
        'id' => 2,
        'badge' => 'Modul 2',
        'icon' => '🦗',
        'title' => 'Hubungan Makhluk Hidup dalam Ekosistem',
        'subtitle' => 'Rantai Makanan, Jaring-jaring Makanan, dan Aliran Energi di Lahan Basah',
        'readTime' => '10 Menit Eksplorasi',
        'color' => '#0284c7',
        'goals' => [
            'Menjelaskan pengertian rantai makanan dan jaring-jaring makanan.',
            'Mengidentifikasi peran organisme: produsen, konsumen tingkat I, II, III/puncak, dan pengurai (dekomposer).',
            'Memahami konsep aliran energi yang bersumber dari sinar matahari.',
            'Menyusun contoh rantai makanan yang nyata dan akurat di ekosistem lahan basah.'
        ],
        'coreConcept' => [
            'title' => 'Siapa Makan Siapa? Rahasia Rantai Makanan',
            'desc' => 'Semua makhluk hidup membutuhkan energi untuk tumbuh, bergerak, dan berkembang biak. Dari mana energi itu berasal? Matahari memancarkan cahaya ke tanaman rawa. Tanaman dimakan ulat atau keong, keong dimakan ikan, dan seterusnya. Proses makan dan dimakan ini disebut <strong>Rantai Makanan</strong>!',
            'quote' => 'Rantai makanan adalah peristiwa makan dan dimakan antar sesama makhluk hidup dengan urutan dan arah aliran energi tertentu.'
        ],
        'cards' => [
            [
                'icon' => '🌞 ➔ 🌿',
                'title' => '1. Produsen (Pabrik Energi)',
                'desc' => 'Tumbuhan hijau, lumut, dan alga fitoplankton yang bisa memasak makanannya sendiri melalui <strong>fotosintesis</strong> menggunakan sinar matahari, air, dan karbon dioksida. Contoh: Tanaman Teratai, Eceng Gondok, Alga Air Rawa.'
            ],
            [
                'icon' => '🐌',
                'title' => '2. Konsumen I (Herbivora)',
                'desc' => 'Hewan pemakan tumbuhan (herbivora) yang mendapat energi langsung dari produsen. Di lahan basah: Keong Mas, Ulat Daun Purun, Ikan Seluang pemakan alga, dan Serangga Air.'
            ],
            [
                'icon' => '🐸 ➔ 🐟',
                'title' => '3. Konsumen II & III (Karnivora)',
                'desc' => 'Hewan pemakan hewan lain (karnivora). Konsumen II seperti Katak Rawa dan Ikan Seluang Dewasa memakan serangga. Konsumen Puncak seperti Ikan Haruan (Gabus) dan Burung Bangau Tongtong memangsa ikan kecil dan katak.'
            ],
            [
                'icon' => '🍄',
                'title' => '4. Pengurai (Dekomposer)',
                'desc' => 'Pahlawan daur ulang bumi! Bakteri dan jamur tanah yang menguraikan bangkai hewan dan tumbuhan mati menjadi unsur hara yang menyuburkan tanah dan air kembali.'
            ]
        ],
        'spotlight' => [
            'title' => 'Contoh Nyata Rantai Makanan di Rawa Kalimantan',
            'items' => [
                ['icon' => '🌱', 'name' => '1. Alga / Teratai Rawa', 'role' => 'Produsen', 'info' => 'Menangkap sinar matahari dan menghasilkan biomassa hijau segar.'],
                ['icon' => '🐌', 'name' => '2. Keong Mas / Ikan Seluang', 'role' => 'Konsumen I (Herbivora)', 'info' => 'Memakan daun teratai dan lumut air untuk memperoleh energi.'],
                ['icon' => '🐸', 'name' => '3. Katak Rawa', 'role' => 'Konsumen II (Karnivora)', 'info' => 'Menangkap serangga air dan hewan kecil di rawa dengan lidahnya yang lengket.'],
                ['icon' => '🐟', 'name' => '4. Ikan Haruan (Gabus)', 'role' => 'Konsumen Puncak', 'info' => 'Predator air tawar yang memangsa katak dan ikan kecil.'],
                ['icon' => '🍄', 'name' => '5. Jamur & Bakteri Rawa', 'role' => 'Pengurai (Dekomposer)', 'info' => 'Menguraikan sisa organisme mati menjadi humus penyubur gambut.']
            ]
        ],
        'interactiveType' => 'trophic_chain_builder',
        'quiz' => [
            'question' => 'Dalam rantai makanan lahan basah: Teratai ➔ Keong Mas ➔ Katak ➔ Ikan Haruan ➔ Jamur, siapakah yang berperan sebagai Konsumen Tingkat I?',
            'options' => [
                ['text' => 'Teratai', 'correct' => false],
                ['text' => 'Keong Mas', 'correct' => true],
                ['text' => 'Katak', 'correct' => false],
                ['text' => 'Ikan Haruan', 'correct' => false]
            ],
            'explanation' => 'Hebat! Teratai adalah Produsen, maka hewan yang memakannya langsung (Keong Mas) adalah Konsumen Tingkat I (Herbivora).'
        ],
        'summary' => [
            'Matahari adalah sumber energi utama bagi seluruh kehidupan di bumi.',
            'Taraf trofik terdiri dari Produsen ➔ Konsumen I ➔ Konsumen II ➔ Konsumen Puncak ➔ Pengurai.',
            'Jaring-jaring makanan adalah gabungan dari beberapa rantai makanan yang saling berhubungan dan membuat ekosistem lebih kokoh.'
        ]
    ],

    3 => [
        'id' => 3,
        'badge' => 'Modul 3',
        'icon' => '⚖️',
        'title' => 'Keseimbangan Ekosistem Lahan Basah',
        'subtitle' => 'Harmoni Alam: Hubungan Saling Ketergantungan dan Dampak Efek Domino',
        'readTime' => '9 Menit Eksplorasi',
        'color' => '#d97706',
        'goals' => [
            'Memahami arti keseimbangan ekosistem dalam kondisi alami.',
            'Menganalisis dampak yang terjadi apabila salah satu komponen ekosistem mengalami penurunan atau kepunahan.',
            'Mengenal hubungan simbiosis (mutualisme, komensalisme, parasitisme) di lahan basah.',
            'Menjelaskan mengapa keanekaragaman makhluk hidup sangat penting untuk kelestarian alam.'
        ],
        'coreConcept' => [
            'title' => 'Bagaimana Ekosistem Menjaga Keseimbangannya?',
            'desc' => 'Di alam, jumlah produsen selalu lebih banyak daripada konsumen I, jumlah konsumen I lebih banyak dari konsumen II, dan seterusnya. Ini seperti piramida yang kokoh. Jika salah satu komponen hilang atau populasinya melonjak tidak wajar, akan terjadi <strong>efek domino</strong> yang mengguncang seluruh ekosistem!',
            'quote' => 'Ekosistem seimbang adalah kondisi di mana interaksi antarorganisme berjalan harmonis, ketersediaan makanan mencukupi, dan tidak ada spesies yang punah atau mendominasi secara merusak.'
        ],
        'cards' => [
            [
                'icon' => '📉',
                'title' => 'Apa Terjadi Jika Predator Berkurang?',
                'desc' => 'Jika Ikan Haruan dan Ular Rawa diburu habis-habisan oleh manusia, populasi tikus rawa dan keong mas akan meledak! Akibatnya, tanaman padi petani dan purun di rawa habis dimakan hama.'
            ],
            [
                'icon' => '🚫',
                'title' => 'Apa Terjadi Jika Produsen Hilang?',
                'desc' => 'Jika tanaman air dan lumut mati akibat racun kimia, konsumen I (keong mas & serangga) akan kelaparan dan mati. Akibatnya katak dan ikan kecil juga ikut punah karena kehilangan makanan.'
            ],
            [
                'icon' => '🤝',
                'title' => 'Simbiosis Mutualisme di Rawa',
                'desc' => 'Hubungan yang saling menguntungkan! Contoh: Burung bangau yang memakan parasit kutu di tubuh kerbau rawa (Amuntai). Kerbau bersih dari gatal, burung bangau kenyang bernutrisi.'
            ],
            [
                'icon' => '🤝',
                'title' => 'Simbiosis Komensalisme & Parasitisme',
                'desc' => '<strong>Komensalisme:</strong> Anggrek hutan menempel pada pohon rambai (satu untung, yang lain tak rugi).<br><strong>Parasitisme:</strong> Benalu yang menyedot sari makanan dari pohon induk hingga layu.'
            ]
        ],
        'spotlight' => [
            'title' => 'Studi Kasus Nyata: Kerbau Rawa Amuntai (Kalimantan Selatan)',
            'items' => [
                ['icon' => '🐃', 'name' => 'Kerbau Rawa (Bubalus bubalis)', 'role' => 'Sahabat Petani Rawa', 'info' => 'Kerbau perenang ulung yang hidup di rawa lebak Danau Panggang. Kotorannya menjadi pupuk alami bagi alga dan tanaman purun.'],
                ['icon' => '🪶', 'name' => 'Burung Kuntul Putih', 'role' => 'Mitra Pembersih Kutu', 'info' => 'Sering hinggap di punggung kerbau rawa untuk mencari serangga pengganggu.'],
                ['icon' => '🌾', 'name' => 'Rawa Lebak Subur', 'role' => 'Habitat Harmonis', 'info' => 'Ketika kerbau berkubang, air rawa teraduk sehingga sirkulasi oksigen bagi ikan seluang menjadi lebih baik.']
            ]
        ],
        'interactiveType' => 'ecosystem_balance_sim',
        'quiz' => [
            'question' => 'Jika petani menangkap semua katak di rawa sawah secara massal, peristiwa apa yang kemungkinan besar akan terjadi?',
            'options' => [
                ['text' => 'Tanaman padi menjadi semakin subur', 'correct' => false],
                ['text' => 'Populasi serangga hama pemakan daun melonjak drastis', 'correct' => true],
                ['text' => 'Ikan haruan bertambah banyak', 'correct' => false],
                ['text' => 'Tidak terjadi perubahan apa-apa', 'correct' => false]
            ],
            'explanation' => 'Benar sekali! Katak adalah pemangsa alami serangga. Jika katak habis, tidak ada yang memangsa serangga sehingga populasinya melonjak dan merusak tanaman padi.'
        ],
        'summary' => [
            'Setiap makhluk hidup memiliki peran penting dalam jaring-jaring makanan.',
            'Hilangnya satu organisme dapat memicu gangguan berantai (efek domino) pada organisme lainnya.',
            'Keanekaragaman hayati (biodiversitas) adalah kunci agar ekosistem tetap kuat menghadapi perubahan.'
        ]
    ],

    4 => [
        'id' => 4,
        'badge' => 'Modul 4',
        'icon' => '⚠️',
        'title' => 'Gangguan terhadap Ekosistem Lahan Basah',
        'subtitle' => 'Mengenali Ancaman: Polusi, Kebakaran Gambut, dan Kerusakan Habitat',
        'readTime' => '9 Menit Eksplorasi',
        'color' => '#dc2626',
        'goals' => [
            'Mengidentifikasi jenis-jenis gangguan alami dan buatan pada ekosistem lahan basah.',
            'Memahami bahaya kebakaran lahan gambut dan kabut asap bagi flora, fauna, dan manusia.',
            'Mengetahui dampak pencemaran air akibat sampah plastik, limbah detergen, dan racun kimia.',
            'Menganalisis dampak alih fungsi lahan basah yang tidak terkendali.'
        ],
        'coreConcept' => [
            'title' => 'Ketika Rumah Satwa Terancam Bahaya',
            'desc' => 'Lahan basah sangat kaya manfaat, namun ekosistem ini juga sangat rentan! Aktivitas manusia yang tidak bijaksana seperti membuang sampah ke sungai, membakar lahan gambut di musim kemarau, dan menyetrum ikan dapat menghancurkan harmoni alam dalam sekejap.',
            'quote' => 'Kebakaran gambut di Kalimantan dapat melepaskan jutaan ton karbon ke udara, menyebabkan kabut asap pekat, dan memusnahkan sarang bekantan serta satwa endemik lainnya.'
        ],
        'cards' => [
            [
                'icon' => '🔥',
                'title' => '1. Kebakaran Lahan Gambut',
                'desc' => 'Gambut yang kering di musim kemarau sangat mudah terbakar dan apinya bisa merambat di bawah tanah bermeter-meter dalamnya. Asap tebal mengganggu pernapasan anak-anak dan satwa langka kehilangan rumah aslinya.'
            ],
            [
                'icon' => '🧪',
                'title' => '2. Pencemaran Air & Racun Kimia',
                'desc' => 'Limbah plastik yang tak terurai, detergen berbusa, dan racun potas/setrum ikan membunuh telur-telur ikan kecil dan alga. Air sungai menjadi keruh, berbau, dan kekurangan oksigen terlarut.'
            ],
            [
                'icon' => '🚜',
                'title' => '3. Alih Fungsi Lahan Berlebihan',
                'desc' => 'Pengeringan rawa secara besar-besaran untuk pemukiman atau perkebunan monokultur merusak fungsi rawa sebagai penampung air alami, sehingga memicu banjir bandang di musim hujan.'
            ],
            [
                'icon' => '🪓',
                'title' => '4. Penebangan Hutan Mangrove & Rambai',
                'desc' => 'Pohon rambai dan bakau di tepi sungai berfungsi menahan erosi tanah dan menjadi sumber makanan bekantan. Jika ditebang sembarangan, tepian sungai akan longsor dan bekantan kelaparan.'
            ]
        ],
        'spotlight' => [
            'title' => 'Fakta Sains: Mengapa Kebakaran Gambut Sangat Sulit Dipadamkan?',
            'items' => [
                ['icon' => '🍂', 'name' => 'Lapisan Gambut Tebal', 'role' => 'Bahan Bakar Alami', 'info' => 'Gambut terbentuk dari daun dan ranting pohon yang membusuk selama ribuan tahun, sehingga seperti briket batu bara alami.'],
                ['icon' => '🕳️', 'name' => 'Api di Bawah Tanah (Smoldering)', 'role' => 'Titik Api Tersembunyi', 'info' => 'Meski permukaan tampak padam, bara api masih menyala di kedalaman 2 meter di bawah tanah.'],
                ['icon' => '🧯', 'name' => 'Kunci Solusi: Pembasahan', 'role' => 'Rewetting', 'info' => 'Cara terbaik mencegahnya adalah menjaga lahan gambut tetap basah berair sepanjang tahun dengan sekat kanal!']
            ]
        ],
        'interactiveType' => 'cause_effect_analysis',
        'quiz' => [
            'question' => 'Mengapa menangkap ikan dengan menggunakan aliran listrik (setrum) atau racun kimia dilarang keras di perairan rawa dan sungai?',
            'options' => [
                ['text' => 'Karena membuat harga ikan di pasar menjadi mahal', 'correct' => false],
                ['text' => 'Karena membunuh benih ikan kecil, plankton, dan merusak seluruh rantai makanan air', 'correct' => true],
                ['text' => 'Karena air sungai menjadi lebih cepat mengalir', 'correct' => false],
                ['text' => 'Karena ikan yang didapat ukurannya terlalu besar', 'correct' => false]
            ],
            'explanation' => 'Tepat sekali! Menyetrum atau meracun mematikan semua biota air tanpa pandang bulu, termasuk bibit ikan kecil dan mikroorganisme pengurai, sehingga generasi ikan berikutnya punah.'
        ],
        'summary' => [
            'Ancaman terbesar lahan basah mencakup kebakaran gambut, pencemaran air, alih fungsi lahan, dan penangkapan ikan ilegal.',
            'Lahan gambut yang rusak memicu bencana kabut asap dan memusnahkan habitat satwa endemik.',
            'Mencegah kerusakan jauh lebih mudah dan murah daripada memulihkan ekosistem yang sudah rusak.'
        ]
    ],

    5 => [
        'id' => 5,
        'badge' => 'Modul 5',
        'icon' => '🛡️',
        'title' => 'Menjaga Keseimbangan Ekosistem Lahan Basah',
        'subtitle' => 'Aksi Pahlawan Cilik: Pelestarian Satwa, Rewetting Gambut, dan Gerakan 3R',
        'readTime' => '10 Menit Eksplorasi',
        'color' => '#16a34a',
        'goals' => [
            'Menjelaskan peran penting manusia dalam menjaga dan memulihkan ekosistem.',
            'Mengenal teknik pelestarian lahan basah: rewetting (pembasahan gambut) dan penanaman mangrove/rambai.',
            'Menerapkan prinsip 3R (Reduce, Reuse, Recycle) untuk menjaga kebersihan sungai dan rawa.',
            'Berkomitmen melakukan tindakan nyata ramah lingkungan di rumah dan sekolah.'
        ],
        'coreConcept' => [
            'title' => 'Kita Adalah Penjaga Bumi (Khalifah Fil Ardh)',
            'desc' => 'Manusia dianugerahi akal pikiran untuk merawat alam, bukan merusaknya! Sebagai siswa kelas V SD, kamu memiliki kekuatan super untuk menjadi <strong>Duta Lahan Basah Hijau</strong>. Aksi kecil yang kita lakukan bersama-sama akan membawa dampak luar biasa bagi kelestarian bumi Kalimantan.',
            'quote' => 'Menjaga kelestarian alam bukan hanya tugas pemerintah atau ilmuwan, tetapi tanggung jawab setiap anak yang ingin masa depan buminya tetap hijau dan segar.'
        ],
        'cards' => [
            [
                'icon' => '💧 ➔ 🪵',
                'title' => '1. Pembasahan Gambut (Rewetting)',
                'desc' => 'Membangun sekat kanal (*canal blocking*) dari batang kayu di parit-parit lahan gambut agar air tidak lari ke laut. Ketika gambut tetap basah berair, api tidak akan pernah bisa membakarnya!'
            ],
            [
                'icon' => '🌱',
                'title' => '2. Reboisasi Pohon Rambai & Mangrove',
                'desc' => 'Menanam kembali bibit pohon rambai, bungur, dan bakau di bantaran sungai. Akarnya yang kuat mengikat tanah sehingga tidak terjadi longsor dan menyediakan buah lezat untuk bekantan.'
            ],
            [
                'icon' => '♻️',
                'title' => '3. Gerakan 3R Lawan Sampah Plastik',
                'desc' => '<strong>Reduce:</strong> Kurangi kantong kresek sekali pakai.<br><strong>Reuse:</strong> Gunakan tumbler dan kotak bekal ke sekolah.<br><strong>Recycle:</strong> Olah botol bekas menjadi pot tanaman mini atau kerajinan tangan.'
            ],
            [
                'icon' => '🎣',
                'title' => '4. Menangkap Ikan Secara Bijak',
                'desc' => 'Gunakan alat tangkap ramah lingkungan seperti pancing, lukah, dan rengge berpori besar. Ikan kecil yang belum dewasa dilepaskan kembali agar bisa bertelur dan berkembang biak.'
            ]
        ],
        'spotlight' => [
            'title' => 'Inspirasi Konservasi Lokal: Sahabat Bekantan Indonesia (SBI)',
            'items' => [
                ['icon' => '🏝️', 'name' => 'Pulau Curiak (Barito Kuala)', 'role' => 'Stasiun Riset Bekantan', 'info' => 'Kawasan konservasi lahan basah tempat penyelamatan dan rehabilitasi bekantan liar di Kalimantan Selatan.'],
                ['icon' => '🌳', 'name' => 'Penanaman Pohon Rambai', 'role' => 'Restorasi Habitat', 'info' => 'Relawan dan pelajar bersama-sama menanam ribuan pohon pakan alami bekantan di sepanjang sungai Barito.'],
                ['icon' => '🎒', 'name' => 'Sekolah Peduli Lahan Basah', 'role' => 'Pendidikan Siswa', 'info' => 'Siswa SD diajak melihat langsung bekantan di alam liar tanpa mengganggu ketenangan hidup mereka.']
            ]
        ],
        'interactiveType' => 'student_action_checklist',
        'quiz' => [
            'question' => 'Manakah tindakan sederhana sehari-hari yang paling tepat dilakukan siswa kelas V untuk menjaga sungai dan rawa tetap lestari?',
            'options' => [
                ['text' => 'Membakar sampah plastik di halaman sekolah dekat selokan', 'correct' => false],
                ['text' => 'Membawa botol minum (tumbler) sendiri dan tidak membuang sampah ke sungai', 'correct' => true],
                ['text' => 'Mengeringkan air rawa di belakang rumah agar tidak ada lumut', 'correct' => false],
                ['text' => 'Menangkap burung bangau untuk dipelihara di sangkar rumah', 'correct' => false]
            ],
            'explanation' => 'Luar biasa! Membawa tumbler mengurangi timbulan sampah plastik yang bisa hanyut mencemari perairan rawa dan sungai.'
        ],
        'summary' => [
            'Pelestarian lahan basah dilakukan melalui rewetting gambut, reboisasi tanaman endemik, dan perlindungan satwa langka.',
            'Menerapkan 3R (Reduce, Reuse, Recycle) sangat efektif mencegah sampah mencemari badan air.',
            'Setiap anak dapat menjadi pahlawan lingkungan melalui aksi ramah lingkungan sehari-hari.'
        ]
    ],

    6 => [
        'id' => 6,
        'badge' => 'Bonus Bab 4',
        'icon' => '💧',
        'title' => 'Keajaiban Siklus Air di Lahan Basah',
        'subtitle' => 'Mengapa Air di Bumi Tidak Pernah Habis? Rawa sebagai Spons Raksasa Alami',
        'readTime' => '8 Menit Eksplorasi',
        'color' => '#0891b2',
        'goals' => [
            'Memahami 4 tahapan utama siklus air (hidrologi): Evaporasi, Kondensasi, Presipitasi, dan Infiltrasi.',
            'Menjelaskan peran penting lahan basah dan gambut sebagai penyimpan cadangan air tawar.',
            'Mengetahui bagaimana pohon dan hutan rawa membantu proses transpirasi menghasilkan awan hujan.',
            'Menghubungkan siklus air dengan ketersediaan air bersih bagi kehidupan manusia dan satwa.'
        ],
        'coreConcept' => [
            'title' => 'Dari Mana Asal Air Hujan yang Membasahi Rawa?',
            'desc' => 'Pernahkah kamu berpikir, mengapa air di sungai dan rawa Kalimantan tidak pernah habis mengalir ke laut? Jawabannya adalah karena <strong>Siklus Air</strong>! Air di bumi terus berputar dalam lingkaran abadi berkat bantuan energi panas matahari.',
            'quote' => 'Siklus air adalah perputaran air yang terus-menerus dari bumi ke atmosfer dan kembali lagi ke bumi tanpa pernah berhenti.'
        ],
        'cards' => [
            [
                'icon' => '☀️ ➔ ☁️',
                'title' => '1. Evaporasi & Transpirasi (Penguapan)',
                'desc' => 'Panas matahari menghangatkan air sungai, danau, dan rawa sehingga berubah wujud menjadi uap air (<strong>Evaporasi</strong>). Tumbuhan rawa juga mengeluarkan uap air melalui pori-pori daunnya (<strong>Transpirasi</strong>).'
            ],
            [
                'icon' => '☁️ ➔ 🌧️',
                'title' => '2. Kondensasi (Pembentukan Awan)',
                'desc' => 'Uap air naik ke angkasa yang dingin. Di ketinggian tertentu, uap air mendingin dan berubah menjadi butiran-butiran air kecil yang berkumpul membentuk awan mendung putih keabu-abuan.'
            ],
            [
                'icon' => '🌧️ ➔ 💧',
                'title' => '3. Presipitasi (Turunnya Hujan)',
                'desc' => 'Ketika butiran air di awan sudah terlalu berat dan tidak sanggup lagi ditahan udara, butiran itu jatuh ke bumi sebagai titik-titik air hujan yang menyegarkan.'
            ],
            [
                'icon' => '🧽 ➔ 🌊',
                'title' => '4. Infiltrasi & Peran Spons Rawa',
                'desc' => 'Air hujan meresap ke dalam tanah gambut dan pori-pori akar tumbuhan (<strong>Infiltrasi</strong>). Lahan basah bertindak bagai spons raksasa: menampung air saat hujan lebat agar tidak banjir, lalu perlahan mengalirkannya saat kemarau!'
            ]
        ],
        'spotlight' => [
            'title' => 'Fakta Sains: Lahan Gambut Penyimpan Air Alami',
            'items' => [
                ['icon' => '🧽', 'name' => 'Kapasitas 13x Bobot Sendiri', 'role' => 'Spons Alami', 'info' => 'Gambut yang sehat dapat menampung air hingga 13 kali lipat dari berat keringnya sendiri.'],
                ['icon' => '🛡️', 'name' => 'Pencegah Banjir Alami', 'role' => 'Pengendali Debit Air', 'info' => 'Saat hujan badai di hulu pegunungan Meratus, rawa lebak menahan luapan air sungai sebelum mencapai kota.'],
                ['icon' => '🚰', 'name' => 'Penyaring Air Alami', 'role' => 'Biofiltrasi', 'info' => 'Akar-akar tanaman purun dan eceng gondok menyerap polutan berbahaya dan menjernihkan air kembali.']
            ]
        ],
        'interactiveType' => 'water_cycle_steps',
        'quiz' => [
            'question' => 'Peristiwa penguapan air yang berasal dari jaringan daun tumbuhan hijau di rawa disebut dengan istilah...',
            'options' => [
                ['text' => 'Kondensasi', 'correct' => false],
                ['text' => 'Transpirasi', 'correct' => true],
                ['text' => 'Presipitasi', 'correct' => false],
                ['text' => 'Infiltrasi', 'correct' => false]
            ],
            'explanation' => 'Tepat sekali! Evaporasi adalah penguapan dari badan air terbuka (sungai/danau), sedangkan penguapan dari daun tumbuhan disebut Transpirasi.'
        ],
        'summary' => [
            'Siklus air terdiri dari 4 tahapan utama: Evaporasi/Transpirasi ➔ Kondensasi ➔ Presipitasi ➔ Infiltrasi.',
            'Lahan basah dan rawa gambut adalah spons alam yang menjaga ketersediaan air bersih dan mencegah bencana banjir.',
            'Menjaga hutan rawa berarti menjaga siklus air bersih untuk masa depan anak cucu kita.'
        ]
    ]
];

// Ambil ID modul aktif dari parameter GET (default: 1)
$currentModulId = isset($_GET['modul']) ? (int)$_GET['modul'] : 1;
if (!isset($modules[$currentModulId])) {
    $currentModulId = 1;
}

$activeModul = $modules[$currentModulId];
$prevModulId = ($currentModulId > 1) ? $currentModulId - 1 : null;
$nextModulId = ($currentModulId < count($modules)) ? $currentModulId + 1 : null;

// Foto autentik berlisensi terbuka. Setiap modul menampilkan dokumentasi nyata
// yang relevan agar siswa dapat membandingkan ilustrasi dengan kondisi lapangan.
$authenticPhotos = [
    'peat' => [
        'src' => 'foto/materi-asli/hutan-rawa-gambut.webp',
        'alt' => 'Hutan rawa gambut di Kalimantan',
        'caption' => 'Hutan rawa gambut Kalimantan menyimpan air, karbon, dan habitat beragam makhluk hidup.',
        'credit' => 'Ruanda Agung Sugardiman / Australian Aid',
        'license' => 'CC BY 2.0',
        'url' => 'https://commons.wikimedia.org/wiki/File:Peat_Forest_Swamp_(10712654875).jpg'
    ],
    'bekantan' => [
        'src' => 'foto/materi-asli/bekantan.webp',
        'alt' => 'Bekantan jantan di tepi Sungai Kinabatangan, Borneo',
        'caption' => 'Bekantan adalah primata khas Borneo yang bergantung pada hutan tepian sungai dan lahan basah.',
        'credit' => 'Erwin Bolwidt',
        'license' => 'CC BY-SA 3.0',
        'url' => 'https://commons.wikimedia.org/wiki/File:ProboscisKinabatanganBorneo.jpg'
    ],
    'fish' => [
        'src' => 'foto/materi-asli/ikan-gabus.webp',
        'alt' => 'Ikan gabus Channa striata',
        'caption' => 'Ikan gabus (Channa striata) merupakan predator perairan tawar yang membantu menjaga keseimbangan populasi.',
        'credit' => 'Nilesh Heda',
        'license' => 'Domain publik',
        'url' => 'https://commons.wikimedia.org/wiki/File:Channa_striatus.jpg'
    ],
    'heron' => [
        'src' => 'foto/materi-asli/bangau-ungu.webp',
        'alt' => 'Bangau ungu di kawasan lahan basah',
        'caption' => 'Bangau berburu ikan dan hewan kecil di perairan dangkal sehingga menjadi bagian penting jaring-jaring makanan.',
        'credit' => 'Anirudhanmuthuvara',
        'license' => 'CC BY-SA 4.0',
        'url' => 'https://commons.wikimedia.org/wiki/File:Purple_Heron_at_Kole_Wetland.jpg'
    ],
    'wetland' => [
        'src' => 'foto/materi-asli/rawa-teratai.webp',
        'alt' => 'Lahan basah dengan hamparan daun teratai',
        'caption' => 'Tumbuhan air menyediakan tempat berlindung, sumber makanan, dan membantu mempertahankan kualitas air.',
        'credit' => 'Tiner Ralph / U.S. Fish and Wildlife Service',
        'license' => 'Domain publik',
        'url' => 'https://commons.wikimedia.org/wiki/File:Wetland_with_lily_pads.jpg'
    ]
];

$modulePhotoKeys = [
    1 => ['peat', 'wetland', 'heron'],
    2 => ['peat', 'bekantan', 'heron'],
    3 => ['peat', 'fish', 'bekantan'],
    4 => ['bekantan', 'wetland', 'fish'],
    5 => ['heron', 'fish', 'fire'],
    6 => ['bekantan', 'heron', 'fish']
];

$spotlightPhotoLibrary = $authenticPhotos + [
    'purun' => [
        'src' => 'foto/materi-asli/purun-danau.webp', 'alt' => 'Purun danau di rawa air tawar Kalimantan',
        'credit' => 'Wibowo Djatmiko', 'license' => 'CC BY-SA 3.0',
        'url' => 'https://commons.wikimedia.org/wiki/File:Lepiro_articu_090825-12414_ith.JPG'
    ],
    'lotus' => [
        'src' => 'foto/materi-asli/teratai-merah.webp', 'alt' => 'Bunga teratai merah Nymphaea rubra',
        'credit' => 'MD Nuruzzaman Shiekh', 'license' => 'CC BY-SA 4.0',
        'url' => 'https://commons.wikimedia.org/wiki/File:Red_water_lily_2.jpg'
    ],
    'snail' => [
        'src' => 'foto/materi-asli/keong-mas.webp', 'alt' => 'Keong mas Pomacea canaliculata',
        'credit' => 'gailhampshire', 'license' => 'CC BY 2.0',
        'url' => 'https://commons.wikimedia.org/wiki/File:Golden_Apple_Snail_(Pomacea_canaliculata)_(48622388178).jpg'
    ],
    'frog' => [
        'src' => 'foto/materi-asli/katak-rawa.webp', 'alt' => 'Katak sawah Asia Fejervarya limnocharis',
        'credit' => 'LiCheng Shih', 'license' => 'CC BY 2.0',
        'url' => 'https://commons.wikimedia.org/wiki/File:Fejervarya_limnocharis_(43659333105).jpg'
    ],
    'mushroom' => [
        'src' => 'foto/materi-asli/jamur.webp', 'alt' => 'Jamur tumbuh di lantai hutan',
        'credit' => 'Paolo Neo', 'license' => 'Domain publik',
        'url' => 'https://commons.wikimedia.org/wiki/File:Mushroom_in_forest.jpg'
    ],
    'buffalo' => [
        'src' => 'foto/materi-asli/kerbau-kuntul.webp', 'alt' => 'Kerbau air bersama burung kuntul',
        'credit' => 'Ganesh Mohan T', 'license' => 'CC BY-SA 4.0',
        'url' => 'https://commons.wikimedia.org/wiki/File:Eastern_Cattle_Egret_with_a_Buffalo_01.jpg'
    ],
    'fire' => [
        'src' => 'foto/materi-asli/api-gambut.webp', 'alt' => 'Bara api tersembunyi pada lahan gambut Kalimantan',
        'credit' => 'DenY Krisbiyantoro', 'license' => 'CC BY-SA 4.0',
        'url' => 'https://commons.wikimedia.org/wiki/File:Marking_the_Fire.jpg'
    ],
    'canal' => [
        'src' => 'foto/materi-asli/sekat-kanal-asli.webp', 'alt' => 'Sekat kanal untuk membasahi kembali lahan gambut',
        'credit' => 'Gambut Pratama', 'license' => 'CC BY-SA 4.0',
        'url' => 'https://commons.wikimedia.org/wiki/File:Peat_Compaction_Dam_South_Sumatra_Indonesia.jpg'
    ]
];

$spotlightPhotoKeys = [
    1 => ['bekantan', 'fish', 'purun', 'lotus'],
    2 => ['wetland', 'snail', 'frog', 'fish', 'mushroom'],
    3 => ['buffalo', 'heron', 'wetland'],
    4 => ['peat', 'fire', 'canal'],
    5 => ['bekantan', 'peat', 'wetland'],
    6 => ['peat', 'wetland', 'purun']
];

$activePhotos = array_map(fn($key) => $spotlightPhotoLibrary[$key], $modulePhotoKeys[$currentModulId]);



$pageTitle = 'Harmoni Ekosistem Lahan Basah - IPAS Kelas 5 SD';
$pageDesc  = 'Modul pembelajaran interaktif ekosistem lahan basah, rantai makanan, peranan tanah gambut, dan siklus air Kalimantan.';
$activePage = 'materi';
$bodyClass  = 'inner-page';

$extraHead = <<<'EOD'
<style>
    /* ==========================================================================
       COMPLETE EMBEDDED STYLES FOR MATERI PHP (Zero Cache Glitch)
       ========================================================================== */
    :root {
      --primary-green: #10b981;
      --primary-dark: #064e3b;
      --emerald-accent: #059669;
      --materi-font: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
    }

    body {
      background-color: #f8fafc;
      color: #1e293b;
      font-family: var(--materi-font);
    }

    /* Layout materi: tab modul sederhana di kiri, konten aktif di kanan */
    .materi-layout {
      display: grid;
      grid-template-columns: 250px minmax(0, 1fr);
      gap: 24px;
      align-items: start;
    }

    .module-nav-wrapper {
      background: #ffffff;
      border-radius: 18px;
      padding: 16px;
      border: 1px solid #dcebe4;
      box-shadow: 0 8px 24px rgba(6, 78, 59, 0.05);
      position: sticky;
      top: 88px;
    }

    .module-nav-container {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .module-nav-heading {
      padding: 2px 4px 12px;
      border-bottom: 1px solid #eef4f1;
      margin-bottom: 10px;
    }

    @media (max-width: 991px) {
      .materi-layout {
        grid-template-columns: 210px minmax(0, 1fr);
        gap: 16px;
      }

      .module-nav-wrapper {
        top: 78px;
      }
    }

    @media (max-width: 767px) {
      .materi-layout {
        grid-template-columns: 1fr;
      }

      .module-nav-wrapper {
        position: static;
      }

      .module-nav-container {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }

      .module-nav-btn {
        min-height: 64px;
      }

      .module-nav-btn .icon-badge {
        display: none;
      }
    }

    @media (max-width: 480px) {
      .module-nav-container { grid-template-columns: 1fr; }
    }

    .module-nav-btn {
      appearance: none;
      -webkit-appearance: none;
      background: #ffffff;
      border: 1px solid transparent;
      border-radius: 12px;
      padding: 11px 12px;
      display: flex;
      align-items: center;
      gap: 14px;
      text-align: left;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
      box-shadow: none;
      position: relative;
      overflow: hidden;
      width: 100%;
      min-width: 0;
      min-height: 68px;
    }

    .module-nav-btn:hover {
      background: #f0fdf4;
      border-color: #bbf7d0;
      color: #064e3b;
    }

    .module-nav-btn.active {
      background: #059669 !important;
      border-color: #059669 !important;
      color: #ffffff !important;
      box-shadow: 0 5px 14px rgba(5, 150, 105, 0.22) !important;
    }

    .module-nav-btn .icon-badge {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      background: #f0fdf4;
      border: 1px solid #bbf7d0;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.2rem;
      flex-shrink: 0;
      transition: all 0.2s ease;
    }

    .module-nav-btn.active .icon-badge {
      background: rgba(255, 255, 255, 0.25) !important;
      border-color: rgba(255, 255, 255, 0.4) !important;
    }

    .mod-badge-text {
      font-size: 0.68rem;
      font-weight: 800;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      color: #059669;
      margin-bottom: 2px;
    }

    .module-nav-btn.active .mod-badge-text {
      color: #d1fae5 !important;
    }

    .mod-title-text {
      font-size: 0.82rem;
      font-weight: 700;
      color: #1e293b;
      line-height: 1.3;
      white-space: normal;
      overflow-wrap: anywhere;
    }

    .module-nav-btn .flex-grow-1 { min-width: 0; }

    .module-nav-btn.active .mod-title-text {
      color: #ffffff !important;
    }

    /* Modul Stage Card */
    .materi-stage-card {
      background: #ffffff;
      border-radius: 28px;
      border: 2px solid #e6f4ea;
      padding: clamp(20px, 4vw, 42px);
      box-shadow: 0 16px 40px rgba(6, 78, 59, 0.06);
      position: relative;
    }

    .modul-hero-header {
      background: radial-gradient(circle at 10% 20%, #dcfce7 0%, #e0f2fe 60%, #fef3c7 100%);
      border-radius: 28px;
      padding: 38px 30px;
      border: 2px solid #bbf7d0;
      position: relative;
      overflow: hidden;
      margin-bottom: 30px;
    }

    .modul-hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 16px;
      border-radius: 99px;
      background: #ffffff;
      color: #065f46;
      font-weight: 800;
      font-size: 0.9rem;
      box-shadow: 0 4px 10px rgba(0,0,0,0.06);
    }

    .learning-goal-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      margin-bottom: 10px;
      font-size: 0.98rem;
    }

    .learning-goal-item .check-icon {
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background: #10b981;
      color: #ffffff;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      font-size: 0.8rem;
      margin-top: 2px;
    }

    /* Subcards */
    .materi-subcard {
      background: #fbfdfc;
      border: 1px solid #dcf2e6;
      border-radius: 20px;
      padding: 24px;
      margin-bottom: 24px;
      transition: transform 0.2s ease;
    }

    .materi-subcard:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(16, 185, 129, 0.08);
    }

    .materi-subcard-title {
      font-family: var(--font-display);
      font-weight: 800;
      color: #064e3b;
      font-size: 1.25rem;
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 14px;
    }

    /* Species Spotlight */
    .species-card {
      background: #ffffff;
      border-radius: 18px;
      border: 1px solid #d4ece1;
      padding: 0;
      text-align: center;
      height: 100%;
      transition: all 0.25s ease;
      overflow: hidden;
      display: flex;
      flex-direction: column;
    }

    .species-card:hover {
      transform: translateY(-4px);
      border-color: #10b981;
      box-shadow: 0 10px 25px rgba(16, 185, 129, 0.15);
    }

    .species-icon-circle {
      width: 64px;
      height: 64px;
      border-radius: 50%;
      margin: 0 auto 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      background: linear-gradient(135deg, #dcfce7, #dbeafe);
    }

    .species-photo-wrap {
      position: relative;
      width: 100%;
      height: 150px;
      overflow: hidden;
      background: #f4faf7;
    }

    .species-photo-wrap img {
      width: 100%;
      height: 100%;
      display: block;
      object-fit: contain;
      object-position: center;
    }

    .species-photo-label {
      position: absolute;
      right: 9px;
      bottom: 9px;
      display: inline-flex;
      align-items: center;
      gap: 4px;
      padding: 4px 8px;
      border-radius: 999px;
      background: rgba(255,255,255,0.94);
      color: #047857;
      font-size: 0.66rem;
      font-weight: 800;
      text-decoration: none;
      box-shadow: 0 3px 10px rgba(6,78,59,0.16);
    }

    .species-photo-label:hover { color: #065f46; background: #ffffff; }
    .species-card-body { padding: 16px 14px 15px; display: flex; flex-direction: column; flex: 1; }
    .species-card-body p { line-height: 1.55; }
    .species-credit { margin-top: auto; padding-top: 10px; font-size: 0.64rem; color: #718096; }

    .field-photo-panel {
      background: linear-gradient(145deg, #f0fdf4, #eff9ff);
      border: 1px solid #b9ead4;
      border-radius: 24px;
      padding: 22px;
      margin-bottom: 24px;
    }

    .field-photo-card {
      height: 100%;
      background: #ffffff;
      border: 1px solid #d8e8e0;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 7px 18px rgba(15, 79, 61, 0.08);
    }

    .field-photo-card img {
      width: 100%;
      height: 190px;
      object-fit: contain;
      object-position: center;
      background: #f4faf7;
      display: block;
    }

    .field-photo-copy { padding: 14px 15px 15px; }
    .field-photo-copy p { font-size: 0.86rem; line-height: 1.5; color: #475569; }
    .field-photo-source { font-size: 0.72rem; color: #64748b; }
    .field-photo-source a { color: #047857; font-weight: 800; text-decoration: none; }
    .field-photo-source a:hover { text-decoration: underline; }

    .lab-choice-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 5px 12px 5px 6px;
    }

    .lab-choice-image {
      width: 34px;
      height: 34px;
      flex: 0 0 34px;
      object-fit: cover;
      object-position: center;
      border-radius: 50%;
      border: 2px solid rgba(255, 255, 255, 0.9);
      background: #ffffff;
    }

    .lab-node-image {
      width: 76px;
      height: 58px;
      object-fit: cover;
      object-position: center;
      border-radius: 10px;
      margin-bottom: 7px;
    }

    .lab-card-image {
      width: 100%;
      height: 92px;
      object-fit: cover;
      object-position: center;
      border-radius: 10px;
      margin-bottom: 9px;
    }

    .lab-check-card {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 8px 10px;
      margin-bottom: 8px;
      border: 1px solid #d9eee4;
      border-radius: 12px;
      background: #ffffff;
    }

    .lab-result-visual {
      display: flex;
      align-items: center;
      gap: 14px;
      min-height: 92px;
    }

    .lab-result-visual img {
      width: 118px;
      height: 82px;
      flex: 0 0 118px;
      object-fit: cover;
      object-position: center;
      border-radius: 12px;
      border: 2px solid #d1fae5;
      background: #f0fdf4;
    }

    .lab-result-copy {
      min-width: 0;
      line-height: 1.55;
    }

    @media (max-width: 575px) {
      .lab-result-visual { align-items: flex-start; }
      .lab-result-visual img { width: 88px; height: 72px; flex-basis: 88px; }
    }

    .golden-summary-card {
      color: #5b3a05;
      background: linear-gradient(135deg, #fffdf2 0%, #fff4c2 58%, #ffe7a3 100%);
      border: 2px solid #f2c14e;
      border-left: 8px solid #d99b16;
      box-shadow: 0 12px 28px rgba(180, 119, 16, 0.14);
    }

    .golden-summary-card h5 { color: #6b4300; }
    .golden-summary-card h5 i {
      width: 38px;
      height: 38px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: #ffffff;
      background: linear-gradient(135deg, #d99b16, #f4bf32);
      border-radius: 12px;
      box-shadow: 0 5px 12px rgba(180, 119, 16, 0.25);
    }
    .golden-summary-card li { color: #604b23; line-height: 1.6; }
    .golden-summary-card li::marker { color: #c58408; }

    /* Food Chain Interactive */
    .food-chain-interactive {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      gap: 12px;
      background: linear-gradient(135deg, #f0fdf4, #f0f9ff);
      padding: 24px;
      border-radius: 22px;
      border: 1.5px dashed #86efac;
    }

    .chain-item-node {
      flex: 1;
      min-width: 130px;
      background: #ffffff;
      border-radius: 18px;
      padding: 16px 12px;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0,0,0,0.04);
      border: 2px solid #e2e8f0;
      transition: transform 0.2s ease;
    }

    .chain-item-node:hover {
      transform: scale(1.05);
      border-color: #10b981;
    }

    .chain-arrow-icon {
      font-size: 1.6rem;
      color: #10b981;
      font-weight: 900;
    }

    /* Quick Quiz Box */
    .quick-quiz-box {
      background: linear-gradient(135deg, #fffbeb, #fef3c7);
      border: 2px solid #fde68a;
      border-radius: 20px;
      padding: 24px;
      margin-top: 24px;
    }

    .quick-quiz-option {
      background: #ffffff;
      border: 2px solid #e2e8f0;
      border-radius: 16px;
      padding: 14px 18px;
      margin-bottom: 10px;
      cursor: pointer;
      font-weight: 600;
      transition: all 0.2s ease;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .quick-quiz-option:hover {
      border-color: #10b981;
      background: #f0fdf4;
      transform: translateY(-2px);
    }

    .quick-quiz-option.correct {
      background: #dcfce7 !important;
      border-color: #22c55e !important;
      color: #14532d !important;
    }

    .quick-quiz-option.wrong {
      background: #fee2e2 !important;
      border-color: #ef4444 !important;
      color: #991b1b !important;
    }

    .interactive-badge-tag {
      background: #fef08a;
      color: #854d0e;
      font-weight: 800;
      font-size: 0.8rem;
      padding: 4px 12px;
      border-radius: 99px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }

    /* Audio Readout Pill */
    .audio-read-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: #eff6ff;
      border: 1px solid #bfdbfe;
      color: #1d4ed8;
      font-weight: 700;
      border-radius: 99px;
      padding: 8px 18px;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    .audio-read-pill:hover {
      background: #dbeafe;
      color: #1e40af;
      transform: scale(1.02);
    }

    /* Stepper Buttons */
    .nav-step-btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      padding: 12px 24px;
      border-radius: 20px;
      font-family: var(--font-display);
      font-weight: 700;
      font-size: 1rem;
      text-decoration: none;
      transition: all 0.25s ease;
      cursor: pointer;
      border: none;
    }

    .nav-step-prev {
      background: #f1f5f9;
      color: #475569;
      border: 2px solid #cbd5e1;
    }

    .nav-step-prev:hover {
      background: #e2e8f0;
      color: #1e293b;
      transform: translateX(-4px);
    }

    .nav-step-next {
      background: linear-gradient(135deg, #10b981, #059669);
      color: #ffffff;
      box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
    }

    .nav-step-next:hover {
      background: linear-gradient(135deg, #059669, #047857);
      color: #ffffff;
      transform: translateX(4px);
      box-shadow: 0 10px 25px rgba(16, 185, 129, 0.4);
    }
    /* Floating Music Dock & Button Styles (Embedded to prevent cache bugs) */
    .music-dock {
      position: fixed;
      bottom: 24px;
      right: 24px;
      z-index: 9999;
      display: flex;
      align-items: center;
      gap: 10px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1.5px solid rgba(16, 185, 129, 0.4);
      padding: 6px 14px 6px 6px;
      border-radius: 999px;
      box-shadow: 0 8px 25px rgba(6, 78, 59, 0.15);
      transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      cursor: pointer;
    }

    .music-dock:hover {
      transform: translateY(-2px) scale(1.04);
      box-shadow: 0 12px 30px rgba(16, 185, 129, 0.25);
      border-color: #10b981;
    }

    .music-btn,
    .music-toggle-btn {
      width: 42px !important;
      height: 42px !important;
      border-radius: 50% !important;
      background: linear-gradient(135deg, #10b981 0%, #059669 100%) !important;
      color: #ffffff !important;
      border: none !important;
      outline: none !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      font-size: 1.2rem !important;
      box-shadow: 0 4px 12px rgba(16, 185, 129, 0.35) !important;
      cursor: pointer !important;
      transition: all 0.2s ease !important;
      padding: 0 !important;
      margin: 0 !important;
      appearance: none !important;
      -webkit-appearance: none !important;
      flex-shrink: 0 !important;
    }

    .music-btn:hover,
    .music-toggle-btn:hover {
      transform: scale(1.1);
      background: linear-gradient(135deg, #059669 0%, #047857 100%) !important;
    }

    .music-dock.playing .music-btn,
    .music-dock.playing .music-toggle-btn {
      background: linear-gradient(135deg, #10b981 0%, #0284c7 100%) !important;
      animation: pulseEco 2s infinite ease-in-out;
    }

    @keyframes pulseEco {
      0%, 100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
      50% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
    }

    .sound-bars {
      display: flex;
      align-items: flex-end;
      gap: 3px;
      height: 18px;
    }

    .sound-bar {
      width: 3.5px;
      background-color: #10b981;
      border-radius: 99px;
      height: 4px;
      transition: height 0.2s ease;
    }

    .music-dock.playing .sound-bar:nth-child(1) {
      animation: eqBar1 0.8s ease-in-out infinite alternate;
    }
    .music-dock.playing .sound-bar:nth-child(2) {
      animation: eqBar2 0.7s ease-in-out infinite alternate 0.2s;
    }
    .music-dock.playing .sound-bar:nth-child(3) {
      animation: eqBar3 0.9s ease-in-out infinite alternate 0.4s;
    }

    @keyframes eqBar1 { 0% { height: 4px; } 100% { height: 16px; } }
    @keyframes eqBar2 { 0% { height: 6px; } 100% { height: 18px; } }
    @keyframes eqBar3 { 0% { height: 3px; } 100% { height: 14px; } }

    .music-label {
      font-family: var(--font-display, sans-serif);
      font-size: 0.84rem;
      font-weight: 700;
      color: #064e3b;
      user-select: none;
      white-space: nowrap;
    }

    .music-toast,
    .music-toast-popup {
      position: fixed;
      bottom: 84px;
      right: 24px;
      z-index: 9999;
      background: rgba(15, 23, 42, 0.92);
      color: #ffffff;
      backdrop-filter: blur(12px);
      padding: 8px 18px;
      border-radius: 999px;
      font-size: 0.85rem;
      font-weight: 600;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      display: none;
      opacity: 0;
      transition: opacity 0.3s ease;
    }
  </style>
EOD;

require __DIR__ . '/partials/head.php';
require __DIR__ . '/partials/navbar.php';

// Unified Hero Banner
$heroTag       = '<i class="bi bi-mortarboard-fill me-1"></i> IPAS Kelas V SD • Kurikulum Merdeka';
$heroTitle     = 'Harmoni dalam <span class="highlight">Ekosistem Lahan Basah</span>';
$heroSubtitle  = 'Jelajahi interaksi rantai makanan, keanekaragaman flora-fauna rawa, peranan tanah gambut, dan siklus air Kalimantan melalui modul interaktif ramah anak.';
$heroMascot    = 'foto/peneliti.webp';
$heroMascotAlt = 'Peneliti Cilik Lahan Basah';
$heroCta       = '
  <a href="kuis.php" class="btn-eco-primary btn-sm px-4">
    <i class="bi bi-controller"></i> Uji di Game Kuis
  </a>
  <a href="simulasi.php" class="btn-eco-outline btn-sm px-4">
    <i class="bi bi-bezier2"></i> Buka Simulasi
  </a>
';
require __DIR__ . '/partials/hero.php';
?>

<!-- Main Content Area Wrapped in Unified Stage Container -->
<main class="eco-stage-container eco-stage-wide">
    <div class="materi-layout">
        <!-- Navigasi modul dirender langsung oleh PHP -->
        <aside class="module-nav-wrapper" aria-label="Daftar modul">
          <div class="module-nav-heading">
            <div class="fw-bold text-dark"><i class="bi bi-book text-success me-1"></i> Modul Materi</div>
            <small class="text-muted">Pilih topik untuk dipelajari</small>
          </div>
          <nav class="module-nav-container">
            <?php foreach ($modules as $modId => $mod): ?>
              <a href="materi.php?modul=<?= $modId ?>"
                 class="module-nav-btn <?= ($modId === $currentModulId) ? 'active' : '' ?>"
                 <?= ($modId === $currentModulId) ? 'aria-current="page"' : '' ?>>
                <div class="flex-grow-1">
                  <div class="mod-badge-text">Modul <?= $modId ?></div>
                  <div class="mod-title-text"><?= htmlspecialchars($mod['title']) ?></div>
                </div>
              </a>
            <?php endforeach; ?>
          </nav>
        </aside>

        <!-- STAGE CARD MODUL AKTIF -->
        <div class="materi-stage-card" data-aos="fade-up">

        <!-- Banner Modul -->
        <div class="modul-hero-header">
          <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-2">
            <span class="modul-hero-badge">
              <?= renderMaterialIcon($activeModul['icon'], 'ui-2d-thumb ui-2d-thumb-sm') ?> <?= htmlspecialchars($activeModul['badge']) ?>
            </span>
            <span class="badge bg-white text-dark rounded-pill px-3 py-2 fw-bold shadow-sm">
              <i class="bi bi-clock-history me-1 text-success"></i> <?= htmlspecialchars($activeModul['readTime']) ?>
            </span>
          </div>
          <h2 class="display-6 fw-bold text-dark mb-2">
            <?= htmlspecialchars($activeModul['title']) ?>
          </h2>
          <p class="lead text-dark-emphasis mb-3 fs-6">
            <?= htmlspecialchars($activeModul['subtitle']) ?>
          </p>

          <!-- Tujuan Pembelajaran Ramah Anak -->
          <div class="bg-white p-3 p-md-4 rounded-4 shadow-sm border border-success-subtle">
            <h5 class="fw-bold text-success mb-3 d-flex align-items-center gap-2">
              <i class="bi bi-bullseye fs-4"></i> Misi & Target Belajar Kamu Hari Ini:
            </h5>
            <div class="row">
              <?php foreach ($activeModul['goals'] as $goal): ?>
                <div class="col-md-6">
                  <div class="learning-goal-item">
                    <span class="check-icon"><i class="bi bi-check-lg"></i></span>
                    <span><?= htmlspecialchars($goal) ?></span>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <!-- Section 1: Konsep Inti Pembuka -->
        <div class="materi-subcard">
          <div class="materi-subcard-title">
            <i class="bi bi-search"></i> <?= htmlspecialchars($activeModul['coreConcept']['title']) ?>
          </div>
          <p class="fs-5 leading-relaxed text-secondary mb-3">
            <?= $activeModul['coreConcept']['desc'] ?>
          </p>
          <div class="alert alert-success border-2 rounded-4 fw-bold mb-0">
            <i class="bi bi-lightbulb-fill text-warning me-2 fs-5"></i>
            <?= htmlspecialchars($activeModul['coreConcept']['quote']) ?>
          </div>
        </div>

        <!-- Section 2: Poin-Poin Konsep Visual Grid -->
        <div class="row g-3 mb-4">
          <?php foreach ($activeModul['cards'] as $card): ?>
            <div class="col-md-6">
              <div class="materi-subcard h-100 mb-0">
                <div class="d-flex align-items-center gap-3 mb-2">
                  <?= renderMaterialIcon($card['icon']) ?>
                  <h5 class="fw-bold text-success mb-0"><?= htmlspecialchars($card['title']) ?></h5>
                </div>
                <p class="text-muted mb-0"><?= $card['desc'] ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>

        <!-- Dokumentasi lapangan autentik dengan atribusi sumber terbuka -->
        <section class="field-photo-panel" aria-labelledby="fieldPhotoTitle">
          <div class="d-flex flex-wrap align-items-end justify-content-between gap-2 mb-3">
            <div>
              <span class="badge bg-success-subtle text-success rounded-pill mb-2"><i class="bi bi-camera-fill me-1"></i> Foto Lapangan Nyata</span>
              <h3 class="h5 fw-bold text-success mb-1" id="fieldPhotoTitle">Lihat Ekosistemnya dari Dekat</h3>
              <p class="small text-muted mb-0">Bandingkan konsep yang kamu pelajari dengan dokumentasi asli dari habitat lahan basah.</p>
            </div>
            <span class="small text-muted"><i class="bi bi-box-arrow-up-right me-1"></i>Sumber terbuka tercantum pada setiap foto</span>
          </div>
          <div class="row g-3">
            <?php foreach ($activePhotos as $photo): ?>
              <div class="col-md-4">
                <figure class="field-photo-card mb-0">
                  <img src="<?= htmlspecialchars($photo['src']) ?>" alt="<?= htmlspecialchars($photo['alt']) ?>" loading="lazy">
                  <figcaption class="field-photo-copy">
                    <p class="mb-2"><?= htmlspecialchars($photo['caption'] ?? $photo['alt']) ?></p>
                    <div class="field-photo-source">
                      Foto: <?= htmlspecialchars($photo['credit']) ?> · <?= htmlspecialchars($photo['license']) ?> ·
                      <a href="<?= htmlspecialchars($photo['url']) ?>" target="_blank" rel="noopener noreferrer">Wikimedia Commons <i class="bi bi-box-arrow-up-right"></i></a>
                    </div>
                  </figcaption>
                </figure>
              </div>
            <?php endforeach; ?>
          </div>
        </section>

        <!-- Section 3: Spotlight Spesies & Ekosistem Lokal Kalsel -->
        <div class="materi-subcard bg-white border-success-subtle mb-4" id="speciesSpotlight">
          <div class="materi-subcard-title text-success">
            <i class="bi bi-binoculars-fill"></i> <?= htmlspecialchars($activeModul['spotlight']['title']) ?>
          </div>
          <div class="row g-3">
            <?php foreach ($activeModul['spotlight']['items'] as $itemIndex => $item): ?>
              <?php
                $photoKey = $spotlightPhotoKeys[$currentModulId][$itemIndex] ?? 'wetland';
                $spotPhoto = $spotlightPhotoLibrary[$photoKey];
              ?>
              <div class="col-sm-6 col-lg">
                <div class="species-card">
                  <div class="species-photo-wrap">
                    <img src="<?= htmlspecialchars($spotPhoto['src']) ?>" alt="<?= htmlspecialchars($spotPhoto['alt']) ?>" loading="lazy">
                    <a class="species-photo-label" href="<?= htmlspecialchars($spotPhoto['url']) ?>" target="_blank" rel="noopener noreferrer" aria-label="Buka sumber foto <?= htmlspecialchars($item['name']) ?>">
                      <i class="bi bi-camera-fill"></i> Foto asli
                    </a>
                  </div>
                  <div class="species-card-body">
                    <h6 class="fw-bold mb-1"><?= htmlspecialchars($item['name']) ?></h6>
                    <div><span class="badge bg-success-subtle text-success mb-2"><?= htmlspecialchars($item['role']) ?></span></div>
                    <p class="small text-muted mb-0"><?= htmlspecialchars($item['info']) ?></p>
                    <div class="species-credit">Foto: <?= htmlspecialchars($spotPhoto['credit']) ?> · <?= htmlspecialchars($spotPhoto['license']) ?></div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Section 4: Laboratorium Mini / Interaktif Spesifik Modul -->
        <div class="materi-subcard mb-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="materi-subcard-title mb-0">
            <i class="bi bi-flask-fill"></i> Laboratorium Cilik Interaktif
            </div>
            <span class="interactive-badge-tag"><i class="bi bi-hand-index-thumb"></i> Klik & Eksplorasi</span>
          </div>

          <?php if ($activeModul['id'] === 1): ?>
            <!-- Interaktif Modul 1: Pemilah Biotik vs Abiotik -->
            <div class="p-3 bg-light rounded-4">
              <p class="small fw-bold text-muted mb-2">Klik tombol di bawah ini untuk melihat ke mana mereka tergolong:</p>
              <div class="d-flex flex-wrap gap-2 mb-3">
                <button class="btn btn-outline-success btn-sm rounded-pill lab-choice-btn" onclick="checkBio('Biotik', 'Ikan bernapas, bergerak, tumbuh, dan berkembang biak sehingga termasuk makhluk hidup.', 'foto/materi-asli/ikan-gabus.webp', 'Ikan Gabus')"><?= renderLabThumbnail('foto/materi-asli/ikan-gabus.webp', 'Ikan gabus') ?> Ikan Gabus</button>
                <button class="btn btn-outline-primary btn-sm rounded-pill lab-choice-btn" onclick="checkBio('Abiotik', 'Air tidak hidup, tetapi menjadi tempat tinggal dan penopang kehidupan organisme rawa.', 'foto/materi-asli/rawa-teratai.webp', 'Air Rawa')"><?= renderLabThumbnail('foto/materi-asli/rawa-teratai.webp', 'Air rawa') ?> Air Rawa</button>
                <button class="btn btn-outline-success btn-sm rounded-pill lab-choice-btn" onclick="checkBio('Biotik', 'Purun adalah tumbuhan hidup yang melakukan fotosintesis dan menjadi produsen di lahan basah.', 'foto/materi-asli/purun-danau.webp', 'Rumput Purun')"><?= renderLabThumbnail('foto/materi-asli/purun-danau.webp', 'Rumput purun') ?> Rumput Purun</button>
                <button class="btn btn-outline-primary btn-sm rounded-pill lab-choice-btn" onclick="checkBio('Abiotik', 'Sinar matahari adalah sumber energi tak hidup yang dibutuhkan tumbuhan untuk fotosintesis.', 'foto/materi-asli/teratai-merah.webp', 'Sinar Matahari')"><?= renderLabThumbnail('foto/materi-asli/teratai-merah.webp', 'Teratai terkena sinar matahari') ?> Sinar Matahari</button>
                <button class="btn btn-outline-success btn-sm rounded-pill lab-choice-btn" onclick="checkBio('Biotik', 'Bekantan bernapas, mencari makan, bergerak, dan berkembang biak sehingga termasuk makhluk hidup.', 'foto/materi-asli/bekantan.webp', 'Bekantan')"><?= renderLabThumbnail('foto/materi-asli/bekantan.webp', 'Bekantan') ?> Bekantan</button>
                <button class="btn btn-outline-primary btn-sm rounded-pill lab-choice-btn" onclick="checkBio('Abiotik', 'Tanah gambut merupakan komponen tak hidup yang menyimpan air dan unsur hara bagi ekosistem.', 'foto/materi-asli/hutan-rawa-gambut.webp', 'Tanah Gambut')"><?= renderLabThumbnail('foto/materi-asli/hutan-rawa-gambut.webp', 'Tanah gambut') ?> Tanah Gambut</button>
              </div>
              <div id="bioResult" class="p-3 bg-white rounded-3 border border-success-subtle text-success fw-bold small">
              <i class="bi bi-hand-index-thumb me-1"></i> Klik salah satu komponen di atas untuk melihat penjelasannya!
              </div>
            </div>

          <?php elseif ($activeModul['id'] === 2): ?>
            <!-- Interaktif Modul 2: Rantai Makanan Interaktif -->
            <div class="food-chain-interactive">
              <div class="chain-item-node text-center">
                <?= renderLabThumbnail('foto/materi-asli/teratai-merah.webp', 'Teratai rawa', 'lab-node-image') ?>
                <div class="fw-bold text-success lh-sm">Teratai Rawa</div>
                <span class="badge bg-success-subtle text-success small">Produsen</span>
              </div>
              <div class="chain-arrow-icon"><i class="bi bi-arrow-right"></i></div>
              <div class="chain-item-node text-center">
                <?= renderLabThumbnail('foto/materi-asli/keong-mas.webp', 'Keong mas', 'lab-node-image') ?>
                <div class="fw-bold text-primary lh-sm">Keong Mas</div>
                <span class="badge bg-primary-subtle text-primary small">Konsumen I</span>
              </div>
              <div class="chain-arrow-icon"><i class="bi bi-arrow-right"></i></div>
              <div class="chain-item-node text-center">
                <?= renderLabThumbnail('foto/materi-asli/katak-rawa.webp', 'Katak rawa', 'lab-node-image') ?>
                <div class="fw-bold text-warning-emphasis lh-sm">Katak Rawa</div>
                <span class="badge bg-warning-subtle text-warning-emphasis small">Konsumen II</span>
              </div>
              <div class="chain-arrow-icon"><i class="bi bi-arrow-right"></i></div>
              <div class="chain-item-node text-center">
                <?= renderLabThumbnail('foto/materi-asli/ikan-gabus.webp', 'Ikan haruan', 'lab-node-image') ?>
                <div class="fw-bold text-danger lh-sm">Ikan Haruan</div>
                <span class="badge bg-danger-subtle text-danger small">Konsumen Karnivora</span>
              </div>
              <div class="chain-arrow-icon"><i class="bi bi-arrow-right"></i></div>
              <div class="chain-item-node text-center">
                <?= renderLabThumbnail('foto/materi-asli/jamur.webp', 'Jamur pengurai', 'lab-node-image') ?>
                <div class="fw-bold text-secondary lh-sm">Jamur Pengurai</div>
                <span class="badge bg-secondary-subtle text-secondary small">Dekomposer</span>
              </div>
            </div>

          <?php elseif ($activeModul['id'] === 3): ?>
            <!-- Interaktif Modul 3: Simulasi Efek Domino Keseimbangan -->
            <div class="p-3 bg-light rounded-4">
              <p class="small fw-bold text-muted mb-2">Uji Skenario: Apa yang terjadi jika salah satu organisme terganggu?</p>
              <div class="btn-group flex-wrap w-100 gap-2 mb-3">
                <button class="btn btn-outline-danger btn-sm rounded-pill lab-choice-btn" onclick="simulateBalance('ular_katak', 'foto/materi-asli/katak-rawa.webp', 'Katak Habis Diburu')"><?= renderLabThumbnail('foto/materi-asli/katak-rawa.webp', 'Katak rawa') ?> Jika Katak Habis Diburu</button>
                <button class="btn btn-outline-warning btn-sm rounded-pill lab-choice-btn" onclick="simulateBalance('teratai_mati', 'foto/materi-asli/teratai-merah.webp', 'Teratai Terkena Racun')"><?= renderLabThumbnail('foto/materi-asli/teratai-merah.webp', 'Teratai merah') ?> Jika Teratai Kena Racun</button>
                <button class="btn btn-outline-success btn-sm rounded-pill lab-choice-btn" onclick="simulateBalance('seimbang', 'foto/materi-asli/rawa-teratai.webp', 'Ekosistem Seimbang')"><?= renderLabThumbnail('foto/materi-asli/rawa-teratai.webp', 'Ekosistem rawa seimbang') ?> Kondisi Alami Seimbang</button>
              </div>
              <div id="balanceResult" class="p-3 bg-white rounded-3 border border-warning-subtle text-dark fw-bold small">
                Klik salah satu tombol skenario untuk mengamati efeknya pada rantai makanan!
              </div>
            </div>

          <?php elseif ($activeModul['id'] === 4): ?>
            <!-- Interaktif Modul 4: Kenali Dampak Polusi & Gangguan -->
            <div class="row g-2">
              <div class="col-md-4">
                <div class="p-3 bg-white rounded-3 border text-center">
                  <?= renderLabThumbnail('foto/materi-asli/api-gambut.webp', 'Kebakaran gambut', 'lab-card-image') ?>
                  <h6 class="fw-bold text-danger">Kebakaran Gambut</h6>
                  <p class="small text-muted mb-0">Asap pekat ISPA & hilangnya pohon rambai rumah bekantan.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="p-3 bg-white rounded-3 border text-center">
                  <?= renderLabThumbnail('foto/materi-asli/ikan-gabus.webp', 'Ikan di perairan rawa', 'lab-card-image') ?>
                  <h6 class="fw-bold text-warning-emphasis">Setrum Ikan Ilegal</h6>
                  <p class="small text-muted mb-0">Bibit ikan kecil mati, rantai makanan perairan terputus total.</p>
                </div>
              </div>
              <div class="col-md-4">
                <div class="p-3 bg-white rounded-3 border text-center">
                  <?= renderLabThumbnail('foto/materi-asli/sekat-kanal-asli.webp', 'Aliran air lahan gambut', 'lab-card-image') ?>
                  <h6 class="fw-bold text-info-emphasis">Sampah Plastik</h6>
                  <p class="small text-muted mb-0">Menyumbat aliran air rawa dan tertelan satwa liar.</p>
                </div>
              </div>
            </div>

          <?php elseif ($activeModul['id'] === 5): ?>
            <!-- Interaktif Modul 5: Checklist Aksi Siswa -->
            <div class="p-3 bg-light rounded-4">
              <p class="fw-bold text-success mb-2">Centang aksi ramah lingkungan yang sudah kamu lakukan:</p>
              <div class="form-check lab-check-card">
                <input class="form-check-input" type="checkbox" id="act1" onchange="checkActionPoints()">
                <?= renderLabThumbnail('foto/materi-asli/rawa-teratai.webp', 'Air rawa yang bersih') ?>
                <label class="form-check-label small fw-semibold" for="act1">Membawa botol minum sendiri ke sekolah</label>
              </div>
              <div class="form-check lab-check-card">
                <input class="form-check-input" type="checkbox" id="act2" onchange="checkActionPoints()">
                <?= renderLabThumbnail('foto/materi-asli/sekat-kanal-asli.webp', 'Aliran air yang dijaga') ?>
                <label class="form-check-label small fw-semibold" for="act2">Tidak pernah membuang sampah ke selokan atau sungai</label>
              </div>
              <div class="form-check lab-check-card">
                <input class="form-check-input" type="checkbox" id="act3" onchange="checkActionPoints()">
                <?= renderLabThumbnail('foto/materi-asli/purun-danau.webp', 'Tanaman purun') ?>
                <label class="form-check-label small fw-semibold" for="act3">Menanam tanaman hias atau pohon di sekitar rumah</label>
              </div>
              <div id="actionBadge" class="mt-2 text-success fw-bold small">Lakukan aksi nyata untuk bumi kita!</div>
            </div>

          <?php else: ?>
            <!-- Interaktif Modul 6: 4 Langkah Siklus Air -->
            <div class="row g-2">
              <div class="col-6 col-md-3 text-center p-2 bg-white rounded-3 border">
                <?= renderLabThumbnail('foto/materi-asli/teratai-merah.webp', 'Air menguap karena panas matahari', 'lab-card-image') ?>
                <div class="fw-bold small text-primary">1. Evaporasi</div>
                <div class="text-muted" style="font-size: 0.75rem;">Air menguap ke udara</div>
              </div>
              <div class="col-6 col-md-3 text-center p-2 bg-white rounded-3 border">
                <?= renderLabThumbnail('foto/materi-asli/hutan-rawa-gambut.webp', 'Uap air di atas hutan rawa', 'lab-card-image') ?>
                <div class="fw-bold small text-primary">2. Kondensasi</div>
                <div class="text-muted" style="font-size: 0.75rem;">Membentuk awan hujan</div>
              </div>
              <div class="col-6 col-md-3 text-center p-2 bg-white rounded-3 border">
                <?= renderLabThumbnail('foto/materi-asli/rawa-teratai.webp', 'Air hujan mengisi rawa', 'lab-card-image') ?>
                <div class="fw-bold small text-primary">3. Presipitasi</div>
                <div class="text-muted" style="font-size: 0.75rem;">Turun sebagai hujan</div>
              </div>
              <div class="col-6 col-md-3 text-center p-2 bg-white rounded-3 border">
                <?= renderLabThumbnail('foto/materi-asli/purun-danau.webp', 'Tanah rawa menyerap air', 'lab-card-image') ?>
                <div class="fw-bold small text-primary">4. Infiltrasi</div>
                <div class="text-muted" style="font-size: 0.75rem;">Diserap spons rawa</div>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <!-- Section 5: Kuis Cepat Cek Pemahaman -->
        <div class="quick-quiz-box" id="quickQuizSection">
          <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="fw-bold text-dark mb-0 d-flex align-items-center gap-2">
            <i class="bi bi-bullseye"></i> Uji Cepat Pemahaman Kamu!
            </h5>
            <span class="badge bg-warning text-dark fw-bold rounded-pill">Tantangan Modul</span>
          </div>
          <p class="fw-bold text-secondary mb-3 fs-6">
            <?= htmlspecialchars($activeModul['quiz']['question']) ?>
          </p>
          <div class="quiz-options-list">
            <?php foreach ($activeModul['quiz']['options'] as $idx => $opt): ?>
              <div class="quick-quiz-option" onclick="answerQuickQuiz(this, <?= $opt['correct'] ? 'true' : 'false' ?>, '<?= addslashes($activeModul['quiz']['explanation']) ?>')">
                <span class="badge bg-light text-dark border rounded-circle p-2" style="width: 28px; height: 28px; display: inline-flex; align-items: center; justify-content: center;">
                  <?= chr(65 + $idx) ?>
                </span>
                <span><?= htmlspecialchars($opt['text']) ?></span>
              </div>
            <?php endforeach; ?>
          </div>
          <div id="quickFeedback" class="mt-3 p-3 rounded-3 d-none fw-bold small"></div>
        </div>

        <!-- Section 6: Rangkuman Catatan Detektif Cilik -->
        <div class="summary-card golden-summary-card mt-4 p-4 rounded-4" id="goldenSummary">
          <h5 class="fw-bold mb-3 d-flex align-items-center gap-2">
              <i class="bi bi-journal-text"></i> Catatan Emas Detektif Cilik (Rangkuman):
          </h5>
          <ul class="mb-0 ps-3">
            <?php foreach ($activeModul['summary'] as $sumPoint): ?>
              <li class="mb-2"><?= htmlspecialchars($sumPoint) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <!-- Bottom Navigation Stepper -->
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4 pt-3 border-top">
          <?php if ($prevModulId): ?>
            <a href="materi.php?modul=<?= $prevModulId ?>" class="nav-step-btn nav-step-prev">
              <i class="bi bi-arrow-left"></i> Modul Sebelumnya
            </a>
          <?php else: ?>
            <a href="index.php" class="nav-step-btn nav-step-prev">
              <i class="bi bi-house-door-fill"></i> Halaman Utama
            </a>
          <?php endif; ?>

          <div class="text-center d-none d-md-block">
            <span class="text-muted small">Kemajuan Belajar:</span>
            <div class="fw-bold text-success"><?= $currentModulId ?> / <?= count($modules) ?> Modul Selesai</div>
          </div>

          <?php if ($nextModulId): ?>
            <a href="materi.php?modul=<?= $nextModulId ?>" class="nav-step-btn nav-step-next" onclick="markModulComplete(<?= $currentModulId ?>)">
              Lanjut ke <?= $modules[$nextModulId]['badge'] ?> <i class="bi bi-arrow-right"></i>
            </a>
          <?php else: ?>
            <a href="kuis.php" class="nav-step-btn nav-step-next" onclick="markModulComplete(<?= $currentModulId ?>)">
            Semua Modul Selesai! Main Kuis Games <i class="bi bi-trophy-fill"></i>
            </a>
          <?php endif; ?>
        </div>

      </div>
    </div>
</main>

<?php
ob_start();
?>
<script>
    AOS.init({ duration: 600, once: true });

    // Track completed modules in localStorage
    const currentModId = <?= $currentModulId ?>;
    function markModulComplete(id) {
      SoundEffects.playCorrect();
      try {
        let completed = JSON.parse(localStorage.getItem('materi_completed')) || [];
        if (!completed.includes(id)) {
          completed.push(id);
          localStorage.setItem('materi_completed', JSON.stringify(completed));
        }
      } catch (e) {}
    }

    // Quick quiz interactive answering
    let answered = false;
    function answerQuickQuiz(elem, isCorrect, explanation) {
      if (answered) return;
      answered = true;
      const feedback = document.getElementById('quickFeedback');
      feedback.classList.remove('d-none');

      if (isCorrect) {
        elem.classList.add('correct');
        feedback.className = 'mt-3 p-3 rounded-3 fw-bold small bg-success-subtle text-success border border-success-subtle';
        feedback.innerHTML = `<i class="bi bi-check-circle-fill me-1"></i><strong>Jawaban Kamu Benar!</strong><br>${explanation}`;
        SoundEffects.playCorrect();
      } else {
        elem.classList.add('wrong');
        feedback.className = 'mt-3 p-3 rounded-3 fw-bold small bg-danger-subtle text-danger border border-danger-subtle';
        feedback.innerHTML = `<i class="bi bi-x-circle-fill me-1"></i><strong>Kurang Tepat!</strong><br>${explanation}`;
        SoundEffects.playWrong();
      }
    }

    // Micro interactive functions for modules
    function renderLabResult(image, label, heading, explanation) {
      return `
        <div class="lab-result-visual">
          <img src="${image}" alt="${label}">
          <div class="lab-result-copy">
            <div class="fw-bold text-success mb-1">${heading}</div>
            <div class="text-dark fw-semibold">${explanation}</div>
          </div>
        </div>`;
    }

    function checkBio(type, info, image, label) {
      SoundEffects.playPop();
      const res = document.getElementById('bioResult');
      res.innerHTML = renderLabResult(image, label, `${label} · ${type}`, info);
    }

    function simulateBalance(mode, image, label) {
      SoundEffects.playPop();
      const res = document.getElementById('balanceResult');
      let explanation = '';
      if (mode === 'ular_katak') {
        explanation = 'Ketika katak habis diburu, populasi serangga dan keong melonjak. Akibatnya daun teratai dan tanaman padi lebih banyak dimakan hama.';
      } else if (mode === 'teratai_mati') {
        explanation = 'Teratai adalah produsen utama. Jika mati terkena limbah, keong dan ikan kecil kehilangan makanan serta tempat berlindung.';
      } else {
        explanation = 'Produsen tersedia, herbivora terkendali, dan predator menjaga kestabilan sehingga rantai makanan berjalan harmonis.';
      }
      res.innerHTML = renderLabResult(image, label, label, explanation);
    }

    let actionCount = 0;
    function checkActionPoints() {
      SoundEffects.playPop();
      let total = 0;
      if (document.getElementById('act1')?.checked) total++;
      if (document.getElementById('act2')?.checked) total++;
      if (document.getElementById('act3')?.checked) total++;
      const badge = document.getElementById('actionBadge');
      if (total === 3) {
        badge.innerHTML = '<i class="bi bi-award-fill me-1"></i><strong>Luar Biasa!</strong> Kamu resmi menjadi Pahlawan Lahan Basah Hijau Sejati!';
        SoundEffects.playFanfare();
      } else {
        badge.innerHTML = `Hebat! Kamu telah memilih ${total} aksi ramah lingkungan.`;
      }
    }



  </script>
<?php
$extraScripts = ob_get_clean();
require __DIR__ . '/partials/footer.php';
