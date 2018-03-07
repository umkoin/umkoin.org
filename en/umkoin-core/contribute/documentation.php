<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Documentation - Contribute to Umkoin Core</title>

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
    Documentation
  </div>

  <div id="content" class="content">

    <div class="one-column">

      <h1>Writing Umkoin Core Documentation</h1>
      <p>Umkoin Core documentation is spread across these projects: Umkoin Core, Umkoin.org — and is further subdivided into different parts. The sections below briefly describe what documentation is available and how you can contribute.</p>

      <h2>Umkoin Core Docs Directory</h2>
      <p>The <a href="https://github.com/umkoin/umkoin/tree/master/doc">docs directory</a> contains various files describing aspects of Umkoin Core. Almost all of the files are meant for developers and testers rather than users, although some (such as the build instructions) may be used by power users.</p>
      <p>The files are all written in Markdown, which can be easily edited in GitHub’s web interface:</p>
      <ol>
        <li>
          <p>Create a GitHub account, or if you already have one, log in.</p>
        </li>
        <li>
          <p>Find the file you want to edit. For example, <a href="https://github.com/umkoin/umkoin/blob/master/doc/build-unix.md">build-unix.md</a></p>
        </li>
        <li>
          <p>Click the Edit icon (a pencil).</p>
        </li>
        <li>
          <p>Make your change and click the Preview button to preview it. Revise and edit until you’re happy with it.</p>
        </li>
        <li>
          <p>At the bottom of the page, fill out the Propose File Change form and submit it.</p>
        </li>
      </ol>

      <h2>Umkoin.org Bandwidth Sharing Guide</h2>
      <p>The <a href="/en/full-node.php">Umkoin.org bandwidth sharing guide</a> currently provides instructions for how to install Umkoin Core on multiple operating systems, configure it to automatically start at boot, and manually open port 6333 so it accepts incoming connections.</p>
      <p>To contribute, you can <a href="https://github.com/umkoin/umkoin.org/edit/master/en/full-node.md">edit the guide</a> using the same GitHub web interface as described in the previous section.</p>
      <p><em>Need help getting started? You can <a href="https://github.com/umkoin/umkoin.org/issues/new">open an issue</a> or email Umkoin.org documentation maintainer <a href="mailto:umkoin@umkoin.org">Igor Gunia</a>.</em></p>

      <h2>Umkoin.org RPC/REST API Reference</h2>
      <p>The <a href="/en/developer-reference.php">Umkoin.org developer reference</a> contains many pages worth of documentation for the Umkoin Core RPC and REST interfaces, which are mainly used by Umkoin Core command line users and developers of apps depending on Umkoin Core.</p>
      <p>To contribute RPC edits, the easiest way is to:</p>
      <ol>
        <li>
          <p>Go to the <a href="/en/developer-documentation.php">Umkoin.org developer documentation main page</a>.</p>
        </li>
        <li>
          <p>Search for the RPC you want to edit.</p>
        </li>
        <li>
          <p>Under the subheading for the RPC, click the Edit link.</p>
        </li>
      </ol>

      <p>To create new RPC/REST documentation or edit the REST documentation:</p>
      <ol>
        <li>
          <p>Follow <a href="https://github.com/umkoin/umkoin.org#working-with-github">these instructions</a> to clone the Umkoin.org repository.</p>
        </li>
        <li>
          <p>RPC files are in the <code class="highlighter-rouge">_includes/ref/umkoin-core/rpcs</code> directory.</p>
          <p>REST files are in the <code class="highlighter-rouge">_includes/ref/umkoin-core/rest</code> directory.</p>
          <p>New files need to be added to the list in <code class="highlighter-rouge">en/developer-reference.md</code></p>
        </li>
      </ol>

      <p><em>Need help getting started? You can <a href="https://github.com/umkoin/umkoin.org/issues/new">open an issue</a> or email Umkoin.org documentation maintainer <a href="mailto:umkoin@umkoin.org">Igor Gunia</a>.</em></p>

      <p><br class="clear big" /></p>

      <div class="prevnext">
        <span><strong>Previous</strong><br /><a href="/en/development.php">Code</a></span>
        <span><strong>Next</strong><br /><a href="/en/umkoin-core/contribute/translations.php">Translations</a></span>
      </div>

      <p><br class="clear" /></p>

    </div>

</div>


<?php
include '../../page_footer.php';
?>


</body>
</html>
