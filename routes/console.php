<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('cars:parse')->everyMinute();
