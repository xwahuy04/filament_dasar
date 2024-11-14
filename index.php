<?php include 'includes/header.php'; ?>
<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$pagePath = 'content/' . $page . '.php';
if (file_exists($pagePath)) {
include $pagePath;
} else {
echo "<h1>404 - Page Not Found</h1>";
}
?>
</main>
</div>
<footer>
<p>&copy; 2024 Website Dinamis</p>
<footer>
 
    </div>
 
</footer>

</footer>
<script src="js/script.js"></script>
</body>

