<?php
// Retrieve modules from session data
$modules = $session->get('modules');
$userPermissions = $session->get('user_permissions');
$modulePermissions = $session->get('module_permissions'); // Assuming you store user permissions in the session

?>


<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard'); ?>">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id'];

            $isRegisterBusinessModule = $module['module_name'] === 'Register Business';

            $canView = $isRegisterBusinessModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item nav-category">
                    <?= $module['module_name'] ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-<?= $moduleID ?>" aria-expanded="false"
                        aria-controls="ui-basic-<?= $moduleID ?>">
                        <i class="menu-icon mdi mdi-floor-plan"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-<?= $moduleID ?>">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('user_form'); ?>">
                                    <?= $module['module_name'] ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('business_table'); ?>">View
                                    <?= $module['module_name'] ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id'];

            $isUserManagementModule = $module['module_name'] === 'User Management';

            $canView = $isUserManagementModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-<?= $moduleID ?>" aria-expanded="false"
                        aria-controls="ui-basic-<?= $moduleID ?>">
                        <i class="menu-icon mdi mdi-card-text-outline"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-<?= $moduleID ?>">
                        <ul class="nav flex-column sub-menu">
                            <!-- <li class="nav-item">
                        <a class="nav-link" href="pages/forms/basic_elements.html">Create License</a>
                    </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() . 'role_form'; ?>">Create Roles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() . 'user_form2'; ?>">Create Users</a>
                            </li>
                            <li class="nav-item">
                        <a class="nav-link" href="<?= base_url( 'users_table'); ?>">View Users</a>
                    </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id']; // Adjust this based on your actual column name
        
            // Check if the current module is the "Modules" module
            $isModulesModule = $module['module_name'] === 'Modules';

            // Check if the user has permission to view this module
            $canView = $isModulesModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-<?= $moduleID ?>" aria-expanded="false"
                        aria-controls="ui-basic-<?= $moduleID ?>">
                        <i class="menu-icon mdi mdi-buffer"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-<?= $moduleID ?>">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="pages/tables/basic-table.html">Add Modules</a>
                            </li>
                            <!-- Add more sub-menu items as needed -->
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>


        <!-- For Clients module -->
        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id']; // Adjust this based on your actual column name
        
            // Check if the current module is the "Clients" module
            $isClientsModule = $module['module_name'] === 'Clients';

            // Check if the user has permission to view this module
            $canView = $isClientsModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-<?= $moduleID ?>" aria-expanded="false"
                        aria-controls="ui-basic-<?= $moduleID ?>">
                        <i class="menu-icon mdi mdi-account-circle-outline"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-<?= $moduleID ?>">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('clients_form'); ?>">Add
                                    <?= $module['module_name'] ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('clients_table'); ?>">View
                                    <?= $module['module_name'] ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- For Appointments module -->
        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id'];

            $isAppointmentsModule = $module['module_name'] === 'Appointments';

            $canView = $isAppointmentsModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-<?= $moduleID ?>" aria-expanded="false"
                        aria-controls="ui-basic-<?= $moduleID ?>">
                        <i class="menu-icon mdi mdi-alarm-check"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-<?= $moduleID ?>">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('appointments_form'); ?>">Book
                                    <?= $module['module_name'] ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('appointments_table'); ?>">View Appointments</a>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- For Doctors module -->
        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id'];

            $isDoctorsModule = $module['module_name'] === 'Doctors';

            $canView = $isDoctorsModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-<?= $moduleID ?>" aria-expanded="false"
                        aria-controls="ui-basic-<?= $moduleID ?>">
                        <i class="menu-icon mdi mdi-doctor"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-<?= $moduleID ?>">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('doctors_form'); ?>">Add
                                    <?= $module['module_name'] ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('doctors_table'); ?>">View
                                    <?= $module['module_name'] ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('doctors_fee'); ?>">Doctors Fee</a>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- For Laboratory Services module -->
        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id'];

            $isLaboratoryServicesModule = $module['module_name'] === 'Laboratory Services';

            $canView = $isLaboratoryServicesModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-<?= $moduleID ?>" aria-expanded="false"
                        aria-controls="ui-basic-<?= $moduleID ?>">
                        <i class="menu-icon mdi mdi-pharmacy"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-<?= $moduleID ?>">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('labServices_form'); ?>">Add Lab Test</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('labtest_form'); ?>">Add Test</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('labtest_table'); ?>">View Tests</a>
                            </li>
                            <!-- Add more sub-menu items as needed -->
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id'];

            $isServicesModule = $module['module_name'] === 'Services';

            $canView = $isServicesModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-<?= $moduleID ?>" aria-expanded="false"
                        aria-controls="ui-basic-<?= $moduleID ?>">
                        <i class="menu-icon mdi mdi-bike"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-<?= $moduleID ?>">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('Services_form'); ?>">Add Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('services_test_form'); ?>">Add Test</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('services_test_table'); ?>">View Tests</a>
                            </li>
                            <!-- Add more sub-menu items as needed -->
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- Sales Modeule -->
        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id'];

            $isSalesModule = $module['module_name'] === 'Sales';

            $canView = $isSalesModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sales_form'); ?>">
                        <i class="menu-icon mdi mdi-cash-multiple"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- For Configuration module -->
        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id'];

            $isConfigurationModule = $module['module_name'] === 'Configuration';

            $canView = $isConfigurationModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-<?= $moduleID ?>" aria-expanded="false"
                        aria-controls="ui-basic-<?= $moduleID ?>">
                        <i class="menu-icon mdi mdi-settings"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-<?= $moduleID ?>">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('configure'); ?>">Configure Hospital</a>
                            </li>
                            <!-- Add more sub-menu items as needed -->
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>

        <!-- For Reports module -->
        <?php foreach ($modules as $module): ?>
            <?php
            $moduleID = $module['id'];

            $isReportsModule = $module['module_name'] === 'Reports';

            $canView = $isReportsModule && isset($modulePermissions[$moduleID]['can_view']) && $modulePermissions[$moduleID]['can_view'];
            ?>

            <?php if ($canView): ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic-<?= $moduleID ?>" aria-expanded="false"
                        aria-controls="ui-basic-<?= $moduleID ?>">
                        <i class="menu-icon mdi mdi-file-document"></i>
                        <span class="menu-title">
                            <?= $module['module_name'] ?>
                        </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic-<?= $moduleID ?>">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('sales_form'); ?>">Add Reports</a>
                            </li>
                            <!-- Add more sub-menu items as needed -->
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>









    </ul>



