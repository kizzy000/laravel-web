<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
</head>
<body>
    <h2>Data Pegawai</h2>

    <p><b>Nama:</b> {{ $name }}</p>
    <p><b>Umur:</b> {{ $my_age }} tahun</p>
    <p><b>Hobi:</b> {{ implode(', ', $hobbies) }}</p>
    <p><b>Tanggal Harus Wisuda:</b> {{ $tgl_harus_wisuda }}</p>
    <p><b>Waktu tersisa untuk wisuda:</b> {{ $time_to_study_left }}</p>
    <p><b>Semester Saat Ini:</b> {{ $current_semester }}</p>
    <p><b>Motivasi:</b> {{ $motivasi }}</p>
    <p><b>Cita-cita:</b> {{ $future_goal }}</p>
</body>
</html>
