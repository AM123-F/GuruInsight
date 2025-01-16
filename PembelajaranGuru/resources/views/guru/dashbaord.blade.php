<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Dashboard Guru</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .stat-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px;
            color: #ffffff;
            border-radius: 10px;
            font-size: 1rem;
        }
        .stat-card i {
            font-size: 2rem;
        }
        .stat-card.bg-primary { background-color: #007bff; }
        .stat-card.bg-success { background-color: #28a745; }
        .stat-card.bg-warning { background-color: #ffc107; }
        .stat-card.bg-danger { background-color: #dc3545; }
        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            font-weight: bold;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <h1>Selamat Datang, [Nama Guru]!</h1>

        <!-- Statistik -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card bg-primary">
                    <div>
                        <h5>Jumlah Siswa</h5>
                        <h3>120</h3>
                    </div>
                    <i class="bi bi-people"></i>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-success">
                    <div>
                        <h5>Materi Diunggah</h5>
                        <h3>35</h3>
                    </div>
                    <i class="bi bi-book"></i>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-warning">
                    <div>
                        <h5>Jadwal Minggu Ini</h5>
                        <h3>5</h3>
                    </div>
                    <i class="bi bi-calendar-event"></i>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card bg-danger">
                    <div>
                        <h5>Tugas Belum Dinilai</h5>
                        <h3>8</h3>
                    </div>
                    <i class="bi bi-exclamation-circle"></i>
                </div>
            </div>
        </div>

        <!-- Daftar Tugas -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Tugas</h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Judul Tugas</th>
                            <th>Deadline</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tugas Matematika</td>
                            <td>20 Jan 2025</td>
                            <td><span class="badge bg-warning">Belum Dinilai</span></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Praktikum IPA</td>
                            <td>18 Jan 2025</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Essay Sejarah</td>
                            <td>22 Jan 2025</td>
                            <td><span class="badge bg-danger">Terlambat</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Aktivitas Terbaru -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Aktivitas Terbaru</h5>
                <ul class="list-group">
                    <li class="list-group-item">Mengunggah materi "Persamaan Kuadrat" pada kelas Matematika X.</li>
                    <li class="list-group-item">Menambahkan jadwal evaluasi kelas XI IPA.</li>
                    <li class="list-group-item">Mengoreksi tugas "Praktikum IPA" untuk kelas IX.</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
