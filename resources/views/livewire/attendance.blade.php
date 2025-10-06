<div>
    <div class="container mx-auto">
        <div class="bg-white p-6 rounded-lg mt-3 shadow-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Informasi Pegawai</h2>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <p><strong>Nama Pegawai: </strong>{{ Auth::user()->name }}</p>
                        <p><strong>Kantor: </strong>Kantor Utama</p>
                        <p><strong>Shift: </strong>Pagi</p>
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-bold mb-2">Attendance</h2>
                    <div id="map" class="mb-4 rounded-lg border border-gray-300"></div>
                    <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded">Tag Location</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const map = L.map('map').setView([51.505, -0.09], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    </script>
</div>
