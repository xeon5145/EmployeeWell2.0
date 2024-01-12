<!-- header.php -->
<html>
<head>
    <title>Employee Well</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .back-shade {
            background: #ffffff;
        }
        .dropdown-trigger {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
        }
        .dropdown-trigger img {
            margin-right: 0.5rem;
        }
        .fade.in {
            opacity: 1;
            transition: opacity 0.15s ease-in;
        }
        .custom-navbar {
            margin-right: 1rem;
        }
    </style>
</head>
<body>
    <?php
    $this->load->database();
    ?>
    <header>
        <!-- Added custom class to move the header to the right with margin -->
        <nav class="mt-2 ms-2 me-2 bg-info rounded-3 p-3 custom-navbar">
            <div class="row">
                <div class="col-3">
                    <a href="dashboard" class="col h2 text-white text-decoration-none">EmpW</a>
                </div>

                <div class="col-2"></div>

                <div class="col-7">
                    <?php
                    
                    if(isset($firstname))
                    {
                        ?>
                        <!-- Dropdown Trigger as Icon -->
                        <a href="#" class="dropdown-trigger text-decoration-none float-end mt-2" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            User Options
                        </a>
                        <!-- Dropdown Menu with Fade Animation -->
                        <ul class="dropdown-menu fade" aria-labelledby="dropdownMenuButton">
                            <li class="px-2"><p class="dropdown-item"><?php echo $firstname." ".$lastname; ?></p></li>
                            <li class="px-2"><hr class="dropdown-divider"></li>
                            <li class="px-2"><a class="dropdown-item" href="dashboard">Dashboard</a></li>
                            <li class="px-2"><hr class="dropdown-divider"></li>
                            <li class="px-2 "><a class="btn btn-danger px-5" href="<?php echo site_url('logout'); ?>"" id="logoutButton">Logout</a></li>
                            </ul>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>

    <!-- Include jQuery library if not already included -->

