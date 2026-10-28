<?php

use App\Models\Event;

it('casts capacity to an integer', function () {
    $event = new Event(['capacity' => '25']);

    expect($event->capacity)->toBe(25);
});
