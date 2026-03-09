<!DOCTYPE html>
<html lang="ro">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TaskManager - Creare Task</title>
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
		.card-create {
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
		.btn-submit {
			background: var(--tm-yellow);
			color: var(--tm-indigo-dark);
			font-weight: 600;
			border-radius: 2rem;
			transition: box-shadow 0.2s;
			box-shadow: 0 2px 8px rgba(58,154,255,0.12);
		}
		.btn-submit:hover {
			background: #e6f700;
			color: var(--tm-indigo);
			box-shadow: 0 4px 16px rgba(58,154,255,0.18);
		}
		label {
			font-weight: 500;
			color: var(--tm-indigo-dark);
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
		<div class="card card-create p-4 w-100" style="max-width: 480px;">
			<h2 class="mb-4 text-center text-primary">Creare Task Nou</h2>
			<form method="POST" action="/">
				@csrf
				<div class="mb-3">
					<label for="nume" class="form-label">Nume Task</label>
					<input type="text" class="form-control" id="nume" name="nume" required placeholder="Introdu numele taskului">
				</div>
				<div class="mb-3">
					<label for="descriere" class="form-label">Descriere</label>
					<textarea class="form-control" id="descriere" name="descriere" rows="3" required placeholder="Descriere scurtă"></textarea>
				</div>
				<div class="mb-4">
					<label for="stare" class="form-label">Stare</label>
					<select class="form-select" id="stare" name="stare" required>
						<option value="In curs">In curs</option>
						<option value="Finalizata">Finalizata</option>
						<option value="Anulata">Anulata</option>
					</select>
				</div>
				<div class="d-flex gap-2">
					<button type="submit" class="btn btn-submit flex-fill">Finalizează Crearea</button>
					<a href="/" class="btn btn-back flex-fill">Înapoi</a>
				</div>
			</form>
		</div>
	</div>

	<script>
		// Animate card on load
		document.addEventListener('DOMContentLoaded', function() {
			const card = document.querySelector('.card-create');
			if(card) card.style.animationDelay = '0.1s';
		});
	</script>
</body>
</html>
