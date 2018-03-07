<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Issues - Contribute to Umkoin Core</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">
</head>


<body>


<?php
include '../../page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
    <?php include 'breadcrumbs.php'; ?>
    Issues
  </div>

  <div id="content" class="content">

    <div class="one-column">

      <h1 id="contribute-bug-reports">Contribute Bug Reports</h1>
      <p>If you discover a bug or other problem with Umkoin Core, please report it. The are two different processes, <a href="#disclosure">responsible disclosure</a> for security bugs and <a href="#public-issue-tracking">public issue tracking</a> for all other bugs.</p>
      <p><span class="fa fa-exclamation-triangle"></span> <strong>Please don’t open an issue to ask for support.</strong> See the <a href="/en/umkoin-core/help.php">Get Help</a> page instead.</p>

      <h2 id="disclosure">Responsible disclosure</h2>
      <p>See the <a href="/en/contact.php">Umkoin Core contact page</a> for reporting security issues.</p>

      <h2 id="public-issue-tracking">Public Issue Tracking</h2>
      <p>For non-security problems with Umkoin Core, please <a href="https://github.com/umkoin/umkoin/issues">search for similar issues</a> and, if you don’t find any, <a href="https://github.com/umkoin/umkoin/issues/new">open a new issue</a> providing the information listed below.</p>

      <ol>
        <li>
          <p>A clear description of the problem. If possible, please describe how to reproduce the problem. (For general guidelines on writing steps to reproduce, see <a href="https://developer.mozilla.org/en-US/docs/Mozilla/QA/Bug_writing_guidelines#Writing_precise_steps_to_reproduce">Mozilla’s bug reporting documentation</a>.)</p>
        </li>
        <li>
          <p>What version of Umkoin Core you use (if you downloaded from Umkoin.org) or what commit you built using (<code class="highlighter-rouge">git log -1</code>) plus any extra patches you applied.</p>
        </li>
        <li>
          <p>Any relevant entries from your <code class="highlighter-rouge">debug.log</code> file. Note, this file can contain private information, so review it before posting or ask in the issue to email it directly to a developer rather than posting publicly. You can publicly post logs on a <a href="http://0bin.net/">0bin service</a>. By default, the <code class="highlighter-rouge">debug.log</code> can be found at the following locations:</p>
          <ul>
            <li>
              <p>Windows: <code class="highlighter-rouge">%APPDATA%\Umkoin\debug.log</code></p>
            </li>
            <li>
              <p>OS X: <code class="highlighter-rouge">$HOME/Library/Application Support/Umkoin/debug.log</code></p>
            </li>
            <li>
              <p>Linux: <code class="highlighter-rouge">$HOME/.umkoin/debug.log</code></p>
            </li>
          </ul>
        </li>
      </ol>

      <p>The best strategy to get your issue fixed quickly is to make it as easy as possible for the development team to track down the problem and write a fix.  Providing more information and organizing it well helps significantly.</p>
      <p><br class="clear big" /></p>
      <div class="prevnext">
        <span><strong>Previous</strong><br /><a href="/en/umkoin-core/contribute.php">Contribute overview</a></span>
        <span><strong>Next</strong><br /><a href="/en/development.php">Code</a></span>
      </div>

      <p><br class="clear" /></p>

    </div>

  </div>

</div>


<?php
include '../../page_footer.php';
?>


</body>
</html>
