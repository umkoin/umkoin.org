<div class="head">
  <div>

    <ul class="lang">
      <li><a>English</a>
        <ul>
          <li>
            <ul>
              <?php
              $transition_from = "/en/";
              $transition_to_uk = "/de/";
              $str = "";
              if ($_SERVER['REQUEST_URI'] != "") {
                $str = str_replace($transition_from, $transition_to_uk, $_SERVER['REQUEST_URI']);
              }
              echo "<li><a href='" . $str . "'>Deutsch</a></li>";
              ?>

              <li><a href="/en/" class="active">English</a></li>

              <?php
              $transition_from = "/en/";
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

    <a class="logo" href="/en/"><img src="/img/icons/logotop.png" alt="Umkoin"></a>

    <div id="langselect" class="langselect">
      <select onchange="window.location=this.value;">
        <option value="/de/">Deutsch</option>
        <option value="/en/" selected="selected">English</option>
        <option value="/uk/">Українська</option>
      </select>
    </div>

    <ul id="menusimple" class="menusimple menumain" onclick="mobileMenuHover(event);" ontouchstart="mobileMenuHover(event);">

      <li><a>Introduction</a>
        <ul>
          <li><a href="/en/umkoin-for-individuals.php">Individuals</a></li>
          <li><a href="/en/umkoin-for-businesses.php">Businesses</a></li>
          <li><a href="/en/umkoin-for-developers.php">Developers</a></li>
          <li><a href="/en/getting-started.php">Getting started</a></li>
          <li><a href="/en/how-it-works.php">How it works</a></li>
          <li><a href="/en/you-need-to-know.php">You need to know</a></li>
        </ul>
      </li>

      <li><a>Resources</a>
        <ul>
          <li><a href="/en/developer-documentation.php">Documentation</a></li>
          <li><a href="/en/vocabulary.php">Vocabulary</a></li>
          <li>&nbsp;</li>
          <li><a href="/en/blockexplorer.php">Block Explorer</a></li>
          <li><a href="/en/blockmining.php">Block Mining</a></li>
          <li>&nbsp;</li>
          <li><a href="/en/umkoin-core.php">Umkoin Core</a></li>
        </ul>
      </li>

      <li><a href="/en/innovation.php">Innovation</a></li>

      <li><a>Participate</a>
        <ul>
          <li><a href="/en/support-umkoin.php">Support Umkoin</a>
          <li><a href="/en/development.php">Development</a></li>
        </ul>
      </li>

      <li><a href="/en/faq.php">FAQ</a></li>

    </ul>

  </div>
</div>
