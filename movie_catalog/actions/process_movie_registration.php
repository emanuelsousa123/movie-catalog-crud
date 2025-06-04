<?php
    require_once '../includes/config.php';

    $title_film = $_POST['title_film'];
    $synopsis_film = $_POST['synopsis_film'];
    $review_film = $_POST['review_film'];
    $year_film = $_POST['year_film'];
    $review_score_film = $_POST['review_score_film'];
    $name_genre = $_POST['name_genre'];
    
    $sql = $conexao->prepare("INSERT INTO genres (name) VALUES (:name_genre)");
    $sql->bindValue(':name_genre',$name_genre);
    $sql->execute();
    $genre_id = $conexao->lastInsertId();

    

    $sql2 = $conexao->prepare('INSERT INTO films (title,synopsis,review,year,review_score,genres_id) VALUES (:title_film,:synopsis_film,:review_film,:year_film,:review_score_film,:genre_id)');
    $sql2->bindValue(':title_film',$title_film);
    $sql2->bindValue(':synopsis_film',$synopsis_film);
    $sql2->bindValue(':review_film',$review_film);
    $sql2->bindValue(':year_film',$year_film);
    $sql2->bindValue(':review_score_film',$review_score_film);
    $sql2->bindValue(':genre_id',$genre_id);

    $sql2->execute();

    echo 'filme cadastrado';

    $sql3 = $conexao->prepare("
    SELECT 
        films.*, 
        genres.name AS genre_name
    FROM films
    JOIN genres ON films.genres_id = genres.id
    ");
    $sql3->execute();
    $filmes = $sql3->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Lista de Filmes</title>
</head>
<body>
  <h1>Filmes cadastrados</h1>

  <table border="1" cellpadding="8" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>Título</th>
      <th>Sinopse</th>
      <th>Crítica</th>
      <th>Imagem</th>
      <th>Ano</th>
      <th>Nota</th>
      <th>Status</th>
      <th>ID do Usuário</th>
      <th>Gênero</th>
    </tr>

    <?php foreach ($filmes as $filme): ?>
      <tr>
        <td><?= $filme['id'] ?></td>
        <td><?= htmlspecialchars($filme['title']) ?></td>
        <td><?= nl2br(htmlspecialchars($filme['synopsis'])) ?></td>
        <td><?= nl2br(htmlspecialchars($filme['review'])) ?></td>
        <td>
          <?php if ($filme['image_url']): ?>
            <img src="<?= htmlspecialchars($filme['image_url']) ?>" alt="Imagem" width="80">
          <?php else: ?>
            (sem imagem)
          <?php endif; ?>
        </td>
        <td><?= $filme['year'] ?></td>
        <td><?= $filme['review_score'] ?></td>
        <td><?= $filme['status'] == 1 ? 'Ativo' : 'Inativo' ?></td>
        <td><?= $filme['users_id'] ?></td>
        <td><?= htmlspecialchars($filme['genre_name']) ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
