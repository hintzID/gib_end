@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-8 py-12">
        <div class="border border-gray-900 p-12 bg-gray-100 rounded-lg shadow-lg">
            <h1 class="text-center text-3xl font-bold text-gray-900 mb-10">Formulir Pendaftaran Anggota PASKAS/GIB SOLO</h1>

            <!-- Form Tambah Calon Anggota -->
            <form action="{{ route('calon-anggota.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="text-gray-800">Email</label>
                    <input type="email" name="email"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded"
                        required>
                </div>

                <div class="mb-4">
                    <label for="nama_lengkap" class="text-gray-800">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded"
                        required>
                </div>

                <div class="mb-4">
                    <label for="gender" class="text-gray-800">Jenis Kelamin</label>
                    <select name="gender"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded"
                        required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tempat_lahir" class="text-gray-800">Kota Tempat Lahir</label>
                    <input type="text" name="tempat_lahir"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded"
                        required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_lahir" class="text-gray-800">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded"
                        required>
                </div>

                <div class="mb-4">
                    <label for="alamat_lengkap" class="text-gray-800">Alamat Lengkap</label>
                    <textarea name="alamat_lengkap"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="status" class="text-gray-800">Status</label>
                    <select name="status"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded"
                        required>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Single">Single (pernah menikah)</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="pekerjaan" class="text-gray-800">Pekerjaan</label>
                    <input type="text" name="pekerjaan"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded"
                        required>
                </div>

                <div class="mb-4">
                    <label for="no_hp" class="text-gray-800">No.Telp / WA</label>
                    <input type="text" name="no_hp"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded"
                        required>
                </div>

                <div class="mb-4">
                    <label for="pilihan_kontribusi" class="text-gray-800">Pilihan Kontribusi</label>
                    <select name="pilihan_kontribusi"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded"
                        required>
                        <option value="">Silahkan Dipilih</option>
                        <option value="Customer Service">Customer Service</option>
                        <option value="Media Konten Publikasi">Media Konten Publikasi</option>
                        <option value="Finance">Finance</option>
                        <option value="Fundraising">Fundraising</option>
                        <option value="Sumber Daya Manusia">Sumber Daya Manusia</option>
                        <option value="Tim Support Program">Tim Support Program</option>
                        <option value="Distribusi Infaq Beras">Distribusi Infaq Beras</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="organisasi_diikuti" class="text-gray-800">Komunitas / Organisasi yang Diikuti</label>
                    <textarea name="organisasi_diikuti"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="tentang_paskas" class="text-gray-800">Apa yang Diketahui tentang PASKAS/GIB</label>
                    <textarea name="tentang_paskas"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded" required></textarea>
                </div>

                <div class="mb-4">
                    <input type="checkbox" name="pilar_paskas" id="pilar_paskas" class="mr-2" value="true">
                    <label for="pilar_paskas" class="text-gray-800">Konfirmasi kemauan untuk melaksanakan pilar dakwah
                        PASKAS (Birrul Walidain, Membaca Al Qur'an 1 hari 1 halaman, Sholat Tepat Awal Waktu dan
                        INSPIRING—infaq sering-sering)</label>
                </div>


                <div class="mb-4">
                    <label for="doa_harapan" class="text-gray-800">Do’a dan Harapan terhadap PASKAS</label>
                    <textarea name="doa_harapan"
                        class="block w-full py-2 px-3 mt-1 text-base text-gray-800 bg-white border border-gray-300 rounded" required></textarea>
                </div>

                <div class="flex mt-10">
                    <button type="submit"
                        class="px-6 py-2 font-semibold text-white bg-blue-600 rounded hover:bg-blue-800">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