</nav>

<?php /*
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<ul class="nav">
<li class="nav-item">
  <a class="nav-link" href="index.html">
    <i class="mdi mdi-grid-large menu-icon"></i>
    <span class="menu-title">Dashboard</span>
  </a>
</li>
<li class="nav-item nav-category">REGISTER BUSINESS</li>
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
    <i class="menu-icon mdi mdi-floor-plan"></i>
    <span class="menu-title">Register Business</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="ui-basic">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() . 'user_form'; ?>">Add Business</a></li>
      <li class="nav-item"> <a class="nav-link" href="<?php echo base_url() . 'business_table'; ?>">Show Business List</a></li>
      <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li> -->
    </ul>
  </div>
</li>
<li class="nav-item nav-category">USER MANAGEMENT</li>
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
    <i class="menu-icon mdi mdi-card-text-outline"></i>
    <span class="menu-title">User Management</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="form-elements">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Create License</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'role_form'; ?>">Create Roles</a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'user_form2'; ?>">Create Users</a></li>
    </ul>
  </div>
</li>

<li class="nav-item nav-category">MODULES</li>
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="">
    <i class="menu-icon mdi mdi-table"></i>
    <span class="menu-title">Modules</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="tables">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Add Modules</a></li>
    </ul>
  </div>
</li>
</li>

<li class="nav-item nav-category">CLIENTS</li>
<li class="nav-item">
<a class="nav-link" data-bs-toggle="collapse" href="#clients" aria-expanded="false" aria-controls="clients">
<i class="menu-icon mdi mdi-account-circle-outline"></i>
<span class="menu-title">Clients</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse" id="clients">
<ul class="nav flex-column sub-menu">
  <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'clients_form'; ?>">Add Clients</a></li>
  <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'clients_table'; ?>">Show Clients</a></li>
  <!-- <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'doctors_fee'; ?>">Doctors Fee</a></li> -->
</ul>
</div>
</li>

<li class="nav-item nav-category">APPOINTMENTS</li>
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
    <i class="menu-icon mdi mdi-alarm-check"></i>
    <span class="menu-title">Appointments</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="icons">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Add Appointments</a></li>
    </ul>
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Show List</a></li>
    </ul>
  </div>
</li> 
</li>

<li class="nav-item nav-category">DOCTORS</li>
<li class="nav-item">
<a class="nav-link" data-bs-toggle="collapse" href="#doctors" aria-expanded="false" aria-controls="doctors">
<i class="menu-icon mdi mdi-doctor"></i>
<span class="menu-title">Doctors</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse" id="doctors">
<ul class="nav flex-column sub-menu">
  <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'doctors_form'; ?>">Add Doctors</a></li>
  <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'doctors_table'; ?>">Show Doctors</a></li>
  <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'doctors_fee'; ?>">Doctors Fee</a></li>
</ul>
</div>
</li>
<li class="nav-item nav-category">LABORATORY SERVICES</li>
<li class="nav-item">
<li class="nav-item">
  <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
    <i class="menu-icon mdi mdi-pharmacy"></i>
    <span class="menu-title">Laboratory Services</span>
    <i class="menu-arrow"></i>
  </a>
  <div class="collapse" id="charts">
    <ul class="nav flex-column sub-menu">
      <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Manage laboratory </a></li>
    </ul>
  </div>
</li>
</li>


<li class="nav-item nav-category">CONFIGURATION</li>
<li class="nav-item">
<a class="nav-link" data-bs-toggle="collapse" href="#configuration" aria-expanded="false" aria-controls="configuration">
<i class="menu-icon mdi mdi-table"></i>
<span class="menu-title">Configuration</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse" id="configuration">
<ul class="nav flex-column sub-menu">
  <li class="nav-item"><a class="nav-link" href="<?php echo base_url() . 'configure'; ?>">Configure Hospital</a></li>
</ul>
</div>
</li>



<li class="nav-item nav-category">REPORTS</li>
<li class="nav-item">
<a class="nav-link" data-bs-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports">
<i class="menu-icon mdi mdi-file-document"></i>
<span class="menu-title">Reports</span>
<i class="menu-arrow"></i>
</a>
<div class="collapse" id="reports">
<ul class="nav flex-column sub-menu">
  <li class="nav-item"><a class="nav-link" href="pages/tables/basic-table.html">Add Reports</a></li>
</ul>
</div>
</li>









</ul>



</nav>
*/?>