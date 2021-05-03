<!DOCTYPE HTML>
<html lang="en">


<head>
<?php include 'head'; ?>
<title>Software Life Cycle - Umkoin</title>
</head>


<body>


<?php
include 'page_head.php';
?>


<div class="body">

  <div class="breadcrumbs"></div>

  <div id="content" class="content">

    <h1>Software Life Cycle</h1>
    <p class="summarytxt">This document describes the life-cycle of the Umkoin Core software package released by the Umkoin Core project. It is in line with standard maintenance policy across commercial software.</p>

    <h2>Versioning</h2>
    <p>Umkoin Core releases are versioned as follows: 0.MAJOR.MINOR, and release candidates are suffixed with rc1, rc2 etc.</p>

    <h2>Major releases</h2>
    <p>We aim to make a major release every 6-7 months. These will be numbered 0.17.0, 0.18.0 etc.</p>

    <h2>Maintenance releases</h2>
    <p>We will provide maintenance "minor releases" that fix bugs within the major releases. As a general rule we do not introduce major new features in a maintenance release (except for consensus rules). However, we may add minor features where necessary, and we will backport consensus rule changes such as soft forks.</p>
    <p>Minor releases will be umbered 0.17.1, 0.17.2, 0.18.1 etc.</p>

    <h2>Consensus rules</h2>
    <p>Proposals to change consensus rules are always shipped first in maintenance versions such as 0.17.2, 0.18.1 etc. This makes it easier for enterprise users to assess and test the proposal because of its smaller changeset compared to a major release. It also allows users who follow a more conservative upgrade path to adopt consensus rule changes in a more timely manner.</p>

    <h2>Maintenance period</h2>
    <p>We maintain the major versions until their “Maintenance End”. We generally maintain the current and previous major release. So if the current release is 0.18, then 0.17 is also considered maintained. Once 0.19 is released, then 0.17 would be considered at its “Maintenance End”. The older the major release, the more critical issues have to be to get backported to it, and the more to warrant a new minor release. Once software has reached the “Maintenance End” period it will only receive critical security fixes until the EOL date. After EOL, users must upgrade to a later version to receive security updates, even though the community may provide fixes for critical issues on a best effort basis. Generally, it is recommended to run the latest maintenance release (point release) of the current or previous major version.</p>
    <p>Please note that minor versions get bugfixes, translation updates, and soft forks. Translation on Transifex is only open for the last two major releases.</p>
    <p>For example, major version 0.15 was released on 2017-12-13 and we provided maintenance fixes (point releases) until 2018-10-02. Critical security issues would still be continued to be fixed until the End-Of-Life “EOL” date of 2019-05-02. However, to take advantage of bug fixes, you would have to upgrade to a later major version.</p>

    <h2>Schedule</h2>
    <p>Once EOL is reached, you will need to upgrade to a newer version.</p>
    <table>
    <thead>
    <tr>
        <th>Version</th>
        <th>Release Date</th>
        <th>Maintenance End</th>
        <th>End of Life</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>0.15</td>
        <td>2017-12-13</td>
        <td>2018-10-02</td>
        <td>2019-05-02</td>
    </tr><tr>
        <td>0.16</td>
        <td>2018-01-22</td>
        <td>2019-05-02</td>
        <td>2019-11-09</td>
    </tr><tr>
        <td>0.17</td>
        <td>2018-10-02</td>
        <td>2019-11-09</td>
        <td>2020-06-04</td>
    </tr><tr>
        <td>0.18</td>
        <td>2019-05-02</td>
        <td>2020-06-04</td>
        <td>2021-01-16</td>
    </tr><tr>
        <td>0.19</td>
        <td>2019-11-09</td>
        <td>2021-01-16</td>
        <td>TBA</td>
    </tr><tr>
        <td>0.20</td>
        <td>2020-06-04</td>
        <td>after v0.22</td>
        <td>TBA</td>
    </tr><tr>
        <td>0.21</td>
        <td>2021-01-16</td>
        <td>after v0.23</td>
        <td>TBA</td>
    </tr><tr>
        <td>0.22</td>
        <td>TBA</td>
        <td>after v0.24</td>
        <td>TBA</td>
    </tr>
    </tbody>
    </table>
    <p><i>* We aim to make a major release every 6-7 months</i></p>
    <p><i>TBA: to be announced</i></p>

    <h2>Protocol versioning</h2>
    <p>The description above only describes Umkoin Core software releases. Many other parts of the Umkoin system contain their own versions. A few examples:</p>
    <p>
      <ul>
        <li>Every <b>transaction</b> contains a version number.</li>
        <li>The <b>P2P network protocol</b> uses version numbers to allow nodes to announces what features they support.</li>
        <li>Umkoin Core's <b>built-in wallet</b> has its own internal version number.</li>
      </ul>
    </p>
    <p>These version numbers are deliberately decoupled from Umkoin Core's version number as the Umkoin Core project either has no direct control over them (as is the case with blocks and transactions), or tries to maintain compatibility with other projects (as is the case with the network protocol), or allows for the possibility that no major changes will be made in some releases (as is somtimes the case with the built-in wallet).</p>
    <p>The consensus protocol itself doesn't have a version number.</p>

    <h2>Relationship to SemVer</h2>
    <p>Umkoin Core software versioning does not follow the <u>SemVer</u> optional versioning standard, but its release versioning is superficially similar. SemVer was designed for use in normal software libraries where individuals can choose to upgrade the library at their own pace, or even stay behind on an older release if they don't like the changes.</p>
    <p>Parts of Umkoin, most notably the consensus rules, don't work that way. In order for a new consensus rule to go into effect, it must be enforced by some number of miners, full nodes, or both; and once it has gone into effect, software that doesn't know about the new rule may generate or accept invalid transactions (although upgrades are designed to prevent this from happening when possible).</p>
    <p>For this reason, Umkoin Core deviates from SemVer for changes to consensus rules and other updates where network-wide adoption is necessary or desirable. Umkoin Core releases these changes as maintenance releases (0.x.y) instead of as major releases (0.x.0); this minimizes the size of the patch in order to make it easy for as many people as possible to inspect, test, and deploy it. It also make it possible to backport the same patch to multiple previous major releases, further increasing the number of users who can easily upgrade, although there are not always enough volunteers to manage this.</p>

  </div>

</div>


<?php
include 'page_footer.php';
?>


</body>
</html>
