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
              <span class="badge rounded-pill bg-danger ms-auto">5</span>
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

            <!-- Bloc 1 : Info tapée -->
            <div class="custom-card">
    <h5><i class="bx bx-keyboard custom-icon"></i> Info tapée</h5>
    <table class="custom-table">
        <thead>
            <tr>
                <th>UID</th>
                <th>Texte tapé</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "db.php"; // Inclut la connexion à la base de données

            // Requête pour récupérer les données de keylog_data
            $sql = "SELECT uid, key_stroke FROM keylog_data ORDER BY uid DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Parcourt chaque ligne de résultat
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['uid']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['key_stroke']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Aucune donnée disponible.</td></tr>";
            }

            $conn->close(); // Ferme la connexion
            ?>
        </tbody>
    </table>
</div>
<!-- Bloc 2 : Fichiers -->
<div class="custom-card">
              <h5><i class="bx bx-folder custom-icon"></i> Fichiers</h5>
            </div>

            <!-- Bloc 3 : Mots de passe -->
            <div class="custom-card">
              <h5><i class="bx bx-lock custom-icon"></i> Mots de passe</h5>
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
