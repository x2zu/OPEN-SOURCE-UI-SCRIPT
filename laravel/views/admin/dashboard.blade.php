<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
</head>

<body>

    <div>
        <h2>Dashboard Admin</h2>
        <a href="/admin/logout">Logout</a>
    </div>

    <hr>

    <div>
        <h3>Login Berhasil!</h3>
        <p>Selamat datang di sistem aspirasi sarana sekolah.</p>
    </div>

    <h3>Dashboard Admin - Aspirasi Siswa</h3>

    @if (session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Petugas</th>
                <th>Respon Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($aspirations as $a)
                <tr align="center">

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $a->nama }}</td>

                    <td>{{ $a->kelas }}</td>

                    <td>{{ $a->category->nama_kategori }}</td>

                    <td>

                        <form method="POST" action="/admin/aspirasi/{{ $a->id }}">
                            @csrf

                            <select name="status">
                                <option value="Menunggu" {{ $a->status == 'Menunggu' ? 'selected' : '' }}>Menunggu
                                </option>
                                <option value="Proses" {{ $a->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                                <option value="Selesai" {{ $a->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>

                    </td>

                    <td>

                        {{ $a->admin->username ?? '-' }}

                    </td>

                    <td>

                        <textarea name="respon_admin" rows="2" cols="25">{{ $a->respon_admin }}</textarea>

                    </td>

                    <td>

                        <button type="submit">Simpan</button>

                        </form>

                        <form action="/admin/aspirasi/{{ $a->id }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit">Hapus</button>

                        </form>

                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
