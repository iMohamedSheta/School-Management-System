<div>
    <div id='calendar-container' class="bg-white p-8 shadow-xl mt-8 rounded-2xl m-auto" wire:ignore>
        <div id='calendar'></div>
    </div>
</div>

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

    <script>
        document.addEventListener('livewire:load', function() {
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;
            var calendarEl = document.getElementById('calendar');
            var checkbox = document.getElementById('drop-remove');
            var data = @this.events;

            var calendarOptions = {
                events: JSON.parse(data),
                dateClick: function(info) {
                    if (!isUserAdmin()) return; // Check if user is admin

                    var title = prompt('Enter Event Title');
                    var date = new Date(info.dateStr + 'T00:00:00');
                    if (title != null && title != '') {
                        calendar.addEvent({
                            title: title,
                            start: date,
                            allDay: true
                        });
                        var eventAdd = { title: title, start: date };
                        @this.addevent(eventAdd);
                        alert('Great. Now, update database...');
                    } else {
                        alert('Event Title Is Required');
                    }
                },
                editable: isUserAdmin(), // Set editable property based on admin status
                selectable: isUserAdmin(), // Set selectable property based on admin status
                displayEventTime: false,
                droppable: isUserAdmin(), // Set droppable property based on admin status
                drop: function(info) {
                    // is the "remove after drop" checkbox checked?
                    if (checkbox.checked) {
                        // if so, remove the element from the "Draggable Events" list
                        info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                },
                eventDrop: info => @this.eventDrop(info.event, info.oldEvent),
                eventClick: function(info) {
                    if (!isUserAdmin()) return; // Check if user is admin

                    if (confirm("Are you sure you want to delete this event?")) {
                        var id = info.event.id;
                        var eventDelete = id;
                        @this.deleteEvent(eventDelete);
                        alert("Event Deleted!");
                    } else {
                        alert("Error!!");
                    }
                },
                loading: function(isLoading) {
                    if (!isLoading) {
                        // Reset custom events
                        this.getEvents().forEach(function(e) {
                            if (e.source === null) {
                                e.remove();
                            }
                        });
                    }
                }
            };

            var calendar = new Calendar(calendarEl, calendarOptions);
            calendar.render();

            @this.on(`refreshCalendar`, () => {
                calendar.refetchEvents();
            });

            function isUserAdmin() {
                @if(auth()->user()->isAdmin() || auth()->user()->isTeacher())
                    return true;
                @else
                    return false;
                @endif
            }
        });
    </script>
@endpush
