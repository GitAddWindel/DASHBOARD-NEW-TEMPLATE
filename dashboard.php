<?php
 require_once 'userId.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OJT Documentation System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
     <link rel="stylesheet" href="assets/css/aside.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">OJT Documentation System</a>
            <button class="navbar-toggler" type="button" onclick="toggleSidebar()">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-light sidebar hide" id="sidebar">
                <ul class="nav flex-column mt-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" onclick="showContent('dashboard')">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('trackDocuments')">
                            <i class="bi bi-file-earmark-text"></i> Track Documentations
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('timerContent')">
                            <i class="bi bi-clock"></i> Time In / Time Out
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('userProfile')">
                            <i class="bi bi-person"></i> User Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showContent('logout')">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9 content" id="mainContent">
            <div id="initialContent" class="box">
    <p><strong>Welcome to the OJT Documentation System!</strong></p>

    <p>As you embark on your journey through this platform, we are excited to provide you with the tools and resources necessary for your On-the-Job Training experience. This system is designed to enhance your learning and documentation process, enabling you to effectively capture and reflect on your training experiences.</p>
</div>

               <!-- Dashboard -->
<div class="box" id="dashboardContent" style="display:none;">
    <h2>Dashboard</h2>
    <hr>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Created Documentations</h5>
                    <hr>
                    <h2 class="text-center" id="countCreatedDoc">50</h2>
                </div>
            </div>
        </div>
    
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Consumed Time</h5>
                    <hr>
                    <h2 class="text-center" id="countConsumeTime"></h2>
                </div>
            </div>
        </div>
    </div>
</div>

                    

           

                <!-- Track Documents -->
                <div class="table-responsive" id="trackDocumentsContent" style="display:none;">
                    <h2>OJT Documentations</h2>
                    <hr>
                    <div class="container mb-3">
                        <input type="search" class="form-control" id="searchByMonth" placeholder="Search by month">
                    </div>
                    <div class="container mb-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDocumentationModal">
                            <i class="bi bi-plus"></i> Add Documentation
                        </button>
                        <button class="btn btn-dark" id="printDocumentations">
                            <i class="bi bi-download"></i> Download All
                        </button>
                        <button class="btn btn-success" id="logbook" data-bs-toggle="modal" data-bs-target="#logbookModal">
                            <i class="bi bi-clock"></i> Time In / Time Out
                        </button>
                    </div>
                    <div style="max-height: 300px; overflow-y: auto;">
                        <table class="table" id="documentationTable">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col">Month</th>
                                    <th scope="col">Date Submitted</th>
                                    <th scope="col">Purpose</th>
                                    <th scope="col">Tasks</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody id="documentationBody">
                                <!-- Dynamic rows will be inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>

               <!-- Add Documentation Modal -->
<div class="modal fade" id="addDocumentationModal" tabindex="-1" aria-labelledby="addDocumentationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDocumentationModalLabel">Add Documentation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="documentationForm">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo htmlspecialchars($userId); ?>">
                    <div class="mb-3">
                        <label for="month" class="form-label">Month</label>
                        <select class="form-select" id="month" name="month" required>
                            <option value="" disabled selected>Select a month</option>
                            <!-- Month options -->
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dateSubmitted" class="form-label">Date Submitted</label>
                        <input type="date" class="form-control" id="dateSubmitted" name="date_submitted" required>
                    </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose</label>
                        <select class="form-select" id="purpose" name="purpose" required>
                            <option value="OJT">OJT</option>              
                        </select>
                    </div>
                    <div id="tasksContainer">
                        <div class="mb-3">
                            <label for="tasks" class="form-label">Tasks</label>
                            <input type="text" class="form-control task-input" name="tasks" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Documentation</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Logbook -->
<div class="modal fade" id="logbookModal" tabindex="-1" aria-labelledby="logbookModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logbookModalLabel">Logbook Entry</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="logbookForm">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo htmlspecialchars($userId); ?>">
                    <div class="mb-3">
                            <label for="month" class="form-label">Month</label>
                            <select class="form-select" id="month" name="month" required>
                                <option value="" disabled selected>Select a month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>

                    <div class="mb-3">
                        <label for="timeslot" class="form-label">Choices</label>
                        <select class="form-select" name="timeslot" id="timeslot" required>
                            <option value="Time In">Time In</option>
                            <option value="Time Out">Time Out</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>

                    <div class="mb-3">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>





              <!-- User Profile -->
                <div id="userProfileContent" style="display:none;">
                    <h2>User Profile</h2>
                    <hr>
                    <div class="card mt-4">
                        <div class="card-body">
                            <p class="card-text"><strong>Email:</strong> <?php echo htmlspecialchars($userEmail); ?></p>
                            <div class="mb-3">
                                <small>If you would like to clear all your data, please click:</small>
                                <a href="#" id="resetRecords">Reset All</a>
                            </div>
                            <!-- Hidden reset button -->
                            <div class="mt-3" id="resetButtonContainer" style="display:none;">
                                <button class="btn btn-danger" id="resetNowBtn">Reset Now</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Settings -->
                <div id="logoutContent" style="display:none;">
                <div class="card mt-4">
                <div class="card-body">
                <button class="btn btn-danger sm" id="openModalLogout">Logout Account</button>
                </div>
            </div>
            </div>

            </div>
        </div>
    </div>

<!-- Confirmation Modal -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to reset all data?
      </div>
      <div class="modal-footer">
        <input type="hidden" id="user_id" value="<?= htmlspecialchars($user_id) ?>"> <!-- Use htmlspecialchars for safety -->
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmResetBtn" data-user-id="<?= htmlspecialchars($user_id) ?>">Yes, Reset</button>
      </div>
    </div>
  </div>
</div>

<!-- Logout Confirmation Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out of your account?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmLogout">Logout</button>
            </div>
        </div>
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="assets/js/toggle.js"></script>
    <script src="auth.js"></script>
    <script src="resetShow.js"></script>
    <script src="logout.js"></script>
</body>
</html>
