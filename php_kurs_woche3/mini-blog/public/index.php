<?php
    require_once  __DIR__ . '/header.php';
    require_once  dirname(__DIR__) . '/inc/functions.php';

    

    // echo '<pre>', print_r( $posts ), '</pre>';
    $posts = getAllPosts($pdo);
    $filteredPosts = $posts; 
    $filter = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $filter = $_POST['filter'] ?? null;
        //echo '<pre>', print_r( $filter, true ), '</pre>';
        //echo '<pre>', print_r( $posts ), '</pre>';

        if ($filter !== null && $filter !== '') {
        if ($filter === "alle") {
            // "alle" = แสดงทุกโพสต์
            $filteredPosts = $posts;
        } else {
            // Filter with PHP
            $filteredPosts = array_filter($posts, function($p) use ($filter) {
                return $p->categ_name === $filter;
            });
        }
        }
    }

?>

    <?php include_once __DIR__ . '/nav.php' ?>
    <main class="container">
        <h2>Startseite</h2>
        
        <section class="card">
            <h4>Filter:</h4>
            <form action="<?= $_SERVER['SCRIPT_NAME'] ?>"  method="post">
                <div style="display: flex;">
                    <select name="filter" id="filter">
                        <option value="alle" <?= ($filter === "alle") ? 'selected' : '' ?>>Alle</option>
                        <?php foreach ($posts as $p): ?>
                            <option value="<?= safe($p->categ_name) ?>" <?= ($filter === $p->categ_name) ? 'selected' : '' ?>>
                                <?= safe($p->categ_name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit">suchen</button>
                </div>
            </form>
        </section>
        <div style="display: flex; flex-direction: row-reverse; margin: 1rem 0 1rem 0;">
            <a href="index.php" class="button">Create</a>
        </div>
        <section class="card">
            <table>
                <thead>
                    <tr>
                        <th>Titel</th>
                        <th>Kategorie</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($filteredPosts as $p): ?>
                        <tr>
                            <td>
                                <?= (int)$p->posts_id . '. ' ?>
                                <a href="post_single.php?id=<?= (int)$p->posts_id ?>">
                                    <?= safe($p->posts_header) ?>
                                </a>
                            </td>
                            <td><?= safe($p->categ_name) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>    
<?php include_once __DIR__ . '/footer.php' ?>