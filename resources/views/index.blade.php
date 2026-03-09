
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskManager - Lista Taskuri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --tm-indigo-dark: #1C0770;
            --tm-indigo: #261CC1;
            --tm-blue: #3A9AFF;
            --tm-yellow: #F1FF5E;
        }
        body {
            background: linear-gradient(135deg, var(--tm-indigo-dark) 0%, var(--tm-blue) 100%);
            min-height: 100vh;
        }
        .navbar {
            background: var(--tm-indigo-dark);
        }
        .navbar-brand {
            color: var(--tm-yellow) !important;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .btn-create {
            background: var(--tm-yellow);
            color: var(--tm-indigo-dark);
            font-weight: 600;
            border-radius: 2rem;
            transition: box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(58,154,255,0.12);
        }
        .btn-create:hover {
            background: #e6f700;
            color: var(--tm-indigo);
            box-shadow: 0 4px 16px rgba(58,154,255,0.18);
        }
        .task-card {
            background: #fff;
            border: 2px solid var(--tm-blue);
            border-radius: 1.25rem;
            box-shadow: 0 4px 24px 0 rgba(28,7,112,0.08);
            transition: transform 0.3s cubic-bezier(.4,2,.6,1), box-shadow 0.3s;
            opacity: 0;
            transform: translateY(40px) scale(0.98);
            animation: fadeInUp 0.7s forwards;
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        .task-card .card-title {
            color: var(--tm-indigo-dark);
            font-weight: 700;
        }
        .task-card .badge {
            font-size: 0.95em;
            background: var(--tm-blue);
            color: #fff;
        }
        .task-card .timestamps {
            font-size: 0.85em;
            color: #888;
        }
        .btn-show {
            background: var(--tm-indigo);
            color: #fff;
            border-radius: 1.5rem;
            font-weight: 500;
            transition: background 0.2s;
        }
        .btn-show:hover {
            background: var(--tm-blue);
            color: #fff;
        }
        .btn-delete {
            background: #fff;
            color: var(--tm-indigo);
            border: 1.5px solid var(--tm-indigo);
            border-radius: 1.5rem;
            font-weight: 500;
            transition: background 0.2s, color 0.2s;
        }
        .btn-delete:hover {
            background: var(--tm-indigo);
            color: #fff;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">TaskManager</a>
            <div class="ms-auto">
                <a href="/create" class="btn btn-create px-4 py-2">Create</a>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="row g-4 justify-content-center">
            @if(isset($tasks) && count($tasks) > 0)
                @foreach($tasks as $task)
                    <div class="col-12 col-md-6 col-lg-3 d-flex align-items-stretch">
                        <div class="card task-card w-100 p-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge">#{{ $task->id }}</span>
                                <span class="badge">{{ ucfirst($task->stare) }}</span>
                            </div>
                            <h5 class="card-title mb-2">{{ $task->nume }}</h5>
                            <p class="card-text mb-3">{{ $task->descriere }}</p>
                            <div class="timestamps mb-3">
                                <div>Creat: {{ $task->created_at }}</div>
                                <div>Modificat: {{ $task->updated_at }}</div>
                            </div>
                            <div class="d-flex justify-content-between mt-auto gap-2">
                                <a href="/{{ $task->id }}" class="btn btn-show flex-fill">Show</a>
                                <a href="/{{ $task->id }}/delete" class="btn btn-delete flex-fill">Delete</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="alert alert-info text-center shadow-sm">
                        Nu există taskuri momentan.
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Animate cards on load
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.task-card');
            cards.forEach((card, i) => {
                card.style.animationDelay = (i * 0.08) + 's';
            });
        });
    </script>
</body>
</html>
