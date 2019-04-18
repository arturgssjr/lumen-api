<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @var EventRepository
     */
    private $repository;

    /**
     * Construct
     *
     * @param EventRepository $repository
     */
    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show all Events
     *
     * @return Event $events
     */
    public function index()
    {
        $events = $this->repository->all();

        return response()->json($events);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(Request $request)
    {
        $event = $request->all();

        return $this->repository->save($event);
    }
}
