<div class="head">
  <div>

    <ul class="lang">
      <li><a>Русский</a>
        <ul>
          <li>
            <ul>
              <?php
              $transition_from = "/ru/";
              $transition_to_en = "/de/";
              $str = "";
              if ($_SERVER['REQUEST_URI'] != "") {
                $str = str_replace($transition_from, $transition_to_en, $_SERVER['REQUEST_URI']);
              }
              echo "<li><a href='" . $str . "'>Deutsch</a></li>";
              ?>

              <?php
              $transition_from = "/ru/";
              $transition_to_en = "/en/";
              $str = "";
              if ($_SERVER['REQUEST_URI'] != "") {
                $str = str_replace($transition_from, $transition_to_en, $_SERVER['REQUEST_URI']);
              }
              echo "<li><a href='" . $str . "'>English</a></li>";
              ?>

              <li><a href="/ru/" class="active">Русский</a></li>

              <?php
              $transition_from = "/ru/";
              $transition_to_en = "/uk/";
              $str = "";
              if ($_SERVER['REQUEST_URI'] != "") {
                $str = str_replace($transition_from, $transition_to_en, $_SERVER['REQUEST_URI']);
              }
              echo "<li><a href='" . $str . "'>Українська</a></li>";
              ?>
            </ul>
          </li>
        </ul>
      </li>
    </ul>

    <a id="menumobile" class="menumobile" onclick="mobileMenuShow(event);" ontouchstart="mobileMenuShow(event);"></a>

    <a class="logo" href="/ru/"><img src="/img/icons/logotop.png" alt="Umkoin"></a>

    <div id="langselect" class="langselect">
      <select onchange="window.location=this.value;">
        <option value="/de/">Deutsch</option>
        <option value="/en/">English</option>
        <option value="/ru/" selected="selected">Русский</option>
        <option value="/uk/">Українська</option>
      </select>
    </div>

    <ul id="menusimple" class="menusimple menumain" onclick="mobileMenuHover(event);" ontouchstart="mobileMenuHover(event);">

      <li><a>Введение</a>
        <ul>
          <li><a href="/ru/umkoin-for-individuals.php">Частным лицам</a></li>
          <li><a href="/ru/umkoin-for-businesses.php">Бизнесу</a></li>
          <li><a href="/ru/umkoin-for-developers.php">Разработчикам</a></li>
          <li><a href="/ru/getting-started.php">Начало работы</a></li>
          <li><a href="/ru/how-it-works.php">Как это работает</a></li>
          <li><a href="/ru/you-need-to-know.php">Вам нужно знать</a></li>
        </ul>
      </li>

      <li><a>Ресурсы</a>
        <ul>
          <li><a href="/ru/developer-documentation.php">Документация Разработчика</a></li>
          <li><a href="/ru/vocabulary.php">Термины</a></li>
          <li>&nbsp;</li>
          <li><a href="/ru/blockexplorer.php">Исследование Блоков</a></li>
          <li><a href="/ru/blockmining.php">Майнинг Блоков</a></li>
          <li>&nbsp;</li>
          <li><a href="/ru/umkoin-core.php">Умкойн Core</a></li>
        </ul>
      </li>

      <li><a href="/ru/innovation.php">Инновации</a></li>

      <li><a>Участвовать</a>
        <ul>
          <li><a href="/ru/support-umkoin.php">Поддержать Умкойн</a>
          <li><a href="/ru/development.php">Разработка</a></li>
          <li><a href="/ru/lifecycle.php">Жизненный цикл</a></li>
        </ul>
      </li>

      <li><a href="/ru/faq.php">ЧаВо</a></li>

    </ul>

  </div>
</div>

