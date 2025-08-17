<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jolly Forms</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f8f9fa; }
    .form-container {
      max-width: 600px; margin: 50px auto;
      background: #fff; padding: 30px;
      border-radius: 15px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h1 { text-align: center; margin-bottom: 25px; color: #0d6efd; }
  </style>
</head>
<body>

<div class="container">
  <div class="form-container">
    <h1>Jolly Forms</h1>
    <form id="form1" method="POST" action="save.php">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name"   pattern="[A-Za-z\s]+" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Tower</label>
        <input type="text" class="form-control" name="tower" pattern="[A-Ma-m\s]+" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Flat No</label>
        <input type="text" class="form-control" name="flatno" required pattern="[0-9]+">
      </div>

      <div class="mb-3">
        <label class="form-label">Games (select at least one)</label>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="games[]" value="Solo dance">
          <label class="form-check-label">Solo Dance</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="games[]" value="Group dance">
          <label class="form-check-label">Group Dance</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="games[]" value="Quiz game">
          <label class="form-check-label">Quiz Game</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="games[]" value="Suro ka sarthash">
          <label class="form-check-label">Suro ka Sarthash</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="games[]" value="Squid games">
          <label class="form-check-label">Squid Games</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="games[]" value="Other">
          <label class="form-check-label">Other</label>
        </div>
      </div>

      <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
  </div>
</div>

<script>
  document.getElementById("form1").addEventListener("submit", function(e) {
    const checkboxes = document.querySelectorAll("input[name='games[]']:checked");
    if (checkboxes.length === 0) {
      e.preventDefault();
      alert("Please select at least one game!");
    }
  });
</script>

</body>
</html>
