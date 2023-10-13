<?php

// config for Larawatch/Larawatch
return [

    /*
     * The date format used for all dates displayed on the output of commands
     * provided by this package.
     */
    'date_format' => 'Y-m-d H:i:s',

    'models' => [
        /*
         * The model you want to use as a MonitoredScheduledTask model
         */
        'monitored_scheduled_task' => Larawatch\Larawatch\Models\MonitoredScheduledTask::class,

        /*
         * The model you want to use as a MonitoredScheduledTaskLogItem model
         */
        'monitored_scheduled_log_item' => Larawatch\Larawatch\Models\MonitoredScheduledTaskLogItem::class,
    ],

    'lowerrocklabs' => [
        'queue' => 'general-queue',
        'retry_job_for_minutes' => 10,
        'send_starting_ping' => true,
    ],
    /*
     * The base URL to use when sending reports.  Most functionality requires Larawatch endpoints
     */
    'base_url' => env('LARAWATCH_BASE_URL') ?? 'https://www.larawatch.com/api/',

    /*
     * The unique project key, available via the Dashboard. Should be unique to a project
     */
    'project_key' => env('LARAWATCH_PROJECT_KEY'),

    /*
     * The unique server key, available via the Dashboard.  Should be unique to a server
     */
    'server_key' => env('LARAWATCH_SERVER_KEY'),

    /*
     * Your unique authentication token, available via the Dashboard.
     */
    'destination_token' => env('LARAWATCH_TOKEN'),

    /*
     * Database Monitoring Section
     */
    'db_monitoring_enabled' => env('LARAWATCH_DB_ENABLED') ?? false, // Enable/Disable Database monitoring

    // Enable or Disable the Max Connections Monitor
    'db_maxconnections_enabled' => env('LARAWATCH_DB_MAXCONNECTIONS_ENABLED') ?? false,

    // Specify a threshold for reporting on Max Connections
    'db_maxconnections_threshold' => env('LARAWATCH_DB_MAXCONNECTIONS_THRESHOLD') ?? 500,

    // Enable or Disable the Slow Query Monitor
    'db_slowquery_enabled' => env('LARAWATCH_SLOWQUERY_ENABLED') ?? false,

    // Specify a threshold for reporting on Slow Query
    'db_slowquery_threshold' => env('LARAWATCH_SLOWQUERY_THRESHOLD') ?? 3600,

    'enable_performance_metrics' => env('LARAWATCH_ENABLE_PERFORMANCE_METRICS') ?? false,
];
