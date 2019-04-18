<?php

namespace App\Repositories;

use App\Models\Event;

class EventRepository
{
    /**
     * @var Event
     */
    private $event;

    /**
     * EventRepository constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * @return Event[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->event::all();
    }

    /**
     * @param array $options
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function save(array $options = [])
    {
        $this->event->edition           = $options['edition'];
        $this->event->name              = $options['name'];
        $this->event->description       = $options['description'];
        $this->event->event_day         = $options['event_day'];
        $this->event->subscribe_begin   = $options['subscribe_begin'];
        $this->event->subscribe_end     = $options['subscribe_end'];

        $this->event->saveOrFail();

        return response()->json($this->event);
    }

}