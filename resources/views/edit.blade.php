<!DOCTYPE html>
<html lang="ro">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TaskManager - Vizualizare/Editare Task</title>
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
		.btn-back {
			background: var(--tm-indigo);
			color: #fff;
			border-radius: 2rem;
			font-weight: 600;
			transition: background 0.2s;
		}
		.btn-back:hover {
			background: var(--tm-blue);
			color: #fff;
		}
		.card-show {
			background: #fff;
			border: 2px solid var(--tm-blue);
			border-radius: 1.25rem;
			box-shadow: 0 4px 24px 0 rgba(28,7,112,0.08);
			animation: fadeInUp 0.7s forwards;
			opacity: 0;
			transform: translateY(40px) scale(0.98);
		}
		@keyframes fadeInUp {
			to {
				opacity: 1;
				transform: translateY(0) scale(1);
			}
		}
		.btn-save {
			background: var(--tm-yellow);
			color: var(--tm-indigo-dark);
			font-weight: 600;
			border-radius: 2rem;
			transition: box-shadow 0.2s;
			box-shadow: 0 2px 8px rgba(58,154,255,0.12);
		}
		.btn-save:hover {
			background: #e6f700;
			color: var(--tm-indigo);
			box-shadow: 0 4px 16px rgba(58,154,255,0.18);
		}
		.btn-delete {
			background: #fff;
			color: var(--tm-indigo);
			border: 1.5px solid var(--tm-indigo);
			border-radius: 2rem;
			font-weight: 600;
			transition: background 0.2s, color 0.2s;
		}
		.btn-delete:hover {
			background: var(--tm-indigo);
			color: #fff;
		}
		label {
			font-weight: 500;
			color: var(--tm-indigo-dark);
		}
		.timestamps {
			font-size: 0.85em;
			color: #888;
		}
	</style>
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg shadow-sm mb-4">
		<div class="container">
			<a class="navbar-brand" href="/">TaskManager</a>
		</div>
	</nav>

	<div class="container d-flex justify-content-center align-items-center min-vh-100">
		<div class="card card-show p-4 w-100" style="max-width: 480px;">
			<h2 class="mb-4 text-center text-primary">Vizualizare/Editare Task</h2>
			@if(isset($task))
			<form method="POST" action="/{{ $task->id }}/update">
				@csrf
				<div class="mb-3">
					<label for="nume" class="form-label">Nume Task</label>
					<input type="text" class="form-control" id="nume" name="nume" required value="{{ $task->nume }}">
				</div>
				<div class="mb-3">
					<label for="descriere" class="form-label">Descriere</label>
					<textarea class="form-control" id="descriere" name="descriere" rows="3" required>{{ $task->descriere }}</textarea>
				</div>
				<div class="mb-4">
					<label for="stare" class="form-label">Stare</label>
					<select class="form-select" id="stare" name="stare" required>
						<option value="In curs" @if($task->stare=='In curs') selected @endif>In curs</option>
						<option value="Finalizata" @if($task->stare=='Finalizata') selected @endif>Finalizata</option>
						<option value="Anulata" @if($task->stare=='Anulata') selected @endif>Anulata</option>
					</select>
				</div>
				<div class="timestamps mb-3">
					<div>Creat: {{ $task->created_at }}</div>
					<div>Modificat: {{ $task->updated_at }}</div>
				</div>
				<div class="d-flex gap-2">
					<button type="submit" class="btn btn-save flex-fill">Finalizează Editarea</button>
					<a href="/" class="btn btn-back flex-fill">Înapoi</a>
					<a href="/{{ $task->id }}/delete" class="btn btn-delete flex-fill">Delete</a>
				</div>
			</form>
			@else
				<div class="alert alert-danger text-center shadow-sm">Task-ul nu a fost găsit.</div>
			@endif
		</div>
	</div>

	<script>
		// Animate card on load
		document.addEventListener('DOMContentLoaded', function() {
			const card = document.querySelector('.card-show');
			if(card) card.style.animationDelay = '0.1s';
		});
	</script>
</body>
</html>
