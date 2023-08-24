<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/botman/chat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sPpqfwGPqsOdAZ7u',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VzXhM4XsqGtIYuQJ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'VisitorLanding',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/ticket' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ticket',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'postLogin',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/client/home' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientHome',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/client/schedule' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientSchedule',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/client/schedule/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientScheduleAdd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/client/schedule/slot' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientScheduleSlot',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/client/schedule/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientScheduleList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/client/schedule/history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientScheduleHistory',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/client/review/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientScheduleReview',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/client/volunteer' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientVolunteerList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/client/volunteer/submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientVolunteerSubmit',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/client/volunteer/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientVolunteerDelete',
          ),
          1 => NULL,
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'postRegister',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register/email-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'emailOTP',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register/confirm-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'confirmOTP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register/resend-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'resendOTP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forgotPassword',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password/email-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forgotPasswordOTP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password/confirm-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forgotPasswordConfirmOTP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password/resend-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'forgotPasswordResendOTP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/schedule' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'schedule',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/schedule/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scheduleSearch',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/schedule/qrscanner' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scheduleQRscanner',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/schedule/disable-date' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scheduleDateDisable',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/schedule/slot' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scheduleSlot',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/schedule/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ScheduleAdd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/service' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ServiceList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/service/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ServiceAdd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/osca-dashboard' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user-statistics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getUserStatistics',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/services-statistics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getServicesStatistics',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/schedules-statistics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getSchedulesStatistics',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/top-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getTopList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/comorbidity-statistics' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getComorbidityStatisticxs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user-management/users/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'userList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getUsers',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/user-management/users/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'postUser',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/comorbidity-management/comorbidity/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'comorbidityList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/comorbidity-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getcomorbidity',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/comorbidity-management/comorbidity/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'addComorbidity',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/comorbidity-management/comorbidity/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'deleteComorbidity',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/comorbidity-management/comorbidity/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateComorbidity',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer-management/volunteer/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'volunteerList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getVolunteer',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer-management/volunteer/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'addVolunteer',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer-management/volunteer/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateVolunteer',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer-management/volunteer/delete' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'deleteVolunteer',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/application-management/application/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'applicationList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/application-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getApplication',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/application-management/application/approve' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'approveApplication',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/application-management/application/deny' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'denyApplication',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/application-management/application/attended' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'checkInApplication',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/application-management/application/search' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'searchUser',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/application-management/application/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'addApplication',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/holidays' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'HolidaysView',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/holiday/ph' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'GetPhHolidays',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/holiday/cu' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'GetCuHolidays',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/holiday/add' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'HolidayAdd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile-page' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profilePage',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile-edit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profileEdit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profileUpdate',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile-comorbidty' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profileComorbidity',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile-email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profileEmail',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profilePassword',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile-username' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profileUsername',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/report-management' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reportList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'usersReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/barangay-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'barangayReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/services-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'servicesReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/comorbidities-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'comorbiditiesReport',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/generate-pdf' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generatePDF',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'notificationList',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/restriction' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'restriction',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/schedule/reminder/tomorrow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reminderScheduleTomorrow',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/schedule/reminder/today' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reminderScheduleToday',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/schedule/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateSchedule',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/reminder/tomorrow' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reminderVolunteerTomorrow',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/volunteer/reminder/today' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'reminderVolunteerToday',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/update-age' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateAge',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/test-database' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9RvMwubxfJ89rux1',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/chatbox-botman' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XPXgVaBv2iCd1C8l',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'POST' => 1,
            'HEAD' => 2,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'getLogs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api-logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'apiLogs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/chat' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'chat',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/client/schedule/(?|list/([^/]++)(*:40)|cancel/([^/]++)(*:62))|/s(?|chedule/(?|view/([^/]++)(*:99)|accept/([^/]++)(*:121))|ervice/(?|edit/([^/]++)(*:153)|update/([^/]++)(*:176)|delete/([^/]++)(*:199)))|/user\\-management/users/(?|([^/]++)(*:244)|view/([^/]++)(*:265)|([^/]++)/(?|is\\-active(*:295)|comorbidity(*:314)))|/holiday/(?|single/([^/]++)(*:351)|update/([^/]++)(*:374)|delete/([^/]++)(*:397))|/profile/([^/]++)/is\\-active(*:434)|/notification/update/([^/]++)(*:471))/?$}sDu',
    ),
    3 => 
    array (
      40 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientScheduleView',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      62 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ClientScheduleCancel',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      99 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scheduleView',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      121 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scheduleAccept',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      153 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ServiceEdit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      176 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ServiceUpdate',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      199 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ServiceDelete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      244 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'updateUser',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      265 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'userView',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      295 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'isActive',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      314 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'UpdateComorbidity',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      351 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'HolidayGet',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      374 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'HolidayUpdate',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'HolidayDelete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      434 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profileActive',
          ),
          1 => 
          array (
            0 => 'userId',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      471 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'NotificationUpdate',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::sPpqfwGPqsOdAZ7u' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'botman/chat',
      'action' => 
      array (
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'as' => 'generated::sPpqfwGPqsOdAZ7u',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'botman-web::chat',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VzXhM4XsqGtIYuQJ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:297:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:79:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000487f1ad000000000378cdb91";}";s:4:"hash";s:44:"gwoaTh0TXO3RN5TWIdkLrD5CaTiMJHIGqDxaulAGbTI=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::VzXhM4XsqGtIYuQJ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'VisitorLanding' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Visitor\\LandingController@VisitorLanding',
        'controller' => 'App\\Http\\Controllers\\Visitor\\LandingController@VisitorLanding',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'VisitorLanding',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ticket' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'ticket',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:270:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:52:"function () {
    return \\view(\'client.ticket\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000487f1add00000000378cdb91";}";s:4:"hash";s:44:"DUU8g/T08bgI4kKyF+y7KBaemFFfa4URJCMhnLO1eXI=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ticket',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\LoginController@index',
        'controller' => 'App\\Http\\Controllers\\Authentication\\LoginController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientHome' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'client/home',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ClientHomeController@ClientHome',
        'controller' => 'App\\Http\\Controllers\\Client\\ClientHomeController@ClientHome',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientHome',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientSchedule' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'client/schedule',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientSchedule',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientSchedule',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientSchedule',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientScheduleAdd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'client/schedule/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleAdd',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleAdd',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientScheduleAdd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientScheduleSlot' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'client/schedule/slot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleSlot',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleSlot',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientScheduleSlot',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientScheduleList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'client/schedule/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleList',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleList',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientScheduleList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientScheduleView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'client/schedule/list/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleView',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleView',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientScheduleView',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientScheduleHistory' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'client/schedule/history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleHistory',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleHistory',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientScheduleHistory',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientScheduleCancel' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'client/schedule/cancel/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleCancel',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleCancel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientScheduleCancel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientScheduleReview' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'client/review/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleReview',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@ClientScheduleReview',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientScheduleReview',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientVolunteerList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'client/volunteer',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\VolunteerController@ClientVolunteerList',
        'controller' => 'App\\Http\\Controllers\\Client\\VolunteerController@ClientVolunteerList',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientVolunteerList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientVolunteerSubmit' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'client/volunteer/submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\VolunteerController@ClientVolunteerSubmit',
        'controller' => 'App\\Http\\Controllers\\Client\\VolunteerController@ClientVolunteerSubmit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientVolunteerSubmit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ClientVolunteerDelete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'client/volunteer/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:2',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\VolunteerController@ClientVolunteerDelete',
        'controller' => 'App\\Http\\Controllers\\Client\\VolunteerController@ClientVolunteerDelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ClientVolunteerDelete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'postLogin' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\LoginController@postLogin',
        'controller' => 'App\\Http\\Controllers\\Authentication\\LoginController@postLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'postLogin',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Authentication\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\RegisterController@index',
        'controller' => 'App\\Http\\Controllers\\Authentication\\RegisterController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'postRegister' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\RegisterController@postRegister',
        'controller' => 'App\\Http\\Controllers\\Authentication\\RegisterController@postRegister',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'postRegister',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'emailOTP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register/email-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\RegisterController@emailOTP',
        'controller' => 'App\\Http\\Controllers\\Authentication\\RegisterController@emailOTP',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'emailOTP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'confirmOTP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register/confirm-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\RegisterController@confirmOTP',
        'controller' => 'App\\Http\\Controllers\\Authentication\\RegisterController@confirmOTP',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'confirmOTP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'resendOTP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'register/resend-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\RegisterController@resendOTP',
        'controller' => 'App\\Http\\Controllers\\Authentication\\RegisterController@resendOTP',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'resendOTP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forgotPassword' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\ForgotPasswordController@forgotPassword',
        'controller' => 'App\\Http\\Controllers\\Authentication\\ForgotPasswordController@forgotPassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forgotPassword',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forgotPasswordOTP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password/email-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\ForgotPasswordController@forgotPasswordOTP',
        'controller' => 'App\\Http\\Controllers\\Authentication\\ForgotPasswordController@forgotPasswordOTP',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forgotPasswordOTP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forgotPasswordConfirmOTP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password/confirm-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\ForgotPasswordController@forgotPasswordConfirmOTP',
        'controller' => 'App\\Http\\Controllers\\Authentication\\ForgotPasswordController@forgotPasswordConfirmOTP',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forgotPasswordConfirmOTP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'forgotPasswordResendOTP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password/resend-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Authentication\\ForgotPasswordController@forgotPasswordResendOTP',
        'controller' => 'App\\Http\\Controllers\\Authentication\\ForgotPasswordController@forgotPasswordResendOTP',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'forgotPasswordResendOTP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'schedule' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'schedule',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@schedule',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@schedule',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'schedule',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scheduleView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'schedule/view/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleView',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleView',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'scheduleView',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scheduleAccept' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'schedule/accept/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleAccept',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleAccept',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'scheduleAccept',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scheduleSearch' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'schedule/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleSearch',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleSearch',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'scheduleSearch',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scheduleQRscanner' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'schedule/qrscanner',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleQRscanner',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleQRscanner',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'scheduleQRscanner',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scheduleDateDisable' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'schedule/disable-date',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleDateDisable',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleDateDisable',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'scheduleDateDisable',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scheduleSlot' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'schedule/slot',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleSlot',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@scheduleSlot',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'scheduleSlot',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ScheduleAdd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'schedule/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Client\\ScheduleController@ScheduleAdd',
        'controller' => 'App\\Http\\Controllers\\Client\\ScheduleController@ScheduleAdd',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ScheduleAdd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ServiceList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'service',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Services\\ServiceController@ServiceList',
        'controller' => 'App\\Http\\Controllers\\Services\\ServiceController@ServiceList',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ServiceList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ServiceAdd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'service/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Services\\ServiceController@ServiceAdd',
        'controller' => 'App\\Http\\Controllers\\Services\\ServiceController@ServiceAdd',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ServiceAdd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ServiceEdit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'service/edit/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Services\\ServiceController@ServiceEdit',
        'controller' => 'App\\Http\\Controllers\\Services\\ServiceController@ServiceEdit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ServiceEdit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ServiceUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'service/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Services\\ServiceController@ServiceUpdate',
        'controller' => 'App\\Http\\Controllers\\Services\\ServiceController@ServiceUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ServiceUpdate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ServiceDelete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'service/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Services\\ServiceController@ServiceDelete',
        'controller' => 'App\\Http\\Controllers\\Services\\ServiceController@ServiceDelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'ServiceDelete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'osca-dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\DashboardController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getUserStatistics' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user-statistics',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AnaylticsController@getUserStatistics',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AnaylticsController@getUserStatistics',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getUserStatistics',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getServicesStatistics' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'services-statistics',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AnaylticsController@getServicesStatistics',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AnaylticsController@getServicesStatistics',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getServicesStatistics',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getSchedulesStatistics' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'schedules-statistics',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AnaylticsController@getSchedulesStatistics',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AnaylticsController@getSchedulesStatistics',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getSchedulesStatistics',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getTopList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'top-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AnaylticsController@getTopList',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AnaylticsController@getTopList',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getTopList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getComorbidityStatisticxs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'comorbidity-statistics',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\AnaylticsController@getComorbidityStatisticxs',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\AnaylticsController@getComorbidityStatisticxs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getComorbidityStatisticxs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'userList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user-management/users/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\UserManagement\\UserListController@index',
        'controller' => 'App\\Http\\Controllers\\UserManagement\\UserListController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'userList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getUsers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\UserManagement\\UserListController@getUsers',
        'controller' => 'App\\Http\\Controllers\\UserManagement\\UserListController@getUsers',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getUsers',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'postUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user-management/users/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\UserManagement\\UserListController@store',
        'controller' => 'App\\Http\\Controllers\\UserManagement\\UserListController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'postUser',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user-management/users/{userId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\UserManagement\\UserListController@update',
        'controller' => 'App\\Http\\Controllers\\UserManagement\\UserListController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'updateUser',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'userView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'user-management/users/view/{userId}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\UserManagement\\UserViewController@userView',
        'controller' => 'App\\Http\\Controllers\\UserManagement\\UserViewController@userView',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'userView',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'isActive' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user-management/users/{userId}/is-active',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\UserManagement\\UserViewController@isActive',
        'controller' => 'App\\Http\\Controllers\\UserManagement\\UserViewController@isActive',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'isActive',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'UpdateComorbidity' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'user-management/users/{userId}/comorbidity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\UserManagement\\UserViewController@UpdateComorbidity',
        'controller' => 'App\\Http\\Controllers\\UserManagement\\UserViewController@UpdateComorbidity',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'UpdateComorbidity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'comorbidityList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'comorbidity-management/comorbidity/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ComorbidityManagement\\ComorbidityController@index',
        'controller' => 'App\\Http\\Controllers\\ComorbidityManagement\\ComorbidityController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'comorbidityList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getcomorbidity' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'comorbidity-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ComorbidityManagement\\ComorbidityController@getcomorbidity',
        'controller' => 'App\\Http\\Controllers\\ComorbidityManagement\\ComorbidityController@getcomorbidity',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getcomorbidity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'addComorbidity' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'comorbidity-management/comorbidity/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ComorbidityManagement\\ComorbidityController@addComorbidity',
        'controller' => 'App\\Http\\Controllers\\ComorbidityManagement\\ComorbidityController@addComorbidity',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'addComorbidity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'deleteComorbidity' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'comorbidity-management/comorbidity/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ComorbidityManagement\\ComorbidityController@deleteComorbidity',
        'controller' => 'App\\Http\\Controllers\\ComorbidityManagement\\ComorbidityController@deleteComorbidity',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'deleteComorbidity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateComorbidity' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'comorbidity-management/comorbidity/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ComorbidityManagement\\ComorbidityController@updateComorbidity',
        'controller' => 'App\\Http\\Controllers\\ComorbidityManagement\\ComorbidityController@updateComorbidity',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'updateComorbidity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'volunteerList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer-management/volunteer/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\PersonnelVolunteerController@index',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\PersonnelVolunteerController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'volunteerList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getVolunteer' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\PersonnelVolunteerController@getVolunteer',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\PersonnelVolunteerController@getVolunteer',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getVolunteer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'addVolunteer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer-management/volunteer/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\PersonnelVolunteerController@addVolunteer',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\PersonnelVolunteerController@addVolunteer',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'addVolunteer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateVolunteer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer-management/volunteer/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\PersonnelVolunteerController@updateVolunteer',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\PersonnelVolunteerController@updateVolunteer',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'updateVolunteer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'deleteVolunteer' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'volunteer-management/volunteer/delete',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\PersonnelVolunteerController@deleteVolunteer',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\PersonnelVolunteerController@deleteVolunteer',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'deleteVolunteer',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'applicationList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application-management/application/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@index',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'applicationList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getApplication' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'application-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@getApplication',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@getApplication',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getApplication',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'approveApplication' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'application-management/application/approve',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@approveApplication',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@approveApplication',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'approveApplication',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'denyApplication' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'application-management/application/deny',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@denyApplication',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@denyApplication',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'denyApplication',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'checkInApplication' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'application-management/application/attended',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@checkInApplication',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@checkInApplication',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'checkInApplication',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'searchUser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'application-management/application/search',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@searchUser',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@searchUser',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'searchUser',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'addApplication' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'application-management/application/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@addApplication',
        'controller' => 'App\\Http\\Controllers\\VolunteerManagement\\ApplicationController@addApplication',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'addApplication',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'HolidaysView' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'holidays',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\HolidayController@HolidaysView',
        'controller' => 'App\\Http\\Controllers\\HolidayController@HolidaysView',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'HolidaysView',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'GetPhHolidays' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'holiday/ph',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\HolidayController@GetPhHolidays',
        'controller' => 'App\\Http\\Controllers\\HolidayController@GetPhHolidays',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'GetPhHolidays',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'GetCuHolidays' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'holiday/cu',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\HolidayController@GetCuHolidays',
        'controller' => 'App\\Http\\Controllers\\HolidayController@GetCuHolidays',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'GetCuHolidays',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'HolidayGet' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'holiday/single/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\HolidayController@HolidayGet',
        'controller' => 'App\\Http\\Controllers\\HolidayController@HolidayGet',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'HolidayGet',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'HolidayUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'holiday/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\HolidayController@HolidayUpdate',
        'controller' => 'App\\Http\\Controllers\\HolidayController@HolidayUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'HolidayUpdate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'HolidayAdd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'holiday/add',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\HolidayController@HolidayAdd',
        'controller' => 'App\\Http\\Controllers\\HolidayController@HolidayAdd',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'HolidayAdd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'HolidayDelete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'holiday/delete/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\HolidayController@HolidayDelete',
        'controller' => 'App\\Http\\Controllers\\HolidayController@HolidayDelete',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'HolidayDelete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profilePage' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile-page',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1,2',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\ProfileController@profilePage',
        'controller' => 'App\\Http\\Controllers\\Profile\\ProfileController@profilePage',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profilePage',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profileEdit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile-edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1,2',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\ProfileController@profileEdit',
        'controller' => 'App\\Http\\Controllers\\Profile\\ProfileController@profileEdit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profileEdit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profileUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'profile-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1,2',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\ProfileController@profileUpdate',
        'controller' => 'App\\Http\\Controllers\\Profile\\ProfileController@profileUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profileUpdate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profileComorbidity' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'profile-comorbidty',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1,2',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\ProfileController@profileComorbidity',
        'controller' => 'App\\Http\\Controllers\\Profile\\ProfileController@profileComorbidity',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profileComorbidity',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profileEmail' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'profile-email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1,2',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\ProfileController@profileEmail',
        'controller' => 'App\\Http\\Controllers\\Profile\\ProfileController@profileEmail',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profileEmail',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profilePassword' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'profile-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1,2',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\ProfileController@profilePassword',
        'controller' => 'App\\Http\\Controllers\\Profile\\ProfileController@profilePassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profilePassword',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profileUsername' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'profile-username',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1,2',
        ),
        'uses' => 'App\\Http\\Controllers\\Profile\\ProfileController@profileUsername',
        'controller' => 'App\\Http\\Controllers\\Profile\\ProfileController@profileUsername',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profileUsername',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profileActive' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'profile/{userId}/is-active',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1,2',
        ),
        'uses' => 'App\\Http\\Controllers\\UserManagement\\UserViewController@isActive',
        'controller' => 'App\\Http\\Controllers\\UserManagement\\UserViewController@isActive',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profileActive',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reportList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'report-management',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@index',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'reportList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'usersReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@usersReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@usersReport',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'usersReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'barangayReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'barangay-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@barangayReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@barangayReport',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'barangayReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'servicesReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'services-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@servicesReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@servicesReport',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'servicesReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'comorbiditiesReport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'comorbidities-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@comorbiditiesReport',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@comorbiditiesReport',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'comorbiditiesReport',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generatePDF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'generate-pdf',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Dashboard\\ReportController@generatePDF',
        'controller' => 'App\\Http\\Controllers\\Dashboard\\ReportController@generatePDF',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generatePDF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'notificationList' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\NotificationController@notificationList',
        'controller' => 'App\\Http\\Controllers\\NotificationController@notificationList',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'notificationList',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'NotificationUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'notification/update/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\NotificationController@NotificationUpdate',
        'controller' => 'App\\Http\\Controllers\\NotificationController@NotificationUpdate',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'NotificationUpdate',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'restriction' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'restriction',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CronJobController@restriction',
        'controller' => 'App\\Http\\Controllers\\CronJobController@restriction',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'restriction',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reminderScheduleTomorrow' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'schedule/reminder/tomorrow',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CronJobController@reminderScheduleTomorrow',
        'controller' => 'App\\Http\\Controllers\\CronJobController@reminderScheduleTomorrow',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'reminderScheduleTomorrow',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reminderScheduleToday' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'schedule/reminder/today',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CronJobController@reminderScheduleToday',
        'controller' => 'App\\Http\\Controllers\\CronJobController@reminderScheduleToday',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'reminderScheduleToday',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateSchedule' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'schedule/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CronJobController@updateSchedule',
        'controller' => 'App\\Http\\Controllers\\CronJobController@updateSchedule',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'updateSchedule',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reminderVolunteerTomorrow' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/reminder/tomorrow',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CronJobController@reminderVolunteerTomorrow',
        'controller' => 'App\\Http\\Controllers\\CronJobController@reminderVolunteerTomorrow',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'reminderVolunteerTomorrow',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'reminderVolunteerToday' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'volunteer/reminder/today',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CronJobController@reminderVolunteerToday',
        'controller' => 'App\\Http\\Controllers\\CronJobController@reminderVolunteerToday',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'reminderVolunteerToday',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'updateAge' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'update-age',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\CronJobController@updateAge',
        'controller' => 'App\\Http\\Controllers\\CronJobController@updateAge',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'updateAge',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9RvMwubxfJ89rux1' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test-database',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\DatabaseTestController@testDatabase',
        'controller' => 'App\\Http\\Controllers\\DatabaseTestController@testDatabase',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::9RvMwubxfJ89rux1',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::XPXgVaBv2iCd1C8l' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'POST',
        2 => 'HEAD',
      ),
      'uri' => 'chatbox-botman',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\BotmanController@enterRequest',
        'controller' => 'App\\Http\\Controllers\\BotmanController@enterRequest',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::XPXgVaBv2iCd1C8l',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'getLogs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-logs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\LogController@getLogs',
        'controller' => 'App\\Http\\Controllers\\LogController@getLogs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'getLogs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'apiLogs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api-logs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'access_level:0,1',
        ),
        'uses' => 'App\\Http\\Controllers\\LogController@apiLogs',
        'controller' => 'App\\Http\\Controllers\\LogController@apiLogs',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'apiLogs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'chat' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'chat',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:268:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:50:"function () {
    return \\view(\'botman.chat\');
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000487f1ab800000000378cdb91";}";s:4:"hash";s:44:"g4tN9zncX4NPQ9iRqTvs33Vw9AaWj3sUDzOiUrACPhM=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'chat',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
