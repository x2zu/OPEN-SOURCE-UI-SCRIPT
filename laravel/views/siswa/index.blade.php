<!DOCTYPE html>
<html>

<head>
    <title>Aspirasi Sarana Sekolah</title>
</head>

<body>
    <h2>Form Aspirasi Siswa</h2>
    <form method="POST" action="/aspirasi">
        @csrf
        <fieldset>
            <legend>Data Siswa</legend>
            NIS:<br>
            <input type="text" name="nis" required><br><br>
            Nama:<br>
            <input type="text" name="nama" required><br><br>
            Kelas:<br>
            <input type="text" name="kelas" required><br><br>
            Kategori:<br>
            <select name="category_id" required>
                <option disabled selected>Pilih Kategori</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                @endforeach
            </select><br><br>
            Lokasi:<br>
            <input type="text" name="lokasi" required><br><br>
            Keterangan:<br>
            <textarea name="keterangan" rows="3" required></textarea><br><br>
            <button type="submit">Kirim Aspirasi</button>
        </fieldset>
    </form>
    <br>
    <table border="2" cellpadding="6" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>NIS</th>
                <th>Kategori</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Respon Admin</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($aspirations as $a)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td>
                    <td>{{ $a->created_at->format('d-m-Y') }}</td>
                    <td>{{ $a->nis }}</td>
                    <td>{{ $a->category->nama_kategori }}</td>
                    <td>{{ $a->lokasi }}</td>
                    <td align="center">{{ $a->status }}</td>
                    <td>{{ $a->respon_admin ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</body>

</html>
