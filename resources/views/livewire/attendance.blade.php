<div>
    <div class="container mx-auto max-w-md">
        <div class="bg-white p-6 rounded-lg mt-3 shadow-lg">
            <div class="grid grid-cols-1 gap-6 mb-6">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Informasi Pegawai</h2>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <p><strong>Nama Pegawai: </strong>{{ Auth::user()->name }}</p>
                        <p><strong>Kantor: </strong>{{ $schedule->office->name }}</p>
                        <p><strong>Shift: </strong>{{ $schedule->shift->name }} ({{ $schedule->shift->start_time }} -
                            {{ $schedule->shift->end_time }})</p>
                        <p><strong>Status: </strong>{{ $schedule->is_wfa ? 'WFA' : 'WFO' }}</p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <h4 class="text-l font-bold mb-2">Jam Masuk</h4>
                            <p><strong>{{ $attendance->start_time ?? '-' }}</strong></p>
                        </div>
                        <div class="bg-gray-100 p-4 rounded-lg">
                            <h4 class="text-l font-bold mb-2">Jam Pulang</h4>
                            <p><strong>{{ $attendance->end_time ?? '-' }}</strong></p>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="text-2xl font-bold mb-2">Attendance</h2>
                    <div id="map" class="mb-4 rounded-lg border border-gray-300" wire:ignore></div>
                    <form class="row g-3" wire:submit="store" enctype="multipart/form-data">
                        <button type="button" onclick="getLocation()"
                            class="px-4 py-2 bg-blue-500 text-white rounded">Tag
                            Location</button>
                        @if ($isInRadius)
                            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Submit
                                Attendance</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let map;
        let lat;
        let lng;
        const office = [{{ $schedule->office->latitude }}, {{ $schedule->office->longitude }}];
        const radius = {{ $schedule->office->radius }};
        let component;
        let marker;

        document.addEventListener('livewire:initialized', function() {
            component = @this;
            map = L.map('map').setView(office, 20);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

            const circle = L.circle(office, {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: radius
            }).addTo(map);
        })

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    lat = position.coords.latitude;
                    lng = position.coords.longitude;

                    if (marker) {
                        map.removeLayer(marker);
                    }

                    marker = L.marker([lat, lng]).addTo(map);
                    map.setView([lat, lng], 20);

                    if (isInRadius(lat, lng, office, radius)) {
                        component.set('isInRadius', true);
                        component.set('latitude', lat);
                        component.set('longitude', lng);
                    }
                })
            }
        }

        function isInRadius(latitude, longitude, center, radius) {
            const isWfa = {{ $schedule->is_wfa }};
            if (isWfa) {
                return true;
            } else {
                let distance = map.distance([latitude, longitude], center);
                return distance <= radius;
            }
        }
    </script>
</div>
