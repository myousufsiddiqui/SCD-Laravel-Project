<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electronic Shop</title>
    
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- fonts links -->
</head>
<body>

  
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="/" id="logo"><span id="span1">D</span>rop <span>Source</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><img src="./images/menu.png" alt="" width="30px"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #e40712;">
                  <li><a class="dropdown-item" href="category">Clothing</a></li>
                  <li><a class="dropdown-item" href="detail">Health & Beauty</a></li>
                  <li><a class="dropdown-item" href="#">Electronics</a></li>
                  <li><a class="dropdown-item" href="#">Home Decor</a></li>
                  <li><a class="dropdown-item" href="#">Jewelry & Watches</a></li>
                  <li><a class="dropdown-item" href="#">Pet Supplies</a></li>
                  
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                 Dashboard
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #e40712;">
                  <li><a class="dropdown-item" href="request">Sourcing</a></li>
                  <li><a class="dropdown-item" href="#">Orders</a></li>
                  <li><a class="dropdown-item" href="#">Tickets</a></li>
               
                  
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact">Contact</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item">
              @if (Route::has('login'))
                    @auth
                    <a
                            href="{{ url('/dashboard') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
              </li>
             
            </ul>
          <!--  <form class="d-flex" id="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
-->
<nav class="navbar search">
    <div class="container-fluid">
        <form class="d-flex position-relative" role="search" id="search-form">
            <input class="form-control-2" type="search" id="search-input" placeholder="Search" aria-label="Search" autocomplete="off">
            <button class="searchbtn" type="button" id="search-btn">Search</button>
            <div id="search-results" class="dropdown-menu position-absolute w-100 mt-2" style="position: absolute; top: 77%; left: 0px; width: 100%; background-color: white; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); display: none; border-radius: 2px; z-index: 10; overflow-y: auto; max-height: 200px;">
            <!-- Search results will appear here -->
            <a href="#" style="display: block; padding: 10px; text-decoration: none; color: #333; border-bottom: 1px solid #f1f1f1;">Search Result 1</a>

            </div>
        </form>
    </div>
</nav>
          </div>
        </div>
      </nav>

    <!-- navbar -->
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('search-input');
    const searchResults = document.getElementById('search-results');

    searchInput.addEventListener('input', function () {
        const query = searchInput.value.trim();

        if (query.length > 2) {
            fetch(`{{ route('search') }}?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    let resultsHTML = '';

                    if (data.products.length > 0) {
                        data.products.forEach(product => {
                            resultsHTML += `
                                <a href="/productDetail/${product.id}" class="dropdown-item">
                                    <img src="{{ asset('storage/') }}/${product.image}" style="width: 50px; height: 50px; margin-right: 10px;" alt="${product.name}">
                                    ${product.name} - $${parseFloat(product.price).toFixed(2)}
                                </a>`;
                        });
                    } else {
                        resultsHTML = '<span class="dropdown-item text-muted">No results found</span>';
                    }

                    searchResults.innerHTML = resultsHTML;
                    searchResults.style.display = 'block';
                });
        } else {
            searchResults.style.display = 'none';
        }
    });

    // Hide results when clicking outside the search area
    document.addEventListener('click', function (e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });
});

  </script>
   
