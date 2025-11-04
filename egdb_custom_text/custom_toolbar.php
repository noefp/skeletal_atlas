<!-- <li class="nav-item"><a class="nav-link" href="/skeletal_atlas/egdb_custom_text/tools/expression/expression_input.php">Multiomics Reference Atlas</a></li> -->

<?php echo "<a class=\"navbar-brand\" href=\"/easy_gdb/index.php\"><span style=\"color: #db986fff\">Skeletal</span>Atlas</a>"; ?>

 <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Multiomics Reference Atlas</a>

<div class="dropdown-menu">
    <form action="/skeletal_atlas/egdb_custom_text/tools/expression/expression_input.php" method="get">
      <button style="all:unset;cursor:pointer;" type="submit"> <a class="dropdown-item">Mouse Reference Atlas&nbsp</a></button>
        <input  name="atlas" value="mouse_atlas" style="display: none;">
      </form>

        <form action="/skeletal_atlas/egdb_custom_text/tools/expression/expression_input.php" method="get">
    <button style="all:unset;cursor:pointer;" type="submit"><a class="dropdown-item">Human Reference Atlas</a></button>
      <input  name="atlas" value="human_atlas" style="display: none;">
  </form>
  </div>
</li>

<!-- <li class="nav-item"><a class="nav-link" href="/easy_gdb/tools/expression/expression_input.php">Experiment Expression Viewer</a></li> -->

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Expression Viewer</a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="/easy_gdb/tools/expression/expression_input.php">Experiment Expression Viewer</a>
    <a class="dropdown-item" href="/easy_gdb/tools/expression/comparator_input.php">Experiment Expression Comparator</a>
  </div>
</li>


<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Tools</a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="/easy_gdb/tools/search/search_input.php">Gene Annotation Search</a>
    <a class="dropdown-item" href="/easy_gdb/tools/gene_lookup.php">Gene Lookup</a>
    <a class="dropdown-item" href="/easy_gdb/tools/expression/cv_calculator_input.php">CV Calculator</a>
    <a class="dropdown-item" href="/easy_gdb/tools/coexpression/coex_input.php">Coexpression</a>
  </div>
</li>

<li class="nav-item"><a class="nav-link" href="/easy_gdb/about.php">About</a></li>

<style>
  .dropdown-menu{
    background-color: #343a40;
  }
  .dropdown-item{
    color: white;
    width: 100%;
  }

</style>
