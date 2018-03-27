<div class="head">
  <div>

    <ul class="lang">
      <li><a>Deutsch</a>
        <ul>
          <li>
            <ul>
              <li><a href="/de/" class="active">Deutsch</a></li>

              <?php
              $transition_from = "/de/";
              $transition_to_uk = "/en/";
              $str = "";
              if ($_SERVER['REQUEST_URI'] != "") {
                $str = str_replace($transition_from, $transition_to_uk, $_SERVER['REQUEST_URI']);
              }
              echo "<li><a href='" . $str . "'>English</a></li>";
              ?>

              <?php
              $transition_from = "/de/";
              $transition_to_uk = "/uk/";
              $str = "";
              if ($_SERVER['REQUEST_URI'] != "") {
                $str = str_replace($transition_from, $transition_to_uk, $_SERVER['REQUEST_URI']);
              }
              echo "<li><a href='" . $str . "'>Українська</a></li>";
              ?>
            </ul>
          </li>
        </ul>
      </li>
    </ul>

    <a id="menumobile" class="menumobile" onclick="mobileMenuShow(event);" ontouchstart="mobileMenuShow(event);"></a>

    <a class="logo" href="/de/"><img src="/img/icons/logotop.png" alt="Umkoin"></a>

    <div id="langselect" class="langselect">
      <select onchange="window.location=this.value;">
        <option value="/de/" selected="selected">Deutsch</option>
        <option value="/en/">English</option>
        <option value="/uk/">Українська</option>
      </select>
    </div>

    <ul id="menusimple" class="menusimple menumain" onclick="mobileMenuHover(event);" ontouchstart="mobileMenuHover(event);">

      <li><a>Einführung</a>
        <ul>
          <li><a href="/de/umkoin-fuer-einzelpersonen.php">Einzelpersonen</a></li>
          <li><a href="/de/umkoin-fuer-unternehmen.php">Unternehmen</a></li>
          <li><a href="/de/umkoin-fuer-entwickler.php">Entwickler</a></li>
          <li><a href="/de/erste-schritte.php">Erste Schritte</a></li>
          <li><a href="/de/wie-es-funktioniert.php">Wie es funktioniert</a></li>
          <li><a href="/de/das-sollten-sie-wissen.php">Das sollten Sie wissen</a></li>
        </ul>
      </li>

      <li><a>Ressourcen</a>
        <ul>
          <li><a href="/de/glossar.php">Glossar</a></li>
          <li>&nbsp;</li>
          <li><a href="/de/blockexplorer.php">Block Explorer</a></li>
          <li><a href="/de/blockmining.php">Block Mining</a></li>
          <li>&nbsp;</li>
          <li><a href="/de/umkoin-core.php">Umkoin Core</a></li>
        </ul>
      </li>

      <li><a href="/de/innovation.php">Innovation</a></li>

      <li><a>Mitmachen</a>
        <ul>
          <li><a href="/de/umkoin-unterstuetzen.php">Umkoin unterstützen</a>
          <li><a href="/de/entwicklung.php">Entwicklung</a></li>
        </ul>
      </li>

      <li><a href="/de/faq.php">FAQ</a></li>

    </ul>

  </div>
</div>
