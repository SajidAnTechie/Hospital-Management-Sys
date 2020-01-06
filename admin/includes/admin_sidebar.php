 
  <!-- Navbar -->
  <form class="form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
<div class="btn-group">
<div class="col">

<div class="welcome" style="display: inline-block;color: white;font-size: 20px;padding-right: 26px;font-weight: bold;">Welcome, <font color="#192a56"><?php echo htmlspecialchars($_SESSION["username"]); ?></font></div>


<button type="button" class="btn btn-primary" aria-haspopup="true" aria-expanded="false">
<a class="text-white" href="logout.php">Logout</a>
</button>
</div>
</div>
</form>
</nav>

<div id="wrapper">

  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="posts.php">
        <i class="far fa-clipboard"></i>
        <span>Posts</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="portfolios.php">
        <i class="fas fa-file-upload"></i>
        <span>Portfolios</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="categories.php">
        <i class="fas fa-book"></i>
        <span>Categories</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="comments.php">
      <i class="fas fa-comments"></i>
        <span>Comments</span></a>
    </li>
    <!--
    <li class="nav-item">
      <a class="nav-link" href="charts.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tables.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>
    -->
  </ul>

  <div id="content-wrapper">

        <div class="container-fluid">