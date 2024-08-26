<div class="row w-100 mb-5 mx-0">
    {{-- Content 1 --}}
    <div class="col-lg-4 p-0">
        <div class="card">
            <div class="py-5 px-5 d-flex rounded shadow-sm">
                <div class="d-flex align-items-top">
                    <i class="bi bi-book-half" style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="mb-0">{{ $scheduleOfSubject->course->name }}</h3>
                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Mata
                        Pelajaran</p>
                </div>
            </div>
        </div>
        <div class="card mt-2 w-100">
            <div class="py-5 px-5 d-flex rounded shadow-sm">
                <div class="d-flex align-items-top">
                    <i class="bi bi-signpost-split" style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="mb-0">{{ $scheduleOfSubject->classroom->name }}</h3>
                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Kelas
                    </p>
                </div>
            </div>
        </div>
    </div>
    {{-- Content 2 --}}
    <div class="col-lg-4 px-2">
        <div class="card mt-2 mt-lg-0">
            <div class="py-5 px-5 d-flex rounded shadow-sm">
                <div class="d-flex align-items-top">
                    <i class="bi bi-person-circle" style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="mb-0">
                        {{ GlobalHelper::limitText($scheduleOfSubject->teacher->user->name) }}</h3>
                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Guru
                    </p>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="py-5 px-5 d-flex rounded shadow-sm">
                <div class="d-flex align-items-top">
                    <i class="bi bi-clock-fill" style="font-size: 28px; margin-right: 10px; color: #1fb082;"></i>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="mb-0">{{ $scheduleOfSubject->start_time }}</h3>
                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Jam
                        Masuk</p>
                </div>
            </div>
        </div>
    </div>
    {{-- Content 3 --}}
    <div class="col-lg-4 p-0">
        <div class="card mt-2 mt-lg-0">
            <div class="py-5 px-5 d-flex rounded shadow-sm">
                <div class="d-flex align-items-top">
                    <i class="bi bi-calendar-event" style="font-size: 28px; margin-right: 10px; color: #1fb082; "></i>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="mb-0">{{ $scheduleOfSubject->day }}</h3>
                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Hari
                    </p>
                </div>
            </div>
        </div>
        <div class="card mt-2">
            <div class="py-5 px-5 d-flex rounded shadow-sm">
                <div class="d-flex align-items-top">
                    <i class="bi bi-clock" style="font-size: 28px; margin-right: 10px; color: #1fb082; "></i>
                </div>
                <div class="d-flex flex-column justify-content-center">
                    <h3 class="mb-0">{{ $scheduleOfSubject->end_time }}</h3>
                    <p class="mb-0 light-mode dark-mode" style="color: #a7a7b8;">Jam
                        Keluar</p>
                </div>
            </div>
        </div>
    </div>
</div>
