<!DOCTYPE HTML>
<html lang="de">


<head>
<?php include 'head'; ?>
<title>Wie funktioniert Umkoin? - Umkoin</title>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1>Wie funktioniert Umkoin?</h1>
    <p class="summary">Es gibt eine Frage, die oft für Verwirrung sorgt. Hier ist eine kurze Erklärung!</p>

    <h2 id="basics">Grundlagen für neue Nutzer</h2>
    <p>Als neuer Nutzer können Sie mit Umkoin <a href="/de/getting-started.php">loslegen</a> ohne die technischen Details zu verstehen. Wenn Sie Ihre Wallet installiert haben, generiert es Ihre erste Umkoin-Adresse und Sie können weitere erstellen, sobald welche benötigt werden. Sie können eine Ihrer Umkoin-Adressen an Ihre Freunde weiter geben, so dass Sie Geld an jene senden können, oder umgekehrt.  Tatsächlich verhält sich dies ähnlich wie bei E-Mails, nur das Umkoin-Adressen nur einmalig verwendet werden sollten.</p>
    <p><br><img src="/img/icons/umkoin-how-it-works.svg" alt="Umkoin" /></p>

    <h2 id="balances">Kontostände<span class="titlelight"> - Blockkette</span></h2>
    <p>Die Blockkette ist ein gemeinsames <b>öffentliches Buchungssystem</b>, auf dem das gesamte Umkoinnetzwerk basiert. Alle bestätigten Buchungen werden in der Blockkette gespeichert. Auf diese Art können Umkoin Wallets ihren Kontostand berechnen und neue Transaktionen können nur ausgeführt werden, wenn die Umkoins dem Sender tatsächlich gehören. Die Integrität und die chronologische Reihenfolge der Blockkette werden durch <a href="/de/vocabulary.php#cryptography">Kryptographie</a> sichergestellt.</p>

    <h2 id="transactions">Transaktionen<span class="titlelight"> - private Schlüssel</span></h2>
    <p>Eine Transaktion ist <b>ein Transfer eines Betrags zwischen Umkoin-Wallets</b>, der in die Blockkette eingetragen wird. Umkoin-Wallets haben einen geheimen Datenblock der <a href="/de/vocabulary.php#private-key"><i>privater Schlüssel</i></a> oder "Seed" genannt wird, welcher verwendet wird, um Transaktionen zu signieren, indem ein mathematischer Beweis erbracht wird, dass sie vom Eigentümer der Wallet kommen. Die <a href="/de/vocabulary.php#signature"><i>Signatur</i></a> verhindert auch, dass die Transaktion nach dem Absenden von jemandem modifiziert werden kann. Alle Transaktionen werden unter den Nutzern verbreitet und innerhalb von 10 Minuten beginnt die Bestätigung durch das Netzwerk mit Hilfe einens Prozess, genannt <a href="/de/vocabulary.php#mining"><i>Mining</i></a> .</p>

    <h2 id="processing">Verarbeitung<span class="titlelight"> - Mining</span></h2>
    <p>Mining ist ein <b>verteiltes Konsens-System</b> das verwendet wird, um wartende Transaktionen zu <a href="/de/vocabulary.php#confirmation"><i>bestätigen</i></a>, indem sie in die Blockkette aufgenommen werden. Es erzwingt eine chronologische Reihenfolge der Blockkette, schützt die Neutralität des Netzwerks  und ermöglicht verschiedenen Computern, sich über den Status des Systems einig zu sein. Um bestätigt zu werden, müssen Transaktionen in einen <a href="/de/vocabulary.php#block"><i>Block</i></a> gepackt werden. Dieser muss sehr strengen kryptographischen Regeln enstprechen, die durch das Netzwerk verifiziert werden. Diese Regeln verhindern, dass vorherige Blöcke modifiziert werden können, denn eine Änderung würde alle folgenden Blöcke ungültig machen. Mining erzeugt auch das Equivalent einer Lotterie mit starker Konkurrenz, die verhindert, dass eine Einzelperson einfach neue aufeinanderfolgende Blöcke in die Blockkette einfügen kann. Auf diese Weise wird sichergestellt, dass keine Einzelpersonen kontrollieren können was in die Blockkette eingefügt wird, oder Teile der Blockkette modifizieren können, um eigene Ausgaben rückgängig zu machen.</p>

    <h2 id="readmore">Hinunter in den Kaninchenbau</h2>
    <p>Dies ist nur eine sehr kurze und knappe Zusammenfassung des Systems. Wenn Sie ins Detail gehen wollen, können Sie die <a href="/de/umkoin-paper.php">Original-Abhandlung</a> lesen, die das Design des Systems beschreibt.</p>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
