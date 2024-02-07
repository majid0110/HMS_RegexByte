<?php include 'include_common/head.php'; ?>
<?php include 'include_common/navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="./public/assets/vendors_s/select2/select2.min.css">
  <link rel="stylesheet" href="./public/assets/vendors_s/select2-bootstrap-theme/select2-bootstrap.min.css">
  <style>
    .badge-pill:hover {
      background-color: #007bff;
      /* Change this to the desired hover background color */
      color: #fff;
      /* Change this to the desired hover text color */
      cursor: pointer;
    }

    #clientDetails {
      font-weight: 750;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border me-3"></div>Light
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border me-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab"
              aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab"
              aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel"
            aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="../../images/faces/face1.jpg" alt="image"><span class="online"></span>
                </div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face2.jpg" alt="image"><span class="offline"></span>
                </div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face3.jpg" alt="image"><span class="online"></span>
                </div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face4.jpg" alt="image"><span class="offline"></span>
                </div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face5.jpg" alt="image"><span class="online"></span>
                </div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="../../images/faces/face6.jpg" alt="image"><span class="online"></span>
                </div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      <?php include 'include_common/sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">

        <div class="content-wrapper">
          <?php
          $successMessage = session()->getFlashdata('success');
          $errorMessage = session()->getFlashdata('error');

          if ($successMessage) {
            echo '<div class="alert alert-success">' . $successMessage . '</div>';
          }

          if ($errorMessage) {
            echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
          }
          ?>
          <div class="row">
            <div class="col-md-6">
              <div class="card h-100">
                <div class="card-body">
                  <h4 class="card-title">Add Test</h4>
                  <p class="card-description">
                    Lab Test Services
                  </p>
                  <form class="pt-3" method="POST" action="<?php echo base_url() . "submitTests"; ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="clientName">Client Name</label>
                      <select class="form-control" id="clientName" name="clientName">
                        <?php foreach ($client_names as $client): ?>
                          <option value="<?= $client['idClient']; ?>">
                            <?= $client['client']; ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="appointment">Appointment</label>
                      <select class="form-control" id="appointment" name="appointment">
                        <!-- Appointments will be loaded dynamically here -->
                      </select>
                      <div id="appointmentStatus"></div>
                    </div>

                    <div class="form-group">
                      <label for="testType">Test Type</label>
                      <ul class="list-group" id="testTypeList">
                        <?php foreach ($test_types as $testType): ?>
                          <li class="list-group-item d-flex justify-content-between align-items-center"
                            data-test-type-id="<?= $testType['testTypeId']; ?>">
                            <span class="title">
                              <?= $testType['title']; ?>
                            </span>
                            <span class="fee" contenteditable="true">
                              <?= $testType['test_fee']; ?>
                            </span>
                            <span class="badge badge-primary badge-pill hover-effect" onclick="addTest()">ADD</span>
                          </li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                  </form>

                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card h-100">
                <div class="card-body">
                  <h4 class="card-title">SUMMARY</h4>
                  <p class="card-description" id="clientDetails"></p>
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Test Type</th>
                        <th>Test Fee</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody id="testTableBody">

                    </tbody>
                  </table>
                </div>
                <div style="margin-left: 2.3em; font-weight: 900; font-size: 150px">
                  <p>Total Fee: <span id="totalFee">0</span></p>
                </div>
                <div style="height: 50px; margin-left: 1.4em; font-weight: 900; font-size: 150px">
                  <button class="btn btn-primary btn-fw" id="insertBtn">PRINT</button>
                </div>
              </div>
            </div>

          </div>



          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
      <!-- container-scroller -->
      <!-- plugins:js -->
      <script src="../../vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <script src="../../vendors/typeahead.js/typeahead.bundle.min.js"></script>
      <script src="../../vendors/select2/select2.min.js"></script>
      <script src="../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="../../js/off-canvas.js"></script>
      <script src="../../js/hoverable-collapse.js"></script>
      <script src="../../js/template.js"></script>
      <script src="../../js/settings.js"></script>
      <script src="../../js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page-->
      <script src="../../js/file-upload.js"></script>
      <script src="../../js/typeahead.js"></script>
      <script src="../../js/select2.js"></script>
      <!-- End custom js for this page-->

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="../../vendors/js/vendor.bundle.base.js"></script>



      <script>
        $(document).ready(function () {
          var initialClientId = $('#clientName').val();
          loadAppointments(initialClientId);

          $('#clientName').change(function () {
            var clientId = $(this).val();
            updateClientDetails(clientId);
            loadAppointments(clientId);
          });

          function updateClientDetails(clientId) {
            var clientName = $('#clientName option:selected').text();
            var appointment = $('#appointment option:selected').text();
            $('#clientDetails').html('Client: ' + clientName + '<br>Appointment: ' + appointment);
          }


          // function loadAppointments(clientId) {
          //     $.ajax({
          //         method: 'POST',
          //         url: '<?= site_url('LabController/getAppointmentsForClient') ?>',
          //         dataType: "json",
          //         data: {
          //             clientId: clientId,
          //             _cache: new Date().getTime()
          //         },
          //         async: false, 
          //         success: function (response) {
          //             console.log('Appointments Response:', response);

          //             var appointmentDropdown = $('#appointment');
          //             appointmentDropdown.empty();

          //             if (response.success && response.appointments.length > 0) {
          //                 $.each(response.appointments, function (index, appointment) {
          //                     appointmentDropdown.append('<option value="' + appointment.appointmentID + '">' + appointment.appointmentID + '</option>');
          //                 });

          //                 updateClientDetails(clientId);
          //             } else {
          //                 appointmentDropdown.append('<option value="">No appointments available</option>');
          //             }
          //         },
          //         error: function (error) {
          //             console.error('Error loading appointments:', error);
          //         }
          //     });
          // }

          function loadAppointments(clientId) {
            $.ajax({
              method: 'POST',
              url: '<?= site_url('LabController/getAppointmentsForClient') ?>',
              dataType: "json",
              data: {
                clientId: clientId,
                _cache: new Date().getTime()
              },
              async: false,
              success: function (response) {
                console.log('Appointments Response:', response);

                var appointmentDropdown = $('#appointment');
                appointmentDropdown.empty();

                if (response.success && response.appointments.length > 0) {
                  $.each(response.appointments, function (index, appointment) {
                    appointmentDropdown.append('<option value="' + appointment.appointmentID + '">' + appointment.appointmentID + '</option>');
                  });
                } else {
                  appointmentDropdown.append('<option value="">No appointments available</option>');
                  updateClientDetails(clientId, 'No appointments available');
                }
              },
              error: function (error) {
                console.error('Error loading appointments:', error);
              }
            });
          }
          function addTestRow(testType, testTypeId, testFee) {
            var newRow = '<tr><td data-test-type-id="' + testTypeId + '">' + testType + '</td>' +
              '<td contenteditable="true" class="editable-fee">' + testFee + '</td>' +
              '<td><button class="btn btn-danger btn-sm remove-btn" onclick="removeTestRow(this)">Remove</button></td></tr>';
            $('#testTableBody').append(newRow);

            $('#testTableBody').off('input', '.editable-fee').on('input', '.editable-fee', function () {
              calculateTotalFee();
            });

            calculateTotalFee();
          }

          function addTest(testType, testTypeId) {
            var testFee = $('#testTypeList li:contains(' + testType + ') .fee').text();
            var existingRow = $('#testTableBody td:contains(' + testType + ')').closest('tr');

            if (existingRow.length > 0) {
              existingRow.find('.editable-fee').text(testFee);
            } else {
              addTestRow(testType, testTypeId, testFee);
            }
            calculateTotalFee();
          }


          $('#testTypeList .badge-pill').mouseenter(function () {
            $(this).addClass('hover-effect');
          });

          $('#testTypeList .badge-pill').mouseleave(function () {
            $(this).removeClass('hover-effect');
          });

          $('#testTypeList .badge').click(function () {

            // var testType = $(this).closest('li').find('span:first').text().trim();
            // var testTypeId = $(this).closest('li').data('test-type-id');
            // var testFee = $(this).closest('li').find('.fee').text();

            var testTypeRow = $(this).closest('li');
            var testTypeId = testTypeRow.data('test-type-id');
            var testType = testTypeRow.find('.title').text().trim();
            var testFee = testTypeRow.find('.fee').text();
            addTestRow(testType, testTypeId, testFee);
            calculateTotalFee();
          });

          function addTestRow(testType, testTypeId, testFee) {

            var newRow = '<tr><td data-test-type-id="' + testTypeId + '">' + testType + '</td>' +
              '<td contenteditable="true" class="editable-fee">' + testFee + '</td>' +
              '<td><button class="btn btn-danger btn-sm remove-btn" onclick="removeTestRow(this)">Remove</button></td></tr>';
            $('#testTableBody').append(newRow);

            $('#testTableBody').off('input', '.editable-fee').on('input', '.editable-fee', function () {
              calculateTotalFee();
            });

            calculateTotalFee();
          }

          $('#testTableBody').on('click', '.remove-btn', function () {
            var row = $(this).closest('tr');
            var testFee = parseFloat(row.find('td:eq(1)').text());
            row.remove();
            calculateTotalFee(-testFee);
          });



          function calculateTotalFee() {
            var totalFee = 0;

            $('#testTableBody tr').each(function () {
              var fee = parseFloat($(this).find('td:eq(1)').text());
              if (!isNaN(fee)) {
                totalFee += fee;
              }
            });

            $('#totalFee').text(totalFee.toFixed(2));
          }

          $('#insertBtn').click(function () {
            insertData();
          });



          //   function insertData() {
          //     var clientId = $('#clientName').val();
          //     var appointmentId = $('#appointment').val();
          //     var totalFee = parseFloat($('#totalFee').text());

          //     console.log('Client ID:', clientId);
          //     console.log('Appointment ID:', appointmentId);
          //     console.log('Total Fee:', totalFee);

          //     if (!clientId || isNaN(totalFee)) {
          //       alert('Invalid data for insertion.');
          //       return;
          //     }

          //     var tests = [];

          //     $('#testTableBody tr').each(function() {
          //       var testTypeId = $(this).find('td:eq(0)').data('test-type-id');
          //       var fee = parseFloat($(this).find('td:eq(1)').text());

          //       tests.push({

          //         testTypeId: testTypeId,
          //         fee: fee,
          //         appointmentId: appointmentId

          //       });
          //     });

          //     console.log('Tests Array:', tests);

          //     $.ajax({
          //       method: 'POST',
          //       url: '<?= site_url('LabController/submitTests') ?>',
          //       dataType: "json",
          //       data: {
          //         clientId: clientId,
          //         appointmentId: appointmentId,
          //         totalFee: totalFee,
          //         tests: tests
          //       },
          //       success: function(response) {
          //         alert('Data inserted successfully!');
          //         console.log('Data inserted successfully:', response);
          //         $('#testTableBody').empty();
          //         $('#totalFee').text('0');
          //       },
          //       error: function(error) {
          //         console.error('Error inserting data:', error);
          //       }
          //     });
          //   }

          //  });


          function insertData() {
            var clientId = $('#clientName').val();
            var appointmentId = $('#appointment').val();
            var totalFee = parseFloat($('#totalFee').text());

            console.log('Client ID:', clientId);
            console.log('Appointment ID:', appointmentId);
            console.log('Total Fee:', totalFee);



            if (!clientId || isNaN(totalFee)) {
              alert('Invalid data for insertion.');
              return;
            }

            var tests = [];

            $('#testTableBody tr').each(function () {
              var testTypeId = $(this).find('td:eq(0)').data('test-type-id');
              var fee = parseFloat($(this).find('td:eq(1)').text());

              tests.push({
                testTypeId: testTypeId,
                fee: fee,
                appointmentId: appointmentId
              });
            });



            $.ajax({
              method: 'POST',
              url: '<?= site_url('LabController/submitTests') ?>',
              dataType: "json",
              data: {
                clientId: clientId,
                appointmentId: appointmentId,
                totalFee: totalFee,
                tests: tests
              },
              success: function (response) {
                console.log('Data inserted successfully:', response);

                // Check if PDF content is present
                if (response.pdfContent) {
                  // Decode base64 and use the PDF content as needed
                  var decodedPdfContent = atob(response.pdfContent);

                  // Create a Blob from the decoded PDF content
                  var blob = new Blob([new Uint8Array(decodedPdfContent.split('').map(function (c) {
                    return c.charCodeAt(0);
                  }))], {
                    type: 'application/pdf'
                  });

                  // Create a download link and trigger the download
                  var link = document.createElement('a');
                  link.href = window.URL.createObjectURL(blob);
                  //   link.download = 'your_file_name.pdf'; // Specify the desired file name
                  link.click();
                }

                // Continue with other actions as needed
                $('#testTableBody').empty();
                $('#totalFee').text('0');
              },


              error: function (error) {
                console.error('Error inserting data:', error);
              }
            });
          }
        });

      </script>




</body>


<!-- Mirrored from demo.bootstrapdash.com/star-admin2-free/template/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 05:42:34 GMT -->

</html>