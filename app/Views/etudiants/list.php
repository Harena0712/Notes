<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

    <div class="content">

      <div class="page-header">
        <div>
          <h2>Liste des étudiants</h2>
          <div class="breadcrumb">Accueil / <span>Étudiants</span></div>
        </div>
        <div style="display:flex;gap:10px">
          <button class="btn btn-secondary btn-sm">
            <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Exporter
          </button>
          <a href="/etudiants/create" class="btn btn-primary btn-sm">
            <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Nouvel étudiant
          </a>
        </div>
      </div>

      <!-- Toolbar filtres -->
      <div class="toolbar">
        <div class="toolbar-left">
          <div class="search-box">
            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <input type="text" placeholder="Rechercher un étudiant…" />
          </div>
          <select class="filter-select">
            <option>Tous les parcours</option>
            <option>Informatique</option>
            <option>Gestion</option>
            <option>Commerce</option>
          </select>
          <select class="filter-select">
            <option>Tous les statuts</option>
            <option>Inscrit</option>
            <option>Suspendu</option>
            <option>Diplômé</option>
          </select>
          <select class="filter-select">
            <option>Toutes les années</option>
            <option>1ère année</option>
            <option>2ème année</option>
            <option>3ème année</option>
          </select>
        </div>
        <button class="btn btn-ghost btn-sm">
          <svg viewBox="0 0 24 24"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
          Filtres avancés
        </button>
      </div>

      <!-- Tableau -->
      <div class="table-card">
        <table>
          <thead>
            <tr>
              <th class="td-check"><input type="checkbox" /></th>
              <th class="sortable">Nom ▲</th>
              <th class="sortable">Prénom</th>
              <th class="sortable">Date de naissance</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php if (!empty($etudiants)): ?>
              <?php 
                $perPage = 10;
                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $start = ($currentPage - 1) * $perPage;
                $pagedEtudiants = array_slice($etudiants, $start, $perPage);
              ?>
              <?php foreach ($pagedEtudiants as $etudiant): ?>
            <tr>
              <td><input type="checkbox" /></td>
              <td><?= $etudiant['nom'] ?></td>
              <td><?= $etudiant['prenom'] ?></td>
              <td><?= $etudiant['date_naissance'] ?? '—' ?></td>
              <td>
                <div class="td-actions">
                  <button class="action-btn" title="Voir"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button>
                  <a href="/etudiants/edit/<?= $etudiant['id_etudiant'] ?>" class="action-btn" title="Modifier"><svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></a>
                  <button class="action-btn del" title="Supprimer"><svg viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4h6v2"/></svg></button>
                </div>
              </td>
            </tr>
              <?php endforeach; ?>
            <?php else: ?>
            <tr>
              <td colspan="5" style="text-align:center;padding:20px;color:var(--c-muted)">
                Aucun étudiant trouvé
              </td>
            </tr>
            <?php endif; ?>

          </tbody>
        </table>

        <div class="pagination">
          <?php 
            $totalItems = count($etudiants ?? []);
            $perPage = 10;
            $totalPages = ceil($totalItems / $perPage);
            $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $start = ($currentPage - 1) * $perPage;
            $end = min($start + $perPage, $totalItems);
          ?>
          <span>Affichage de <strong><?= $start + 1 ?>–<?= $end ?></strong> sur <strong><?= $totalItems ?></strong> entrées</span>
          <div class="page-btns">
            <?php if ($currentPage > 1): ?>
              <a href="?page=<?= $currentPage - 1 ?>" class="page-btn">‹</a>
            <?php else: ?>
              <button class="page-btn" disabled>‹</button>
            <?php endif; ?>
            
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
              <?php if ($i == $currentPage): ?>
                <button class="page-btn active"><?= $i ?></button>
              <?php else: ?>
                <a href="?page=<?= $i ?>" class="page-btn"><?= $i ?></a>
              <?php endif; ?>
            <?php endfor; ?>
            
            <?php if ($currentPage < $totalPages): ?>
              <a href="?page=<?= $currentPage + 1 ?>" class="page-btn">›</a>
            <?php else: ?>
              <button class="page-btn" disabled>›</button>
            <?php endif; ?>
          </div>
        </div>

      </div><!-- /table-card -->

    </div><!-- /content -->

<?= $this->endSection() ?>
