<div class="head">
  <div>

    <ul class="lang">
      <li><a>Українська</a>
        <ul>
          <li>
            <ul>
              <?php
              $transition_from = "/uk/";
              $transition_to_en = "/de/";
              $str = "";
              if ($_SERVER['REQUEST_URI'] != "") {
                $str = str_replace($transition_from, $transition_to_en, $_SERVER['REQUEST_URI']);
              }
              echo "<li><a href='" . $str . "'>Deutsch</a></li>";

              $transition_from = "/uk/";
              $transition_to_en = "/en/";
              $str = "";
              if ($_SERVER['REQUEST_URI'] != "") {
                $str = str_replace($transition_from, $transition_to_en, $_SERVER['REQUEST_URI']);
              }
              echo "<li><a href='" . $str . "'>English</a></li>";
              ?>

              <li><a href="/uk/" class="active">Українська</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>

    <a id="menumobile" class="menumobile" onclick="mobileMenuShow(event);" ontouchstart="mobileMenuShow(event);"></a>

    <a class="logo" href="/uk/"><img src="/img/icons/logotop.png" alt="Umkoin"></a>

    <div id="langselect" class="langselect">
      <select onchange="window.location=this.value;">
        <option value="/de/">Deutsch</option>
        <option value="/en/">English</option>
        <option value="/uk/" selected="selected">Українська</option>
      </select>
    </div>

    <ul id="menusimple" class="menusimple menumain" onclick="mobileMenuHover(event);" ontouchstart="mobileMenuHover(event);">

      <li><a>Презентація</a>
        <ul>
          <li><a href="/uk/umkoin-for-individuals.php">Приватним особам</a></li>
          <li><a href="/uk/umkoin-for-businesses.php">Бізнесу</a></li>
          <li><a href="/uk/umkoin-for-developers.php">Розробникам</a></li>
          <li><a href="/uk/getting-started.php">Початок роботи</a></li>
          <li><a href="/uk/how-it-works.php">Як це працює</a></li>
          <li><a href="/uk/you-need-to-know.php">Ви повинні це знати</a></li>
        </ul>
      </li>

      <li><a>Ресурси</a>
        <ul>
          <li><a href="/uk/developer-documentation.php">Документація розробника</a></li>
          <li><a href="/uk/vocabulary.php">Словник</a></li>
          <li>&nbsp;</li>
          <li><a href="/uk/blockexplorer.php">Дослідження Блоку</a></li>
          <li><a href="/uk/blockmining.php">Видобуток Блоку</a></li>
          <li>&nbsp;</li>
          <li><a href="/uk/umkoin-core.php">Умкойн Core</a></li>
        </ul>
      </li>

      <li><a href="/uk/innovation.php">Інновації</a></li>

      <li><a>Взяти участь</a>
        <ul>
          <li><a href="/uk/support-umkoin.php">Підтримка Умкойн</a>
          <li><a href="/uk/development.php">Розробка</a></li>
          <li><a href="/uk/lifecycle.php">Життєвий цикл</a></li>
        </ul>
      </li>

      <li><a href="/uk/faq.php">ЧаПи</a></li>

    </ul>

  </div>
</div>
