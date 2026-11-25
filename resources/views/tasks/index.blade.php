<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DevOps Task Manager — ELIA KHOLIFATUS SAADAH</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.75);
            --card-border: rgba(255, 255, 255, 0.1);
            --primary: #ef4444;
            --accent: #38bdf8;
            --success: #10b981;
            --warning: #f59e0b;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --font-sans: 'Plus Jakarta Sans', system-ui, sans-serif;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: var(--font-sans); background-color: var(--bg-dark); color: var(--text-main); min-height: 100vh; padding: 2rem 1.5rem; line-height: 1.6; }
        .container { max-width: 1000px; margin: 0 auto; display: flex; flex-direction: column; gap: 2rem; }

        .header { display: flex; justify-content: space-between; align-items: center; background: var(--card-bg); padding: 1.5rem; border-radius: 16px; border: 1px solid var(--card-border); }
        .header h1 { font-size: 1.5rem; font-weight: 800; }
        .btn-back { color: var(--accent); text-decoration: none; font-weight: 600; font-size: 0.9rem; }

        .card { background: var(--card-bg); border: 1px solid var(--card-border); border-radius: 16px; padding: 1.75rem; }
        .card h2 { font-size: 1.2rem; font-weight: 700; margin-bottom: 1rem; }

        form { display: flex; flex-direction: column; gap: 1rem; }
        input, textarea, select { background: rgba(15, 23, 42, 0.8); border: 1px solid var(--card-border); color: white; padding: 0.75rem 1rem; border-radius: 8px; font-family: inherit; }
        button { background: var(--primary); color: white; border: none; padding: 0.8rem 1.5rem; border-radius: 8px; font-weight: 700; cursor: pointer; }

        .task-list { display: flex; flex-direction: column; gap: 1rem; margin-top: 1rem; }
        .task-item { background: rgba(15, 23, 42, 0.6); border: 1px solid var(--card-border); padding: 1.25rem; border-radius: 12px; display: flex; justify-content: space-between; align-items: center; }

        .badge { font-size: 0.75rem; font-weight: 700; padding: 0.25rem 0.65rem; border-radius: 20px; text-transform: uppercase; }
        .badge.pending { background: rgba(245, 158, 11, 0.2); color: var(--warning); }
        .badge.in_progress { background: rgba(56, 189, 248, 0.2); color: var(--accent); }
        .badge.completed { background: rgba(16, 185, 129, 0.2); color: var(--success); }

        .alert-success { background: rgba(16, 185, 129, 0.2); color: var(--success); border: 1px solid rgba(16, 185, 129, 0.4); padding: 0.75rem 1rem; border-radius: 8px; font-weight: 600; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>📋 DevOps Task Manager (Fitur 1 - Eloquent ORM)</h1>
                <span style="font-size: 0.85rem; color: var(--text-muted);">Pengembang: ELIA KHOLIFATUS SAADAH</span>
            </div>
            <a href="/" class="btn-back">← Kembali ke Dashboard</a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                ✓ {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <h2>➕ Tambah Tugas DevOps Baru</h2>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Judul Tugas (misal: Deploy Container Staging)" required>
                <textarea name="description" placeholder="Deskripsi Tugas..." rows="2"></textarea>
                <input type="text" name="assigned_to" value="ELIA KHOLIFATUS SAADAH" placeholder="Penanggung Jawab">
                <button type="submit">+ Simpan Tugas (Eloquent ORM)</button>
            </form>
        </div>

        <div class="card">
            <h2>📑 Daftar Tugas Aktif ({{ $tasks->count() }})</h2>
            <div class="task-list">
                @forelse($tasks as $task)
                    <div class="task-item">
                        <div>
                            <h3 style="font-size: 1.1rem; font-weight: 700;">{{ $task->title }}</h3>
                            <p style="font-size: 0.85rem; color: var(--text-muted);">{{ $task->description }}</p>
                            <span style="font-size: 0.75rem; color: var(--accent);">Assigned to: {{ $task->assigned_to }}</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 0.75rem;">
                            <span class="badge {{ $task->status }}">{{ str_replace('_', ' ', $task->status) }}</span>

                            <form action="{{ route('tasks.updateStatus', $task) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" style="padding: 0.35rem 0.5rem; font-size: 0.8rem;">
                                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </form>

                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: rgba(239,68,68,0.2); color: var(--primary); padding: 0.35rem 0.6rem; font-size: 0.8rem;">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p style="color: var(--text-muted); text-align: center; padding: 1.5rem;">Belum ada tugas. Tambahkan tugas baru di atas!</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
