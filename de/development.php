<!DOCTYPE HTML>
<html lang="de">


<head>
<?php include 'head'; ?>
<title>Entwicklung - Umkoin</title>

<link rel="stylesheet" href="/css/jquery-ui.min.css">
</head>


<body>


<?php
include 'page_head.php';
?>



<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

<div >
    <h1>Umkoin Entwicklung</h1>
    <p class="summary">Finden Sie mehr Information über die gegenwärtige Spezifikation, Software und Entwickler.</p>
    <p>Die Umkoin-Entwicklung ist quelloffen und jeder Entwickler kann zu dem Projekt beitragen. Alles was Sie benötigen finden Sie im <a href="https://github.com/umkoin/umkoin">GitHub Repository</a>. Bitte lesen und befolgen Sie den in der README beschriebenen Entwicklungsprozess, liefern Sie Codes von guter Qualität und respektieren Sie alle Richtlinien.</p>
    <p>Die Entwickler-Diskussion findet über GitHub und die <a href="https://lists.linuxfoundation.org/mailman/listinfo/bitcoin-dev">bitcoin-dev</a> Mailing List bei sourceforge statt. Weniger formale Entwickler-Diskussion gibt es unter irc.freenode.net #bitcoin-dev (<a href="#" onclick="freenodeShow(event);">Weboberfläche</a>, <a href="http://bitcoinstats.com">Logs</a>).</p>

    <div id="chatbox" class="chatbox"></div>





<h2 id="spec">Dokumentation</h2>
<p>Falls Sie daran interessiert sind mehr über die technischen Details von Umkoin zu erfahren und wie man vorhandene Tools und APIs verwendet, dann wird empfohlen bei der <a href="/en/developer-documentation">Dokumentation für Entwickler</a> zu beginnen.</p>



<section id="devcommunities">
  <h2 id="dev-communities">Entwickler-Community</h2>
  <p>Die folgenden Chatrooms und Websites bieten DIskussionen über die Umkoin Entwicklung. Lesen Sie bitte die Verhaltensregeln bevor Sie sich beteiligen.</p>

  <ul>
    <li><a href="https://webchat.freenode.net/?channels=bitcoin-dev">IRC Channel #bitcoin-dev</a> auf freenode.</li>
    <li><a href="https://slack.bitcoincore.org/">Umkoin Core Slack Channel</a></li>
    <li><a href="https://bitcoin.stackexchange.com/">Umkoin StackExchange</a></li>
    <li><a href="https://bitcointalk.org/index.php?board=6.0">UmkoinTalk Development &amp; Technical Discussion Forum</a></li>
  </ul>
</section>

