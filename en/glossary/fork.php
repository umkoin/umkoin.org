<!DOCTYPE HTML>
<html lang="en">


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta property="og:image" content="http://umkoin.org/img/icons/opengraph.png" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<title>Fork, Accidental Fork - Umkoin Glossary</title>

<link rel="stylesheet" href="/css/font-awesome-4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/main.css">
<link rel="shortcut icon" href="/favicon.png">
</head>


<body>


<?php
include '../page_head.php';
?>


<div class="body">

  <div class="breadcrumbs">
    <?php include 'breadcrumbs.php'; ?>
    Fork
  </div>

  <div id="content" class="content">

    <h1>Fork, Accidental Fork</h1>
    <?php include 'notice.php'; ?>

    <h2 id="definition">Definition</h2>
    <p>When two or more <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> have the same <a href="/en/glossary/block-height.php" title="The number of blocks preceding a particular block on a block chain. For example, the genesis block has a height of zero because zero block preceded it." class="auto-link">block height</a>, forking the <a href="/en/glossary/block-chain.php" title="A chain of blocks with each block referencing the block that preceded it. The most-difficult-to-recreate chain is the best block chain." class="auto-link">block chain</a>.  Typically occurs when two or more <a href="/en/glossary/mining.php" title="Mining is the act of creating valid Umkoin blocks, which requires demonstrating proof of work, and miners are devices that mine or people who own those devices." class="auto-link">miners</a> find <a href="/en/glossary/block.php" title="One or more transactions prefaced by a block header and protected by proof of work. Blocks are the data stored on the block chain." class="auto-link">blocks</a> at nearly the same time.  Can also happen as part of an attack.</p>

    <h3 id="synonyms">Synonyms</h3>
    <ul>
      <li>Fork</li>
    </ul>

    <h3 id="not-to-be-confused-with">Not To Be Confused With</h3>
    <ul>
      <li>
        <p><a href="/en/glossary/hard-fork.php" title="A permanent divergence in the block chain, commonly occurs when non-upgraded nodes can't validate blocks created by upgraded nodes that follow newer consensus rules." class="auto-link">Hard fork</a> (a change in <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a> that breaks security for <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> that don’t upgrade)</p>
      </li>
      <li>
        <p><a href="/en/glossary/soft-fork.php" title="A softfork is a change to the umkoin protocol  wherein only previously valid blocks/transactions  are made invalid. Since old nodes will recognise  the new blocks as valid, a softfork is backward-compatible." class="auto-link">Soft fork</a> (a change in <a href="/en/glossary/consensus-rules.php" title="The block validation rules that full nodes follow to stay in consensus with other nodes." class="auto-link">consensus rules</a> that weakens security for <a href="/en/glossary/node.php" title="A computer that connects to the Umkoin network." class="auto-link">nodes</a> that don’t upgrade)</p>
      </li>
      <li>
        <p>Software <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a> (when one or more developers permanently develops a codebase separately from other developers)</p>
      </li>
      <li>
        <p>Git <a href="/en/glossary/fork.php" title="When two or more blocks have the same block height, forking the block chain.  Typically occurs when two or more miners find blocks at nearly the same time.  Can also happen as part of an attack." class="auto-link">fork</a> (when one or more developers temporarily develops a codebase separately from other developers)</p>
      </li>
    </ul>

    <h3 id="links">Links</h3>
    <ul>
      <li>
        <p><a href="/en/developer-guide.php#term-fork">Fork</a> — Umkoin.org Developer Guide</p>
      </li>
    </ul>

  </div>

</div>


<?php
include '../page_footer.php';
?>


</body>
</html>
