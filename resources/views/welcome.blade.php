<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>Schedule Calendar</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- jquery cdn -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <!-- sweetalart -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    </head>
    <body class="lg:pb-12">
        <header>
            <div class="navbar bg-base-100">
                <div class="navbar-start">
                    <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
                    </div>
                    <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                        <li>
                            <a>Month</a>
                            <ul class="p-2">
                                @for ($m = 1; $m <= 12; $m++)
                                    <li><a href="{{ url('/month/' . $m) }}">{{ date('F', mktime(0, 0, 0, $m, 1)) }}</a></li>
                                @endfor
                            </ul>
                        </li>
                        <li>
                            <label class="swap swap-rotate">
                            
                            <!-- this hidden checkbox controls the state -->
                            <input type="checkbox" class="theme-controller" value="dark" />

                            <!-- sun icon -->
                            <svg class="swap-on fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/></svg>

                            <!-- moon icon -->
                            <svg class="swap-off fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/></svg>

                            </label>
                        </li>
                    </ul>
                    </div>
                    <a class="btn btn-ghost text-xl" href="/">Schedule Calendar</a>
                </div>
                <div class="navbar-end hidden lg:flex">
                    <ul class="menu menu-horizontal px-1">
                    <li>
                        <details>
                            <summary>Month</summary>
                            <ul class="p-2">
                                @for ($m = 1; $m <= 12; $m++)
                                    <li><a href="{{ url('/month/' . $m) }}">{{ date('F', mktime(0, 0, 0, $m, 1)) }}</a></li>
                                @endfor
                            </ul>
                        </details>
                    </li>
                    <li>
                            <label class="swap swap-rotate">
                
                            <!-- this hidden checkbox controls the state -->
                            <input type="checkbox" class="theme-controller" value="dark" />

                            <!-- sun icon -->
                            <svg class="swap-on fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z"/></svg>

                            <!-- moon icon -->
                            <svg class="swap-off fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z"/></svg>

                            </label>
                    </li>
                    <li>
                        <details>
                            <summary>{{ Auth::user()->name }}</summary>
                            
                        </details>
                                
                        </li>      
                    </ul>
                </div>

            </div>
        </header>
        <main class="mx-4 lg:mx-8 ">
            <div class="flex justify-around">
                <div class="text-center text-3xl hover:border-violet-600 font-extrabold mb-8 border-solid border-2 rounded-md w-48 py-1">
                    {{$month}}
                </div>
                <button class="btn font-bold" onclick="my_modal_1.showModal()">Create Appointment</button>
                <!-- Create Appointment Modal -->
                <dialog id="my_modal_1" class="modal appointmentModal">
                    <div class="modal-box">
                        <div class=" ">
                            <div class="">
                                @if(session('success'))
                                    <div x-data="{ show: true }" x-show="show" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mt-6" role="alert">
                                        <p class="font-bold">Success</p>
                                        <p>{{ session('success') }}</p>
                                        <p class="cursor-pointer" @click="show = false">&times;</p>
                                    </div>
                                @endif
                                <div class="text-center flex justify-between">
                                    <h1 class="text-3xl font-bold" id="create_appointment">Create Appointment</h1>
                                    <form method="dialog">
                                        <!-- if there is a button in form, it will close the modal -->
                                        <button class="btn">Close</button>
                                    </form>
                                </div>
                                <div class="max-w-xl">
                                    <form class="mx-full" id="create-appointment-form">
                                    @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->_id}}">
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text">First Name</span>
                                            </label>
                                            <input type="text" name="first_name" placeholder="First Name" class="input input-bordered" maxlength="40" required />
                                        </div>
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text">Last Name</span>
                                            </label>
                                            <input type="text" name="last_name" placeholder="Last Name" class="input input-bordered" maxlength="40" required />
                                        </div>
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text">Email</span>
                                            </label>
                                            <input type="email" name="email" placeholder="Email" class="input input-bordered" required />
                                        </div>
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text">Gender</span>
                                            </label>
                                            <select name="gender" class="select select-bordered">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text">Age</span>
                                            </label>
                                            <input type="number" name="age" placeholder="Age" class="input input-bordered" />
                                        </div>
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text">Date</span>
                                            </label>
                                            <input type="date" name="date" class="input input-bordered" required />
                                        </div>
                                        <div class="form-control">
                                            <label class="label">
                                                <span class="label-text">Time</span>
                                            </label>
                                            <input type="time" name="time" class="input input-bordered" required />
                                        </div>
                                        <div class="form-control mt-6">
                                            <button class="btn btn-primary text-inherit" type="submit" id="btn-create-appointment">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </dialog>
            </div>
            <div id="Calendar-date" class="grid grid-cols-7 gap-1 lg:gap-4 mb-8">
                <div class="text-2xl font-extrabold text-center py-4 overflow-x-auto border-2 rounded-md hover:border-violet-600">Sunday</div>
                <div class="text-2xl font-extrabold text-center py-4 overflow-x-auto border-2 rounded-md hover:border-violet-600">Monday</div>
                <div class="text-2xl font-extrabold text-center py-4 overflow-x-auto border-2 rounded-md hover:border-violet-600">Tuesday</div>
                <div class="text-2xl font-extrabold text-center py-4 overflow-x-auto border-2 rounded-md hover:border-violet-600">Wednesday</div>
                <div class="text-2xl font-extrabold text-center py-4 overflow-x-auto border-2 rounded-md hover:border-violet-600">Thursday</div>
                <div class="text-2xl font-extrabold text-center py-4 overflow-x-auto bg-red-400 text-white rounded-md hover:border-violet-900">Friday</div>
                <div class="text-2xl font-extrabold text-center py-4 overflow-x-auto bg-red-400 text-white rounded-md hover:border-violet-900">Saturday</div>
            </div>
            <div id="Calendar-date" class="grid grid-cols-7 gap-1 lg:gap-4 z-0">
                @for($i=1;$i<=$day;$i++)
                    <div class="border-2 h-28 lg:h-44 rounded-lg border-dotted"> </div>
                @endfor
                @php
                    // Get current day, month, and year
                    date_default_timezone_set('Asia/Dhaka');
                    $currentDay = date('d');
                    $currentMonth = date('m');
                    $currentYear = date('Y');
                    
                @endphp
                @for($j=1;$j<=$no_of_date;$j++)
                    <div class="border-2 h-28 lg:h-44 rounded-lg lg:p-4 hover:border-violet-600 {{ ($j==(int)$currentDay && (int)$currentMonth==$month_no) ? 'border-red-500' : 'border-gray-400' }}">
                        <span class="font-bold">{{$j}}</span><br>
                        @php
                            $dateString = "2024-$month_no-$j";
                            $formattedDate = date('Y-m-d', strtotime($dateString));
                            $appointmentsForDay = $appointments->where('date', $formattedDate)->sortBy('time');
                            $count = 1;
                        @endphp
                        <div class="mx-auto overflow-y-auto h-20 lg:h-32">
                        @foreach ($appointmentsForDay as $appointment)
                            <div class="border-gray-300 mt-2">
                                <!-- Open the modal using ID.showModal() method -->
                                <button class="btn" onclick="document.getElementById('my_modal_{{$j}}_{{$loop->iteration}}').showModal()">Appointment {{$loop->iteration}}: {{$appointment->time}}</button>
                                <dialog id="my_modal_{{$j}}_{{$loop->iteration}}" class="modal">
                                    <div class="modal-box">
                                        <h3 class="font-bold text-lg">{{$appointment->first_name}} {{$appointment->last_name}}</h3>
                                        <p class="py-4">
                                            Email: {{$appointment->email}} <br>
                                            Gender: {{$appointment->gender}} <br>
                                            Age: {{$appointment->age}} years <br>
                                            Date: {{$appointment->date}} <br>
                                            Time: {{$appointment->time}} <br>
                                        </p>
                                        <div class="modal-action">
                                            <form method="dialog">
                                                <!-- if there is a button in the form, it will close the modal -->
                                                <button class="btn" onclick="document.getElementById('my_modal_{{$j}}_{{$loop->iteration}}').close()">Close</button>
                                            </form>
                                        </div>
                                    </div>
                                </dialog>
                            </div>
                        @endforeach
                        </div>
                    </div>
                @endfor
            </div>
        </main>
        <footer>

        </footer>
        <script>
            $(document).ready(function(){
                // $('#create_appointment').html('Edit');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var form = $('#create-appointment-form')[0];

                $('#btn-create-appointment').click(function(){
                    var createAppointment = new FormData(form);
                    console.log(createAppointment);
                    $.ajax({
                        url: '{{ route("appointment.store") }}',
                        method: 'POST',
                        processData: false,
                        contentType: false,
                        data: createAppointment,
                        success: function(response){
                            $('.appointmentModal').modal('hide');
                            if(response){
                                swal("Success!", response.success , "success");
                            }
                        },
                        error: function(error){
                            console.log(error)
                        }

                    });
                });
            });
        </script>
    </body>
</html>