<section id="contributors">
  <h2 id="umkoin-core-contributors">Umkoin Core Mitwirkende</h2>
  <p>(Sortiert nach Anzahl der Commits)</p>
  <div class="contributors">
    
    <div>
      <div><a href="https://github.com/laanwj">Wladimir J. van der Laan</a></div>
      <div>(5300)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/sipa">Pieter Wuille</a></div>
      <div>(1485)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/gavinandresen">Gavin Andresen</a></div>
      <div>(1101)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/MarcoFalke">MarcoFalke</a></div>
      <div>(766)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/TheBlueMatt">TheBlueMatt</a></div>
      <div>(606)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jonasschnelli">jonasschnelli</a></div>
      <div>(565)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/theuni">Cory Fields</a></div>
      <div>(559)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/luke-jr">Luke-Jr</a></div>
      <div>(338)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jnewbery">jnewbery</a></div>
      <div>(289)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/non-github-bitcoin">non-github-bitcoin</a></div>
      <div>(271)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/gmaxwell">Gregory Maxwell</a></div>
      <div>(263)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/fanquake">fanquake</a></div>
      <div>(215)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/morcos">morcos</a></div>
      <div>(209)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/sdaftuar">sdaftuar</a></div>
      <div>(208)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/practicalswift">practicalswift</a></div>
      <div>(191)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jtimon">jtimon</a></div>
      <div>(162)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ryanofsky">ryanofsky</a></div>
      <div>(139)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/paveljanik">paveljanik</a></div>
      <div>(109)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/petertodd">Peter Todd</a></div>
      <div>(102)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/cozz">cozz</a></div>
      <div>(70)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/pstratem">pstratem</a></div>
      <div>(70)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/promag">promag</a></div>
      <div>(68)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/achow101">achow101</a></div>
      <div>(68)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/instagibbs">instagibbs</a></div>
      <div>(59)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/MeshCollider">MeshCollider</a></div>
      <div>(53)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kallewoof">kallewoof</a></div>
      <div>(45)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/rebroad">rebroad</a></div>
      <div>(35)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/muggenhor">muggenhor</a></div>
      <div>(34)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/satoshinnakamoto">satoshinnakamoto</a></div>
      <div>(34)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/btcdrak">btcdrak</a></div>
      <div>(32)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/CodeShark">Eric Lombrozo</a></div>
      <div>(32)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/JeremyRubin">JeremyRubin</a></div>
      <div>(32)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/domob1812">domob1812</a></div>
      <div>(31)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dooglus">dooglus</a></div>
      <div>(28)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Michagogo">Michagogo</a></div>
      <div>(25)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jl2012">jl2012</a></div>
      <div>(24)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Sjors">Sjors</a></div>
      <div>(20)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/NicolasDorier">NicolasDorier</a></div>
      <div>(20)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dexX7">dexX7</a></div>
      <div>(20)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jamesob">jamesob</a></div>
      <div>(19)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/wtogami">wtogami</a></div>
      <div>(19)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kazcw">kazcw</a></div>
      <div>(19)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dgenr8">dgenr8</a></div>
      <div>(18)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ajtowns">ajtowns</a></div>
      <div>(17)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mrbandrews">mrbandrews</a></div>
      <div>(17)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/super3">super3</a></div>
      <div>(16)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/danra">danra</a></div>
      <div>(16)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/casey">casey</a></div>
      <div>(15)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kdomanski">kdomanski</a></div>
      <div>(15)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jimmysong">jimmysong</a></div>
      <div>(14)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ENikS">ENikS</a></div>
      <div>(13)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/str4d">str4d</a></div>
      <div>(13)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/maaku">maaku</a></div>
      <div>(12)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mruddy">mruddy</a></div>
      <div>(12)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/21E14">21E14</a></div>
      <div>(11)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/nomnombtc">nomnombtc</a></div>
      <div>(11)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dcousens">dcousens</a></div>
      <div>(11)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/droark">droark</a></div>
      <div>(11)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/codler">codler</a></div>
      <div>(10)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/wizeman">wizeman</a></div>
      <div>(10)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/roques">roques</a></div>
      <div>(9)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jmcorgan">jmcorgan</a></div>
      <div>(9)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/JohnDolittle">JohnDolittle</a></div>
      <div>(9)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/tjps">tjps</a></div>
      <div>(9)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/rnicoll">rnicoll</a></div>
      <div>(9)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mrwhythat">mrwhythat</a></div>
      <div>(9)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ajweiss">ajweiss</a></div>
      <div>(8)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/schildbach">Andreas Schildbach</a></div>
      <div>(8)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/eklitzke">eklitzke</a></div>
      <div>(8)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jordanlewis">jordanlewis</a></div>
      <div>(8)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/joshtriplett">joshtriplett</a></div>
      <div>(8)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/isle2983">isle2983</a></div>
      <div>(8)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/devrandom">devrandom</a></div>
      <div>(8)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jgarzik">Jeff Garzik</a></div>
      <div>(8)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/s-matthew-english">s-matthew-english</a></div>
      <div>(8)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/EthanHeilman">EthanHeilman</a></div>
      <div>(8)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/AkioNak">AkioNak</a>div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Empact">Empact</a></div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Christewart">Christewart</a></div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mess110">mess110</a></div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/forrestv">forrestv</a></div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/freewil">freewil</a></div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/sinetek">sinetek</a></div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/celil-kj">celil-kj</a></div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jlopp">jlopp</a></div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/runeksvendsen">runeksvendsen</a></div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/sje397">sje397</a></div>
      <div>(7)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ashleyholman">ashleyholman</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dertin">dertin</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Matoking">Matoking</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jimpo">jimpo</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mgiuca">mgiuca</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/OttoAllmendinger">OttoAllmendinger</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/vegard">vegard</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/zw">zw</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/fsb4000">fsb4000</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/p2k">p2k</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/randy-waterhouse">randy-waterhouse</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jrmithdobbs">jrmithdobbs</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/JoelKatz">JoelKatz</a></div>
      <div>(6)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/alexanderkjeldaas">alexanderkjeldaas</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/federicobond">federicobond</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/maraoz">maraoz</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mndrix">mndrix</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/robbak">robbak</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/r000n">r000n</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/roybadami">roybadami</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/vinniefalco">vinniefalco</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/lemzwerg">lemzwerg</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/whitj00">Whit Jack</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/accraze">accraze</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/fcicq">fcicq</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/gubatron">gubatron</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ptschip">ptschip</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/sandakersmann">sandakersmann</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/sipsorcery">sipsorcery</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/rdponticelli">rdponticelli</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ericshawlinux">ericshawlinux</a></div>
      <div>(5)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/251Labs">251Labs</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/paraipan">paraipan</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/brandondahler">brandondahler</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/conscott">conscott</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/CryptAxe">CryptAxe</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/DomT4">DomT4</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/EricJ2190">EricJ2190</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/hkjn">hkjn</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/4tar">4tar</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jayschwa">jayschwa</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/JeremyRand">JeremyRand</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kostaz">kostaz</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/greenaddress">greenaddress</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mibe">mibe</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/pedrobranco">pedrobranco</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/randolf">randolf</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/UdjinM6">UdjinM6</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/vsrinivas">vsrinivas</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/arowser">arowser</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/globalcitizen">globalcitizen</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/grimd34th">grimd34th</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/murrayn">murrayn</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/keystrike">keystrike</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/laudaa">laudaa</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Xekyo">Xekyo</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/donaloconnor">donaloconnor</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/unsystemizer">unsystemizer</a></div>
      <div>(4)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/akx20000a">akx20000a</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/bytting">bytting</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/davecgh">davecgh</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/BitonicEelis">BitonicEelis</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ers35">ers35</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Flowdalic">Flowdalic</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ian-kelling">ian-kelling</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jeffrade">jeffrade</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jonls">jonls</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jonasnick">jonasnick</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Krellan">Krellan</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ldenman">ldenman</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ChoHag">ChoHag</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/pinheadmz">pinheadmz</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Mirobit">Mirobit</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mikehearn">Mike Hearn</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/prusnak">prusnak</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/richardkiss">richardkiss</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/RHavar">RHavar</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/SergioDemianLerner">SergioDemianLerner</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/shaulkf">shaulkf</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/spencerlievens">spencerlievens</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/tholenst">tholenst</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/afk11">afk11</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Tyler-Hardin">Tyler-Hardin</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/flack">flack</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/lpescher">lpescher</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/al42and">al42and</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/cdecker">cdecker</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dajohi">dajohi</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/posita">posita</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/PRabahy">PRabahy</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/djpnewton">djpnewton</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/imharrywu">imharrywu</a></div>
      <div>(3)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/aarongolliver">aarongolliver</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/axvr">axvr</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/alexwaters">alexwaters</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/AliceWonderMiscreations">AliceWonderMiscreations</a></d      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kekimusmaximus">kekimusmaximus</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/negedzuregal">negedzuregal</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/AmirAbrams">AmirAbrams</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/anditto">anditto</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/bencxr">bencxr</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kanzure">kanzure</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dongcarl">dongcarl</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/CAFxX">CAFxX</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/cbeams">cbeams</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/chrisgavin">chrisgavin</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/cdhowie">cdhowie</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/colindean">colindean</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/esotericnonsense">esotericnonsense</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/bytemaster">bytemaster</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/harding">David Harding</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/enmaku">enmaku</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/spiechu">spiechu</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/xslidian">xslidian</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dlitz">dlitz</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/nobled">nobled</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Mischi">Mischi</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Flavien">Flavien</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/gdm85">gdm85</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/haakonn">haakonn</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/hsjoberg">hsjoberg</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/welshjf">welshjf</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/wjx">wjx</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/joaopaulofonseca">joaopaulofonseca</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jonathancross">jonathancross</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ken2812221">ken2812221</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kevcooper">kevcooper</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/LongShao007">LongShao007</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/lucayepa">lucayepa</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mariodian">mariodian</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mhanne">mhanne</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/martinus">martinus</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/mitchellcash">mitchellcash</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/musalbas">musalbas</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/nathaniel-mahieu">nathaniel-mahieu</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/nbenoit">nbenoit</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/pavlosantoniou">pavlosantoniou</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/robvanmieghem">robvanmieghem</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/rustyrussell">rustyrussell</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/maqifrnswa">maqifrnswa</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/sime">sime</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/sgimenez">sgimenez</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/drizzt">drizzt</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/thofmann">thofmann</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/wbnns">wbnns</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jb55">jb55</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/pirapira">pirapira</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/aideca">aideca</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/cardpuncher">cardpuncher</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/constantined">constantined</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/crowning-">crowning-</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/fivepiece">fivepiece</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/imwuzhh">imwuzhh</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kobake">kobake</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/phelixbtc">phelixbtc</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ayeowch">ayeowch</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/knocte">knocte</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/apoelstra">apoelstra</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/benhc123">benhc123</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Derek701">Derek701</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/karel-3d">karel-3d</a></div>
      <div>(2)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/532479301">532479301</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/enterprisey">enterprisey</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/AbrahamJewowich">AbrahamJewowich</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/DeftNerd">DeftNerd</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/agl">agl</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/aitorpazos">aitorpazos</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/OmeGak">OmeGak</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Alex-van-der-Peet">Alex-van-der-Peet</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/AlexJeng">AlexJeng</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/alexreg">alexreg</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/alfiedotwtf">alfiedotwtf</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ali1234">ali1234</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/AllanDoensen">AllanDoensen</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Altoidnerd">Altoidnerd</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Altoidnerd1">Altoidnerd1</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/amiryal">amiryal</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/andersoyvind">andersoyvind</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Elbandi">Elbandi</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Ov3rlo4d">Ov3rlo4d</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/anddam">anddam</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/s3erios">s3erios</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/aalness">aalness</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/iongchun">iongchun</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Arnavion">Arnavion</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/arnuschky">arnuschky</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/bardiharborow">bardiharborow</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/UmkoinPRReadingGroup">UmkoinPRReadingGroup</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/blakejakopovic">blakejakopovic</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/carryforward">carryforward</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/brianmcmichael">brianmcmichael</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jcalvinowens">jcalvinowens</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/calvintam">calvintam</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kr105">kr105</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/coblee">coblee</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/catilac">catilac</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/carnesen">carnesen</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/chriswheeler">chriswheeler</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/cbarcenas">cbarcenas</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/BitsInMyBlood">BitsInMyBlood</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/sarchar">sarchar</a></div>
      <div>(1)</d    </div>
    
    <div>
      <div><a href="https://github.com/Ciemon">Ciemon</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/clemtaylor">clemtaylor</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/pygeek">pygeek</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/CohibAA">CohibAA</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/CryptoDJ">CryptoDJ</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/infertux">infertux</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dagurval">dagurval</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/daira">daira</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dbolser">dbolser</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/witten">witten</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dlo">dlo</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/da2x">da2x</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dholbert">dholbert</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/DaveFromBinary">DaveFromBinary</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/DavidGriffith">DavidGriffith</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/davidsgrogan">davidsgrogan</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dserrano5">dserrano5</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/CypherGrue">CypherGrue</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/diegoviola">diegoviola</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/rex4539">rex4539</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dimitris-t">dimitris-t</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/onlyjob">onlyjob</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/djp3">djp3</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/drewx2">drewx2</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/dusty-wil">dusty-wil</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Earlz">Earlz</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/elliotolds">elliotolds</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/esbullington">esbullington</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/lachesis">lachesis</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/erkmos">erkmos</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/MCFX2">MCFX2</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/eordano">eordano</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/heyrhett">heyrhett</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Unreal89">Unreal89</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/FelixWeis">FelixWeis</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/fwolfst">fwolfst</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/fametrano">fametrano</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/codeboost">codeboost</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/makevoid">makevoid</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/francis16">francis16</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/bitcoinsSG">bitcoinsSG</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/gtsui">gtsui</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/gwillen">gwillen</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/haltingstate">haltingstate</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/heath">heath</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/hectorj">hectorj</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/HostFat">HostFat</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/iangcarroll">iangcarroll</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/irvingruan">irvingruan</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/isghe">isghe</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ivanpustogarov">ivanpustogarov</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ivdsangen">ivdsangen</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jl2035">jl2035</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jackycjh">jackycjh</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jburkle">jburkle</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jameshilliard">jameshilliard</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jamesmacwhite">jamesmacwhite</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jsarenik">jsarenik</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/malleor">malleor</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jaromil">jaromil</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jarret">jarret</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jasonlewicki">jasonlewicki</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/bitspill">bitspill</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jharvell">jharvell</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ius">ius</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jhenninger">jhenninger</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kanigsson">kanigsson</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/ethernomad">ethernomad</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/Aesti">Aesti</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/haight6716">haight6716</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/lian">lian</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/jyap808">jyap808</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/juscamarena">juscamarena</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/kewde">kewde</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/KibbledJiveElkZoo">KibbledJiveElkZoo</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/KrzysiekJ">KrzysiekJ</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/coinables">coinables</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/wraith7">wraith7</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/L2G">L2G</a></div>
      <div>(1)</div>
    </div>
    
    <div>
      <div><a href="https://github.com/larsr">larsr</a></div>
      <div>(1)</div>
    </div>
    
  </div>
</section>

<h2 id="more">Mehr Open-Source Projekte</h2>

<p>

</p>

<ul class="devprojectlist">
  <li><a href="https://github.com/goatpig/UmkoinArmory">Armory</a> - A wallet with enhanced security features, written in C++.</li>
  <li><a href="https://github.com/luke-jr/bfgminer">BFGMiner</a> - A modular miner, written in C.</li>
  <li><a href="https://github.com/bitcoin-wallet/bitcoin-wallet">Umkoin Wallet</a> - A SPV wallet for Android and Blackberry, written in Java.</li>
  <li><a href="https://github.com/bitcoinj/bitcoinj">bitcoinj</a> - A library for SPV wallets, written in Java.</li>
  <li><a href="https://github.com/btcsuite/btcd">btcd</a> - A full node, written in Go.</li>
  <li><a href="https://github.com/btcsuite/btcwallet">btcwallet</a> - A hierarchical deterministic wallet daemon, written in Go.</li>
  <li><a href="https://bitbucket.org/ckolivas/ckpool">ckpool</a> - A fast mining pool server application, written in C.</li>
  <li><a href="https://github.com/spesmilo/electrum">Electrum</a> - A fast server-trusting wallet, written in Python.</li>
  <li><a href="https://github.com/luke-jr/eloipool">Eloipool</a> - A fast mining pool server application, written in Python.</li>
  <li><a href="https://github.com/haskoin/haskoin">Haskoin</a> - An implementation of the Umkoin protocol, written in Haskell.</li>
  <li><a href="https://github.com/libbitcoin/libbitcoin">Libbitcoin</a> - A cross-platform development toolkit, written in C++.</li>
  <li><a href="https://github.com/libbitcoin/libbitcoin-server/">Libbitcoin Server</a> - A full node and query server, built on libbitcoin.</li>
  <li><a href="https://github.com/libbitcoin/libbitcoin-explorer">Libbitcoin Explorer</a> - A command line tool, built on libbitcoin.</li>
  <li><a href="https://github.com/bitcoin/libblkmaker">Libblkmaker</a> - A client library for the getblocktemplate mining protocol, written in C.</li>
  <li><a href="https://github.com/MetacoSA/NUmkoin">NUmkoin</a> - A cross-platform library, written in C#.</li>
  <li><a href="https://github.com/jgarzik/picocoin">picocoin</a> - A tiny library with lightweight client and utilities, written in C.</li>
  <li><a href="https://github.com/petertodd/python-bitcoinlib">python-bitcoinlib</a> - A library for structures and protocols, written in Python.</li>
  <li><a href="https://github.com/luke-jr/python-blkmaker">Python Blkmaker</a> - A client library for the getblocktemplate mining protocol, written in Python.</li>
  <li class="more"><a onclick="librariesShow(event)" ontouchstart="librariesShow(event);" class="link-js"><span class="fa fa-caret-down"></span> Mehr anzeigen...</a></li>
</ul>



</div>
</div>

  <div class="footer">
    

<div>
  <p>Umkoin.org is community supported: <a href="bitcoin:3FkenCiXpSLqD8L79intRNXUgjRoH9sjXa" target="_blank">3FkenCiXpSLqD8L79intRNXUgjRoH9sjXa</a></p>
</div>

<div class="footermenu">
  <a href="/en/alerts" class="statusmenu">Network Status</a>
  <a href="/de/rechtliches">Rechtliches</a>
  
  <a href="/en/privacy">Privacy Policy</a>
  
  <a hr/en/bitcoin-core/about-site">About</a>
</div>

    

<div class="footerlicense">© Umkoin Project 2009-2018 Veröffentlicht unter der <a href="http://opensource.org/licenses/mit-license.php" target="_blank">MIT Lizenz</a><br>
Umkoin Core pages on Umkoin.org are <a
href="/en/bitcoin-core/about-site">maintained separately</a> from the
rest of the site.
</div>

  </div>
</div>





  <script src="/js/umkoin-core.js"></script>


<?php
include 'page_footer.php';
?>


</body>
</html>
